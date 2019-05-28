<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    /**
     * @Route({
     *     "vi": "/",
     *     "en": "/en"
     * })
     */
    public function index()
    {
        return $this->render('home/index.html.twig');
    }
}