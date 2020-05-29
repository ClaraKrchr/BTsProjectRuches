<?php

namespace App\Controller;

use App\Entity\CRuche;
use App\Entity\CRucher;
use App\Entity\AssociationRucheRucher;
use App\Entity\AssociationRucheApiculteur;
use App\Entity\MesuresStations;
use App\Entity\MesuresRuches;
use App\Entity\AssociationRucherRegion;
use App\Entity\Regions;
use function Symfony\Component\DependencyInjection\Exception\__toString;
use App\Entity\CApiculteur;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Doctrine\ORM\EntityManagerInterface;

class NouvellepageController extends AbstractController
{
    
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('base.html.twig');
    }
    
    
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/ruches_privees", name="ruches_privees")
     */
    public function ruches_privees()
    {
        //--------Obtention du nom ce l'utilisateur----------------//
        $NomProprietaire=$this->getUser();
        
        //------------Recherche des ruches appartenant a l'utilisateur connect�-------------//
        $RuchesApiculteurs = $this->getDoctrine()->getRepository(AssociationRucheApiculteur::class)->findBy(array('apiculteur'=>$NomProprietaire));
        return $this->render('Ruches/ruches_privees.html.twig', ['apiculteurs' => $RuchesApiculteurs]);
    }
    
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/googleMap", name="googleMap")
     */
    public function googleMap(){
        $ruchers = $this->getDoctrine()->getRepository(CRucher::class)->findAll();
        return $this->render('map/googleMap.html.twig', ['ruchers' => $ruchers,]);
    }
    /**
     * @Route("/change_locale/{locale}", name="change_locale")
     */
    public function changeLocale($locale, Request $request){
        // on stocke la langue demand�e dans la session
        $request->getSession()->Set('_locale',$locale);
        
        // on reviens sur la page pr�c�dente
        return $this->redirect($request->headers->get('referer'));
    }
    
}
  