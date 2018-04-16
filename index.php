<?php
$page_title = "Startsida";
/*include("includes/header.php");*/
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

    <div class="form">
    <form action="" method="post">
    <input type="text" name="author" placeholder="Namn" id="author" /><br>
    <input type="text" name="message" placeholder="Meddelande" id="message" /><br>
    <input type="submit" name="addPost" value="Skicka" />
    </form>
</div>
<div class="output">
    <?php
        include("includes/config.php");
        $posts = new Guestbook(); 
        $postlist = $posts->getPosts();
        foreach($postlist as $c)
        {
            echo "<div class='msgbox'>" . "<div class='by'><p>" . $c['author'] . ":</div><br>" . $c['message'] . "<br><div class='time'>" . $c['date'] . "</div></p></div>";
        }

        if(isset($_REQUEST["addPost"])){
            
            if(strlen($_REQUEST["author"])>0 && strlen($_REQUEST["message"])>0){
                $posts->addPosts($_REQUEST["author"], $_REQUEST["message"]);
            }
            unset($_REQUEST["addPost"]); // Disable button press
            header("Location: index.php");
            exit();
        }
    ?>
</div>
<div class="admin">

<form action="" method="post">
        <input type="text" name="username" placeholder="Användarnamn" id="user" />
        <input type="password" name="password" placeholder="Lösenord" id="pass" />
        <input type="submit" name="login" value="Logga in" />
</form>

        <?php
            session_start();

            $account = new Admin();

            if(isset($_REQUEST["login"])){
                if(strlen($_REQUEST["username"])>0 && strlen($_REQUEST["password"])>0){
                    $account->checkInput($_REQUEST["username"], $_REQUEST["password"]);
                    $usr = $_POST["username"];
                    $_SESSION['trueuser'] = $usr;
                }
                unset($_REQUEST["login"]);
                exit();
            }
        ?>
        </div>
</div>
<?php include("includes/footer.php");?>
    </div>
    
</body>
</html>