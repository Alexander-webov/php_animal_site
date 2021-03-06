<?php 

function connect(){
	$conn = mysqli_connect(SERVERNAME, USER, PASSWORD, DBNAME);
	mysqli_set_charset(	$conn, 'utf8');
	if (!$conn) {
		die("Connect failed: ".mysqli_connect_error());
	}
	return $conn;
}

function select($conn){
	$sql = "SELECT * FROM info";
	$result = mysqli_query($conn, $sql);

	$a = [];

	if (mysqli_num_rows($result ) > 0) {
		while($row = mysqli_fetch_assoc($result)){
			$a[] = $row;
		} 
	}
	return $a;
}

function selectMain($conn){
	$offset = 0;
	if (isset($_GET["page"]) AND trim($_GET["page"] != '')) {
		$offset = trim($_GET["page"]);
	}
	$sql = "SELECT * FROM info ORDER BY id DESC LIMIT 3 OFFSET ".$offset*3;
	$result = mysqli_query($conn, $sql);  

	$a = [];

	if (mysqli_num_rows($result ) > 0) {
		while($row = mysqli_fetch_assoc($result)){
			$a[] = $row;
		} 
	}
	return $a;
}

function selectArrticle($conn){

	$sql = "SELECT * FROM info WHERE id=".$_GET['id'];
	$result = mysqli_query($conn, $sql);  

	if (mysqli_num_rows($result ) > 0) {
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
	return false;
}
function paginationCount($conn){
	$sql = "SELECT * FROM info ";
	$result = mysqli_query($conn, $sql);
	$countResult = mysqli_num_rows($result);
	return ceil($countResult/3);
}

function getAllTags($conn){
	$sql = "SELECT DISTINCT(tag) FROM tag";
	$result = mysqli_query($conn, $sql);
	$a =[];
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$a[] = $row['tag'];
		}
	}
	return $a;
}
function getArticleTags($conn){
	$sql = "SELECT tag, id FROM tag WHERE post=".$_GET['id'];
	$result = mysqli_query($conn, $sql);
	$a =[];
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$a[] = $row['tag'];
		}
	}
	return $a;
}


function getPostFromtag($conn){
	$sql = "SELECT post FROM tag WHERE tag='".$_GET['tag']."'";
	$result = mysqli_query($conn, $sql);
	$a =[];
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$a[] = $row['post'];
		}
	}

	$sql = "SELECT * FROM info WHERE id in(".join(',', $a).")";
	$result = mysqli_query($conn, $sql);
	$a =[];
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$a[] = $row;
		}
	}
	return $a;
}


function getPostFromCategory($conn){
	$sql = "SELECT * FROM info WHERE category=".$_GET['id'];
	$result = mysqli_query($conn, $sql);
	$a =[];
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$a[] = $row;
		}
	}


	return $a;
}
function getCatInfo($conn){
	$sql = "SELECT * FROM category WHERE id=".$_GET['id'];
	$result = mysqli_query($conn, $sql);
	$a =[];
	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		
		
	}


	return $row;
}
function getAllCatInfo($conn){
	$sql = "SELECT * FROM category";
	$result = mysqli_query($conn, $sql);
	$a =[];
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$a[] = $row;
		}
	}

	return $a;
}
function deleteArticle($conn, $id){
	$sql = "DELETE FROM info WHERE id=".$id;
	if (mysqli_query($conn, $sql)) {
		//header('Location: admin.php');
		return true;
	}
}
function close($conn){
	mysqli_close($conn);
}
