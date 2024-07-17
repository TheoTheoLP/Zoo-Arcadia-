<?php
header('Content-Type: application/json');

// Connexion à la base de données
$conn = new mysqli('localhost', 'nom_utilisateur', 'mot_de_passe', 'nom_base_de_donnees');

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$animal = isset($_GET['animal']) ? $conn->real_escape_string($_GET['animal']) : '';
$date = isset($_GET['date']) ? $conn->real_escape_string($_GET['date']) : '';

// Construire la requête SQL avec les filtres
$sql = "SELECT * FROM comptes_rendus WHERE 1=1";

if (!empty($animal)) {
    $sql .= " AND animal LIKE '%$animal%'";
}
if (!empty($date)) {
    $sql .= " AND date LIKE '$date%'";
}

$result = $conn->query($sql);

$reports = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $reports[] = $row;
    }
}

echo json_encode($reports);

$conn->close();
?>
