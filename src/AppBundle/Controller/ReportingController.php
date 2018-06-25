<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;




class ReportingController extends Controller
{
    /**
     * @Route("/listCourse")
     */
    public function listCourseAction()
    {
        //Form
        $form = $this->createFormBuilder()
            ->add('search', SearchType::class)
            ->add('submit', SubmitType::class, array('label' => 'Rechercher'))
            ->getForm();

        //Handle du formulaire 
        // $form->handleRequest();
        //puis test submit ou pas
            //Si submit
                //Récup de repository associé et appel de la fonction de recherche adéquate

        
        return $this->render('AppBundle:Reporting:list_course.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
