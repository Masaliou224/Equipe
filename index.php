<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipe de formateurs</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <a href="ajouter.php" class="ajout"> <img src="images/plus2.png" alt="">Ajouter</a>

       

        <table>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Age</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>

            <?php
                include_once "connexion.php";

                $req = mysqli_query($con , "SELECT * FROM formateurs");
                if(mysqli_num_rows($req) == 0) {
                    echo "Il n'y a pas de formateur !";
                } else {
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
                            <tr>
                                <td><?=$row['nom']?></td>
                                <td><?=$row['prenom']?></td>
                                <td><?=$row['age']?></td>
                                <td><a href="modifier.php?id=<?=$row['id']?>"><img src="images/modifier.png" alt=""></a></td>
                                <td><a href="supprimer.php?id=<?=$row['id']?>"><img src="images/supprimer.png" alt=""></a></td>
                            </tr>
                        <?php
                    }
                }
            ?>
            
        </table>
    </div>
</body>
</html>