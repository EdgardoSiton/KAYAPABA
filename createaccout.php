<?php
    if(isset($_POST['submit'])){
        include './pages/conixion.php';
        $userName = $_POST['username'];
        $email = $_POST['Email'];
        $pass = $_POST['Password'];
        $conPass = $_POST['conPass'];
        if($pass === $conPass){
            var_dump($userName);
            $requete = $con->prepare("INSERT INTO users(username,Email,Password)
             VALUES('$userName','$email','$pass')");
            $requete->execute();
            header('location:AdminLogin.php');
        }
        else{
            header("location:index.php?error=password not found");
        }
    }
?>