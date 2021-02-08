<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>chat Camagru</title>
    </head>
    <style>
    body{
	    background-color : grey;
    }
    form
    {
        text-align:center;
    }
    </style>
    <body>
    <a href = "../camera/camera.html" > ACCUEIL </a><a href = "../index.html" > DECONNEXION </a>
    <form action="chat_post.php" method="post">
        <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

        <input type="submit" value="Envoyer" />
	</p>
    </form>

<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=camagru;charset=utf8', 'root', 'omampm');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT username, comment FROM chat ORDER BY chat_id DESC LIMIT 0, 10');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	//echo 'bonjour';
	//echo htmlspecialchars($donnees['username']);
	echo '<center>';
	echo '<p><strong>' . htmlspecialchars($donnees['username']) . '</strong> : ' . htmlspecialchars($donnees['comment']) . '</p>';
	echo '</center>';
}

$reponse->closeCursor();

?>
    </body>
</html>
