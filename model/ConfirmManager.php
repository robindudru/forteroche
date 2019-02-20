<?php 

namespace Model;

class ConfirmManager {
	private $message;
	private $url;

    /**
     * @param mixed $message
     *
     * @return self
     */
    public function setMessage($type)
    {
    	if ($type === 'approveComment') {
    		$this->message = 'Vous êtes sur le point d\'approuver ce commentaire bien qu\'il ait été signalé par au moins un utilisateur comme étant inapproprié. Etes-vous sûr ?';
    	}
        if($type === 'deleteComment'){
        	$this->message = 'Vous êtes sur le point de supprimer ce commentaire. Etes-vous sûr ?';
        }
        if($type === 'trashArticle'){
        	$this->message = 'Vous êtes sur le point de mettre cet article à la corbeille. Vous pourrez toujours le restaurer par la suite. Etes-vous sûr ?';
        }
        if($type === 'deleteArticle'){
        	$this->message = 'Vous êtes sur le point de supprimer définitivement cet article. Etes-vous sûr ?';
        }

        return $this;
    }

    /**
     * @param mixed $url
     *
     * @return self
     */
    public function setUrl($type, $id)
    {
    	if ($type === 'approveComment') {
    		$this->url = '?mode=admin&action=approveComment&id='.$id;
    	}
        if($type === 'deleteComment'){
        	$this->url = '?mode=admin&action=deleteComment&id='.$id;
        }
        if($type === 'trashArticle'){
        	$this->url = '?mode=admin&action=trashArticle&id='.$id;
        }
        if($type === 'deleteArticle'){
        	$this->url = '?mode=admin&action=deleteArticle&id='.$id;
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    public function confirm($type, $id) {
    	$this->setMessage($type);
    	$this->setUrl($type, $id);
    	$message = $this->getMessage();
		$url = $this->getUrl();
		require_once('./view/backend/confirmView.php');
	}
}