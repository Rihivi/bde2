<?php

namespace Main\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activity
 *
 * @ORM\Table(name="activity")
 * @ORM\Entity(repositoryClass="Main\MainBundle\Repository\ActivityRepository")
 */
class Activity
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
     * @ORM\OneToOne(targetEntity="User\UserBundle\Entity\User")
     * @ORM\JoinColumn{nullable=false}
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateActivity", type="datetime")
     */
    private $dateActivity;

    /**
     * @var float
     *
     * @ORM\Column(name="Price", type="float")
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="PictureSource", type="string", length=255)
     */
    private $pictureSource;

//    /**
//     * @ORM\ManyToMany(targetEntity="Main\MainBundle\Entity\Media", cascade={"persist","remove"})
//     * @ORM\JoinColumn(nullable=false)
//     */
//    private $media;
    /**
     * @ORM\ManyToMany(targetEntity="Main\MainBundle\Entity\Media", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $media;
    
    /**
     * @ORM\ManyToMany(targetEntity="Main\MainBundle\Entity\Commentary", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $Commentary;

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Commentary = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add commentary
     *
     * @param \Main\MainBundle\Entity\Commentary $commentary
     *
     * @return Activity
     */
    public function addCommentary(\Main\MainBundle\Entity\Commentary $commentary)
    {
        $this->Commentary[] = $commentary;

        return $this;
    }

    /**
     * Remove commentary
     *
     * @param \Main\MainBundle\Entity\Commentary $commentary
     */
    public function removeCommentary(\Main\MainBundle\Entity\Commentary $commentary)
    {
        $this->Commentary->removeElement($commentary);
    }

    /**
     * Get commentary
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentary()
    {
        return $this->Commentary;
    }

    /**
     * Add medium
     *
     * @param \Main\MainBundle\Entity\Media $medium
     *
     * @return Activity
     */
    public function addMedia(\Main\MainBundle\Entity\Media $medium)
    {
        $this->media[] = $medium;

        return $this;
    }

    /**
     * Remove medium
     *
     * @param \Main\MainBundle\Entity\Media $medium
     */
    public function removeMedia(\Main\MainBundle\Entity\Media $medium)
    {
        $this->media->removeElement($medium);
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
     * Set name
     *
     * @param string $name
     *
     * @return Activity
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

    /**
     * Set dateActivity
     *
     * @param \DateTime $dateActivity
     *
     * @return Activity
     */
    public function setDateActivity($dateActivity)
    {
        $this->dateActivity = $dateActivity;

        return $this;
    }

    /**
     * Get dateActivity
     *
     * @return \DateTime
     */
    public function getDateActivity()
    {
        return $this->dateActivity;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Activity
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Activity
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set pictureSource
     *
     * @param string $pictureSource
     *
     * @return Activity
     */
    public function setPictureSource($pictureSource)
    {
        $this->pictureSource = $pictureSource;

        return $this;
    }

    /**
     * Get pictureSource
     *
     * @return string
     */
    public function getPictureSource()
    {
        return $this->pictureSource;
    }

    /**
     * Set user
     *
     * @param \User\UserBundle\Entity\User $user
     *
     * @return Activity
     */
    public function setUser(\User\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \User\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get media
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedia()
    {
        return $this->media;
    }
}
