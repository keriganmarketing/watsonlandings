<?php
use KeriganSolutions\FacebookPhotoGallery\FacebookPhotoGallery;

// Cursor before the returned data set
$before  = $_GET['before'] ?? null;
// Cursor after the returned data set
$after   = $_GET['after'] ?? null;

$gallery = new FacebookPhotoGallery();
$albums   = $gallery->albums(12, $before, $after);

$badAlbums = ['Past builds', 'Profile Pictures', 'Mobile Uploads', 'Cover Photos', 'Timeline Photos', 'Untitled Album']
?>

<div class="row photo-gallery grid">
	<?php
	foreach ($albums->data as $album) {
	    if(!in_array($album->name,$badAlbums)) {
		    ?>
            <div class="grid-item col-sm-6 col-md-3 mb-3">
                <figure class="image is-4by3">
                    <a href="/our-work/?albumName=<?= $album->name ?>&albumId=<?= $album->id ?>">
                        <img src="<?= $album->cover_photo->images[4]->source ?>" alt="<?= $album->name ?>"
                             class="img-responsive">
                    </a>
                </figure>
                <p class="has-text-centered"><?= $album->name ?></p>
            </div>
		    <?php
	    }
	}
	?>
</div>
<?php
$disabledPrevious = isset($albums->paging->previous) ? false : true;
$disabledNext = isset($albums->paging->next) ? false : true;
?>
<ul class="pagination text-center" role="navigation" aria-label="pagination">
    <li <?= ($disabledPrevious != false ? 'disabled"' : '' ) ?>><a class="pagination-previous"
		<?= ($disabledPrevious == false ? 'href="/our-work/?before=' . $albums->paging->cursors->before . '"' : ' disabled' ) ?>
        > Previous </a></li>
    <li <?= ($disabledNext != false ? 'class="disabled"' : '' ) ?>><a class="pagination-next"
		<?= ($disabledNext == false ? 'href="/our-work/?after=' . $albums->paging->cursors->after . '"' : ' disabled' ) ?>
        > Next </a></li>
</ul>
