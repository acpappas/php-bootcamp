<!DOCTYPE html>
<?php
session_start();
if($_GET['submit']){
    if($_GET['submit'] == "OK" and $_GET['login'] and $_GET['passwd']){
        $_SESSION['login'] = $_GET['login'];
        $_SESSION['passwd'] = $_GET['passwd'];
    }
}
?>
<html>
    <head>
    </head>
    <body>
        <form method="get" action="index.php">
            Username: <input type="text" name="login" value="<?php echo $_SESSION['login']; ?>"/>
            <br>
            Password <input type="password" name="passwd" value="<?php echo $_SESSION['passwd']; ?>"/>
            <br>
            <input type="submit" name="submit" value="ok"/>

        </form>
    </body>
</html>