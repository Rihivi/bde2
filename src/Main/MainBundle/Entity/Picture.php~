<?php

namespace Main\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Picture
 *
 * @ORM\Table(name="picture")
 * @ORM\Entity(repositoryClass="Main\MainBundle\Repository\PictureRepository")
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

    /*
     * @ORM\OneToOne(targetEntity="MainBundle\Entity\Users")
     * @ORM\JoinColumn{nullable=false}
     */
    private $activity;

    /**
     * @var string
     *
     * @ORM\Column(name="Source", type="string", length=255)
     */
    private $source;

    /**
     * @var int
     *
     * @ORM\Column(name="LikePicture", type="integer")
     */
    private $likePicture;


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
     * Set source
     *
     * @param string $source
     * @return Picture
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string 
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set likePicture
     *
     * @param integer $likePicture
     * @return Picture
     */
    public function setLikePicture($likePicture)
    {
        $this->likePicture = $likePicture;

        return $this;
    }

    /**
     * Get likePicture
     *
     * @return integer 
     */
    public function getLikePicture()
    {
        return $this->likePicture;
    }
}
