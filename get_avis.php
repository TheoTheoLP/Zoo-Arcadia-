<?php
header('Content-Type: application/json');

// Connexion à la base de données
$conn = new mysqli('localhost', 'nom_utilisateur', 'mot_de_passe', 'nom_base_de_donnees');

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les avis approuvés
$sql = "SELECT pseudo, commentaire FROM avis WHERE approuve = 1";
$result = $conn->query($sql);

$avisArray = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $avisArray[] = $row;
    }
}

echo json_encode($avisArray);

$conn->close();
?>
