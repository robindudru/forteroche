<?php

require_once('./model/ArticleManager.php');
require_once('./model/CommentManager.php');
require_once('./model/SuccessManager.php');
require_once('./model/UserManager.php');

class Common {
	protected $articleManager;
	protected $commentManager;
	protected $successManager;
	protected $userManager;

	public function __construct(){	
		$this->articleManager = new ArticleManager();
		$this->commentManager = new CommentManager();
		$this->successManager = new SuccessManager();
		$this->userManager = new UserManager();
	}
}