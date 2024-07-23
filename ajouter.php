<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <?php
        if(isset($_POST['button'])){

            extract($_POST);

            if(isset($nom) && isset($prenom) && isset($age)){
                
                include_once "connexion.php";

                $req = mysqli_query($con , "INSERT INTO formateurs VALUE(NULL, '$nom', '$prenom', '$age')");

                if($req) {
                    header("Location: index.php");
                } else {
                    $message = "Formateur non ajouté";
                }
            } else {
                $message = "Veuillez remplir les champs !";
            }
        }
    ?>


    <div class="form">
        <a href="index.php" class="back"><img src="images/retour.png" alt="">Retour</a>
        <h2>Ajouter un formateur</h2>
        <p class="err_message">
            <?php
                if(isset($message)){
                    echo $message;
                }
            ?>
        </p>
        <form action="" method="POST">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom">
            <label for="age">Age</label>
            <input type="number" id="age" name="age">
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>