<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\PostRepository;

class HomeController extends AbstractController
{
    /**
     * @Route({
     *     "vi": "/",
     *     "en": "/en"
     * })
     */
    public function index(PostRepository $postRepository)
    {
        $posts = $postRepository->findAll();
        return $this->render('home/index.html.twig',[
            'posts' => $posts
        ]);
    }
}