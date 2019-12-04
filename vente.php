<?php
session_start();

$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION; 
$bdd = new PDO("mysql:host=localhost;dbname=BDA;charset=utf8", "root", "", $pdo_options);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Application de vente</title>
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h1>Article en vente : </h1>
                <div class="row">
                
                <?php 
                $article = $bdd->query("SELECT * FROM article ORDER BY id DESC");
                while($donnees = $article->fetch())
                {
                
                ?>
                <div class="col-md-2">
                    <div class="card" id="type<?php echo $donnees['article']; ?>" onClick="addscore(this.id)" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $donnees['article']; ?></h5>
                            <p class="card-text"><?php echo $donnees['prix']; ?>€</p>
                            <span style="position:absolute;top:0px;right:0px;" id="badge<?php echo $donnees['article'];?>" class="badge badge-primary">0</span>
                            
                        </div>
                    </div>
                </div>
                
                <?php
                }
                ?>
                </div>
                <h1>Argent reçu :</h1>
                <form method="post" action="insertven.php">
                    <?php 
                        $article = $bdd->query("SELECT * FROM article ORDER BY id DESC");
                        while($donnees = $article->fetch())
                        {
                    ?>
                    <input name="<?php echo $donnees['article']; ?>" type="text" style="display:none" id="form<?php echo $donnees['article']; ?>">
                    <?php 
                        }
                    ?>
                    <p>gain argent <span id="gain">0</span>€</p>
                    <lable>Argent reçu : <input name="collect" placeholder="argent reçu" id="recu" type="number" step="0.1" min="0" required></label></br>
                    <p>rendu : <span id="rendu">0</span>€</p>
                    <label>dons  <input type="checkbox" id="dons" value="A" name="dons" ></label><br>
                    <input type="submit" name="send" value="Ajouter à la liste">
                </form>
            </div>
            <div class="col-md-4" style="background:#E1E1E1;">
                <form method="post" action="insertart.php">
                    <lable>Nom de l'article : <input name="article_n" placeholder="Article" type="text" required></label><br>
                    <lable>Prix de l'article : <input name="article_p" placeholder="Prix" type="number" step="0.1" min="0" required></label></br>
                    <input type="submit" name="join" value="Ajouter à la liste">
                </form>
                <?php
                    
                    if(isset($message))  
                    {  
                        echo $message;  
                    }  
                ?>  
            </div>
        </div>
    </div>
    <script>
    prix = 0.0;
    <?php $article = $bdd->query("SELECT * FROM article ORDER BY id DESC");
                while($donnees = $article->fetch()){
    ?>
    <?php echo $donnees['article']; ?> = 0;
    <?php } ?>
    setInterval('addscore()',1000);
    function addscore(clicked_art){
        <?php $article = $bdd->query("SELECT * FROM article ORDER BY id DESC");
                while($donnees = $article->fetch()){
        ?>
        if(clicked_art == "type<?php echo $donnees['article'];?>"){
            <?php echo $donnees['article']; ?> = <?php echo $donnees['article']; ?>+1;
            document.getElementById("badge<?php echo $donnees['article'];?>").textContent = <?php echo $donnees['article'];?>;
            document.getElementById("form<?php echo $donnees['article'];?>").value = <?php echo $donnees['article'];?>;
            prix = prix + <?php echo $donnees['prix']; ?>
        }       
        document.getElementById("gain").textContent = prix;
        var recu = document.getElementById("recu").value;
        var dons = document.getElementById("dons").checked;
        
        if(dons){
            document.getElementById("rendu").textContent = "0";
        }else{
            document.getElementById("rendu").textContent = recu - prix;
        }
        <?php }
        ?>
    }

    
    </script>
</body>
</html>