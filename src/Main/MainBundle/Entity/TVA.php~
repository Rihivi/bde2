<?php

namespace Main\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TVA
 *
 * @ORM\Table(name="tva")
 * @ORM\Entity(repositoryClass="Main\MainBundle\Repository\TVARepository")
 */
class TVA
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
     * @var float
     *
     * @ORM\Column(name="Multiplier", type="float")
     */
    private $multiplier;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;


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
     * Set multiplier
     *
     * @param float $multiplier
     * @return TVA
     */
    public function setMultiplier($multiplier)
    {
        $this->multiplier = $multiplier;

        return $this;
    }

    /**
     * Get multiplier
     *
     * @return float 
     */
    public function getMultiplier()
    {
        return $this->multiplier;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return TVA
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}
