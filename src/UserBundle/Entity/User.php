<?php
// src/AppBundle/Entity/User.php

namespace UserBundle\Entity;

use AppBundle\Entity\Bookmark;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Bookmark", mappedBy="User",cascade={"persist"})
     */
    protected $bookmarks;
    public function __construct()
    {
        parent::__construct();
        $this->bookmarks = new ArrayCollection();
    }
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add bookmarks
     *
     * @param \AppBundle\Entity\Bookmark $bookmarks
     * @return User
     */
    public function addBookmark(Bookmark $bookmarks)
    {
        $this->bookmarks[] = $bookmarks;

        return $this;
    }

    /**
     * Remove bookmarks
     *
     * @param \AppBundle\Entity\Bookmark $bookmarks
     */
    public function removeBookmark(Bookmark $bookmarks)
    {
        $this->bookmarks->removeElement($bookmarks);
    }

    /**
     * Get bookmarks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBookmarks()
    {
        return $this->bookmarks;
    }
}
