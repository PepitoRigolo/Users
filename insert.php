<?php
    require_once 'connect.php';

    //Vérifie si la variable add est définie et si les champs nom et email ne sont pas vide
    if(isset($_POST['add'])){
        if( empty($_POST['nom']) || empty($_POST['email']) )
        {
            echo "Remplir les champs svp";
        }else{
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $sql = "INSERT INTO users(nom,email)
            VALUES('$nom','$email')";
    
            //indique si la reuqête d'insertion a été réussi ou non en BDD
            if( $mysqli->query($sql) === TRUE){
                echo "<div>Ajout d'un utilisateur réussi</div>";
                header('Location: index.php');
            }else{
                echo "<div>Erreur: l'utilisateur n'a pas été ajouter</div>";
            }
        }
    }
    ?>

            <h3>Ajouter nouvel utilisateur</h3>
            <form action="" method="POST">
            <label for="nom">Nom : </label>
            <input type="text" name="nom"><br>
            <label for="email">Email : </label>
            <input type="text" name="email" ><br>
            <br>
            <input type="submit" name="add" value="Ajouter">
            </form>
        </div>
        </div>
        </div>
    </div>
