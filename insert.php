<!DOCTYPE html>
<html>
<head><title>Online News</title></head>
<link rel="stylesheet" href="index.css">
<body>
    <section>
        <h1 class="insert_h1">HEADLINE PILIPINAS</h1>
        <h2>Add News Article</h2>
        <a class="insert" href="./index.php">Home</a>
        <?php
            //include connection.php to provide connection
            include 'connect.php';
            //Form Validation//
            include 'insert_validate.php';
        ?>
        <div class="clip_bg"></div>
        <form class="form" method="post">
            <label>Headline:</label>
            <input type="text" name="headline" value="<?php echo validate($headline); ?>" />
            <span class="error"><?php echo $headlineErr;?></span>
            <div class="input_division">
                <div>
                    <label>Author:</label>
                    <input type="text" name="author" value="<?php echo validate($author); ?>" /><br>
                    <span class="error"><?php echo $authorErr;?></span>
                </div>
                <div>
                    <label>Date:</label>
                    <input type="date" name="date" value="<?php echo validate($date); ?>" /><br>
                    <span class="error"><?php echo $dateErr;?></span>
                </div>
            </div>
            <label>Lede/Intro:</label>
            <textarea type="text" name="lede" rows="10" cols="50" ><?php echo ($lede); ?></textarea>
            <span class="error"><?php echo $ledeErr;?></span>
            <label>News Link:</label>
            <input type="text" name="link" value="<?php echo validate($link); ?>" />
            <span class="error"><?php echo $linkErr;?></span>
            <input class="button" type="submit" name="submit" value="Add Article">
        </form>
        <?php
        ?>
    </section>
</body>
</html>