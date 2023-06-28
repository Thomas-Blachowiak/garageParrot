<?php

namespace App\Controller;

use App\Repository\UsedCarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    #[Route('/car', name: 'app_car')]
    public function index (UsedCarRepository $usedCarRepository): Response
    {
        return $this->render('car/index.html.twig',[
        'usedCar' => $usedCarRepository->findBy([],[])
        ]);
    }
}
