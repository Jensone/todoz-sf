<?php

namespace App\Controller;

use App\Repository\TodoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class TodoController extends AbstractController
{
    public function __construct(
        private TodoRepository $tr,
        private EntityManagerInterface $em,
    ){}

    #[Route('/todos', name: 'todos_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('todo/index.html.twig', [
            'todos' => $this->tr->findByCreator($this->getUser()),
        ]);
    }
    
    #[Route('/todos/{ref}', name: 'todos_show', methods: ['GET'])]
    public function show(string $ref): Response
    {
        return $this->render('todo/show.html.twig', [
            'todo' => $this->tr->findOneByRef($ref),
        ]);
    }

    #[Route('/todos/delete/{ref}', name: 'todos_delete', methods: ['POST'])]
    public function delete(string $ref): Response
    {
        $todo = $this->tr->findOneByRef($ref);

        if($todo->getCreator() == $this->getUser()){
            $this->em->remove($todo);
            $this->em->flush();

            $this->addFlash('success', 'La tâche a bien été supprimée');
        } else {
            $this->addFlash('danger', 'Cette tâche ne vous appartient pas');
        }

        return $this->redirectToRoute('todos_index');
    }
}
