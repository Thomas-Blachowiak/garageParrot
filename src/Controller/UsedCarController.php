<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\UsedCar;
use App\Form\ContactType;
use App\Repository\AddressRepository;
use App\Repository\ContactRepository;
use App\Repository\OpeningDaysRepository;
use App\Repository\UsedCarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class UsedCarController extends AbstractController
{
    private $entityManager;
    private $contactRepository;

    public function __construct(EntityManagerInterface $entityManager, ContactRepository $contactRepository)
    {
        $this->entityManager = $entityManager;
        $this->contactRepository = $contactRepository;
    }
    #[Route('/car', name: 'app_car', methods: ['GET', 'POST'])]
    public function index (UsedCarRepository $usedCarRepository, 
                        AddressRepository $addressRepository, 
                        OpeningDaysRepository $openingDaysRepository,
                        Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($contact);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_contact_success');
        }
        
        return $this->render('car/index.html.twig',[
        'usedCar' => $usedCarRepository->findBy([],[]),
        'address' => $addressRepository->findOneBy([],[]),
        'openingDays' => $openingDaysRepository->findBy([],[]),
        'form' => $form,
        ]);
    }
}