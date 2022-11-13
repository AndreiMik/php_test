<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<link rel="shortcut icon" href="#">
<html lang="fi">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="#">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>

</head>

<body>
    <!-- authorization -->
    <?php if (!isset($_SESSION['admin'])) : ?>
        <form action="functions/authorization.php" method="POST" enctype="multipart/form-data">
            <p>Authorization</p>
            <input name="email" type="text" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button>Authorization</button>
        </form><br><br>
    <?php else : ?>
        <!-- log out -->
        <form method="POST" action="">
            <p>Admin</p>
            <a href=""><button value="1" name="logOut" class="button" id="outButton">Log out</button></a>
        </form>
        <br><br>
    <?php endif; ?>

    <?php
    if (isset($_SESSION['admin'])) {
        if (isset($_POST['logOut'])) {
            unset($_SESSION['admin']);
            header("location:functions/processObject.php");
        }
    }
    ?>

    <!-- for admins -->
    <?php if (isset($_SESSION['admin'])) {
        require_once  'functions/addParent.php';
    }
    ?>

    <!-- rendering of elements -->
    <?php
    if (isset($_SESSION['objectsArray'])) {
        if ($_SESSION['objectsArray'] != '') {
            $objectsArray = $_SESSION['objectsArray'];
            //print_r($objectsArray);

            if (isset($_SESSION['admin'])) {
                require_once  'functions/buildTreeAdmin.php';
            }
            if (!isset($_SESSION['admin'])) {
                require_once  'functions/buildTreeUser.php';
            }
            buildTree($objectsArray, 0,);
        } else {
            echo "<br><br>No elements";
        }
    } else {
         header("location:functions/processObject.php");
    }
    ?>
    <script src="functions/script.js"></script>


</body>

</html>