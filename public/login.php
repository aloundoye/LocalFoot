<?php
$username = isset($_POST['username']) ? $_POST['username'] : NULL;
$password = isset($_POST['password']) ? $_POST['password'] : NULL;
//eviter les injections sql
$username = stripcslashes($username);
$password = stripcslashes($password);

// connexion à la base
$con=mysqli_connect("localhost","root","","locafoot");
$req="select * from utilisateurs where username='$username' and password='$password'";
$result=mysqli_query($con,$req);
$ligne=mysqli_fetch_array($result);
if($ligne['username']== $username && $ligne['password']== $password){
    echo "connexion reussie".$ligne['username'];
}
else{
    echo"Echec de la connexion";
}
?>
