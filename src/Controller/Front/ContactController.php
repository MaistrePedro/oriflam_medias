<?php

namespace App\Controller\Front;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index()
    {
        $contact = new Contact;
        $form = $this->createForm(ContactType::class, $contact);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();
            
            $this->addFlash('success', 'Message enregistré');
            return $this->redirectToRoute('contact');
        }
        return $this->render('front/contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
