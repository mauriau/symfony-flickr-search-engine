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
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="idInsta", type="integer")
     */
    private $idInsta;

    /*
     *@ORM\ManyToMany(targetEntity="AppBundle\Entity\Bookmark", cascade={"persist"})
     */
    private $bookmark;


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
     * Set idInsta
     *
     * @param integer $idInsta
     * @return Picture
     */
    public function setIdInsta($idInsta)
    {
        $this->idInsta = $idInsta;

        return $this;
    }

    /**
     * Get idInsta
     *
     * @return integer 
     */
    public function getIdInsta()
    {
        return $this->idInsta;
    }
}
