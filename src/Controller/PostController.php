<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Post;
use App\Form\PostFormType;

class PostController extends AbstractController
{
    /**
     * @Route({
     *     "vi": "/post/new",
     *     "en": "/en/post/new"
     * })
     */
    public function add(Request $request)
    {
        $post = new Post();
        $form = $this->createForm(PostFormType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post->setIsActive(1);
            $post->setUser($this->getUser());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($post);
            $entityManager->flush();

            return $this->redirectToRoute('app_home_index');
        }

        return $this->render('post/new.html.twig', [
            'postForm' => $form->createView()
        ]);
    }

    /**
     * @Route({"vi":"/posts/{id}", "en":"en/posts/{id}"}, methods={"GET"})
     */
    public function show(Post $post): Response
    {
        return $this->render('post/show.html.twig', [
            'post' => $post,
        ]);
    }
}