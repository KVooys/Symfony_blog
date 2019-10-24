<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PostsController extends AbstractController
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var \Doctrine\Common\Persistence\ObjectRepository */
    private $userRepository;

    /** @var \Doctrine\Common\Persistence\ObjectRepository */
    private $blogPostRepository;

    /**
     * @param EntityManagerInterface $entityManager
    */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->blogPostRepository = $entityManager->getRepository('App:BlogPost');
        $this->userRepository = $entityManager->getRepository('App:User');
    }

    /**
     * @Route("/posts", name="posts")
     */
    public function posts()
    {
        return $this->render('posts/index.html.twig', [
            'posts' => $this->blogPostRepository->findAll()
        ]);
    }
}
