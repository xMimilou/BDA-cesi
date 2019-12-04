<?php
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION; 
$bdd = new PDO("mysql:host=localhost;dbname=BDA;charset=utf8", "root", "", $pdo_options);
$cookie = $bdd->query("SELECT * FROM cookie ORDER BY id DESC");
?>

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