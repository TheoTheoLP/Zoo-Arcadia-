<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $habitatName = htmlspecialchars($_POST['habitat-name']);
    $habitatComment = htmlspecialchars($_POST['habitat-comment']);

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'nom_utilisateur', 'mot_de_passe', 'nom_base_de_donnees');

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insérer le commentaire sur l'habitat dans la base de données
    $sql = "INSERT INTO commentaires_habitats (habitat, commentaire) VALUES ('$habitatName', '$habitatComment')";

    if ($conn->query($sql) === TRUE) {
        echo "Commentaire ajouté avec succès.";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
