<?php
require 'template/header.php';

$data = selectArrticle($conn);
$tag = getArticleTags($conn);
close($conn);
?>
  	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<div class="row">
					<div class="col-lg-12">
					<?php
						$out = '';
							$out .= "<h1 class='text-center'>{$data['title']}</h1>";
							$out .= "<img class='rounded float-left mr-5' src='assets/images/{$data['image']}' style=width:200px;>"; 
							$out .= "<div>{$data['description']}</div>";
						echo $out;
					?>
				</div>
			</div>

		</div>
		<?php 	require 'template/nav.php'; ?>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center">
				<?php
					for ($i=0; $i < count($tag); $i++) {
						echo "<span><a  class='badge badge-warning mt-5 mb-5' href='tag.php?tag={$tag[$i]}' style=padding:5px>#{$tag[$i]}</a></span>";
					}
				?>
			</div>
		</div>
	</div>




<?php 
	require 'template/footer.php';
 ?>