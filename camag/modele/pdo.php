<?php

abstract class Accesspdo
{

    /** Objet PDO d'accès à la BD */
    private $_bdd;

    /**
     * @param string $sql La requête SQL
     * @param array $valeurs Les valeurs associées à la requête
     * @return PDOStatement Le résultat renvoyé par la requête
     */
    protected function executerRequete($sql, $params = null)
    {
        if ($params == null) {
            $resultat = $this->getBdd()->query($sql); // exécution directe
        } else {
            $resultat = $this->getBdd()->prepare($sql);  // requête préparée
            foreach ($params as $key => $value) {
                $resultat->bindParam($key, $value);
            }
            $resultat->execute($params);
        }
        return $resultat;
    }

    /**
     * Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
     *
     * @return PDO L'objet PDO de connexion à la BDD
     */
    private function getBdd()
    {
        if ($this->_bdd == null) {
            // Création de la connexion
            $this->_bdd = new PDO(
                'mysql:host=localhost;dbname=camagru;charset=utf8',
                'root',
                'omampm',
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ));
        }
        return $this->_bdd;
    }

}
