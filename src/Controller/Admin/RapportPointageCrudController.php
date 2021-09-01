<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

use App\Entity\RapportPointage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class RapportPointageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RapportPointage::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('Employe'),
            NumberField::new('HeuresParJour', 'Nombre heures/Jour'),
            NumberField::new('HeuresParMois', 'Nombre heures/Mois'),
            IntegerField::new('JoursParSemaine', 'Nombre jours/semaine'),
            TimeField::new('PointageEntree'),
            TimeField::new('PointageSortie'),
            TimeField::new('Retard'),
           
            

        ];
    }
   /* public function configureCrud(Crud $crud): Crud
{
    return $crud
        // set this option if you prefer the page content to span the entire
        // browser width, instead of the default design which sets a max width
        ->renderContentMaximized()

        // set this option if you prefer the sidebar (which contains the main menu)
        // to be displayed as a narrow column instead of the default expanded design
        ->renderSidebarMinimized()
    ;
}*/

/*public function configureActions(Actions $actions): Actions
{
    return $actions
        ->remove(Crud::PAGE_INDEX, Action::NEW)
        ->remove(Crud::PAGE_INDEX, Action::EDIT)
        ->remove(Crud::PAGE_INDEX, Action::DELETE)


    ;
}*/
    
}
