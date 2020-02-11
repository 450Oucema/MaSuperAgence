<?php
namespace App\Controller;


use App\Repository\PropertyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Property;

class PropertyController extends AbstractController {


    /**
     * @var PropertyRepository
     */
    private $repository;
    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(PropertyRepository $repository, EntityManagerInterface $em )
{

    $this->repository = $repository;
    $this->em = $em;
}

    /**
     * @Route("/biens", name="property.index")
     * @return Response
     * @param Property $property
     */

    public function index(): Response {

        return $this->render('property/index.html.twig',[
            'current_menu' => 'properties'
        ]);
    }

    /**
     * @Route("/biens/{slug}-{id}", name="property.show", requirements={"slug": "[a-z0-9\-]*"})
     * @return Response
     */
    public function show(Property $property, string $slug): Response {
        if($property->getSlug() ==! $slug){
         return  $this->redirectToRoute('property.show',[
                'id'=>$property->getId(),
                'slug'=>$property->getSlug()
            ], 301);
        }
        return $this->render('property/show.html.twig',[
            'current_menu'=>'properties',
            'property'=> $property
            ]);
    }
}