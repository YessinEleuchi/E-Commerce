<?php
session_start();
// Récupération des données 
$id=$_POST['ID'];
$nom = $_POST['Nom'];
$description = $_POST['Description'];
$dateModification = date("Y-m-d");

// Inclusion de la fonction de connexion à la base de données
include "../../includ/functions.php";
$conn = connectBD();

// Requête SQL pour la mise à jour
$requete = "UPDATE produit SET Nom=?, Description=?, DateModification=? WHERE ID=? ";

// Préparation de la requête
$stmt = $conn->prepare($requete);

// Liaison des paramètres
$stmt->bind_param("sssi", $nom, $description, $dateModification, $id);

// Exécution de la requête
$resultat = $stmt->execute();

// Vérification du succès de la mise à jour
if ($resultat) {
    // Redirection vers liste.php
    header('Location: listep.php?modif=ok');
} else {
    // Si la mise à jour échoue, afficher l'erreur
    echo "Erreur lors de la mise à jour : " . $stmt->error;
}

// Fermeture du statement et de la connexion
$stmt->close();
$conn->close();
?>