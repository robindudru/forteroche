<?php
/**
 * Managing actions to perform regarding Users requested by controllers.
 *
 * @package    Forteroche
 * @author     Robin Dupont-Druaux <contact@robindupontdruaux.fr>
 */

namespace Model;

class UserManager extends Manager
{
    /**
     * Formats data from form and compares hashed password with database hashed one.
     * If it matches, session is created and user is logged in.
     */
    public function login()
    {
        $username = StringManager::normalize((string) $_POST['username']);
        $password = StringManager::normalize((string) $_POST['password']);
        $req = $this->reqSinglePrepare('SELECT * FROM users WHERE username = ?', $username);
        $data = $req->fetch();
        if (!empty($data)) {
            if (password_verify($password, $data['password'])) {
                $_SESSION['username'] = $username;
                $_SESSION['surname'] = $data['surname'];
                $_SESSION['name'] = $data['name'];
                $_SESSION['avatar'] = $data['avatar'];
                $_SESSION['role'] = $data['role'];
                return true;
            } else {
                throw new \Exception('Mot de passe incorrect.');
            }
        } else {
            throw new \Exception('Cet utilisateur n\'existe pas.');
        }
    }

    /**
     * Gets connected user infos from db thanks to session variables and initializes an User instance from it.
     */
    public function getProfile()
    {
        $req = $this->reqSinglePrepare('SELECT * FROM users WHERE username = ?', $_SESSION['username']);
        $data = $req->fetch();
        if (!empty($data)) {
            $user = new User($data);
            return $user;
        } else {
            throw new \Exception('Impossible de récupérer les données utilisateur.');
        }
    }

    /**
     * Gets infos for website, set from User with admin role
     */
    public function getAdminInfos()
    {
        $req = $this->reqExec("SELECT * FROM users WHERE role = 'admin'");
        $data = $req->fetch();
        if (!empty($data)) {
            $user = new User($data);
            return $user;
        } else {
            throw new \Exception('Impossible de trouver les infos de l\'administrateur.');
        }
    }

    /**
     * Edits profile settings. Checks if password has to be changed or not.
     * Updates then Sessions variables to match updated settings.
     */
    public function editProfile()
    {
        $id = (int) $_POST['id'];
        $username = StringManager::normalize((string) $_POST['username']);
        $surname = trim((string) $_POST['surname']);
        $name = trim((string) $_POST['name']);
        if (!empty($_POST['password'])) {
            $password = StringManager::normalize((string) $_POST['password']);
            $passwordConfirm = StringManager::normalize((string) $_POST['passwordConfirm']);
        }
        $twitter = StringManager::normalize((string) $_POST['twitter']);
        $facebook = StringManager::normalize((string) $_POST['facebook']);
        $instagram = StringManager::normalize((string) $_POST['instagram']);

        if (!empty($username) && !empty($surname) && !empty($name)) {
            if (isset($password)) {
                if ($password != $passwordConfirm) {
                    throw new \Exception('Les mots de passe ne concordent pas.');
                } else {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $values = [
                        'id' => $id,
                        'username' => $username,
                        'password' => $password,
                        'surname' => $surname,
                        'name' => $name,
                        'instagram' => $instagram,
                        'twitter' => $twitter,
                        'facebook' => $facebook,
                    ];
                    $req = $this->reqArrayPrepare('UPDATE users SET username=:username, password=:password, surname=:surname, name=:name, instagram=:instagram, twitter=:twitter, facebook=:facebook WHERE id=:id', $values);
                }
            } else {
                $values = [
                    'id' => $id,
                    'username' => $username,
                    'surname' => $surname,
                    'name' => $name,
                    'instagram' => $instagram,
                    'twitter' => $twitter,
                    'facebook' => $facebook,
                ];
                $req = $this->reqArrayPrepare('UPDATE users SET username=:username, surname=:surname, name=:name, instagram=:instagram, twitter=:twitter, facebook=:facebook WHERE id=:id', $values);
            }
        } else {
            throw new \Exception('Au moins un des champs obligatoires est vide.');
        }
        if (!$req) {
            throw new \Exception('Erreur lors de la mise à jour du profil');
        } else {
            $_SESSION['username'] = $username;
            $_SESSION['surname'] = $surname;
            $_SESSION['name'] = $name;
        }
    }
}
