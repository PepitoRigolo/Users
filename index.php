<?php

require_once 'connect.php';


if( isset($_POST['delete'])){
    $sql = "DELETE FROM users WHERE id=" . $_POST['id'];
    if($mysqli->query($sql) === TRUE){
        echo "<div>Suppresion de l'utilisateur réussi </div>";
    }
}

$sql = "SELECT * FROM users";
$result = $mysqli->query($sql);


if( $result->num_rows > 0)
{
?>

<h2>Liste des utilisateurs</h2>
<br>
<a href="insert.php"> <input type="button" value="Créer"> </a>
<br>
<table>
    <tr>
        <td>Nom</td>
        <td>Email</td>
        <td width="70px">Delete</td>
        <td width="70px">EDIT</td>
    </tr>
    <?php
    while( $row = $result->fetch_assoc()){
        echo "<form action='' method='POST'>"; 
        echo "<input type='hidden' value='". $row['id']."' name='id' />"; 
        echo "<tr>";
        echo "<td>".$row['nom'] . "</td>";
        echo "<td>".$row['email'] . "</td>";
        echo "<td><input type='submit' name='delete' value='Delete' /></td>";
        echo "<td><a href='edit.php?id=".$row['id']."' ><input type='button' value='Edit'></a></td>";
        echo "</tr>";
        echo "</form>"; 
    }
?>
</table>
<?php
}
else
{?>
    <h2>Liste des utilisateurs</h2>
    <br>
    <a href="insert.php"> <input type="button" value="Créer"> </a>
    <br>
<?php
    echo "<br><br>No Record Found";
}
?>
</div>
