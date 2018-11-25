<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends AbstractController
{
    /**
     * @var array
     */
    private $posts;

    public function __construct()
    {
        $this->posts = [
            [
                'id' => 1,
                'title' => 'title1',
                'body' => '<p>body1</p>',
                'publishedAt' => new \DateTime('-7days'),
                'comments' => [
                    [
                        'id' => 1,
                        'body' => 'body',
                    ], [
                        'id' => 2,
                        'body' => 'body2',
                    ],
                ],
            ],
            [
                'id' => 2,
                'title' => 'title2',
                'body' => '<p>body2</p>',
                'publishedAt' => new \DateTime('-7days'),
                'comments' => [],
            ],
        ];
    }

    /**
     * @return Response
     */
    public function list(): Response
    {
        return $this->render('post/list.html.twig', [
            'posts' => $this->posts,
        ]);
    }

    /**
     * @param int $id
     * @throws NotFoundHttpException
     * @return Response
     */
    public function show(int $id): Response
    {
        $post = $this->find($id);

        if (!$post) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id: %s', $id));
        }

        return $this->render('post/show.html.twig', [
            'post' => $post,
        ]);
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
        foreach ($this->posts as $post) {
            if ($post['id'] === $id) {
                return $post;
            }
        }

        return null;
    }
}
