<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $role = htmlspecialchars($_POST['role']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'nom_utilisateur', 'mot_de_passe', 'nom_base_de_donnees');

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insérer l'utilisateur dans la base de données
    $sql = "INSERT INTO utilisateurs (email, role, password) VALUES ('$email', '$role', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Compte créé avec succès.";
        // Envoyer un email à l'utilisateur (sans le mot de passe)
        mail($email, "Votre compte a été créé", "Votre compte a été créé avec succès. Votre courriel est : $email.");
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
