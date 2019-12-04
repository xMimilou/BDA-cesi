<?php 
session_start();


$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION; 
$bdd = new PDO("mysql:host=localhost;dbname=BDA;charset=utf8", "root", "", $pdo_options);
$cookie = $bdd->query("SELECT * FROM cookie ORDER BY id DESC");



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cookie shop</title>
    <script src="js/jquery.js"></script>
</head>
<body>
    <form method="POST" action="cook.php">
        <input name="cookie" id="nbcookie" type="number" min="0" value="0">
        <p>gain argent <span id="gain"></span>€</p>
        <input type="text" id="recu" name="recu" placeholder="recu">
        <p>rendu : <span id="rendu"></span>€</p>
        <label>dons : </label><input type="checkbox" id="dons" value="A" name="dons" >
        <input type="submit" name="join" value="envoyer">
    </form>
    <table style="width:100%;" id="table">
        <tr>
            <th>Nombre de cookie</th>
            <th>Gain</th>
            <th>Recu</th>
            <th>Rendu</th>
        </tr>
        <?php
        $somme = 0.0;
        $gain = 0.0;
        $recu = 0.0;
        $rendu = 0.0;
        while($donnees = $cookie->fetch())
             {
                 $somme = $somme + $donnees['nbcookie'];
                 $gain = $gain + $donnees['gain'];
                 $recu =  $recu + $donnees['recu'];
                 $rendu = $rendu + $donnees['rendu'];
        ?>
        <tr>
            <td style="text-align:center;"><?php echo $donnees['nbcookie'];?></td>
            <td style="text-align:center;"><?php echo $donnees['gain'];?></td>
            <td style="text-align:center;"><?php echo $donnees['recu'];?></td>
            <td style="text-align:center;"><?php echo $donnees['rendu'];?></td>
        </tr>
        <?php
             }
        ?>
    </table>
    <table style="width:100%;" id="table2">
        <tr>
            <th style="text-align:center;">Total de cookie vendu</th>
            <th style="text-align:center;">total Gain</th>
            <th style="text-align:center;">total recu</th>
            <th style="text-align:center;">total rendu</th>
        </tr>
        <tr>
            <td style="text-align:center;"><?php echo $somme;?></td>
            <td style="text-align:center;"><?php echo $gain;?></td>
            <td style="text-align:center;"><?php echo $recu;?></td>
            <td style="text-align:center;"><?php echo $rendu;?></td>
        </tr>
    </table>
    </body>

    <script>
        var calc = 0.0
    setInterval('load_messages()',1000);
    function load_messages() {
        var nbcookie = document.getElementById("nbcookie").value;
        document.getElementById("gain").textContent = nbcookie * 0.5;
        var recu = document.getElementById("recu").value;
        calc = recu - nbcookie * 0.5;
        var dons = document.getElementById("dons").checked;
        
        if(dons){
            document.getElementById("rendu").textContent = "0";
        }else{
            document.getElementById("rendu").textContent = calc;
        }
        $('#table').load('table.php');
        $('#table2').load('table2.php');
    }
    
    </script>
</html>