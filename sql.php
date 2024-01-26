<?php
$servername = "localhost";
$username = "root";
$password = "";
//$database = "dbsoeureinement";
$database = "exosql";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Configurer PDO pour afficher les erreurs en cas de problème
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion à la base de données réussie<br/>";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
// Récupération des données du formulaire
$username = $_POST['username'];
$password = $_POST['password'];
// Construction de la requête SQL (attention, ceci est à des fins éducatives uniquement)
$sqlQuery = "SELECT * FROM utilisateurs WHERE `login` = '$username' AND password = '$password'";
echo '<hr>' . $sqlQuery . '<hr>';
// Exécution de la requête (à utiliser avec précaution pour éviter les injections SQL)
$result = $conn->query($sqlQuery);
// Vérification des résultats
if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "Connexion Réussie - Bienvenue, " . $row['login'];
} else {
    echo "L'utilisateur n'existe";
}
// Fermeture de la connexion à la base de données
$conn = null;