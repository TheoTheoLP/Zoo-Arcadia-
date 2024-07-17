<?php
header('Content-Type: application/json');

$animalName = htmlspecialchars($_GET['animal-name']);

// Connexion à la base de données
$conn = new mysqli('localhost', 'nom_utilisateur', 'mot_de_passe', 'nom_base_de_donnees');

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM alimentations WHERE animal = '$animalName'";
$result = $conn->query($sql);

$feedings = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $feedings[] = $row;
    }
}

echo json_encode($feedings);

$conn->close();
?>
