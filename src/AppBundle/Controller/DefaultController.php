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
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

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
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($bookOrder);
//            $em->flush();

            return $this->redirectToRoute('confirm');
        }

        return $this->render('AppBundle::index.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/confirmation", name="confirm")
     */
    public function confirmationAction()
    {
//        $bookOrder = new BookOrder();
//        $form = $this->createForm(BookOrderType::class, $bookOrder);
//        $form->handleRequest($request);
//        var_dump($form);
        return $this->render('AppBundle::confirmation.html.twig');

    }
}
