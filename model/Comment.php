<?php

class Comment{
	private $id;
	private $author;
	private $content;
	private $articleId;
	private $articleTitle;
	private $signaled;

	public function __construct($id, $author, $content, $articleId, $signaled) {
		$this->setValue('id', $id);
		$this->setValue('author', $author);
		$this->setValue('content', $content);
		$this->setValue('articleId', $articleId);
		$this->setValue('signaled', $signaled);
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
		if ($property == 'signaled') {
			return $this->signaled;
		}
	}

	public function setValue($property, $value) {
		switch ($property) {
			case 'id':
				$value = (int)$value;
				if ($value > 0) {
					$this->id = $value;
				}
				break;
			case 'author':
				if (is_string($value)) {
					$this->author = $value;
				}
				break;
			case 'content':
				if (is_string($value)) {
					$this->content = $value;
				}
				break;
			case 'articleId':
				$value = (int)$value;
				if ($value > 0) {
					$this->articleId = $value;
				}
				break;
			case 'articleTitle':
				if(is_string($value)) {
					$this->articleTitle = $value;
				}
				break;
			case 'signaled':
				$value= (int)$value;
					$this->signaled = $value;
				break;
		}
	}
}