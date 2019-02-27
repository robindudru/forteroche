<?php 
/**
 * Managing actions to perform regarding Confirms requested by controllers.
 *
 * @package    Forteroche
 * @author     Robin Dupont-Druaux <contact@robindupontdruaux.fr>
 */

namespace Model;

class ConfirmManager
{
    /**
     * @var  string
     */
    private $message;
    /**
     * @var  string
     */
    private $url;

    /**
     * Gets information to hydrate Confirmation and sends to Confirm page.
     * 
     * @param  string $type the type of confirmation wanted
     * @param  id $id the id of the article/comment concerned
     */
    public function confirm($type, $id)
    {
        $this->setMessage($type);
        $this->setUrl($type, $id);
        $message = $this->getMessage();
        $url = $this->getUrl();
        require_once './view/backend/confirmView.php';
    }

    /**
     * Sets message depending on the situation
     * 
     * @param  string $type the type of confirmation wanted
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
    }

    /**
     * Sets confirm button url depending on the situation 
     * 
     * @param string $type the type of confirmation wanted
     * @param  int $id the id of the article or comment concerned
     */
    public function setUrl($type, $id)
    {
        if ($type === 'approveComment') {
            $this->url = 'admin/approveComment/'.$id;
        }
        if($type === 'deleteComment'){
            $this->url = 'admin/deleteComment/'.$id;
        }
        if($type === 'trashArticle'){
            $this->url = 'admin/trashArticle/'.$id;
        }
        if($type === 'deleteArticle'){
            $this->url = 'admin/deleteArticle/'.$id;
        }
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}