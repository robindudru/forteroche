<?php 

require_once('Manager.php');

class UserManager extends Manager {
	public function login() {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM users WHERE username = ?');
		$req->execute(array($username));
		$data = $req->fetch();
		if (!empty($data)) {
			if (password_verify($password, $data['password'])) {
				$_SESSION['username'] = $username;
				$_SESSION['avatar'] = $data['avatar'];
				$_SESSION['role'] = $data['role'];
				return true;
			}
			else {
				throw new Exception('Mot de passe incorrect.'); 
			}
		}
		else {
			throw new Exception('Cet utilisateur n\'existe pas.');
		}
	}
}