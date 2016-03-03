<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Picture
 *
 * @ORM\Table(name="picture")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PictureRepository")
 */
class Picture
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
     * @var int
     *
     * @ORM\Column(name="flickr_id", type="integer")
     */
    protected $flickr_id;

    /**
     * @var int
     *
     * @ORM\Column(name="flickr_farmid", type="integer")
     */
    protected $flickr_farmid;

    /**
     * @var int
     *
     * @ORM\Column(name="flickr_servid", type="integer")
     */
    protected $flickr_servid;

    /**
     * @var string
     *
     * @ORM\Column(name="flickr_secret", type="string", length=100)
     */
    protected $flickr_secret;
    /*
     *@ORM\ManyToMany(targetEntity="AppBundle\Entity\Bookmark", cascade={"persist"})
     */
    protected $bookmarks;

    /**
     * @var string
     *
     * @ORM\Column(name="create_at", type="datetime")
     */
    private $created_at;



    public function __construct()
    {
        $this->created_at = new \Datetime('now');
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
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Picture
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
     * Set flickr_id
     *
     * @param integer $flickrId
     * @return Picture
     */
    public function setFlickrId($flickrId)
    {
        $this->flickr_id = $flickrId;

        return $this;
    }

    /**
     * Get flickr_id
     *
     * @return integer 
     */
    public function getFlickrId()
    {
        return $this->flickr_id;
    }

    /**
     * Set flickr_farmid
     *
     * @param integer $flickrFarmid
     * @return Picture
     */
    public function setFlickrFarmid($flickrFarmid)
    {
        $this->flickr_farmid = $flickrFarmid;

        return $this;
    }

    /**
     * Get flickr_farmid
     *
     * @return integer 
     */
    public function getFlickrFarmid()
    {
        return $this->flickr_farmid;
    }

    /**
     * Set flickr_servid
     *
     * @param integer $flickrServid
     * @return Picture
     */
    public function setFlickrServid($flickrServid)
    {
        $this->flickr_servid = $flickrServid;

        return $this;
    }

    /**
     * Get flickr_servid
     *
     * @return integer 
     */
    public function getFlickrServid()
    {
        return $this->flickr_servid;
    }

    /**
     * Set flickr_secret
     *
     * @param string $flickrSecret
     * @return Picture
     */
    public function setFlickrSecret($flickrSecret)
    {
        $this->flickr_secret = $flickrSecret;

        return $this;
    }

    /**
     * Get flickr_secret
     *
     * @return string 
     */
    public function getFlickrSecret()
    {
        return $this->flickr_secret;
    }
}
