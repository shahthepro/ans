<?php
    require_once('header.php');
    $all_feeds = fetch_feeds();
    $old_approvals = array_map(function ($item) {
        return $item->_id;
    }, array_filter($all_feeds, function ($item) {
        return $item->approved;
    }));
?>
<div id="main">
    <div class='container'>
        <div class='content'>
            <form method="POST">
                <input type="hidden" name="action" value="update_approved_posts" />
                <input type="hidden" name="old_approvals" value="<?php echo implode(',', $old_approvals); ?>" />
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width="100%">Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($all_feeds as $feed): ?>
                            <tr>
                                <td><input type="checkbox" class="form-control" name="approved_feeds[]" <?php echo ($feed->approved) ? 'checked' : ''; ?> value="<?php echo $feed->_id; ?>" /></td>
                                <td><?php echo $feed->title; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success btn-xl">Update</button>
            </form>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>