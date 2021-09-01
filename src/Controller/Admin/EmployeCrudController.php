<?php

namespace App\Controller\Admin;

use App\Entity\Employe;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class EmployeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Employe::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('Nom'),
            TextField::new('Prenom'),
            DateField::new('DateNaissance', 'Date de naissance')->hideOnIndex(),
            NumberField::new('Cin'),
            NumberField::new('NumSS','N° SS'),
            TextField::new('Adresse'),
            EmailField::new('Email'),
            TelephoneField::new('Tel'),
            TextField::new('Sexe')->hideOnIndex(),
            TextField::new('Matricule')->hideOnIndex(),
            TextField::new('Poste'),
            MoneyField::new('Salaire')->setCurrency('TND'),
            NumberField::new('NumCompte', 'N° Compte')->hideOnIndex(),
            TimeField::new('HeureEntreeOfficielle', 'Entree'),
            TimeField::new('HeureSortieOfficielle','Sortie'),
            ImageField::new('Image')-> setBasePath($this->getParameter("app.path.employe_images"))
            -> onlyOnIndex(),
            ImageField::new('ImageDroite')-> setBasePath($this->getParameter("app.path.employe_images"))
            -> onlyOnIndex(),
            ImageField::new('ImageGauche')-> setBasePath($this->getParameter("app.path.employe_images"))
            -> onlyOnIndex(),
            TextareaField::new('ImageFile')-> setFormType(VichImageType::class)-> setFormTypeOption('allow_delete',false)
            -> hideOnIndex(),
            TextareaField::new('ImageDroiteFile')-> setFormType(VichImageType::class)-> setFormTypeOption('allow_delete',false)
            -> hideOnIndex(),
            TextareaField::new('ImageGaucheFile')-> setFormType(VichImageType::class)-> setFormTypeOption('allow_delete',false)
            -> hideOnIndex(),
            AssociationField::new('fiches')->hideOnForm()
            
        ];
    }

    
   

    /*public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // set this option if you prefer the page content to span the entire
            // browser width, instead of the default design which sets a max width
            ->renderContentMaximized()
    
            // set this option if you prefer the sidebar (which contains the main menu)
            // to be displayed as a narrow column instead of the default expanded design
            ->renderSidebarMinimized()
            ->showEntityActionsAsDropdown()
        ;
    }*/
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Liste des employés')
        ;
    }


}
