<!DOCTYPE html>
<html>
<head><title>Online News</title></head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="index.css">
<body>
    <section>
        <?php
            //include connection.php to provide connection
            include 'connect.php';
            //include retrieve.php to retrieve or read data
            include 'retrieve.php';
        ?>
        <h1>HEADLINE PILIPINAS</h1>
        <h2>Online News Article</h2>
        <p>This project will serve as our final prject for the course subject 
            <strong>APPLICATION DEVELOPMENT</strong> 
            for this academic year 2021-2022 during second semester. 
        </p>
        <a class="insert" href="./insert.php">Add News Article</a>
        <div class="clip_bg"></div>
        <div class="data_container">
        <?php foreach ($news as $result): ?>
        <div class="container">
            <div class="data">
                <h3><a href="<?=$result['Link']?>"><?=$result['Headline']?></a></h3>
                <h4><?=$result['Author']?></h4> |
                <h5><?=$result['Date']?></h5>
                <h6><?=$result['Lede']?></h6>
                <h7><a class="link" href="<?=$result['Link']?>">Read more...</a></h7>
                <div class="actions">
                    <form action="update.php" method="Get">
                        <input type="hidden" name="id" value="<?= $result['id'] ?>">
                        <!-- Redirect to Update.php file when clicked -->
                        <button class="update" type="submit">
                            <i class="fa fa-edit"></i></button>
                    </form>
                    <form action="delete.php" method="post">
                        <input type="hidden" name="id" value="<?= $result['id'] ?>">
                        <button type='submit' 
                        <?php
                            echo "onClick=\"javascript: 
                            return confirm('Are you sure you want to delete $result[Headline] article?');
                            \"id=".$result['id']."'";
                        ?>
                        ><i class="fa fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        </div>   
    </section>
</body>
</html>