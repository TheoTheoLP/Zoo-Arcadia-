<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'nom_utilisateur', 'mot_de_passe', 'nom_base_de_donnees');

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Vérifier les informations d'identification
    $sql = "SELECT * FROM utilisateurs WHERE email = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['mot_de_passe'])) {
            // Authentification réussie
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];

            // Redirection vers l'espace approprié
            switch ($user['role']) {
                case 'admin':
                    header('Location: admin.html');
                    break;
                case 'veterinaire':
                    header('Location: vet.html');
                    break;
                case 'employe':
                    header('Location: employee.html');
                    break;
                default:
                    // Rôle inconnu, déconnexion
                    session_destroy();
                    echo "Rôle inconnu.";
                    exit;
            }
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Utilisateur non trouvé.";
    }

    $conn->close();
}
?>
