<?php

namespace App\Models;

use App\Utility\Hash;
use Core\Model;
use App\Core;
use Exception;
use App\Utility;

/**
 * User Model:
 */
class User extends Model {

    /**
     * Crée un utilisateur
     */
    public static function createUser($data) {
        $db = static::getDB();

        $stmt = $db->prepare('INSERT INTO users(username, email, password, salt) VALUES (:username, :email, :password,:salt)');

        $stmt->bindParam(':username', $data['username']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']);
        $stmt->bindParam(':salt', $data['salt']);

        $stmt->execute();

        return $db->lastInsertId();
    }

    public static function getByLogin($login)
    {
        $db = static::getDB();

        $stmt = $db->prepare("
            SELECT * FROM users WHERE ( users.email = :email) LIMIT 1
        ");

        $stmt->bindParam(':email', $login);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }


    /**
     * ?
     * @access public
     * @return string|boolean
     * @throws Exception
     */
    public static function login() {
        $db = static::getDB();

        $stmt = $db->prepare('SELECT * FROM articles WHERE articles.id = ? LIMIT 1');

        $stmt->execute([$id]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


     /**
     * Créé un nouveau mot de passe
     * @access public
     * @return string
     * @throws Exception
     */
    public static function resetPassword($email){
        $db = static::getDB();
        $user = static::getByLogin($email);

        $password = Hash::generateUnique();
        $hashed = Hash::generate($password, $user['salt']);
        $stmt = $db->prepare('UPDATE users SET password=? WHERE email=?');

        $stmt->execute(  [$hashed, $email]  );

        return $password;

    }
    

    /**
     * Créé un nouveau mot de passe
     * @access public
     * @param string $password
     * @throws Exception
     */
    public static function resetPasswordByUser($password){
        $db = static::getDB();
        $_SESSION["user"]["email"];
        $user = static::getByLogin($_SESSION["user"]["email"]);

      
        $hashed = Hash::generate($password, $user['salt']);
        $stmt = $db->prepare('UPDATE users SET password=? WHERE email=?');

        $stmt->execute(  [$hashed, $_SESSION["user"]["email"]]  );

        

    }


}
