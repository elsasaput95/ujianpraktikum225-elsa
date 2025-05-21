<?php 
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];

    $query = "DELETE FROM todos WHERE id = $id";

    if (mysqli_query($connect, $query)) {
         echo "<meta http-equiv='refresh' content='1;url=dashboard.php'>";
    }else{
         echo mysqli_connect_error($connect);
         echo "<meta http-equiv='refresh' content='5;url=dashboard.php'>";
    }
    mysqli_close($connect);
    
}