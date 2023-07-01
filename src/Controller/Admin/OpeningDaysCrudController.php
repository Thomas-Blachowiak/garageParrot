<?php

namespace App\Controller\Admin;

use App\Entity\OpeningDays;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OpeningDaysCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OpeningDays::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->remove(Crud::PAGE_INDEX, Action::NEW);
    }
    public function configureFields(string $pageName): iterable
    {
        yield    TextField::new('days', 'Nom du jour');
        yield    TextField::new('open', 'Horaire d\'ouverture');
    }
}
