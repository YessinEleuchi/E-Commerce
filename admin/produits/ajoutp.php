<?php
session_start();
//1-recuperation des données 
// Recuperation des données
$nom = $_POST['Nom'] ?? '';
$description = $_POST['Description'] ;
$prix = $_POST['Prix'] ?? 0;

$target_dir = "../../img/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $image= $_FILES["image"]["name"];
  } else {
    echo "Désolé.IMPOSSIBLE";
  }
$categorie = $_POST['Categorie'] ;
$createur = $_SESSION["Nom"] ?? '';
$DateCreation = date("Y-m-d"); // Date with complete time

// chaine de la connexion 
include "../../includ/functions.php";
$conn = connectBD();

// requette sql pour insertion 
$requete = "INSERT INTO produit (Nom, Description, Prix , image , Categorie , dateCreation , Createur) VALUES (?, ?, ?, ? , ?, ? ,?)";

// préparation de la requête
$stmt = $conn->prepare($requete);

// liaison des paramètres
$stmt->bind_param("ssissss", $nom, $description, $prix, $image, $categorie, $DateCreation, $createur);

// exécution de la requête
$stmt->execute();

// vérification du succès de l'insertion
if ($stmt->affected_rows == 1) {
    // Redirection vers liste.php
    header('Location: listep.php ?ajout=ok');
}
?>
