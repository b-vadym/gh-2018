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
     * @return JsonResponse
     * @throws NotFoundHttpException
     */
    public function show(int $id)
    {
        $post = $this->find($id);

        if (!$post) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id: %s', $id));
        }


        return new JsonResponse($post);
    }

    public function delete(int $id)
    {
//        delete
        return $this->redirectToRoute('post_list');
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
