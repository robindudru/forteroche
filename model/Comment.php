<?php
namespace Model;

class Comment
{
    /**
    * @var int $id
    */
    private $id;
    /**
    * @var  string $author
    */
    private $author;
    /**
    * @var  string $content
    */
    private $content;
    /**
    * @var  date $date
    */
    private $date;
    /**
    * @var  int $articleId
    */
   private $articleId;
    /**
    * @var  string $articleTitle
    */
    private $articleTitle;
    /**
    * @var  int $signaled
    */
    private $signaled;

	public function __construct(array $data)
    {
		$this->setId($data['id']);
		$this->setAuthor($data['author']);
		$this->setContent($data['content']);
        $this->setDate($data['date']);
		$this->setArticleId($data['article_id']);
		$this->setSignaled($data['signaled']);
	}


    /**
     * @return int $id
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
     * @return  string $author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param  string $author
     *
     * @return self
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return  string $content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param  string $content
     *
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return  date $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param  date $date
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return  int $articleId
     */
    public function getArticleId()
    {
        return $this->articleId;
    }

    /**
     * @param  int $articleId
     *
     * @return self
     */
    public function setArticleId($articleId)
    {
        $this->articleId = $articleId;

        return $this;
    }

    /**
     * @return  string $articleTitle
     */
    public function getArticleTitle()
    {
        return $this->articleTitle;
    }

    /**
     * @param  string $articleTitle
     *
     * @return self
     */
    public function setArticleTitle($articleTitle)
    {
        $this->articleTitle = $articleTitle;

        return $this;
    }

    /**
     * @return  int $signaled
     */
    public function getSignaled()
    {
        return $this->signaled;
    }

    /**
     * @param  int $signaled
     *
     * @return self
     */
    public function setSignaled($signaled)
    {
        $this->signaled = $signaled;

        return $this;
    }
}