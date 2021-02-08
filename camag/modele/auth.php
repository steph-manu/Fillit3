<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
session_start();
    
require_once __DIR__ . '/pdo.php';
require_once __DIR__ . '/user.php';

$message = "erreurrrrrr";
    //echo $_POST['login'];
try {
	$utilisateur = new User();
	$users = $utilisateur->getUsers();
	foreach ($users as $entry) {
        //echo $entry['login'];echo " et l autre :";
        //echo $_POST['login'];echo "<br>";
        if ( trim($entry['login']) == trim($_POST['login'])) {
echo $entry['username'];echo " et l autre apres:";
            //echo $_POST['password'];
            //echo $entry['password'];
            //echo $passwd_hash;
            $passwd_hash = hash('whirlpool', $_POST['password']);
			if ($passwd_hash == $entry['password']) {
                echo "reussi".'<br>';
                echo $_POST['password'];
                echo "reussi".'<br>';
                echo $entry['password'];
                echo $passwd_hash;
				$_SESSION['passwd_hash'] = $passwd_hash;
				/*if (isset($entry['admin']))
				  echo "bonjour admin";//return (2);*/
				//else
                header('Location: ../camera/camera.php');
				//echo "bienvenu membre";//return (1);
                
			} else
				echo "pas admin";//return (0);
		}
	}
	//echo "finnnnnnnnn";

} catch (Exception $e) {
	$message = $e->getMessage();
	echo '<html><HEAD><title id="'.'"title-doc"'.'">Camagru</title><meta content="'.'"42; école 42; php"'.'" name="'.'"keywords"'.'"><Meta  charset ="'.'"UTF-8"'.'"><link rel="'.'"stylesheet"'.'" href="'.'"css/application.css"'.'"/></head><body><div>'.$message.'</div></body></html>';
}
?>
</body>

</html>
