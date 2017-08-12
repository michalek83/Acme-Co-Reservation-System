<?php

namespace AppBundle\Controller;

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
    public function mainAction()
    {
        $bookOrder = new BookOrder();
        $form = $this->createForm( BookOrderType::class);

        return $this->render( 'AppBundle:User:new_user.html.twig', array(
            'form' => $form->createView()
        ) );
    }
}
