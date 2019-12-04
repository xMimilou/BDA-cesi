<?php
session_start();


$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION; 
$bdd = new PDO("mysql:host=localhost;dbname=BDA;charset=utf8", "root", "", $pdo_options);




if(isset($_POST['join'])){
    echo "hello";
    if(isset($_POST['article_n']) && isset($_POST['article_p'])){
        $article = htmlspecialchars($_POST['article_n']);
        $prix = htmlspecialchars($_POST['article_p']);

        
        $insertmsg = $bdd->prepare("INSERT INTO article(article, prix) VALUES(?, ?)");
        $insertmsg->execute(array($article, $prix));
        header("location:vente.php");
        exit;
    }else{
        echo "hello1";
    }
}
?>