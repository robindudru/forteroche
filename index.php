<?php
/**
 * This file acts as this website's router.
 *
 * @package    Forteroche
 * @author     Robin Dupont-Druaux <contact@robindupontdruaux.fr>
 */

require_once 'Controller/Autoloader.php';
Autoloader::register();

$frontController = new Controller\Frontend();
$backController = new Controller\Backend();

try {
    if (isset($_GET['mode'])) {
        if ($_GET['mode'] === 'admin') {
            session_start();
            if (isset($_SESSION['username'])) {
                if ($_SESSION['role'] === 'admin') {
                    if (isset($_GET['action'])) {
                        switch($_GET['action']) {
                            case 'addArticle':
                            $backController->addArticle();
                            break;
                            case 'editArticle':
                            $backController->editArticle();
                            break;
                            case 'trashArticle':
                            $backController->trashArticle();
                            break;
                            case 'deleteArticle':
                            $backController->deleteArticle();
                            break;
                            case 'login':
                            $backController->login();
                            break;
                            case 'disconnect':
                            $backController->disconnect();
                            break;
                            case 'approveComment':
                            $backController->approveComment();
                            break;
                            case 'deleteComment':
                            $backController->deleteComment();
                            break;
                            case 'editProfile':
                            $backController->editProfile();
                            break;
                            default:
                            throw new \Exception('Action inconnue');
                        }
                    }
                    else if (isset($_GET['confirm'])) {
                        $backController->confirm();
                    }
                    else {
                        $backController->adminHome();   
                    }
                }
                else {
                    throw new \Exception('Vous n\'êtes pas administrateur !');
                }
            }
            else {
                $backController->login();
            }
        }
        else {
            throw new \Exception('Mode inconnu');
        }
    }
    else if (isset($_GET['action'])) {
        if (isset ($_COOKIE['enter'])) {
            if ($_GET['action'] === 'home') {
                $frontController->frontPage();
            }
            else if ($_GET['action'] === 'article') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $frontController->article();
                }
                else {
                    throw new \Exception ('L\'identifiant ne peut pas être négatif.');
                }
            }
        }
        else {
            $frontController->splashScreen();
        }
    }
    else {
        if (isset($_COOKIE['enter'])) {
            $frontController->frontPage();
        }
        else {
            $frontController->splashScreen();
        }
    }
}

catch(Exception $e) {
    $errorMessage =  $e->getMessage();
    require_once('view/frontend/errorView.php');
}