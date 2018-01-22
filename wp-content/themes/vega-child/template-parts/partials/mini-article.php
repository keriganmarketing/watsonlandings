<?php

$dateposted = human_time_diff(time(),strtotime($result->created_time)) . ' ago';
$content  = wp_trim_words($result->message, 17, '... <a href="#" >read more.</a>');
$photoUrl = $result->full_picture != null ? $result->full_picture : 'http://hindsconstruction.dev/wp-content/uploads/2018/01/gulfaire-home-2.jpg';

$vega_wp_blog_feed_meta = vega_wp_get_option('vega_wp_blog_feed_meta');
if($vega_wp_blog_feed_meta == 'Y') {
    $vega_wp_blog_feed_meta_author = vega_wp_get_option('vega_wp_blog_feed_meta_author');
    $vega_wp_blog_feed_meta_category = vega_wp_get_option('vega_wp_blog_feed_meta_category');
    $vega_wp_blog_feed_meta_date = vega_wp_get_option('vega_wp_blog_feed_meta_date');
}
$vega_wp_blog_feed_buttons = vega_wp_get_option('vega_wp_blog_feed_buttons');
global $key;


?>
<div class="post-grid recent-entry" id="recent-post-<?php the_ID(); ?>">
    <div class="recent-entry-image image">
        <?php if($result->type != 'video') { ?>
        <div class="embed-responsive embed-responsive-4by3 align-items-center">
            <a target="_blank" href="<?php echo $result->permalink_url; ?>" target="_blank">
                <img src="<?php echo $photoUrl; ?>" alt="<?php echo $result->caption; ?>" class="embed-responsive-item" >
            </a>
        </div>
        <?php } else { ?>
        <div class="embed-responsive embed-responsive-4by3">
            <iframe
                    src="<?php echo $result->link ?>"
                    style="border:none;overflow:hidden"
                    scrolling="no"
                    frameborder="0"
                    allowTransparency="true"
                    allowFullScreen="true"
                    class="embed-responsive-item"
                    width="100%"
                    height="170">

            </iframe>
        </div>
        <?php } ?>
        <div class="caption">
            <div class="caption-inner">
                <a href="<?php the_permalink(); ?>" class="icon-link white"><i class="fa fa-link"></i></a>
            </div>
            <div class="helper"></div>
        </div>
    </div>

    <div class="recent-entry-content">
        <?php echo $content; ?>
    </div>

    <?php if($vega_wp_blog_feed_meta == 'Y') { $temp = array(); $str = ''; ?>
        <!-- Post Meta -->
        <div class="recent-entry-meta">
            <?= ($dateposted!='' ? '<p class="time-posted">posted '.$dateposted.'</p>' : null); ?>
        </div>
        <!-- /Post Meta -->
    <?php } ?>

    <?php if($vega_wp_blog_feed_buttons == 'Y') { ?>
        <!-- Post Buttons -->
        <div class="recent-entry-buttons">
            <?php $readmore = esc_html(vega_wp_get_option('vega_wp_blog_feed_readmore_text')) ?>
            <?php if($readmore != '') { ?><a href="<?php the_permalink(); ?>" class="btn btn-default btn-readmore"><?php echo $readmore; ?></a><?php } ?>
            <?php if ( ! post_password_required() && comments_open() || '0' != get_comments_number() )  { ?>
                <?php
                $nocomments = esc_html(vega_wp_get_option('vega_wp_blog_feed_nocomments_text'));
                $comment = esc_html(vega_wp_get_option('vega_wp_blog_feed_comment_text'));
                $comments = esc_html(vega_wp_get_option('vega_wp_blog_feed_comments_text'));
                ?>
                <?php if($nocomments != '' && $comment != '' && $comments != '')
                    comments_popup_link( $nocomments, '1 ' . $comment, '% ' . $comments, 'btn btn-inverse btn-comments' ); ?>
            <?php } ?>
        </div>
        <!-- /Post Buttons -->
    <?php } ?>

</div>