<?php

namespace App\Controller;

use App\Repository\AddressRepository;
use App\Repository\OpeningDaysRepository;
use App\Repository\UsedCarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsedCarController extends AbstractController
{
    #[Route('/car', name: 'app_car')]
    public function index (UsedCarRepository $usedCarRepository, AddressRepository $addressRepository, OpeningDaysRepository $openingDaysRepository): Response
    {
        return $this->render('car/index.html.twig',[
        'usedCar' => $usedCarRepository->findBy([],[]),
        'address' => $addressRepository->findOneBy([],[]),
        'openingDays' => $openingDaysRepository->findBy([],[])
        ]);
    }
}