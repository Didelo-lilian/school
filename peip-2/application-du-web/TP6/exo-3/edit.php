<?php

   $id = $_POST['id'];
   $content = trim($_POST['content']);
   file_put_contents("database/$id.txt", $content);
?>
