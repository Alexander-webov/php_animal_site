<?php
	require_once 'core/config.php';
	require_once 'core/function.php';
	if (isset($_POST['title']) AND $_POST['title'] !='') {

	$title = $_POST['title'];
	$descrMin = $_POST['descr-min'];
	$descrption = $_POST['descr'];
	$tags = trim($_POST['tag']);
	$tags = explode(",", $tags);
	$newTags = [];
	for ($i=0; $i < count($tags); $i++) { 
		if (trim($tags[$i]!='')) {
			$newTags[] = trim($tags[$i]);
		}
	}

	$file = move_uploaded_file($_FILES['image']['tmp_name'], 'assets/images/'.$_FILES['image']['name']);

	$conn = connect();
	$sql = "INSERT INTO info(title, descr_min, description, image) VALUES ('".$title."', '".$descrMin."','".$descrption."','".$_FILES['image']['name']."')";

	if(mysqli_query($conn, $sql)){
		$lastId = mysqli_insert_id($conn);
		for ($i=0; $i < count($newTags); $i++) { 
			$sql = "INSERT INTO tag (tag, post) VALUES ('".$newTags[$i]."', ".$lastId.")";
			mysqli_query($conn, $sql);
		}
		setcookie('bd_creat_success', 1, time()+1);
		header("Location: {$_SERVER['PHP_SELF']}");
	}else{
		echo "Error: ".$sql.'<br>'.mysqli_error($conn); 
	}

	close($conn);
	}
	
?>

  <form action="" method="POST" enctype="multipart/form-data">
  	<p>Название животного: <input type="text" name="title"></p>
  	<p>Короткое описание:</p>
  	<textarea name="descr-min"></textarea>
  	<p>Описание:</p>
  	<textarea name="descr"></textarea>
  	<p>Фото <input type="file" name="image"></p>
  	<p>Введите теги: <input type="text" name="tag"> </p>
  	<p> <input type="submit" name="add"> </p>


  </form>
  <div><a href="admin.php">Перейти в админку</a></div>


<?php
if (isset($_COOKIE['bd_creat_success']) AND $_COOKIE['bd_creat_success'] != '') {
	if($_COOKIE['bd_creat_success'] == 1){
		echo "Запись успешно добавлена!";
		
	}
}



