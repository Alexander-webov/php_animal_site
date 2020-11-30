<?php
	require 'template/header.php';
	$data = getPostFromCategory($conn);
	$catList = getCatInfo($conn);
	close($conn);

?>
<div class="container">
	<div class="row">
		<div class="col-lg-9">
			<?php echo "<h1>{$catList['category']}</h1>"; ?>
			<div class="row">

				<?php 
				
						$out = '';
						for ($i=0; $i < count($data) ; $i++) { 
							$out .= '<div class="col-lg-4 col-md-3">';
							$out .= '<div class="card">';
							$out .= "<img class='card-img-top' src='assets/images/{$data[$i]['image']}' alt='Card image cap' height=200px> "; 
							$out .= "<div class='card-body'>";
							$out .= "<h5  class='card-title'>{$data[$i]['title']}</h5>";
							$out .= "<p class='card-text'>{$data[$i]['descr_min']}</p>";
							$out .= "<p class='text-right'><a  class='btn btn-primary text-right' href='article.php?id={$data[$i]['id']}'>Читать далее...</a></p>";
							$out .= '</div>';
							$out .= '</div>';
							$out .= '</div>';
						}
						echo $out;
						
					?>

	  		</div>
	  		<?php echo $catList ['description']; ?>
	  	</div>
	  	<?php 	require 'template/nav.php'; ?>
	</div>
</div>
<?php 
	require 'template/footer.php';
 ?>