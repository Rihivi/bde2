<?php

namespace Main\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActivityProposal
 *
 * @ORM\Table(name="activity_proposal")
 * @ORM\Entity(repositoryClass="Main\MainBundle\Repository\ActivityProposalRepository")
 */
class ActivityProposal
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
     * @var string
     *
     * @ORM\Column(name="Title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="LikeActivity", type="integer")
     */
    private $likeActivity;

    /**
     * @ORM\ManyToMany(targetEntity="User\UserBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $users;

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
     * Set title
     *
     * @param string $title
     * @return ActivityProposal
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
     * Set description
     *
     * @param string $description
     * @return ActivityProposal
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
     * Set likeActivity
     *
     * @param integer $likeActivity
     * @return ActivityProposal
     */
    public function setLikeActivity($likeActivity)
    {
        $this->likeActivity = $likeActivity;

        return $this;
    }

    /**
     * Get likeActivity
     *
     * @return integer
     */
    public function getLikeActivity()
    {
        return $this->likeActivity;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Add user
     *
     * @param \User\UserBundle\Entity\User $user
     *
     * @return ActivityProposal
     */
    public function addUser(\User\UserBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \User\UserBundle\Entity\User $user
     */
    public function removeUser(\User\UserBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}
