<?php
require_once '../load.php';
confirm_logged_in();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <h2>
        Welcome to the Admin Dashboard, <?php echo $_SESSION['user_name']; ?>
    </h2>

    <button>
        <a href="admin_logout.php">Sign Out</a>
    </button>
    
</body>
</html>