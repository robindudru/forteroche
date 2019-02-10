<?php 

class Article {
	private $id;
	private $title;
	private $content;
	private $date;

	public function __construct($id, $title, $content, $date) {
		$this->id = $id;
		$this->title = $title;
		$this->content = $content;
		$this->date = $date;
	}

	public function getValue($property) {
		if ($property == 'id') {
			return $this->id;
		}
		if ($property == 'title') {
			return $this->title;
		}
		if ($property == 'content') {
			return $this->content;
		}
		if ($property == 'date') {
			return $this->date;
		}
	}
}