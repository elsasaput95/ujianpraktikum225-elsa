<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = htmlspecialchars($_POST["title"]);
    $description = htmlspecialchars($_POST["description"]);

    $query = "INSERT INTO todos (title, description) VALUES ('$title','$description')";
    $result = mysqli_query($connect, $query);

    if ($result){
        echo "<meta http-equiv='refresh' content='1;url=dashboard.php'>";
    }else{
        echo mysqli_connect_error($connect);
    }
    mysqli_close($connect);
}
?>