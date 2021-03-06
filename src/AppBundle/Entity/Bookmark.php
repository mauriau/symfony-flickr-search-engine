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
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="bookmarks",cascade={"remove"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $User;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Picture", cascade={"persist"})
     */
    protected $pictures;

    /**
     * @var string
     *
     * @ORM\Column(name="create_at", type="datetime")
     */
    private $created_at;

    public function __construct()
    {
        $this->created_at = new \Datetime('now');
        $this->pictures = new ArrayCollection();
    }

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

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Bookmark
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Add pictures
     *
     * @param \AppBundle\Entity\Picture $pictures
     * @return Bookmark
     */
    public function addPicture(Picture $pictures)
    {
        $this->pictures[] = $pictures;

        return $this;
    }

    /**
     * Remove pictures
     *
     * @param \AppBundle\Entity\Picture $pictures
     */
    public function removePicture(Picture $pictures)
    {
        $this->pictures->removeElement($pictures);
    }

    /**
     * Get pictures
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPictures()
    {
        return $this->pictures;
    }
}
