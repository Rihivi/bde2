<?php

namespace Main\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentary
 *
 * @ORM\Table(name="commentary")
 * @ORM\Entity(repositoryClass="Main\MainBundle\Repository\CommentaryRepository")
 */
class Commentary
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
     * @ORM\OneToOne(targetEntity="UsersBundle\Entity\Users", cascade={"persist","delete"})
     * @ORM\JoinColumn{nullable=false}
     */
    private $user;
    
    /*
     * @ORM\OneToOne(targetEntity="MainBundle\Entity\Picture")
     * @ORM\JoinColumn{nullable=false}
     */
    private $picture;

    /**
     * @var string
     *
     * @ORM\Column(name="Text", type="string", length=255)
     */
    private $text;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCommentary", type="datetime")
     */
    private $dateCommentary;


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
     * Set text
     *
     * @param string $text
     * @return Commentary
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set dateCommentary
     *
     * @param \DateTime $dateCommentary
     * @return Commentary
     */
    public function setDateCommentary($dateCommentary)
    {
        $this->dateCommentary = $dateCommentary;

        return $this;
    }

    /**
     * Get dateCommentary
     *
     * @return \DateTime 
     */
    public function getDateCommentary()
    {
        return $this->dateCommentary;
    }
}
