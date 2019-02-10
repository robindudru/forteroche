<?php

require_once('./model/ArticleManager.php');
require_once('./model/CommentManager.php');
require_once('./model/SuccessManager.php');

class Common {
	protected $articleManager;
	protected $commentManager;
	protected $successManager;

	public function __construct(){	
		$this->articleManager = new ArticleManager();
		$this->commentManager = new CommentManager();
		$this->successManager = new SuccessManager();
	}
}