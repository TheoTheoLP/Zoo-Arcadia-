<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $serviceName = htmlspecialchars($_POST['service-name']);
    $serviceDescription = htmlspecialchars($_POST['service-description']);

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'nom_utilisateur', 'mot_de_passe', 'nom_base_de_donnees');

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Mettre à jour le service dans la base de données
    $sql = "UPDATE services SET description = '$serviceDescription' WHERE nom = '$serviceName'";

    if ($conn->query($sql) === TRUE) {
        echo "Service mis à jour avec succès.";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
