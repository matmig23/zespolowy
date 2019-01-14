<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends Controller
{
    /**
     * @Route("/Contact/index", name="contact_form")
     */
    public function contactAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('from', EmailType::class)
            ->add('message', TextareaType::class)
            ->add('send', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $data = $form->getData();

            dump($data);

            $message=\Swift_Message::newInstance()
                ->setSubject('Support Form Submission')
                ->setFrom($data['from'])
                ->setTo('mateusz.migdal23@gmail.com')
                ->setBody(
                    $form->getData()['message'],
                        'text/plain'
                )
             ;
            $this->get('mailer')->send($message);
        }

        return $this->render('Contact/index.html.twig', [
            'our_form' => $form->createView()


            ]);
    }
}
