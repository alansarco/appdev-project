<?php
    //Form Validation//
    $headlineErr = $authorErr = $dateErr = $ledeErr = $linkErr = "";
    $headline = $author = $date = $lede = $link = ""; 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
        if($_POST['headline'] == "" || 
            $_POST['author'] == "" || 
            $_POST['date'] == "" || 
            $_POST['lede'] == "" || 
            $_POST['link'] == "") {
            if (empty($_POST["headline"])) {
                $headlineErr = "*required field";
            } else {
                $headline = validate($_POST["headline"]);
                if (strlen($headline) <= 10) {
                    $headlineErr = "*headline too short";
                }
            } 
            if (empty($_POST["author"])) {
                $authorErr = "*required field";
            } else {
                $author = validate($_POST["author"]);
                $nameregex = "/^[a-zA-Z-'\s]+$/";
                if (!preg_match($nameregex, $author)) {
                    $authorErr = "*invalid name";
                } else if (strlen($author) <= 5) {
                    $authorErr = "*name too short";
                }
            } 
            if (empty($_POST["date"])) {
                $dateErr = "*required field";
            } else {
                $date = ($_POST["date"]);
            } 
            if (empty($_POST["lede"])) {
                $ledeErr = "*required field";
            } else {
                $lede = validate($_POST["lede"]);
                if (strlen($lede) <= 50) {
                    $ledeErr = "*lede too short";
                }
            } 
            if (empty($_POST["link"])) {
                $linkErr = "*required field";
            } else {
                $link = validate($_POST["link"]);
                $URLregex = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
                if (!preg_match($URLregex, $link)) {
                    $linkErr = "*invalid URL";
                }
            } 
        }                
        else {
            $headline = $_POST['headline'];
            $author = $_POST['author'];
            $date = $_POST['date'];
            $lede = $_POST['lede'];
            $link = $_POST['link'];
            //insert data to Players table
            $sql = "INSERT INTO News (Headline, Author, Date, Lede, Link)
            VALUES ('$headline', '$author', '$date', '$lede', '$link')";
            // use exec() if no results are returned
            $conn->exec($sql);
            header("Location: index.php?msg=Inserted successfully");
        }
    }
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        return $data;  
    }
?>