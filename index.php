<?php 
	require 'template/header.php';

	$data = selectMain($conn);
	$countPage = paginationCount($conn);
	$tag = getAllTags($conn);
	$cat = getAllCatInfo($conn);
	close($conn);
?>
  	<div class="jumbotron jumbotron-fluid reklama">
	  <div class="container">

	  </div>
	</div>

  	<div class="container">
		<div class="row">
			<div class="col-lg-9">
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
			</div>
<?php 	require 'template/nav.php'; ?>
		</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center">
			<?php
				echo '<nav aria-label="...">';
				echo '<ul class="pagination pagination-lg">';
					for ($i=0; $i < $countPage; $i++) {
						$j = $i + 1;
						echo "<li class='page-item'> <a class='page-link' href='index.php?page={$i}' style=padding:5px>{$j}</a> </li>";
					}
				echo '</ul>';
				echo '</nav>';

				for ($i=0; $i < count($tag); $i++) {
					echo "<span class='badge badge-warning ml-1'><a href='tag.php?tag={$tag[$i]}' style=padding:15px>#{$tag[$i]}</a></span>";
				} 

			?>
			</div>
		</div>
	</div>
</div>
<?php 	require 'template/footer.php'; ?>

  
  

