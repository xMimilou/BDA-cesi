<?php
session_start();


$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION; 
$bdd = new PDO("mysql:host=localhost;dbname=BDA;charset=utf8", "root", "", $pdo_options);




if(isset($_POST['join'])){
    echo "hello";
    if(isset($_POST['cookie']) && isset($_POST['recu'])){
        $nbcookie = htmlspecialchars($_POST['cookie']);
        $gain = htmlspecialchars($nbcookie * 0.5);
        $recu = htmlspecialchars($_POST['recu']);
        echo "hello";
        if(isset($_POST['dons'])){
            $rendu = 0;
        }else{
            
            $rendu = htmlspecialchars($recu - $gain);
        }
        
        $insertmsg = $bdd->prepare("INSERT INTO cookie(nbcookie, gain, recu, rendu) VALUES(?, ?, ?, ?)");
        $insertmsg->execute(array($nbcookie, $gain, $recu, $rendu));
        header("location:cookie.php");
        exit;
    }else{
        echo "hello1";
    }
}
?>