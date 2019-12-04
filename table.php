<?php
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION; 
$bdd = new PDO("mysql:host=localhost;dbname=BDA;charset=utf8", "root", "", $pdo_options);
$cookie = $bdd->query("SELECT * FROM cookie ORDER BY id DESC");
?>
<tr>
            <th>Nombre de cookie</th>
            <th>Gain</th>
            <th>Recu</th>
            <th>Rendu</th>
        </tr>
        <?php
             while($donnees = $cookie->fetch())
             {
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