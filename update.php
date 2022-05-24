<!DOCTYPE html>
<html>
<head><title>Update Data</title></head>
<Link rel="stylesheet" href="index.css">
<body>
    <section>
        <h1 class="update_h1">HEADLINE PILIPINAS</h1>
        <h2>Update News Article</h2>
        <a class="insert" href="../midterm/index.php">Home</a>
        <div class="clip_bg"></div>
        <?php            
        //retrieve data
            include 'connect.php';
            $id = $_GET['id'];
            $stmt = $conn->prepare("SELECT id, Headline, Author, Date, Lede, Link FROM News WHERE id = $id");
            $stmt->execute();
            // set the resulting array to associative
            $news = $stmt->fetch(PDO::FETCH_ASSOC);  
            //Form Validation//
            include 'update_validate.php';
        ?>
        <form class="form" method="post">
            <label>Headline:</label>
            <input type="text" name="Headline" value="<?=$news['Headline']?>" />
            <span class="error"><?php echo $headlineErr;?></span>
            <div class="input_division">
                <div>
                    <label>Author:</label>
                    <input type="text" name="Author" value="<?=$news['Author']?>" /><br>
                    <span class="error"><?php echo $authorErr;?></span>
                </div>
                <div>
                    <label>Date:</label>
                    <input type="Date" name="Date" value="<?=$news['Date']?>" /><br>
                    <span class="error"><?php echo $dateErr;?></span>
                </div>
            </div>
            <label>Lede/Intro:</label>
            <textarea type="text" name="Lede" rows="10" cols="50"><?=$news['Lede']?></textarea>
            <span class="error"><?php echo $ledeErr;?></span>
            <label>News Link:</label>
            <input type="text" name="Link" value="<?=$news['Link']?>" />
            <span class="error"><?php echo $linkErr;?></span>
            <input class="button" type="submit" name="submit" value="Update Article">
        </form>
    </section>
</body>
</html>
