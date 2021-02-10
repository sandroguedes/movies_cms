<?php
    require_once 'load.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $movie = getSingleMovie($id);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Movie CMS</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <?php include 'templates/header.php';?>

    <?php if(!empty($movie)):?>
        <div class="movie-item">
            <img width=250px height=350px src="images/<?php echo $movie['movies_cover'];?>" alt="Cover Image">
            <h2><?php echo $movie['movies_title'];?></h2>
            <h4>Released: <?php echo $movie['movies_release'];?></h4>
            <h5>Runtime: <?php echo $movie['movies_runtime'];?></h5>
            <p>Summary: <?php echo $movie['movies_storyline'];?></p>
        </div>
        <hr>
    <?php else:?>
        <p>There is no such movie, bro!</p>
    <?php endif;?>

    <?php include 'templates/footer.php';?>

</body>

</html>