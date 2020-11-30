<?php 
require 'template/header.php';


deleteArticle($conn, $_GET['id']);	


close($conn);







 ?>

 <a href="http://animal.local/admin.php">Вернутся обратно!</a>