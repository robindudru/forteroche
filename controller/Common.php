<?php

namespace Controller;
use Model;

class Common {

	protected $articleManager;
	protected $commentManager;
	protected $successManager;
	protected $userManager;
	protected $confirmManager;

	public function __construct(){	
		$this->articleManager = new Model\ArticleManager();
		$this->commentManager = new Model\CommentManager();
		$this->successManager = new Model\SuccessManager();
		$this->userManager = new Model\UserManager();
		$this->confirmManager = new Model\ConfirmManager();
	}
}