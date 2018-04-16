<?php

/*Session start*/
session_start();

if(!isset($_SESSION['trueuser'])) {
    header("Location: index.php");
}

$page_title = "Admin";
spl_autoload_register(function ($class){include 'classes/' . $class . '.class.php';});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <?php include("includes/fonts.php");?>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <?php include("includes/header.php");?>
        <div class="body">
    <h1>Admin</h1>
    <div class="log-out">
    <form action"" method="post">
    <input type="submit" name="leave" value="Logga ut" />
    </form>
    </div>
<?php
if(isset($_REQUEST["leave"])) {
    /* remove all session variables */
    session_unset(); 
    /* destroy the session */ 
    session_destroy();
    header("Location: index.php");
}
        include("includes/config.php");
        $posts = new Guestbook(); 
        $postlist = $posts->getPosts();
        foreach($postlist as $c)
        {
            echo "<div class='adminoutput'><p>" . $c['postid'] . "<br>" . $c['author'] . "<br>" . $c['message'] . "<br>" . $c['date'] . "</p>" . "<div class='buttons'><form action='' method='post'><input type='submit' id='knapp' name='Delete' value='" . $c['postid'] . "' /><div class='remove'><p>Delete</p></div></div>" . "<p>Delete</p>" .  "<br>" . "<textarea name='comment' rows='2' cols='36' class='changetext'></textarea><div class='buttons2'><input type='submit' name='update' id='knapp2' value='" . $c['postid'] . "'/><div class='remove2'><p>Change</p></div></form></div></div>";
        }

        if(isset($_REQUEST['Delete'])){
            $id = $_REQUEST['Delete'];
                $posts->deletePosts($id);
            }
            unset($_REQUEST['Delete']);


        if(isset($_REQUEST['update'])){
            $comment = "";
            $update = $_REQUEST['update'];
            $comment = $_POST['comment'];

                $posts->updatePosts($update, $comment);
        }
            unset($_REQUEST['update']);
            exit();
 
?>



</div>
<?php include("includes/footer.php");?>
</div>
</body>
</html>