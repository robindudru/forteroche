<?php 
/**
 * Model for Article, hydrated from data gathered from Article Manager.
 *
 * @package    Forteroche
 * @author     Robin Dupont-Druaux <contact@robindupontdruaux.fr>
 */
namespace Model;

use Model;

class Article
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $content;
    /**
     * @var string
     */
    private $status;
    /**
     * @var string
     */
    private $date;
    /**
     * @var string
     */
    private $updated;
    /**
     * @var int
     */
    private $totalComments;

    public function __construct(array $data)
    {
        $this->setId($data['id']);
        $this->setTitle($data['title']);
        $this->setContent($data['content']);
        $this->setStatus($data['status']);
        $this->setDate($data['date']);
        $this->setUpdated($data['updated']);
        $commentManager = new CommentManager();
        $totalComments = $commentManager->totalComments($this->getId()); 
        $this->setTotalComments($totalComments);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     *
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return string
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param string $updated
     *
     * @return self
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotalComments()
    {
        return $this->totalComments;
    }

    /**
     * @param int $totalComments
     *
     * @return self
     */
    public function setTotalComments($totalComments)
    {
        $this->totalComments = $totalComments;

        return $this;
    }
}