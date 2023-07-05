<?php

namespace App\Controller;

use App\Repository\AddressRepository;
use App\Repository\OpeningDaysRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    #[Route('/menu', name: 'app_menu')]
    public function footer (AddressRepository $addressRepository, OpeningDaysRepository $openingDaysRepository)
    {
        /*return $this->render('menu/footer.html.twig',[
            'address' => $addressRepository->findOneBy([],[]),
            'openingDays' => $openingDaysRepository->findBy([],[])
        ]);*/
    }
}
