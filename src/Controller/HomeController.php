<?php
namespace App\Controller;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HomeController extends AbstractController {

    /**
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     *
     */

    public function index(PropertyRepository $repository): Response{
        $properties = $repository->findLatest();
        return $this->render('pages/home.html.twig',[
            'current_menu' => 'home',
            'properties' => $properties
        ]);
    }
}