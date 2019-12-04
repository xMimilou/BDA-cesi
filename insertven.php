<?php
session_start();


$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION; 
$bdd = new PDO("mysql:host=localhost;dbname=bda;charset=utf8", "root", "", $pdo_options);



$somme = 0.0;
if(isset($_POST['send'])){
    echo "hello";
    if(isset($_POST['collect']) && $_POST['collect'] > 0){
        echo "hello ";
        $collecter = htmlspecialchars($_POST['collect']);

        $article = $bdd->query("SELECT * FROM article ORDER BY id DESC");
        while($donnees = $article->fetch()){
            if($_POST[$donnees['article']] > 0){
                $somme += $_POST[$donnees['article']] * $donnees['prix']; 
            }
        }
        echo "hello";
        
        $vente = 0;
        $gain = $somme;
        echo $gain . " / ";
        echo $collecter;
        if($gain <= $collecter){
            echo "hello";
            $rendu = abs($gain - $collecter);
        
            $insertmsg = $bdd->prepare("INSERT INTO vente(vente,gain, recu, rendu) VALUES(?, ?, ?, ?)");
            $insertmsg->execute(array($vente, $gain, $collecter, $rendu));


            header("location:vente.php");
            exit;
        }
        
    }else{
        echo "hello1";
    }
}
?>