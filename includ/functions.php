<?php


function connectBD(){
    // Connexion à la base de données
$servername = "localhost"; // Nom du serveur (généralement localhost)
$username = "root"; // Nom d'utilisateur MySQL (par défaut, root)
$password = ""; // Mot de passe MySQL (par défaut, vide)
$database = "ecommerce"; // Nom de ma base de données MySQL

// 1- Création de la connexion
$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
return  $conn;
}




function getCategories(){

    $conn=connectBD();


//echo "Connecté avec succès";

// 2- Création de la requête
$requete = "SELECT * FROM categorie"; // Renamed the table to "categorie" without accents

// 3- Exécution de la requête
$resultat = $conn->query($requete);

// 4- Résultat de la requête
 $categorie = $resultat->fetch_all(MYSQLI_ASSOC);

return $categorie;
}

function getProduit(){
    $conn=connectBD();


//echo "Connecté avec succès";

// 2- Création de la requête
$requete = "SELECT * FROM produit"; // Renamed the table to "categorie" without accents

// 3- Exécution de la requête
$resultat = $conn->query($requete);

// 4- Résultat de la requête
 $produit = $resultat->fetch_all(MYSQLI_ASSOC);

return $produit;
}
function searchProduit($mot){

   
    $conn=connectBD();

    $requete = "SELECT * FROM produit WHERE Nom LIKE '%$mot%'"; // Renamed the table to "categorie" without accents

// 3- Exécution de la requête
$resultat = $conn->query($requete);

// 4- Résultat de la requête
 $produit = $resultat->fetch_all(MYSQLI_ASSOC);

return $produit;
}
function getProduitByID($id){
    $conn=connectBD();


    // creation requette 
    $requete = "SELECT * FROM produit WHERE ID LIKE '%$id%'"; 

    // 3- Exécution de la requête
    $resultat = $conn->query($requete);
    
    // 4- Résultat de la requête
    $produit = $resultat->fetch_assoc();
    
    return $produit;
}
function AddVisiteur($data){
    $conn=connectBD();
    $mp = $data['mp'];

    $requette="INSERT INTO visiteur (nom, prenom, email , telephone , mp   ) VALUES ('".$data["nom"]."','".$data["prenom"]."','".$data["email"]."','".$data["telephone"]."','".$mp."')";
    $resultat = $conn->query($requette);
    if($resultat){
        return true;   
    }
    else{
        return false ;
}
}
function connectVisiteur($data) {
    $conn = connectBD();
    $email = mysqli_real_escape_string($conn, $data['email']);
    $mp = $data['mp'];
    $requete = "SELECT * FROM visiteur WHERE email='$email' AND mp='$mp'";
    $resultat = $conn->query($requete);
    if ($resultat && $resultat->num_rows == 1) {
        $user = $resultat->fetch_assoc();
        return $user;
    
}
}
function connectAdmin($data){
$conn = connectBD();
    $email = mysqli_real_escape_string($conn, $data['email']);
    $mp = $data['mp'];
    $requete = "SELECT * FROM administarteur WHERE email='$email' AND mp='$mp'";
    $resultat = $conn->query($requete);
    if ($resultat && $resultat->num_rows == 1) {
        $user = $resultat->fetch_assoc();
        return $user;
    }

}
function EditAdmin($data){
    $conn = connectBD();
    $nom=$data['nom'];
    $email =  $data['email'];
    $mp = $data['mp'];
    $id=$data['id_admin'];
    if($mp !=""){ //mp a une valeur 
        $requete = "Update administarteur SET nom='$nom' , email='$email' , mp='$mp' where id='$id'";

    }
    else{
        $requete = "Update administarteur SET nom='$nom' , email='$email'  where id='$id'";

    }
    $resultat = $conn->query($requete);
    return true;



}
?>