<?php
	require 'template/header.php';
	$data = select($conn);
	close($conn);
	

 ?>
 <div class="container">
 	<div class="row">
 		<div class="col-lg-12">
			<?php
				echo '<div><a class="btn btn-success btn-sm mt-3 mb-3" href="admin_creat.php">Добавить новую статью</a></div>';

				$out = '<table class="table table-striped">';
				$out .= '<tr><th>id</th><th>Заголовок</th><th>Маленькое описание</th><th>image</th><th>Действие</th><th>Редактировать</th><tr>'; 

				for ($i=0; $i < count($data); $i++) { 
					$out .= "<tr><td>{$data[$i]['id']}</td><td>{$data[$i]['title']}</td><td>{$data[$i]['descr_min']}</td><td><img src='assets/images/{$data[$i]['image']}' style=width:60px></td><td><a href=admin_delte.php?id={$data[$i]['id']} onclick='confirm(\"Вы уверены, что нужно удалить?\")'>Удалить</a> </td><td><a href=admin_update.php?id={$data[$i]['id']} >Редактировать </a> </td><tr>";

				}

				$out .= '</table>';
				echo $out;

			?>
 		</div>
 	</div>
 </div>	
<?php 
	require 'template/footer.php';
 ?>
