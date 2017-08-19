<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\BookOrder;
use AppBundle\Entity\Customer;
use AppBundle\Form\BookOrderType;
use AppBundle\Form\CustomerType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="main")
     */
    public function indexAction(Request $request)
    {
        $bookOrder = new BookOrder();
        $form = $this->createForm(BookOrderType::class, $bookOrder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bookOrder);
            var_dump($bookOrder);
            $em->flush();

            $url = $this->generateUrl('confirm', ['id' => $bookOrder->getId()]);

//            return $this->redirect($url);
        }
        return $this->render('AppBundle::index.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/confirmation/{id}", name="confirm")
     */
    public function confirmationAction($id, Request $request)
    {
        $bookOrderRepository = $this->getDoctrine()->getRepository('AppBundle:BookOrder');
        $eventRepository = $this->getDoctrine()->getRepository('AppBundle:Event');
        $ticketRepository = $this->getDoctrine()->getRepository('AppBundle:Ticket');
        $customerRepository = $this->getDoctrine()->getRepository('AppBundle:Customer');

        $bookOrder = $bookOrderRepository->find($id);

        $confirmationNumber = $bookOrder->getConfirmationNumber();
        $customerId = $bookOrder->getCustomer()->getId();
        $eventId = $bookOrder->getEvent()->getId();
//        $ticketId = $bookOrder->getTicket()->getId();

        $event = $eventRepository->find($eventId);
        $eventName = $event->getName();
        $eventDesciption = $event->getDescription();

        $customer = $customerRepository->find($customerId);
        $customerName = $customer->getName();
        $customerEmail = $customer->getEmail();
        $customerPhone = $customer->getTelephone();
        $customerGender = $customer->getGender();

//        $ticket = $ticketRepository->find($ticketId);

        var_dump($bookOrder->getTicket());

        return $this->render('AppBundle::confirmation.html.twig');

    }
}
