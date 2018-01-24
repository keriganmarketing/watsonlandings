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
<a href="/our-work/" class="btn btn-primary pagination-link">View All Albums</a>
<div class="row photo-gallery">
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
		<div class="col-md-3 mb-3">
			<figure class="image is-4by3">
				<a>
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
