<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BookOrder
 *
 * @ORM\Table(name="book_order")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BookOrderRepository")
 */
class BookOrder
{
    /**
     * @ORM\OneToOne(targetEntity="Customer", inversedBy="bookOrder")
     */
    private $customer;

    /**
     * @ORM\OneToMany(targetEntity="Ticket", mappedBy="bookOrder")
     */
    private $ticket;

    /**
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="bookOrders")
     */
    private $event;

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
     * @ORM\Column(name="confirmationNumber", type="string", length=255, unique=true)
     */
    private $confirmationNumber;

    /**
     * @var bool
     *
     * @ORM\Column(name="confirmed", type="boolean")
     */
    private $confirmed;


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
     * Set confirmationNumber
     *
     * @param string $confirmationNumber
     * @return BookOrder
     */
    public function setConfirmationNumber($confirmationNumber)
    {
        $this->confirmationNumber = $confirmationNumber;

        return $this;
    }

    /**
     * Get confirmationNumber
     *
     * @return string 
     */
    public function getConfirmationNumber()
    {
        return $this->confirmationNumber;
    }

    /**
     * Set confirmed
     *
     * @param boolean $confirmed
     * @return BookOrder
     */
    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;

        return $this;
    }

    /**
     * Get confirmed
     *
     * @return boolean 
     */
    public function getConfirmed()
    {
        return $this->confirmed;
    }
}
