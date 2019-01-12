<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Inventory;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class InventoryController extends Controller
{
    /**
     * @Route("/Inventory/index", name="inventory_list")
     */
    public function listAction(Request $request)
    {
        $inventory = $this->getDoctrine()
            ->getRepository('AppBundle:Inventory')
            ->findAll();

        return $this->render('Inventory/index.html.twig', array(
            'inventory' =>$inventory
        ));

    }

    /**
     * @Route("/Inventory/create", name="inventory_create")
     */
    public function createAction(Request $request)
    {
        $inventory = new Inventory;


        $form = $this->createFormBuilder($inventory)
            ->add('name', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom-15px')))
            ->add('category', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom-15px')))
            ->add('owner', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom-15px')))
            ->add('description', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom-15px')))
            ->add('Add', SubmitType::class, array('label' => 'Create Device', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom-15px')))
            ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            // Get Data
            $name = $form['name']->getData();
            $category = $form['category']->getData();
            $owner = $form['owner']->getData();
            $description = $form['description']->getData();





            $em = $this->getDoctrine()->getManager();

            $em->persist($inventory);
            $em->flush();

            $this->addFlash(
                'notice',
                'Device Added'
            );

            return $this->redirectToRoute('inventory_create');


        }
        return $this->render('Inventory/create.html.twig', array(
            'form' =>$form->createView()
        ));
    }


    /**
     * @Route("/Inventory/edit/{id}", name="inventory_edit")
     */
    public function editAction($id, Request $request)
    {

        $inventory = $this->getDoctrine()
            ->getRepository('AppBundle:Inventory')
            ->find($id);
        //Like create


        $inventory->setName($inventory->getName());
        $inventory->setCategory($inventory->getCategory());
        $inventory->setOwner($inventory->getOwner());
        $inventory->setDescription($inventory->getDescription());


        $form = $this->createFormBuilder($inventory)
            ->add('name', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom-15px')))
            ->add('category', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom-15px')))
            ->add('owner', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom-15px')))
            ->add('description', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom-15px')))
            ->add('Add', SubmitType::class, array('label' => 'Update Device', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom-15px')))

            ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            // Get Data
            $name = $form['name']->getData();
            $category = $form['category']->getData();
            $owner = $form['owner']->getData();
            $description = $form['description']->getData();


            $em = $this->getDoctrine()->getManager();
            $inventory = $em->getRepository('AppBundle:Inventory')->find($id);

            $inventory->setName($name);
            $inventory->setCategory($category);
            $inventory->setOwner($owner);
            $inventory->setDescription($description);

            $em->flush();

            $this->addFlash(
                'notice',
                'Task Updated'
            );

            return $this->redirectToRoute('inventory_list');
        }
        return $this->render('Inventory/edit.html.twig', array(
            'inventory' => $inventory,
            'form' =>$form->createView()
        ));

    }

    /**
    /**
     * @Route("/Inventory/details/{id}", name="inventory_details")
     */
    public function detailsAction($id)
    {

        $inventory = $this->getDoctrine()
            ->getRepository('AppBundle:Inventory')
            ->find($id);

        return $this->render('Inventory/details.html.twig', array(
            'Inventory' =>$inventory
        ));
        // replace this example code with whatever you need
        return $this->render('Inventory/details.html.twig');
    }

    /**
     * @Route("/Inventory/delete/{id}", name="inventory_delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $inventory = $em->getRepository('AppBundle:Inventory')->find($id);

        $em->remove($inventory);
        $em->flush();

        $this->addFlash(
            'notice',
            'Device Removed'
        );

        return $this->redirectToRoute('inventory_list');
    }
}
