<?php
require_once 'core/config.php';
require_once 'core/function.php';

$conn = connect();
$data = selectArrticle($conn);
$tag = getArticleTags($conn);
close($conn);




$out = '';
	$out .= "<h1>{$data['title']}</h1>";
	$out .= "<img src='assets/images/{$data['image']}' style=width:200px; height=90px>"; 
	$out .= "<div>{$data['description']}</div>";

echo $out;


for ($i=0; $i < count($tag); $i++) {
	echo "<span><a href='tag.php?tag={$tag[$i]}' style=padding:5px>{$tag[$i]}</a></span>";
}