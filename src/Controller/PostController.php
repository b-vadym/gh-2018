<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends AbstractController
{
    /**
     * @return Response
     */
    public function list(): Response
    {
        return $this->render('post/list.html.twig', [
            'posts' => $this->getDoctrine()->getRepository(Post::class)->findAll(),
        ]);
    }

    /**
     * @param Post $post
     * @throws NotFoundHttpException
     */
    public function show(Post $post): Response
    {
        return $this->render('post/show.html.twig', [
            'post' => $post,
        ]);
    }

    /**
     * @param int $id
     * @param Post $post
     * @return Response
     */
    public function edit(Post $post): Response
    {
        $this->denyAccessUnlessGranted('edit', $post);
        //TODO: implement post edit functionality
        return new Response('post edit');
    }
}
