<?php
	require 'template/header.php';
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
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<form action="" method="POST" enctype="multipart/form-data" class="mt-5">
				<div class="form-group">
					 <label for="exampleInputEmail1">Название животного:</label>
					 <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Название животного:">
			  	  </div>
			  	    <div class="form-group">
					    <label for="exampleFormControlTextarea1">Короткое описание:</label>
					    <textarea class="form-control" name="descr-min" id="exampleFormControlTextarea1" rows="3"></textarea>
					</div>
					<div class="form-group">
					    <label for="exampleFormControlTextarea1">Описание:</label>
					    <textarea class="form-control" name="descr" id="exampleFormControlTextarea1" rows="3"></textarea>
					</div>
					  <div class="form-group">
					    <label for="exampleFormControlFile1">Фото</label>
					    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
					</div>
					<div class="form-group">
					 <label for="exampleInputEmail1">Введите теги:</label>
					 <input type="text" name="tag" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите теги:">
			  	  </div>
			  	<div class="form-group text-right">
			  		<input  class="btn btn-primary" type="submit" name="add"> 
			  	</div>
			  </form>
			  <div class="mt-4 mb-4"><a href="admin.php">Перейти в админку</a></div>

		</div>
	</div>

</div>
  


<?php
if (isset($_COOKIE['bd_creat_success']) AND $_COOKIE['bd_creat_success'] != '') {
	if($_COOKIE['bd_creat_success'] == 1){
		echo "Запись успешно добавлена!";
		
	}
}

?>

<?php 
	require 'template/footer.php';
 ?>