<?php
	require_once 'core/config.php';
	require_once 'core/function.php';

	$conn = connect();
	$data = select($conn);
	close($conn);

	if (isset($_COOKIE['bd_creat_success']) AND $_COOKIE['bd_creat_success'] != '') {
		if($_COOKIE['bd_creat_success'] == 1){
			echo "Запись успешно добавлена!";
			setcookie('bd_creat_success', 1, time()-10);
		}
	}

	echo '<div><a href="admin_creat.php">Добавить новую статью</a></div>';

	$out = '<table>';
	$out .= '<tr><th>id</th><th>Заголовок</th><th>Маленькое описание</th><th>image</th><tr>'; 



	for ($i=0; $i < count($data); $i++) { 
		$out .= "<tr><td>{$data[$i]['id']}</td><td>{$data[$i]['title']}</td><td>{$data[$i]['descr_min']}</td><td><img src='assets/images/{$data[$i]['image']}' style=width:60px></td><tr>"; 
	}
	$out .= '</table>';
	echo $out;



	
?>
