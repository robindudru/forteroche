<?php
/**
 * Managing actions to perform regarding Success requested by controllers.
 *
 * @package    Forteroche
 * @author     Robin Dupont-Druaux <contact@robindupontdruaux.fr>
 */

namespace Model;

class SuccessManager
{
    /**
     * @var  string
     */
    private $successMessage;

    /**
     * Gets information to hydrate Success and sends to Success page.
     *
     * @param  string $type the type of success wanted
     */
    public function success($type)
    {
        $this->setMessage($type);
        $message = $this->getMessage();
        ($type === 'commentAdded' || $type === 'commentSignaled') ? require_once './view/frontend/successView.php' : require_once './view/backend/successView.php';
    }

    /**
     * Sets message depending on the situation
     *
     * @param  string $type the type of success wanted
     */
    public function setMessage($type)
    {
        if ($type === 'articleAdded') {
            $this->successMessage = 'Article ajouté avec succès';
        }
        if ($type === 'articleEdited') {
            $this->successMessage = 'Article édité avec succès';
        }
        if ($type === 'articleTrashed') {
            $this->successMessage = 'Article mis à la corbeille avec succès';
        }
        if ($type === 'articleDeleted') {
            $this->successMessage = 'Article supprimé avec succès';
        }
        if ($type === 'commentAdded') {
            $this->successMessage = 'Commentaire ajouté avec succès';
        }
        if ($type === 'commentSignaled') {
            $this->successMessage = 'Le commentaire a été signalé avec succès. L\'administrateur en a été informé. Merci !';
        }
        if ($type === 'commentApproved') {
            $this->successMessage = 'Le commentaire a été approuvé avec succès. Plus aucun signalement ne vous sera remonté pour celui-ci.';
        }
        if ($type === 'commentDeleted') {
            $this->successMessage = 'Commentaire a été supprimé avec succès.';
        }
        if ($type === 'profileEdited') {
            $this->successMessage = 'Profil mis à jour avec succès';
        }
    }

    /**
     * @return  string
     */
    public function getMessage()
    {
        return $this->successMessage;
    }
}
