<?php
use KeriganSolutions\FacebookFeed\FacebookFeed;
?>
<div class="section-title">
    <h2 class="block-title wow zoomIn">Latest Posts</h2>
</div>
<div class="columns is-multiline">
    <div class="column is-4 level-item">
        <?php
        //do Facebook thingy for 1 article here
        $feed    = new FacebookFeed();
        $results = $feed->fetch(3);
        foreach ($results->posts as $result) {
            include(locate_template('template-parts/partials/mini-article.php'));
        }
        ?>
    </div>
</div>