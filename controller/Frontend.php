<?php
/**
 * Calls for needed methods depending on router's instructions.
 *
 * @package    Forteroche
 * @author     Robin Dupont-Druaux <contact@robindupontdruaux.fr>
 */

namespace Controller;

class Frontend extends Common
{
    /**
     * Checks if user has already been greeted by splashscreen.
     *
     * If not, user is sent to Splashscreen. Entering the website will create a 7 days cookie.
     *
     * Else, user is sent to Homepage, as long as the cookie exists.
     */
    public function splashScreen()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['enter'] === 'enter') {
            setCookie('enter', 'enter', time() + 7*24*3600, null, null, false, true);
            header('Location:home');
        }
        else {
            require_once './view/frontend/splashView.php';
        }
    }
    /**
     * Calls for required methods from needed Managers and sends to Homepage.
     */
    public function frontPage()
    {
        $articles = $this->articleManager->getArticles('published');
        $comments = $this->commentManager->getLastComments();
        $this->commentManager->getArticleTitle($comments);
        $admin = $this->userManager->getAdminInfos();
        require_once './view/frontend/homeView.php';
    }
    /**
     * Checks if comment is being posted or signaled.
     *
     * If so, Comment Manager add or signal method is called and user is sent to Success page.
     *
     * Else, required methods are called from needed Managers and user is sent to Article page.
     */
    public function article()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		    $this->commentManager->add();
		    $this->successManager->success('commentAdded');
        }
        else if (isset($_GET['signal'])) {
            $this->commentManager->signalComment($_GET['signal']);
            $this->successManager->success('commentSignaled');
        }
        else {
            $articles = $this->articleManager->getArticles('published');
            $article = $this->articleManager->getArticle($_GET['id']);
            $nextArticle = $this->articleManager->getNextArticle($_GET['id']);
            $prevArticle = $this->articleManager->getPrevArticle($_GET['id']);
            $comments = $this->commentManager->getComments($_GET['id']);
            $admin = $this->userManager->getAdminInfos();
            require_once './view/frontend/articleView.php';
        }
    }
}