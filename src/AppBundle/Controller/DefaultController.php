<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\BookOrder;
use AppBundle\Entity\Customer;
use AppBundle\Entity\Ticket;
use AppBundle\Form\BookOrderType;
use AppBundle\Form\BookOrderConfirmType;
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
            $childTicket = $form->getViewData()->getTicket()->getChild();
            $adultTicket = $form->getViewData()->getTicket()->getAdult();
            $seniorTicket = $form->getViewData()->getTicket()->getSenior();

            $totalAmount = $childTicket + $adultTicket + $seniorTicket;

            //Amount of ticket validation
            if (( $totalAmount < 1) || ( $totalAmount > 6 )) {
                return $this->render('AppBundle::index.html.twig', array(
                    'form' => $form->createView(),
                    'amountError' => 1));
            }

            //amount of keepers validation
            if ((( $childTicket >= 1 ) && ($childTicket <= 4) && ($adultTicket < 1))
                || (( $childTicket > 4 ) && ($adultTicket < 2))){
                return $this->render('AppBundle::index.html.twig', array(
                    'form' => $form->createView(),
                    'keeper' => 1));
            }

            //If everything is ok, saving to db
            $em = $this->getDoctrine()->getManager();
            $em->persist($bookOrder);
            $em->flush();

            $url = $this->generateUrl('confirm', ['id' => $bookOrder->getId()]);
            return $this->redirect($url);
        }
        return $this->render('AppBundle::index.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/confirmation/{id}", name="confirm")
     */
    public function confirmationAction($id, Request $request)
    {
        $bookOrderRepository = $this->getDoctrine()->getRepository('AppBundle:BookOrder');

        $bookOrder = $bookOrderRepository->find($id);

        $bookConfirm = $this->createForm(BookOrderConfirmType::class, $bookOrder);
        $bookConfirm->handleRequest($request);

        if ($bookConfirm->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $bookOrder->setConfirmed(true);
            $em->persist($bookOrder);
            $em->flush();

            return $this->redirectToRoute( 'main' );
        }
        return $this->render('AppBundle::confirmation.html.twig', array(
            'bookOrder' => $bookOrder,
            'bookConfirm' => $bookConfirm->createView()
        ));

    }
}
