<?php 

require_once 'connect.php';

	
	if(isset($_POST['update'])){

		if( empty($_POST['nom']) || empty($_POST['email']) )
		{
			echo "Remplir les champs!"; 
		}else{		
			$nom  = $_POST['nom'];
			$email 	= $_POST['email'];
			$sql = "UPDATE users SET nom='{$nom}', email='{$email}'
						WHERE id=" . $_POST['id'];

			if( $mysqli->query($sql) === TRUE){
				echo "<div> Modification de l'utilisateur réussi</div>";
                header('Location:index.php');
			}else{
				echo "<div> Erreur: Mise à jour non faites</div>";
			}
		}
	}
	$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
	$sql = "SELECT * FROM users WHERE id={$id}";
	$result = $mysqli->query($sql);

	if($result->num_rows < 1){
		header('Location: index.php');
		exit;
	}
	$row = $result->fetch_assoc();
	?>
			<h3>Modification utilisateur</h3> 
			<form action="" method="POST">
				<input type="hidden" value="<?php echo $row['id']; ?>" name="id">
				<label for="Nom">Nom</label>
				<input type="text" name="nom" value="<?php echo $row['nom']; ?>" ><br>
				<label for="email">Email</label>
				<input type="text"  name="email" value="<?php echo $row['email']; ?>"><br>
				<br>
				<input type="submit" name="update" value="Update">
			</form>
		</div>

