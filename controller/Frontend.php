<?php
namespace Controller;

class Frontend extends Common
{
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

    public function frontPage()
    {
        $articles = $this->articleManager->getArticles('published');
        $comments = $this->commentManager->getLastComments();
        $this->commentManager->getArticleTitle($comments);
        $admin = $this->userManager->getAdminInfos();
        require_once './view/frontend/homeView.php';
    }

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