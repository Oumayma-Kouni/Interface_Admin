<?php

namespace App\Controller\Admin;

use App\Entity\Fiche;
use App\Repository\FicheRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class FicheCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Fiche::class;
    }
    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('Employe'))
        ;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           // IdField::new('id'),
            AssociationField::new('Employe'),
            DateField::new('DatePaiement', 'Paiement du'),
            DateField::new('DatePaie', 'au'),
            NumberField::new('NbreHeuresTravail', 'Heures de Travail')->hideOnIndex(),
            NumberField::new('HeuresSupplementaires', 'Heures Supplémentaires')->hideOnIndex(),

            NumberField::new('SalaireBase', 'Salaire de base'),
            
            NumberField::new('IndemniteSupplementaires', 'Indemnités Supplémentaires'),
            NumberField::new('IndemniteDeTransport', 'Indemnités de transport'),
            NumberField::new('Prime'),
            
            NumberField::new('Impots', 'Impôts'),
            NumberField::new('Avance'),
            
            
        


        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Liste des fiches de paie')
        ;
    }
      /**
     * @Route(path="/admin/fiche/download_fiche", name="download_fiche")
     * @param Request $request
     * @param FicheRepository $ficheRepository
     * @return Response
     */

    public function DowloadFiche( Request $request) 
    {
     
        $id = $request->attributes->get('id');
        //$fiche = $ficheRepository->find($id,null,null);
        $fiche =$this->getDoctrine()->getRepository(Fiche::class) ->find($id);
        

        
        //Definir les options pdf
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        $pdfOptions->setIsRemoteEnabled(true);
       
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

       $context = stream_context_create([
           'ssl' => [
               'verify_peer' => FALSE,
               'verify_peer_name' => FALSE,
               'allow_self_signed' => TRUE
           ]
           ]);
       $dompdf->setHttpContext($context);
 
       
       //generer html 
      $html = $this-> renderView('bundles/EasyAdminBundle/fichePdf.html.twig',
    ['fiche' => $fiche]);

      $dompdf->loadHtml($html);
      $dompdf->setPaper('A4', 'portrait');
      $dompdf->render();

      $fichier = 'fichePdf.pdf';


      ob_get_clean();
      //envoyer pdf au navigateur
      $dompdf->stream($fichier, array(
        'Attachment' => 0
      ));
      //exit(0);



      return new Response();

    }

    public function configureActions(Actions $actions): Actions
    {
        $downloadPdf = Action::new('dowloadPdf', 'Imprimer' ,'fa fa-file-pdf') 
        ->linkToRoute('download_fiche', function(Fiche $entity) {
            return [
                'id' => $entity->getId()
            ];
        }); 

        return $actions
        ->add(Crud::PAGE_INDEX, $downloadPdf)
        ;

    }

   
    

  
}
