<!DOCTYPE html>
<html>
	<head>
	<title>CAMAGRU</title>
	<link rel="stylesheet" href="camera.css">
	</head>
	<body>
		<header>
			<p>
				<a href="galerie.php" title="GALERIE">GALERIE</a>
				<a href="../chat/chat.php" title="chat">CHAT</a>
				<a href="../index.html" title="ACCUEIL">ACCUEIL</a>
			</p>
		</header><div>
		<section><center>
			<video id="video"></video>
			<button id="startbutton">Prendre une photo</button>
			<canvas id="canvas"></canvas>
			<img class = "chat" src="http://placekitten.com/g/320/261" id="photo" alt="photo">
		<script language="JavaScript" type="text/javascript" src="cam.js"></SCRIPT></center>
			
		</section>

			</div>
		<aside>
			<img class="droit" src="http://geekhebdo.com/wp-content/uploads/2016/12/ad1-compressed.jpg">
			<img class="droit" src = "http://geekhebdo.com/wp-content/uploads/2016/12/ad5-compressed.jpg">
			<img  class="droit" src = "http://www.fenoweb.com/sites/www.fenoweb.com/files/field/image/creation-photoshop-de-folie-006-route-champetre.jpg">
			<img  class="droit" src = "http://www.fenoweb.com/sites/www.fenoweb.com/files/2017/IMAGES/creations-photoshop-extraordinaires/creation-photoshop-de-folie-011-bache-trompe-l-oeil.jpg">
		<!--	<img src="https://www.espacebuzz.com/assets/img/000/177/large:w/les-15-montages-photoshop-les-plus-incroyables.jpg">-->
		</aside>
		<footer>
		<?php
			include '../testupload/testphp.php';
				 if( !empty($message) ) 
				 {
				   echo '<p>',"\n";
				   echo "\t\t<strong>", htmlspecialchars($message) ,"</strong>\n";
				   echo "\t</p>\n\n";
				 }
			   ?>
			   <!-- Debut du formulaire -->
			  <form enctype="multipart/form-data" class ="pourupload' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			   <fieldset>
				   <legend>Formulaire</legend>
					 <p>
					   <label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Envoyer le fichier :</label>
					   <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
					   <input name="fichier" type="file" id="fichier_a_uploader" />
					   <input type="submit" name="submit" value="Upload" />
					 </p>
				 </fieldset>
			   </form>
		</footer>
	</body>
</html>
