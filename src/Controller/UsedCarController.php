<?php

namespace App\Controller;

use App\Repository\AddressRepository;
use App\Repository\ContactRepository;
use App\Repository\OpeningDaysRepository;
use App\Repository\UsedCarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ContactType;


class UsedCarController extends AbstractController
{
    private $entityManager;
    private $contactRepository;

    public function __construct(EntityManagerInterface $entityManager, ContactRepository $contactRepository)
    {
        $this->entityManager = $entityManager;
        $this->contactRepository = $contactRepository;
    }
    #[Route('/car', name: 'app_car')]
    public function index (UsedCarRepository $usedCarRepository, 
                        AddressRepository $addressRepository, 
                        OpeningDaysRepository $openingDaysRepository,
                        ContactRepository $contactRepository,
                        Request $request): Response
    {
            $contact = new Contact();
            $form = $this->createForm(ContactType::class, $contact);
    
        // Créer le formulaire de contact
        $form = $this->createForm(ContactType::class, $contact);
    
            
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) {
                $this->entityManager->persist($contact);
                $this->entityManager->flush();
    
                return $this->redirectToRoute('app_car_success');
            }

        return $this->render('car/index.html.twig',[
        'usedCar' => $usedCarRepository->findBy([],[]),
        'address' => $addressRepository->findOneBy([],[]),
        'openingDays' => $openingDaysRepository->findBy([],[]),
        'contact' => $contactRepository->findBy([], []),
        'form' => $form->createView()
        ]);
    }
    #[Route('/car/success', name: 'app_car_success', methods: ['GET'])]
    public function success(): Response
    {
        return $this->render('car/success.html.twig');
    }


}