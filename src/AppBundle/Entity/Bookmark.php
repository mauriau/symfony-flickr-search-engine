<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Picture;
use UserBundle\Entity\User;

/**
 * Bookmark
 *
 * @ORM\Table(name="bookmark")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BookmarkRepository")
 */
class Bookmark
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50)
     */
    protected $title;

    /**
     * @var bool
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    protected $isActive;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="bookmarks")
     * @ORM\JoinColumn(name="user_id", nullable=false)
     */
    protected $User;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Picture", cascade={"persist"})
     */
    protected $Picture;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Bookmark
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Bookmark
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return bool
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Picture = new ArrayCollection();
    }

    /**
     * Add Picture
     *
     * @param \AppBundle\Entity\Picture $picture
     * @return Bookmark
     */
    public function addPicture(Picture $picture)
    {
        $this->Picture[] = $picture;

        return $this;
    }

    /**
     * Remove Picture
     *
     * @param \AppBundle\Entity\Picture $picture
     */
    public function removePicture(Picture $picture)
    {
        $this->Picture->removeElement($picture);
    }

    /**
     * Get Picture
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPicture()
    {
        return $this->Picture;
    }

    /**
     * Set User
     *
     * @param \UserBundle\Entity\User $user
     * @return Bookmark
     */
    public function setUser(User $user)
    {
        $this->User = $user;

        return $this;
    }

    /**
     * Get User
     *
     * @return \UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->User;
    }
}
