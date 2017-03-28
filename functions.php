<?php
session_start();

// $host_domain = 'http://localhost:9985';
$host_domain = 'https://arunai.herokuapp.com';
$host_url = $host_domain . '/api/techfeeds';

if (!is_user_logged_in() && strpos($_SERVER["REQUEST_URI"], 'dashboard.php') !== false) {
	header('Location: login.php');
}

if(isset($_POST["action"]) && function_exists($_POST["action"])) {
	$func = $_POST["action"];
	$func();
}

function dd($var) {
	die(var_dump($var));
}

function is_user_logged_in() {
	return isset($_SESSION["user"]);
}

function login_user() {

	if(isset($_POST["username"]) && isset($_POST["password"])) {
		if($_POST["username"] == "admin" && $_POST["password"] == "admin") {
			$_SESSION["user"] = "admin";
			header("Location: index.php");
		}
	}
	set_alert('login_user', 'Invalid username/password', 'danger');
}

function logout_user() {
	unset($_SESSION["user"]);
	header('Location: login.php');
}


function set_alert($alert_name, $message, $type = 'success') {
	$_SESSION[$alert_name . '_alert_message'] = $message;
	$_SESSION[$alert_name . '_alert_type'] = $type;
}

function get_alert($alert_name) {
	if(!isset($_SESSION[$alert_name . '_alert_message']) || empty($_SESSION[$alert_name . '_alert_message'])) return;
	echo "<div class='alert alert-{$_SESSION[$alert_name . '_alert_type']}'>{$_SESSION[$alert_name . '_alert_message']}</div>";
	unset($_SESSION[$alert_name . '_alert_message']);
	unset($_SESSION[$alert_name . '_alert_type']);
}

function update_approved_posts() {
    global $host_url;
    $old_approvals = isset($_POST['old_approvals']) && !empty($_POST['old_approvals']) ? $_POST['old_approvals'] : array();
    $old_approvals = explode(',', $_POST['old_approvals']);
    $approved_feeds = $_POST['approved_feeds'];
    $new_approvals = array_diff($approved_feeds, $old_approvals);
    $new_disapprovals = array_diff($old_approvals, $approved_feeds);

    foreach($new_approvals as $feed_id) {
        try {
            file_get_contents($host_url . '/' . $feed_id . '/approve');
        } catch (Expression $e) {
        }
    }

    foreach($new_disapprovals as $feed_id) {
        try {
        file_get_contents($host_url . '/' . $feed_id . '/disapprove');
        } catch (Expression $e) {
        }
    }
}

function fetch_feeds($args = array()) {
    global $host_url;
    $count = (!isset($args['count'])) ? -1 : $args['count'];
    $start = (!isset($args['start'])) ? 0 : $args['start'];
    $status = (!isset($args['status'])) ? 'all' : $args['status'];

    $category = (!isset($args['category'])) ? '' : $args['category'];

    $url = $host_url;

    if ($status !== 'all') {
        $url = $url . '//status/' . $status;
    }

    if ($category !== '') {
        $url = $host_url . '//category/' . $category;
    }

    $feeds = json_decode(file_get_contents($host_url));

    $feeds = array_map(function ($item) {
        // Mapping default values
        if (!isset($item->approved)) { $item->approved = false; }
        if (!isset($item->title)) { $item->title = ''; }
        if (!isset($item->summary)) { $item->summary = ''; }
        if (!isset($item->link)) { $item->link = '#'; }
        if (!isset($item->category)) { $item->category = ''; }
        if (!isset($item->image)) { $item->image = ''; }
        return $item;
    }, $feeds);

    $max = $start + $count;

    if ($count + $start < $max) {
        return $feeds;
    }

    $out = array_slice($feeds, $start, $count);

    return $out;
}