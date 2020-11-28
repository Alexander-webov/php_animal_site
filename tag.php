<?php
require_once 'core/config.php';
require_once 'core/function.php';

$conn = connect();
$data = getPostFromtag($conn);
$tag = getAllTags($conn);
close($conn);

$out = '';
for ($i=0; $i < count($data) ; $i++) { 
	$out .= '<hr>';
	$out .= "<img src='assets/images/{$data[$i]['image']}' style=width:200px; height=90px>"; 
	$out .= "<h2>{$data[$i]['id']}</h2>";
	$out .= "<p>{$data[$i]['descr_min']}</p>";
	$out .= "<a href='article.php?id={$data[$i]['id']}'>Читать далее...</a>";
	$out .= '<hr>';
}
echo $out;
 


for ($i=0; $i < count($tag); $i++) {
	echo "<span><a href='tag.php?tag={$tag[$i]}' style=padding:5px>{$tag[$i]}</a></span>";
}