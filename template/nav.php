<div class="col-lg-3">
	<?php
		echo "<ul class='list-group'>";
		$out = '';
		for ($i=0; $i < count($cat) ; $i++) { 
			$out .= "<li class='list-group-item'><a href='category.php?id={$cat[$i]['id']}' style=padding:5px;display:block;>{$cat[$i]['description']}</a></li>";

		}
		echo $out;
		echo "</ul>";
	?>
</div>