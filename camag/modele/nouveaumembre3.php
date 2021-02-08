<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>

<?php

require_once __DIR__ . '/pdo.php';
require_once __DIR__ . '/user.php';
//require_once __DIR__ . '/../modeles/images.php';
//require_once __DIR__ . '/../modeles/reviews.php';
//require_once __DIR__ . '/../modeles/likes.php';

//**************try

//**************{

    //******************$bdd = new PDO('mysql:host=localhost;dbname=camagru;charset=utf8', 'root', 'omampm');
    //$bdd = new PDO('mysql:host=localhost;dbname=camagru;charset=utf8', 'root', 'omampm', 'array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)');


//********************** */}

//***********************catch(Exception $e)

/********************{

    //*****************die('Erreur : '.$e->getMessage());

//************************************ */  //}

echo "bonjour1";

if (isset($_POST['login'], $_POST['password'], $_POST['passverif'], $_POST['email'])) {
    $_POST['login'] = htmlspecialchars(trim($_POST['login']));
    $_POST['password'] = htmlspecialchars(trim($_POST['password']));
    $_POST['passverif'] = htmlspecialchars(trim($_POST['passverif']));
    $_POST['email'] = htmlspecialchars(trim($_POST['email']));
    

    try {
        // On verifie si le mot de passe et celui de la verification sont identiques
        if ($_POST['password'] == $_POST['passverif']) {
            //On verifie si le mot de passe a 8 caracteres ou plus
            if (strlen($_POST['password']) >= 8) {
                //On verifie si l'email est valide
                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $utilisateur = new User();
                    $users = $utilisateur->getUsers();
                    // var_dump($users);
                    if (empty($users)) {     
                        $passwd_hash = hash('whirlpool', $_POST['password']);
                        $user = array(
                            'login' => $_POST['login'],
                            'email' => $_POST['email'],
                            'password' => $passwd_hash
                        );
                        // var_dump($user);
                        $utilisateur->saveUser($user);
                        $_SESSION['passwd_hash'] = $passwd_hash;
                        $_SESSION['loggued_on_user'] = $_POST['login'];
                        $message = '1';
                    } else {
                        foreach ($users as $user) {
                            if ($user['login'] === $_POST['login']) {
                                //Sinon, on dit que le pseudo voulu est deja pris
                                $message = 'Un autre utilisateur utilise déjà le nom d\'utilisateur que vous désirez utiliser.';
                            } else {
                                $passwd_hash = hash('whirlpool', $_POST['password']);
                                $user = array(
                                    'login' => $_POST['login'],
                                    'email' => $_POST['email'],
                                    'password' => $passwd_hash
                                );
                                // var_dump($user);
                                $_SESSION['passwd_hash'] = $passwd_hash;
                                $_SESSION['loggued_on_user'] = $_POST['login'];
                                $utilisateur->saveUser($user);
                                $message = '1';
                                //return $message;
                            }
                        }
                    }

                } else {
                    //Sinon, on dit que lemail nest pas valide
                    $message = 'L\'email que vous avez entré n\'est pas valide.';
                }
            } else {
                //Sinon, on dit que le mot de passe nest pas assez long
                $message = 'Le mot de passe que vous avez entré contient moins de 8 caractères.';
            }
        } else {
            //Sinon, on dit que les mots de passes ne sont pas identiques
            $message = 'Les mots de passe que vous avez entré ne sont pas identiques.';
        }
    } catch (Exception $e) {
        $message = $e->getMessage();
    }
	
	//$message = identification_user();

if ($message == '1')
{
    echo "bravo";
	header('Location: ../index.html');
    //exit();
}
else
{
    echo '<h2><p><div class="message">' . $message . '</div><br/><br/></P></h2>';
	//header('Location: ../view/inscription.php');
  
}
//***********************    return $message;

}


//********************$req = $bdd->prepare('INSERT INTO `users` (`username`, `email`,`member` , `password`) VALUES(?,?,?,?)');

//*********************$nbfois=$req->execute(array($_POST['username'],$_POST['email'],0,$_POST['passwrd']));


//$req = $bdd->query('INSERT INTO `users` (`id`, `username`, `email`, `member`, `password`) VALUES (NULL, \'manu\', \'oliv@neuf.fr\', \'0\', \'123456789\')');

//$req = $bdd->query('CREATE DATABASE ESSSAIIII');


//$req->closeCursor();




/*$req = $bdd->prepare('INSERT INTO membres (login, motdepasse) VALUES(?, ?)');*/
/*$nbfois=$req->execute(array($_POST['nouveauLogin'], $_POST['nouveaumotdepasse']));*/


/*$sql = 'insert into T_USERS'
            . '(USER_LOGIN, USER_EMAIL, USER_PASSWORD)'
            . 'values'
            . '(:login, :email, :password)';

        $user_bind = array(
            ':login' => $user['login'],
            ':password' => $user['password'],
            ':email' => $user['email']
        );

        $bdd->executerRequete($sql, $user_bind);*/



//**********************echo $nbfois . ' nouvelle entrée a été ajouté !'; 

//*****************$req->closeCursor();


// Redirection du visiteur vers la page index

//header('Location: inscription.php');

?>



</body>

</html>