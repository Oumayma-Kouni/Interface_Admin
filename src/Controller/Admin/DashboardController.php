<?php

namespace App\Controller\Admin;

use App\Entity\Calendar;
use App\Entity\Employe;
use App\Entity\Fiche;
use App\Entity\RapportPointage;
use App\Entity\User;
use App\Repository\CalendarRepository;
use App\Repository\EmployeRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use Symfony\Component\Security\Core\User\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;

class DashboardController extends AbstractDashboardController
{
    /**
     * @var EmployeRepository
     */
    private EmployeRepository $employeRepository;

    /**
     * @var  CalendarRepository
     */
    public CalendarRepository $calendarRepository;

    public function __construct(EmployeRepository $employeRepository, CalendarRepository $calendarRepository)
    {
        $this->employeRepository = $employeRepository;
        $this->calendarRepository = $calendarRepository;
        
    
    }

    /**
     * @Route("/", name="admin")
    
     */
    
     
    public function index(): Response
    {
        
        //$events = $this->getDoctrine()->getRepository(Calendar::class) ->findAll();
        $events = $this->calendarRepository -> findAll();

        $rdvs = [];
        foreach($events as $event){
            $rdvs[]= [
                'id' => $event->getId(),
                'start' => $event->getStart()-> format ('Y-m-d H:i:s'),
                'end' => $event->getEnd()-> format ('Y-m-d H:i:s'),
                'title' => $event->getTitle(),
                'description' => $event->getDescription(),
                'backgroundColor' => $event->getBackgroundColor(),
                'borderColor' => $event->getBorderColor(),
                'textColor' => $event->getTextColor(),
                'allDay' => $event->getAllDay(),
            ];
        }
        $data = json_encode($rdvs);

        

        return $this->render('bundles/EasyAdminBundle/welcome.html.twig',compact('data'));
        //$routeBuilder = $this->get(AdminUrlGenerator::class);
        //return $this->redirect($routeBuilder->setController(EmployeCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Interface Admin')
            ->setFaviconPath('assets/front/img/favicon.png')
            ->setTextDirection('ltr');
    }
    public function configureAssets(): Assets
    {
        return Assets::new()
            ->addCssFile('bundles/easyadmin/css/style.css');

    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        return parent::configureUserMenu($user)
            ->setName($user->getUsername())
            ->displayUserName(true)
            //->setAvatarUrl('https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_1280.png')
            //->setAvatarUrl($user->getProfileImageUrl())
            ->displayUserAvatar(true)
            ->setGravatarEmail($user->getUsername())

            ->addMenuItems([
                //MenuItem::linkToLogout('Logout', 'fa fa-sign-out'),
            ]);
    }

    public function configureMenuItems(): iterable

    {
       // yield MenuItem::section('Blog');
        yield MenuItem::linktoDashboard('Tableau de bord', 'fa fa-home');
        yield MenuItem::linkToCrud('Évènement', 'far fa-calendar-alt', Calendar::class);
         yield MenuItem::linkToCrud('Employé', 'fas fa-list', Employe::class);
         yield MenuItem::linkToCrud('Rapport de pointage', 'fas fa-book-open', RapportPointage::class);
         yield MenuItem::linkToCrud('Fiche de paie', 'fas fa-id-badge', Fiche::class);
         
         //yield MenuItem::linkToCrud('Users', 'fas fa-user', User::class);
         //yield MenuItem::linkToLogout('Logout', 'fa fa-exit');
         
    }

   

    
}
