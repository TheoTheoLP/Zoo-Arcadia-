<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $animalName = htmlspecialchars($_POST['animal-name']);
    $animalState = htmlspecialchars($_POST['animal-state']);
    $foodGiven = htmlspecialchars($_POST['food-given']);
    $foodQuantity = intval($_POST['food-quantity']);
    $visitDate = htmlspecialchars($_POST['visit-date']);
    $details = htmlspecialchars($_POST['details']);

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'nom_utilisateur', 'mot_de_passe', 'nom_base_de_donnees');

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insérer le compte rendu dans la base de données
    $sql = "INSERT INTO comptes_rendus (animal, etat, nourriture, quantite, date, details) VALUES ('$animalName', '$animalState', '$foodGiven', $foodQuantity, '$visitDate', '$details')";

    if ($conn->query($sql) === TRUE) {
        echo "Compte rendu ajouté avec succès.";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
