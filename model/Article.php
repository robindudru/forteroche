<?php 

namespace Model;
use Model;

class Article {
	private $id;
	private $title;
	private $content;
    private $status;
	private $date;
	private $totalComments;

	public function __construct(array $data) {
		$this->setId($data['id']);
		$this->setTitle($data['title']);
		$this->setContent($data['content']);
        $this->setStatus($data['status']);
		$this->setDate($data['date']);
		$commentManager = new CommentManager();
		$totalComments = $commentManager->totalComments($this->getId()); 
		$this->setTotalComments($totalComments);
	}

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     *
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $content
     *
     * @return self
     */
    public function setStatus($content)
    {
        $this->status = $content;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotalComments()
    {
        return $this->totalComments;
    }

    /**
     * @param mixed $totalComments
     *
     * @return self
     */
    public function setTotalComments($totalComments)
    {
        $this->totalComments = $totalComments;

        return $this;
    }
}