<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\BookOrder;
use AppBundle\Form\BookOrderType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="main")
     */
    public function indexAction()
    {
        $bookOrder = new BookOrder();
        $form = $this->createForm(BookOrderType::class, $bookOrder);

        return $this->render('AppBundle::index.html.twig', array('form' => $form->createView()));
    }

//    /**
//     * @Route("confirmation, name="confirm")
//     */
//    public function confirmAction(Request $request)
//    {
//    }
}
