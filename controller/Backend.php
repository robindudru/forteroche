<?php
/**
 * Calls for needed methods depending on router's instructions.
 *
 * @package    Forteroche
 * @author     Robin Dupont-Druaux <contact@robindupontdruaux.fr>
 */

namespace Controller;

class Backend extends Common
{
    /**
    * Determine if is user is trying to log in or not.
    *
    * If so, calls for UserManager login method, else sends user to login screen.
    */
    public function login()
    {
        if  ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $this->userManager->login();
            if ($login) {
                $this->adminHome();
            }
            else {
                require_once './view/backend/loginView.php';
            }
        }
        else {
            require_once './view/backend/loginView.php';
        }
    }
    /**
     * Destroys session to disconnect user.
     */
    public function disconnect()
    {
        session_destroy();
        header('Location:admin/login');
    }
    /**
     * Calls for required methods from needed Managers and sends to Homepage.
     */
    public function adminHome()
    {
        $publishedArticles = $this->articleManager->getArticles('published');
        $draftArticles = $this->articleManager->getArticles('draft');
        $trashArticles = $this->articleManager->getArticles('trash');
        $signaled = $this->commentManager->getSignaled();
        $this->commentManager->getArticleTitle($signaled);
        require_once './view/backend/homeView.php';
    }
    /**
     * Checks if article has been posted.
     * 
     * If so, Article Manager add method is called and user is sent to Success page.
     * 
     * Else, user is sent to Add Article page.
     */
    public function addArticle()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->articleManager->add();
            $this->successManager->success('articleAdded');
        }
        else {
            require_once './view/backend/addArticleView.php';
        }
    }
    /**
     * Checks id article has been edited.
     *
     * If so, Article Manager edit method is called and user is sent to Success page.
     *
     * Else, user is sent to Edit Article page.
     */
    public function editArticle()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->articleManager->edit();
            $this->successManager->success('articleEdited');
        }
        else {
            $article = $this->articleManager->getArticle($_GET['id']);
            require_once './view/backend/editArticleView.php';
        }
    }
    /**
     * Calls for Article Manager trash method and sends to Success page.
     */
    public function trashArticle()
    {
        $this->articleManager->trash();
        $this->successManager->success('articleTrashed');
    }
    /**
     * Calls for Article Manager delete method and sends to Success page.
     */
    public function deleteArticle()
    {
        $this->articleManager->delete();
        $this->successManager->success('articleDeleted');
    }
    /**
     * Calls for Comment Manager approve method and sends to Success page.
     */
    public function approveComment()
    {
        $this->commentManager->approve($_GET['id']);
        $this->successManager->success('commentApproved');
    }
    /**
     * Calls for Comment Manager delete method and sends to Success page.
     */
    public function deleteComment()
    {
        $this->commentManager->delete($_GET['id']);
        $this->successManager->success('commentDeleted');
    }
    /**
     * Calls for Confirm Manager confirm method to make sure user wants to perform action.
     */
    public function confirm()
    {
        $this->confirmManager->confirm($_GET['confirm'], $_GET['id']);
    }
    /**
     * Checks if profile has been edited.
     *
     * If so, User Manager editProfile method is called and user is sent to Success Page.
     *
     * Else, user is sent to Edit Profile page.
     */
    public function editProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->userManager->editProfile();
            $this->successManager->success('profileEdited');
        }
        else {
            $user = $this->userManager->getProfile();
            require_once './view/backend/editProfileView.php';
        }
    }
}