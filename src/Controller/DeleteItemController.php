<?php

namespace App\Controller;

use App\Repository\ItemRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DeleteItemController extends AbstractController
{
    #[Route('/delete/{id}', methods: ['GET', 'DELETE'], name: 'deleteitem')]
    public function deleteArticle(ItemRepository $itemRepository, $id, EntityManagerInterface $em): Response
    {
        $item = $itemRepository->find($id);
        $em->remove($item);
        $em->flush();
        return $this->redirectToRoute('home');
    }
}
