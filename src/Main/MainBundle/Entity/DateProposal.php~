<?php

namespace Main\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DateProposal
 *
 * @ORM\Table(name="date_proposal")
 * @ORM\Entity(repositoryClass="Main\MainBundle\Repository\DateProposalRepository")
 */
class DateProposal
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
     * @ORM\OneToOne(targetEntity="MainBundle\Entity\ActivityProposal")
     * @ORM\JoinColumn{nullable=false}
     */
    private $activityProposal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateProposal", type="datetime")
     */
    private $dateProposal;


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
     * Set dateProposal
     *
     * @param \DateTime $dateProposal
     * @return DateProposal
     */
    public function setDateProposal($dateProposal)
    {
        $this->dateProposal = $dateProposal;

        return $this;
    }

    /**
     * Get dateProposal
     *
     * @return \DateTime 
     */
    public function getDateProposal()
    {
        return $this->dateProposal;
    }
}
