<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Connexion</h1>
        <nav>
            <ul>
                <li><a href="index.html #header">Accueil</a></li>
                <li><a href="index.html #contact">Contact</a></li>
                <li><a href="index.html #flotte">Flotte</a></li>
                <li><a href="index.html #services">Services</a></li>
                <li><a href="reservation.php">Réserver un taxi</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="gestion_utilisateur.php">Gérer un utilisateur</a></li>
            </ul>
        </nav>
    </header>
    <h2>Connexion</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="email">Email Utilisateur</label>
        <input type="text" name="email" id="email">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Se connecter">
    </form>
    <?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'base.php'; // Assurez-vous que ce fichier contient vos informations de connexion

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM utilisateur WHERE COURRIEL_USER='$email' AND MDP_USER='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION["loggedin"] = true;
        $_SESSION["email"] = $email;
        echo "Vous êtes connecté !";
    } else {
        echo "Email ou mot de passe inconnu.";
    }

    $conn->close();
}
?>
</body>
</html>



