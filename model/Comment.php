<?php

namespace Model;

class Comment{
	private $id;
	private $author;
	private $content;
	private $articleId;
	private $articleTitle;
	private $signaled;

	public function __construct(array $data) {
		$this->setId($data['id']);
		$this->setAuthor($data['author']);
		$this->setContent($data['content']);
		$this->setArticleId($data['article_id']);
		$this->setSignaled($data['signaled']);
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
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     *
     * @return self
     */
    public function setAuthor($author)
    {
        $this->author = $author;

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
    public function getArticleId()
    {
        return $this->articleId;
    }

    /**
     * @param mixed $articleId
     *
     * @return self
     */
    public function setArticleId($articleId)
    {
        $this->articleId = $articleId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getArticleTitle()
    {
        return $this->articleTitle;
    }

    /**
     * @param mixed $articleTitle
     *
     * @return self
     */
    public function setArticleTitle($articleTitle)
    {
        $this->articleTitle = $articleTitle;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSignaled()
    {
        return $this->signaled;
    }

    /**
     * @param mixed $signaled
     *
     * @return self
     */
    public function setSignaled($signaled)
    {
        $this->signaled = $signaled;

        return $this;
    }
}