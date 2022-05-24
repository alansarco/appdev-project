<?php
    // retrieve all data from the database
    $stmt = $conn->prepare("SELECT id, Headline, Author, Date, Lede, Link FROM News");
    $stmt->execute();
    // set the resulting array to associative
    $news = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>