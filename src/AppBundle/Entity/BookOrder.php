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
}
