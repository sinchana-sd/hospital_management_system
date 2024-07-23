<?php
include("../include1/connection.php");

$id = $_POST['id'];

$query = "UPDATE doctors SET status = 'Rejected' WHERE id='$id'";

mysqli_query($connect,$query);

?>