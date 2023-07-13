<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use App\Repository\AddressRepository;
use App\Repository\OpeningDaysRepository;
use App\Form\ContactType;
use App\Repository\UsedCarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ContactController extends AbstractController
{
    private $entityManager;
    private $contactRepository;

    public function __construct(EntityManagerInterface $entityManager, ContactRepository $contactRepository)
    {
        $this->entityManager = $entityManager;
        $this->contactRepository = $contactRepository;
    }
    #[Route('/contact', name: 'app_contact')]
    public function new(Request $request,AddressRepository $addressRepository, OpeningDaysRepository $openingDaysRepository, UsedCarRepository $usedCarRepository ): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        // Créer le formulaire de contact
        $form = $this->createForm(ContactType::class, $contact);

        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($contact);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_contact_success');
        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView(),
            'address' => $addressRepository->findOneBy([],[]),
            'openingDays' => $openingDaysRepository->findBy([],[]),
            'usedCar' => $usedCarRepository->findBy([],[])
        ]);
    }

    #[Route('/contact/success', name: 'app_contact_success', methods: ['GET'])]
    public function success(): Response
    {
        return $this->render('contact/success.html.twig');
    }

    #[Route('/admin', name: 'admin_contact')]
    public function adminContact(): Response
    {
        $contact = $this->contactRepository->findAll();

        return $this->render('contact/admin_contact.html.twig', [
            'contact' => $contact,
        ]);
    }

    #[Route('/admin/contact/approve/{id}', name: 'admin_contact_approve')]
    public function approveContact(Contact $contact): Response
    {
        $contact->setApproved(true);
        $this->entityManager->flush();

        return $this->redirectToRoute('admin_contact');
    }

    #[Route('/admin/contact/disapprove/{id}', name: 'admin_contact_disapprove')]
    public function disapproveContact(Contact $contact): Response
    {
        $contact->setApproved(false);
        $this->entityManager->flush();

        return $this->redirectToRoute('admin_contact');
    }
}
