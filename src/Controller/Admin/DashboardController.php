<?php

namespace App\Controller\Admin;

use App\Entity\UsedCar;
use App\Entity\User;
use App\Entity\Testimonial;
use App\Entity\Contact;
use App\Entity\Services;
use App\Entity\Address;
use App\Entity\OpeningDays;
use App\Entity\Image;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    )
    {
    }
    #[IsGranted('ROLE_USER')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
        ->setController(UsedCarCrudController::class)
        ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<img src="./image/logo.jpeg"></span>')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToUrl('Accueil', 'fa fa-home', '/');

        yield MenuItem::subMenu('Annonce', 'fas fa-car')->setSubItems([
            MenuItem::linkToCrud('Créer une nouvelle annonce', 'fas fa-car', UsedCar::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Aperçue des annonces', 'fas fa-eye', UsedCar::class)
        ]);
        yield  MenuItem::linkToCrud('Image', 'fas fa-images', Image::class);


        yield MenuItem::subMenu('Témoignages', 'fas fa-car')->setSubItems([
            MenuItem::linkToCrud('Créer un nouveau témoignage', 'fas fa-car', Testimonial::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Aperçue des témoignages', 'fas fa-eye', Testimonial::class)
        ]);

        yield  MenuItem::linkToCrud('Demandes client', 'fas fa-comments', Contact::class);


        if ($this->isGranted('ROLE_ADMIN')) {
            yield MenuItem::subMenu('Utilisateur', 'fas fa-users')->setSubItems([
                MenuItem::linkToCrud('Créer un utilisateur', 'fas fa-user', User::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Aperçu des utilisateurs', 'fas fa-eye', User::class)
            ]);
        }

        if ($this->isGranted('ROLE_ADMIN')) {
            yield MenuItem::subMenu('Services proposés', 'fas fa-bell-concierge')->setSubItems([
                MenuItem::linkToCrud('Créer un services', 'fas fa-bell-concierge', Services::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Aperçu des services', 'fas fa-eye', Services::class)
            ]);
        }

        if ($this->isGranted('ROLE_ADMIN')) {
            yield MenuItem::subMenu('Adresse', 'fas fa-location-dot')->setSubItems([
                MenuItem::linkToCrud('Coordonnée du garage', 'fas fa-location-dot', Address::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Aperçu des coordonnées', 'fas fa-eye', Address::class)
            ]);
        }

        if ($this->isGranted('ROLE_ADMIN')) {
            yield MenuItem::subMenu('Jours d\'ouverture', 'fas fa-door-open')->setSubItems([
                MenuItem::linkToCrud('Modifier les horaires', 'fas fa-door-open', OpeningDays::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Aperçu des horaires', 'fas fa-eye', OpeningDays::class)
            ]);
        }
    }
}
