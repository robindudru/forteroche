<?php

class Comment{
	private $id;
	private $author;
	private $content;
	private $articleId;
	private $articleTitle;

	public function __construct($id, $author, $content, $articleId) {
		$this->id = $id;
		$this->author = $author;
		$this->content = $content;
		$this->articleId = $articleId;
	}

	public function getValue($property) {
		if ($property == 'id') {
			return $this->id;
		}
		if ($property == 'author') {
			return $this->author;
		}
		if ($property == 'content') {
			return $this->content;
		}
		if ($property == 'articleId') {
			return $this->articleId;
		}
		if ($property == 'articleTitle') {
			return $this->articleTitle;
		}
	}

	public function setArticleTitle($value) {
		$this->articleTitle = $value;
	}
}