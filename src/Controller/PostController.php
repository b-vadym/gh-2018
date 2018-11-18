<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends AbstractController
{
    /**
     * @return Response
     */
    public function list(): Response
    {
        return new Response('<html><body>foo</body></html>');
    }

    /**
     * @param int $id
     * @throws NotFoundHttpException
     * @return JsonResponse
     */
    public function show(int $id): Response
    {
        $post = $this->find($id);

        if (!$post) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id: %s', $id));
        }

        return new JsonResponse($post);
    }

    /**
     * @param int $id
     * @return Response
     */
    public function delete(int $id): Response
    {
//        delete
        return $this->redirectToRoute('post_list');
    }

    /**
     * @return Response
     */
    public function notMatched(): Response
    {
        return new Response('worked');
    }

    /**
     * @param \DateTime $start
     * @param \DateTime $end
     * @return Response
     */
    public function archive(\DateTime $start, \DateTime $end): Response
    {
        return new Response('ok');
    }

    /**
     * @param int $id
     * @return array|null
     */
    private function find(int $id): ?array
    {
        $posts = [
            ['id' => 1, 'title' => 'title1', 'body' => 'body1'],
            ['id' => 2, 'title' => 'title2', 'body' => 'body2'],
        ];

        foreach ($posts as $post) {
            if ($post['id'] === $id) {
                return $post;
            }
        }

        return null;
    }
}
