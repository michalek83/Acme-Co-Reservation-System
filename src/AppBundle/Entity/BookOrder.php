<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Request;


/**
 * BookOrder
 *
 * @ORM\Table(name="book_order")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BookOrderRepository")
 */
class BookOrder
{
    /**
     * @ORM\OneToOne(targetEntity="Customer", cascade="persist", inversedBy="bookOrder")
     */
    private $customer;

    /**
     * @ORM\OneToOne(targetEntity="Ticket", cascade="persist", inversedBy="bookOrder")
     */
    private $ticket;

    /**
     * @ORM\ManyToOne(targetEntity="Event", cascade="persist", inversedBy="bookOrders")
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
     * Constructor
     */
    public function __construct()
    {
        $this->tickets = new \Doctrine\Common\Collections\ArrayCollection();
        $this->confirmationNumber = substr(md5(rand()), 0 ,8);
        $this->confirmed = '0';
    }

//    public function isConfirmationNumberExist(Request $request){
//        $isConfirmationNumberExist = $this->getDoctrine()->getManager()->getRepository('AppBundle:BookOrder')
//                                        ->findBy(['confirmationNumber' => $this->confirmationNumber]);
////        if (count($isConfirmationNumberExist) === 1){
////            return true;
////        }else{
////            return false;
////        }
//        return $isConfirmationNumberExist;
//    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

//    /**
//     * Set confirmationNumber
//     *
//     * @return BookOrder
//     */
//    private function setConfirmationNumber()
//    {
//        $this->confirmationNumber = substr(md5(rand()), 0 ,8);
//
//        return $this;
//    }

    /**
     * Get confirmationNumber
     *
     * @return string 
     */
    public function getConfirmationNumber()
    {
        return $this->confirmationNumber;
    }

//    /**
//     * Set confirmed
//     *
//     * @param boolean $confirmed
//     * @return BookOrder
//     */
//    public function setConfirmed($confirmed)
//    {
//        $this->confirmed = $confirmed;
//
//        return $this;
//    }

    /**
     * Get confirmed
     *
     * @return boolean 
     */
    public function getConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * Set customer
     *
     * @param \AppBundle\Entity\Customer $customer
     * @return BookOrder
     */
    public function setCustomer(\AppBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \AppBundle\Entity\Customer 
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Add ticket
     *
     * @param \AppBundle\Entity\Ticket $ticket
     * @return BookOrder
     */
    public function setTicket(\AppBundle\Entity\Ticket $ticket)
    {
        $this->ticket[] = $ticket;

        return $this;
    }

    /**
     * Remove ticket
     *
     * @param \AppBundle\Entity\Ticket $ticket
     */
    public function removeTicket(\AppBundle\Entity\Ticket $ticket)
    {
        $this->ticket->removeElement($ticket);
    }

    /**
     * Get ticket
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    /**
     * Set event
     *
     * @param \AppBundle\Entity\Event $event
     * @return BookOrder
     */
    public function setEvent(\AppBundle\Entity\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \AppBundle\Entity\Event 
     */
    public function getEvent()
    {
        return $this->event;
    }
}
