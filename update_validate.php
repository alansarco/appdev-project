<?php
    //Form Validation
    $headlineErr = $authorErr = $dateErr = $ledeErr = $linkErr = "";
    //handle update activity when update button is clicked
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
        $Headline = validate($_POST["Headline"]);
        $Author = validate($_POST["Author"]);
        $Date = validate($_POST["Date"]);
        $Lede = validate($_POST["Lede"]);
        $Link = validate($_POST["Link"]);
        $filler = "(data reloaded)";
        //Check if fields are empty
        if($_POST['Headline'] == "" || 
            $_POST['Author'] == "" || 
            $_POST['Date'] == "" || 
            $_POST['Lede'] == "" || 
            $_POST['Link'] == "") {
            if (empty($_POST["Headline"])) {
                $headlineErr = "*required field $filler ";
            } 
            if (empty($_POST["Author"])) {
                $authorErr = "*required field $filler";
            } 
            if (empty($_POST["Date"])) {
                $dateErr = "*required field $filler";
            } 
            if (empty($_POST["Lede"])) {
                $ledeErr = "*required field $filler";
            } 
            if (empty($_POST["Link"])) {
                $linkErr = "*required field $filler";
            } 
        }           
        //If fields are not empty these line will be executed     
        else {
            $nameregex = "/^[a-zA-Z-'\s]+$/";
            $URLregex = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
            //check if all fields are valid
            if (strlen($Headline) >= 10 && 
                preg_match($URLregex, $Link) && 
                strlen($Author) >= 5  &&  
                preg_match($nameregex, $Author) 
                && strlen($Lede) >= 50 && 
                preg_match($URLregex, $Link)) {

                $stmt = $conn->prepare("UPDATE News SET 
                    Headline = '$Headline', 
                    Author = '$Author', 
                    Date = '$Date', 
                    Lede = '$Lede', 
                    Link = '$Link' WHERE id = '$id'");              
                $stmt->execute();
                header("Location: index.php?msg=Updated successfully");
            }
            //check if headline  is valid
            if (strlen($Headline) <= 10) {
                $headlineErr = "'$Headline' is too short $filler ";
            }
            //check if Lede/Intro  is valid
            if (strlen($Lede) <= 50) {
                $ledeErr = "*Lede too short $filler";
            }
            //check if URL  is valid
            if (!preg_match($URLregex, $Link)) {
                $linkErr = "'$Link' is invalid URL $filler";
            }
            //check if Author's name  is valid
            if (!preg_match($nameregex, $Author)) {
                $authorErr = "'$Author' is invalid name $filler";
            } else if (strlen($Author) <= 5) {
                $authorErr = "'$Author' name is too short $filler";
            }
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