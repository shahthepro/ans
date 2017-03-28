<!DOCTYPE html>
<?php require_once('functions.php'); ?>
<html>
<head>
    <title>Arunai News Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel=stylesheet href="css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="css/flexslider.css">
    <link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
    <link rel=stylesheet href="css/style.css">
    <!--[if lt IE 9]>
    <link href="css/ie8.css" rel="stylesheet" type="text/css" />
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="js/tinynav.min.js"></script>
    <script type="text/javascript" src='js/jquery.placeholder.min.js'></script>
    <script type="text/javascript" src='js/bootstrap.min.js'></script>
    <script type="text/javascript" src='js/jquery.ticker.js'></script>
</head>
<body>
    <header>
    <div class='container'>
        <div class='row menu-line'>
            <div class='span7'>
                <nav>
                    <ul>
                        <li class='active'><a href="/">Home</a></li>
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <?php if(is_user_logged_in()): ?>
                            <li><a href="logout.php">Logout</a></li>
                        <?php else: ?>
                            <li><a href="login.php">Login</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
            <div class='span2 search-form'>
                <form action="blog-search.html">
                    <input class='span2' type="text" name="search" placeholder="Search..." />
                    <input type="submit" name="submit" value='Search' />
                </form>
            </div>
        </div>
        <div class='row breaking-news'>
            <div class='span2 title'>
               <span>Breaking News</span>
            </div>
            <div class='span10 header-news'>
                <ul id="js-news" class="js-hidden">
                    <?php
                        $ticker_feeds = fetch_feeds(array(
                            'count' => 5
                        ));
                        foreach($ticker_feeds as $feed) {
                            ?>
                                <li class="news-item"><a href="<?php echo $feed->link; ?>"><?php echo $feed->title; ?></a></li>
                            <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div class='row logo-line'>
            <div class='span3 logo'>
                <a href="/">
                    <img src="img/ans.jpg">
                </a>
            </div>
        </div>
    </div>
</header>