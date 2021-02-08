<!DOCTYPE html>
<html>
	<head>
		<title>INSCRIPTION</title>
		<link rel="stylesheet" href="../nouveauMembre.css">
		<style>
		body{
			background-color :grey;
		}
		</style>
	</head>
	<body background-color="grey">
	<center>
		<form name="mon-formulaire1" action="../modele/nouveaumembre3.php" method="POST">
   			 Votre prénom :<br />
  		 	<input type="text" name="username" value="" />
			</p>
			<p>
  		 	Votre username :<br />
  		 	<input type="text" name="login" value="" />
			</p>
			<p>
   			Votre mot de passe :<br />
   			<input type="password" name="password" value="" />
			</p>
			<p>
  			 Verif mot de passe :<br />
   			<input type="password" name="passverif" value="" />
			</p>
			<p>
  			 votre email :<br />
  			 <input type="mail" name="email" valu="" />
			</p>
			<p>
  			 Votre message :<br />
  			 <textarea name="le-message" rows="6" cols="40">Vous pouvez saisir ici un message.</textarea>
			</p>
			<p>
   			<input type="submit" value="Envoyer" />
   			<input type="reset" value="Annuler" />
			</p>
		</form>
	</body>
</html>
