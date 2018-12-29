<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends Controller
{
    /**
     * @Route("/Contact/index", name="contact_form")
     */
    public function contactAction(Request $request)
    {

        // replace this example code with whatever you need
        return $this->render('Contact/index.html.twig');
    }
}
