<?php

namespace App\Controller\Front;

use App\Entity\Contact;
use App\Form\ContactType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request)
    {
        $contact = new Contact;
        $contact->setUpdatedAt(new DateTime('now'));
        $contact->setCreatedAt(new DateTime('now'));
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        // \dd($form->isSubmitted());
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
