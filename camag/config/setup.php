<?php
include 'database.php';

try {
    $conn = new PDO("mysql:host=$DB_DSN_LIGHT", $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE camagru";
    $conn->exec($sql);
    echo "CREATION DATABASE camagru<br>";
    }
catch(PDOException $e)
    {
    echo "ECHEC CREATION DATABASE camagru: ".$e->getMessage()."Aborting process<br>";
	}

try {

        $dbh = new PDO("mysql:host=$DB_DSN_LIGHT;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `users` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `username` varchar(100) NOT NULL,
            `email` varchar(100) NOT NULL,
            `member` tinyint(1) NOT NULL DEFAULT '0',
            `password` varchar(255) NOT NULL,
            PRIMARY KEY (`id`)
        )";
        $dbh->exec($sql);
        echo "CREATION TABLE users<br>";
	}
catch (PDOException $e) {
    echo "ECHEC CREATION TABLE users: ".$e->getMessage()."Aborting process<br>";
    }

try {

        $dbh = new PDO("mysql:host=$DB_DSN_LIGHT;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `images` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `username` VARCHAR(100) NOT NULL,
            `image` VARCHAR(100) NOT NULL,
            `like_count` int(11) NOT NULL
        )";
        $dbh->exec($sql);
        echo "CREATION TABLE images<br>";
    } catch (PDOException $e) {
        echo "ECHEC CREATION TABLE images : ".$e->getMessage()."Aborting process<br>";
    }
    try {

        $dbh = new PDO("mysql:host=$DB_DSN_LIGHT;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `comments` (
            `comment_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `parent_comment_id` int(11) NOT NULL,
            `comment` varchar(200) NOT NULL,
            `comment_sender_name` varchar(40) NOT NULL,
            `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `image_id` int(11) DEFAULT NULL
          )
          ";
        $dbh->exec($sql);
        echo "CREATION TABLE comments<br>";
    } catch (PDOException $e) {
        echo "ECHEC CREATION TABLE comments: ".$e->getMessage()."Aborting process<br>";
    }

    try {

        $dbh = new PDO("mysql:host=$DB_DSN_LIGHT;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `chat` (
            `chat_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `username` VARCHAR(100) NOT NULL,
            `comment` varchar(200) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
          ";
        $dbh->exec($sql);
        echo "CREATION TABLE chat<br>";
    } catch (PDOException $e) {
        echo "ECHEC CREATION TABLE chat: ".$e->getMessage()."Aborting process<br>";
    }
?>
