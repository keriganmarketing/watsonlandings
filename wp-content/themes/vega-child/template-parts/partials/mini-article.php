<?php
$headline = ($post->post_name == 'home' ? 'News' : '');
$dateposted = ($post->post_name == 'home' ? '' : human_time_diff(time(),strtotime($result->created_time)) . ' ago' );
$content  = $result->message;
$photoUrl = $result->full_picture != null ? $result->full_picture : 'http://psjumc.org/wp-content/uploads/18118987_1726122984071630_5737930412887748488_n.jpg';
?>
<div class="card mini-article">
    <div class="card-image">
        <?php if($result->type != 'video') { ?>
            <figure class="image is-16by9">
                <a target="_blank" href="<?php echo $result->permalink_url; ?>" target="_blank">
                    <img src="<?php echo $photoUrl; ?>" alt="<?php echo $result->caption; ?>" >
                </a>
            </figure>
        <?php } else { ?>
            <figure class="image video is-16by9">
                <iframe
                        src="<?php echo $result->link ?>"
                        style="border:none;overflow:hidden"
                        scrolling="no"
                        frameborder="0"
                        allowTransparency="true"
                        allowFullScreen="true"
                        class="article-image"
                        width="100%"
                        height="170">

                </iframe>
            </figure>
        <?php } ?>
    </div>
    <div class="card-content">
        <?= ($headline!='' ? '<h3 class="title">'.$headline.'</h3>' : null); ?>
        <?= ($dateposted!='' ? '<p class="time-posted">'.$dateposted.'</p>' : null); ?>
        <?= wp_trim_words( $content, $num_words = 22, '...' ); ?>
        <?php if($result->type != 'video'){ ?>
            <a target="_blank" href="<?= $result->permalink_url; ?>">Read&nbsp;on&nbsp;facebook</a>
        <?php }else{ ?>
            <a @click="$emit('toggleModal', 'embedViewer', '<?= $result->link; ?>')" >Watch&nbsp;the&nbsp;video</a>
        <?php } ?>
    </div>
</div>