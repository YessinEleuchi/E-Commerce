<?php
include "../../includ/functions.php";

// Check if the 'idc' parameter is set in the GET request
if(isset($_GET['idc'])) {
    // Retrieve the category ID from the GET request
    $idCategorie = $_GET['idc'];

    // Connect to the database
    $conn = connectBD();

    // Prepare the SQL query to delete the category
    $requete = "DELETE FROM categorie WHERE ID = $idCategorie";

    // Execute the query
    $resultat = $conn->query($requete);

    // Check if the query was successful
    if ($resultat) {
        //echo "Categorie supprimée avec succès!<br>";
        header('location:liste.php?sup=ok');
    } 
}
?>
