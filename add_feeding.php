<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $animalName = htmlspecialchars($_POST['animal-name']);
    $feedingDate = htmlspecialchars($_POST['feeding-date']);
    $feedingTime = htmlspecialchars($_POST['feeding-time']);
    $food = htmlspecialchars($_POST['food']);
    $quantity = intval($_POST['quantity']);

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'nom_utilisateur', 'mot_de_passe', 'nom_base_de_donnees');

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insérer la consommation de nourriture dans la base de données
    $sql = "INSERT INTO alimentations (animal, date, heure, nourriture, quantite) VALUES ('$animalName', '$feedingDate', '$feedingTime', '$food', $quantity)";

    if ($conn->query($sql) === TRUE) {
        echo "Consommation ajoutée avec succès.";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
