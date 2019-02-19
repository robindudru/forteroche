<?php 

namespace Model;

class ConfirmManager {
	private $message;
	private $url;

	public function setValues($type){
		switch($type) {
			case 'approveComment' :
				$this->message = 'Vous êtes sur le point d\'approuver ce commentaire bien qu\'il ait été signalé par au moins un utilisateur comme étant inapproprié. Etes-vous sûr ?';
				$this->url = '?mode=admin&action=approveComment&id='.$_GET['id'];
				break;
			case 'deleteComment' :
				$this->message = 'Vous êtes sur le point de supprimer ce commentaire. Etes-vous sûr ?';
				$this->url = '?mode=admin&action=deleteComment&id='.$_GET['id'];
				break;
			case 'deleteArticle' :
				$this->message = 'Vous êtes sur le point de supprimer cet article. Etes-vous sûr ?';
				$this->url = '?mode=admin&action=deleteArticle&id='.$_GET['id'];
				break;
		}
	}

	public function getMessage(){
		return $this->message;
	}

	public function getUrl(){
		return $this->url;
	}
}