<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reviewId = intval($_POST['review_id']);
    $action = htmlspecialchars($_POST['action']);

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'nom_utilisateur', 'mot_de_passe', 'nom_base_de_donnees');

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Valider ou invalider l'avis
    if ($action === 'approve') {
        $sql = "UPDATE avis SET approuve = 1 WHERE id = $reviewId";
    } else if ($action === 'disapprove') {
        $sql = "UPDATE avis SET approuve = 0 WHERE id = $reviewId";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Avis mis à jour avec succès.";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
