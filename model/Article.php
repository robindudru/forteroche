<?php 

class Article {
	private $id;
	private $title;
	private $content;
	private $date;
	private $totalComments;

	public function __construct($id, $title, $content, $date) {
		$this->setValue('id', $id);
		$this->setValue('title', $title);
		$this->setValue('content', $content);
		$this->setValue('date', $date);
		$commentManager = new CommentManager();
		$totalComments = $commentManager->totalComments($this->id); 
		$this->setValue('totalComments', $totalComments);
	}

	public function getValue($property) {
		switch ($property) {
			case 'id':
				return $this->id;
				break;
			case 'title':
				return $this->title;
				break;
			case 'content':
				return $this->content;
				break;
			case 'date':
				return $this->date;
				break;	
			case 'totalComments':
				return $this->totalComments;
				break;
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
			case 'title':
				if (is_string($value)) {
					$this->title = $value;
				}
				break;
			case 'content':
				if (is_string($value)) {
					$this->content = $value;
				}
				break;
			case 'date':
				if (is_string($value)) {
					$this->date = $value;
				}
				break;
			case 'totalComments':
				$value = (int)$value;
				if ($value >= 0) {
					$this->totalComments = $value;
				}
		}
		
	} 
}