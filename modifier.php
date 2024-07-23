<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <?php

                include_once "connexion.php";

                $id = $_GET['id'];

                $req = mysqli_query($con , "SELECT * FROM formateurs WHERE id = $id");
                $row = mysqli_fetch_assoc($req);

            if(isset($_POST['button'])){

                extract($_POST);

                if(isset($nom) && isset($prenom) && isset($age)){
                    
                    $req = mysqli_query($con , "UPDATE formateurs SET nom = '$nom' , prenom = '$prenom' , age = '$age' WHERE id = $id");

                    if($req) {
                        header("Location: index.php");
                    } else {
                        $message = "Formateur non modifié";
                    }
                } else {
                    $message = "Veuillez remplir les champs !";
                }
            }
    ?>
    <div class="form">
        <a href="index.php" class="back"><img src="images/retour.png" alt="">Retour</a>
        <h2>Ajouter de modification: <?=$row['prenom']?></h2>
        <p class="err_message">
            <?php
                if(isset($message)){
                    echo $message ;
                }
            ?>
        </p>
        <form action="" method="POST">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="<?=$row['nom']?>">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" value="<?=$row['prenom']?>">
            <label for="age">Age</label>
            <input type="number" id="age" name="age" value="<?=$row['age']?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>
</html>