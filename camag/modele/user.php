<?php
require_once __DIR__ . '/pdo.php';

class User extends Accesspdo
{
    // Effectue la connexion à la BDD
    // Instancie et renvoie l'objet PDO associé
    // Renvoie la liste des utilisateurs
    public function getUsers()
    {
        $sql = 'select username as login,'
            . ' email as email, `password` as `password`'
            . ' from users';

        $users = $this->executerRequete($sql);
        return $users->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveUser(array $user)
    {
        $sql = 'insert into users'
            . '(username, email, password)'
            . 'values'
            . '(:login, :email, :password)';

        $user_bind = array(
            ':login' => $user['login'],
            ':password' => $user['password'],
            ':email' => $user['email']
        );

        $this->executerRequete($sql, $user_bind);
    }

    public function countAllUsers()
    {
        $sql = 'select count(*) from users';
        $count = $this->executerRequete($sql)->fetchColumn();
        return $count;
    }

    public function majUser(array $user)
    {
        $sql = "UPDATE users SET
            PASSWORD = :password,
            EMAIL = :email,
            USER_UPDATE = :date_update
    		WHERE
            USERNAME = :login";

        $user_bind = array(
            ':login' => $user['login'],
            ':password' => $user['password'],
            ':email' => $user['email'],
            ':date_update' => date(DATE_W3C)
        );

        $this->executerRequete($sql, $user_bind);
    }

    public function delUser(array $user)
    {
        $sql = "DELETE FROM USERS
                WHERE
                USER_LOGIN = :login";

        $user_bind = array(
            ':login' => $user['login']
        );

        $this->executerRequete($sql, $user_bind);
    }
}

