<?php
session_start();
//1-recuperation des données 
$nom = $_POST['Nom'];
$description = $_POST['Description'];
$createur = $_SESSION["ID"];
$DateCreation = date("y/m/d");

// chaine de la connexion 
include "../../includ/functions.php";
$conn = connectBD();

// requette sql pour insertion 
$requete = "INSERT INTO categorie(Nom, Description, Createur, DateCreation) VALUES (?, ?, ?, ?)";

// préparation de la requête
$stmt = $conn->prepare($requete);

// liaison des paramètres
$stmt->bind_param("ssis", $nom, $description, $createur, $DateCreation);

// exécution de la requête
$stmt->execute();

// vérification du succès de l'insertion
if ($stmt->affected_rows == 1) {
    // Redirection vers liste.php
    header('Location: liste.php ?ajout=ok');
}
?>
