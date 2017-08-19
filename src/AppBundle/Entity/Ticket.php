<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket
 *
 * @ORM\Table(name="ticket")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TicketRepository")
 */
class Ticket
{
    /**
     * @ORM\OneToOne(targetEntity="BookOrder", cascade="persist", mappedBy="ticket")
     */
    private $bookOrder;

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
     * @ORM\Column(name="adult", type="integer")
     */
    private $adult;

    /**
     * @var int
     *
     * @ORM\Column(name="child", type="integer")
     */
    private $child;

    /**
     * @var int
     *
     * @ORM\Column(name="senior", type="integer")
     */
    private $senior;


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
     * Set adult
     *
     * @param integer $adult
     * @return Ticket
     */
    public function setAdult($adult)
    {
        $this->adult = $adult;

        return $this;
    }

    /**
     * Get adult
     *
     * @return integer 
     */
    public function getAdult()
    {
        return $this->adult;
    }

    /**
     * Set child
     *
     * @param integer $child
     * @return Ticket
     */
    public function setChild($child)
    {
        $this->child = $child;

        return $this;
    }

    /**
     * Get child
     *
     * @return integer 
     */
    public function getChild()
    {
        return $this->child;
    }

    /**
     * Set senior
     *
     * @param integer $senior
     * @return Ticket
     */
    public function setSenior($senior)
    {
        $this->senior = $senior;

        return $this;
    }

    /**
     * Get senior
     *
     * @return integer 
     */
    public function getSenior()
    {
        return $this->senior;
    }

    /**
     * Set bookOrder
     *
     * @param \AppBundle\Entity\BookOrder $bookOrder
     * @return Ticket
     */
    public function setBookOrder(\AppBundle\Entity\BookOrder $bookOrder = null)
    {
        $this->bookOrder = $bookOrder;

        return $this;
    }

    /**
     * Get bookOrder
     *
     * @return \AppBundle\Entity\BookOrder 
     */
    public function getBookOrder()
    {
        return $this->bookOrder;
    }
}
