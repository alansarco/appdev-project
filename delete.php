<?php 
    include_once 'connect.php';
    if(isset($_POST['id']))
    {
        $id = $_POST['id'];
        $stmt = "DELETE FROM News WHERE id=$id";
        $conn->exec($stmt);
        header("Location: index.php");
    }
?>
