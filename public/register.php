<?php

session_start();
//connexion à la base de données
$con = mysqli_connect("localhost","root","","locafoot");

if (isset($_POST['register_btn']))
{
    $nom =$_POST['nom'];
    $prenom =$_POST['prenom'];
    $mail = $_POST['mail'];
    $username = $_POST['username'];
    $password = $_POST['mdp'];
    $password2 = $_POST['mdp2'];

    if($password == $password2){
        //création de compte avec succès
        $password = md5($password);
        $req="insert into utilisateurs(nom, prenom, mail, username, password) values ('$nom', '$prenom', '$mail','$username','$password')";
        mysqli_query($con,$req);
        $_SESSION['message'] = "compte cree avec succes";
        $username = $_SESSION['username'];
    }
    else{
        echo "Echec";
    }
}
?>
