<?php
use KeriganSolutions\FacebookPhotoGallery\FacebookPhotoGallery;

// Cursor before the returned data set
$before  = $_GET['before'] ?? null;
// Cursor after the returned data set
$after   = $_GET['after'] ?? null;

$albumId = $_GET['albumId'] ?? null;

$gallery = new FacebookPhotoGallery();
$photos  = $gallery->albumPhotos($albumId, 16, $before, $after);
?>
<h2><?php echo $_GET['albumName']; ?> <a href="/our-work/" class="btn btn-default btn-sm pagination-link">Back to main gallery</a></h2>

<div class="row photo-gallery grid">
	<?php
	$i = 0;
	foreach ($photos->data as $photo) {
		$thumbnail = '';
		if ( ! isset($photo->images[4]->source)) {
			$thumbnail = $photo->images[0]->source;
		} else {
			$thumbnail = $photo->images[4]->source;
		}
		?>
		<div class="grid-item col-sm-6 col-md-3 mb-3">
			<figure class="image is-4by3">
				<a href="<?= $thumbnail ?>" data-lightbox="<?php echo $albumId; ?>" data-title="<?= $photo->images[0]->name ?>">
					<img src="<?= $thumbnail ?>" alt="<?= $photo->images[0]->name ?>" class="img img-responsive">
				</a>
			</figure>
		</div>
		<?php
		$modalContent .= '<img src="'.$photo->images[0]->source.'" alt="'.$photo->images[0]->name.'" :index="'.$i.'" >';
		$i++;
	}
	?>
</div>
<script src="/wp-content/themes/vega-child/lightbox.js"></script>
