<?php
/**
 * Model for User, hydrated from data gathered from User Manager.
 *
 * @package    Forteroche
 * @author     Robin Dupont-Druaux <contact@robindupontdruaux.fr>
 */

namespace Model;

class User
{
    /**
     * @var  int
     */
    private $id;
    /**
     * @var  string
     */
    private $username;
    /**
     * @var  string
     */
    private $password;
    /**
     * @var  string
     */
    private $surname;
    /**
     * @var  string
     */
    private $name;
    /**
     * @var  string
     */
    private $avatar;
    /**
     * @var  string
     */
    private $twitter;
    /**
     * @var  string
     */
    private $facebook;
    /**
     * @var  string
     */
    private $instagram;

    public function __construct($data)
    {
        $this->setId($data['id']);
        $this->setUsername($data['username']);
        $this->setPassword($data['password']);
        $this->setSurname($data['surname']);
        $this->setName($data['name']);
        $this->setAvatar($data['avatar']);
        $this->setTwitter($data['twitter']);
        $this->setFacebook($data['facebook']);
        $this->setInstagram($data['instagram']);
    }

    /**
     * @return  int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  int $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return  string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param  string $username
     *
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return  string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param  string $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return  string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param  string $surname
     *
     * @return self
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * @return  string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  string $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return  string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param  string $avatar
     *
     * @return self
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * @return  string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * @param  string $twitter
     *
     * @return self
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * @return  string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param  string $facebook
     *
     * @return self
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * @return  string
     */
    public function getInstagram()
    {
        return $this->instagram;
    }

    /**
     * @param  string $instagram
     *
     * @return self
     */
    public function setInstagram($instagram)
    {
        $this->instagram = $instagram;

        return $this;
    }
}