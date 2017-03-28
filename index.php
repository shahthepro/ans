<?php require_once('header.php'); ?>
<div class='slider hidden-phone'>
    <div class='container'>
        <div class='row'>
            <div class='inner'>
                <div id="slider" class="span12">
                    <ul class='slides'>
                    <?php
                        $feeds = fetch_feeds(array(
                            'start' => 0,
                            'count' => 5,
                            'status' => 'approved'
                        ));
                        foreach($feeds as $feed) {
                            ?>
                                <li>
                                    <div class='span12 single-slide no-margin'>
                                        <figure>
                                            <img src="img/slider-big<?php echo (rand(0,1) == 0) ? '' : '2'; ?>.jpg" alt="" />
                                        </figure>
                                        <div class='slider-caption'>
                                            <div class='span6 no-margin'>
                                                <div class='title'><a href="#"><?php echo $feed->title; ?></a></div>
                                            </div>
                                            <br />
                                            <div class='description span5'><?php echo $feed->summary; ?></div>
                                        </div>
                                    </div>
                                </li>
                            <?php
                        }
                    ?>
                    </ul>
                </div>
                <div class='span12 slider-navigation'>
                    <?php
                        $i = 0;
                        foreach($feeds as $feed) {
                            $i += 1;
                            ?>
                                <div class='navigation-item <?php echo ($i === 1) ? 'first-child active' : ''; ?>' rel='<?php echo $i; ?>'>
                                    <span><?php echo $feed->title; ?></span>
                                </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="main">
    <div class='container'>
            <div class='content '>
                <div class="row" style="margin: 0;">
                    <div class='article-showcase hidden-phone'>
                        <div class='inner-border'>
                            <?php
                                $big_article_feeds = fetch_feeds(array(
                                    'start' => 5,
                                    'count' => 4,
                                    'status' => 'approved'
                                ));
                            ?>
                            <div class='half'>
                                <?php $i = 0; foreach ($big_article_feeds as $feed): $i += 1; ?>
                                <div class='big-article <?php echo ($i == 1) ? 'active' : '' ; ?> ' rel='<?php echo $i; ?>'>
                                    <div class='title'>
                                        <span><a href="<?php echo $feed->link; ?>"><?php echo $feed->title; ?></a></span>
                                    </div>
                                    <figure>
                                        <img src="img/article-showcase-big.jpg" alt="" />
                                    </figure>
                                    <div class='main-text'>
                                        <div class='inner'>
                                            <p><?php echo $feed->summary; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <div class='half'>
                                <div class='inner-left-border'>
                                <?php $i = 0; foreach ($big_article_feeds as $feed): $i += 1; ?>
                                    <article class='<?php echo ($i == 1) ? 'first-child active': ''; ?>' rel='<?php echo $i; ?>'>
                                        <figure>
                                            <img src="img/gaming0<?php echo $i; ?>.jpg" alt="" />
                                        </figure>
                                        <div class='text'>
                                            <h3><?php echo $feed->title; ?></h3>
                                        </div>
                                    </article>
                                <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='span6 article-box' style='margin: 0'>
                        <?php
                            $latest_cat_feeds = fetch_feeds(array(
                                'count' => 9,
                                'status' => 'approved'
                            ));
                        ?>
                        <div class='box-title'>
                            <h2>Latest News</h2>
                            <div class='title-line'></div>
                        </div>
                        <?php $i = 0; foreach ($latest_cat_feeds as $feed): $i += 1; ?>
                            <article class='<?php echo ($i == 1) ? 'first-child': ''; ?>'>
                                <figure>
                                    <img src="img/gaming0<?php echo $i; ?>.jpg" alt="" />
                                </figure>
                                <div class='text'>
                                    <h3><a href="<?php echo $feed->title; ?>"><?php echo $feed->title; ?></a></h3>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                    <div class='span6 article-box'>
                        <?php
                            $mobile_cat_feeds = fetch_feeds(array(
                                'count' => 4,
                                'status' => 'approved'
                            ));
                        ?>
                        <div class='box-title'>
                            <h2>Mobile</h2>
                            <div class='title-line'></div>
                        </div>
                        <?php $i = 0; foreach ($mobile_cat_feeds as $feed): $i += 1; ?>
                            <article class='<?php echo ($i == 1) ? 'first-child': ''; ?>'>
                                <figure>
                                    <img src="img/gaming0<?php echo $i; ?>.jpg" alt="" />
                                </figure>
                                <div class='text'>
                                    <h3><a href="<?php echo $feed->title; ?>"><?php echo $feed->title; ?></a></h3>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                    <div class='span6 article-box'>
                        <?php
                            $gadgets_cat_feeds = fetch_feeds(array(
                                'count' => 4,
                                'status' => 'approved'
                            ));
                        ?>
                        <div class='box-title'>
                            <h2>Gadgets</h2>
                            <div class='title-line'></div>
                        </div>
                        <?php $i = 0; foreach ($gadgets_cat_feeds as $feed): $i += 1; ?>
                            <article class='<?php echo ($i == 1) ? 'first-child': ''; ?>'>
                                <figure>
                                    <img src="img/gaming0<?php echo $i; ?>.jpg" alt="" />
                                </figure>
                                <div class='text'>
                                    <h3><a href="<?php echo $feed->title; ?>"><?php echo $feed->title; ?></a></h3>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
    </div>
</div>

<?php require_once('footer.php'); ?>