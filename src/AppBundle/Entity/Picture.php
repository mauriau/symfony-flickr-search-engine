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
     * @ORM\Column(name="idFlickr", type="integer")
     */
    protected $idFlickr;

    /*
     *@ORM\ManyToMany(targetEntity="AppBundle\Entity\Bookmark", cascade={"persist"})
     */
    protected $bookmark;


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
     * Set idFlickr
     *
     * @param integer $idFlickr
     * @return Picture
     */
    public function setIdFlickr($idFlickr)
    {
        $this->idFlickr = $idFlickr;

        return $this;
    }

    /**
     * Get idFlickr
     *
     * @return integer 
     */
    public function getIdFlickr()
    {
        return $this->idFlickr;
    }
}
