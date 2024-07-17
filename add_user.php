<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'nom_utilisateur', 'mot_de_passe', 'nom_base_de_donnees');

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = 'example@example.com';
$password = password_hash('mot_de_passe', PASSWORD_DEFAULT);
$role = 'admin';

$sql = "INSERT INTO utilisateurs (email, mot_de_passe, role) VALUES ('$email', '$password', '$role')";

if ($conn->query($sql) === TRUE) {
    echo "Nouvel utilisateur créé avec succès.";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
