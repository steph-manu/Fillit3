<?php

require_once __DIR__ . '/pdo.php';

class Image extends Modele
{
    // Renvoie la liste des images
    public function getAllImages()
    {
        $sql = 'select image as path,'
            . ' username as login'
            . ' from images';

        $images = $this->executerRequete($sql);
        return $images->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getImageByPath($user)
    {
        $sql = 'select id as img_id, username as img_user '
            . 'from images '
            . ' WHERE image = :image';

        $image_bind = array(
            ':image_path' => $user['image']
        );
        $image = $this->executerRequete($sql, $image_bind);
        // return $image->fetch();
        if ($image->rowCount() > 0)
            return $image->fetch(PDO::FETCH_ASSOC);
        else
            throw new Exception("Aucune image ne correspond à l'identifiant '$user'");
    }

    public function saveImage(array $img)
    {
        $sql =
            'insert into IMAGES
            (image, username)
            values
            (:path, :user_login)';

        $image_bind = array(
            ':path' => $img['path'],
            ':user_login' => $img['login']
        );
        $this->executerRequete($sql, $image_bind);
    }

    public function delImage(array $img)
    {
        $sql = 'DELETE FROM IMAGES WHERE username  = :login AND id = :img_id';

            var_dump($img['image_path']);var_dump($img['login']);
        $image_bind = array(
            ':img_id' => $img['img_id'],
            ':login' => $img['login']
        );
        $this->executerRequete($sql, $image_bind);
    }

    public function countAllImages()
    {
        $sql = 'select count(*) from IMAGES';
        $count = $this->executerRequete($sql)->fetchColumn();
        return $count;
    }

    public function majImg(array $img)
    {
        $sql = "UPDATE IMAGES SET
            image = :path
    		WHERE
            username = :login";

        $image_bind = array(
            ':path' => $img['path'],
            ':user_login' => $img['login']
        );
        $this->executerRequete($sql, $image_bind);
    }
}
    ?>

