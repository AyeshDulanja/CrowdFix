<?php
$connect = mysqli_connect("#host","#username","#password") or die("Couldn't connect to database");
mysqli_select_db($connect,"#database") or die("Couldn't connect to database");
?>