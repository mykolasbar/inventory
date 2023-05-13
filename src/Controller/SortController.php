<?php

namespace App\Controller;

use App\Repository\ItemRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SortController extends AbstractController
{
    #[Route('/asc', name: 'increasingsort')]
    public function increasing(ItemRepository $itemRepository): Response
    {
        $allItems = $itemRepository->findBy([], ['id' => 'ASC']);
        return $this->render('pages/index.html.twig', ['items' => $allItems]);
    }

    #[Route('/desc', name: 'decreasingsort')]
    public function decreasing(ItemRepository $itemRepository): Response
    {
        $allItems = $itemRepository->findBy([], ['id' => 'DESC']);
        return $this->render('pages/index.html.twig', ['items' => $allItems]);
    }

    #[Route('/abc', name: 'alphabeticalsort')]
    public function alphabetical(ItemRepository $itemRepository): Response
    {
        $allItems = $itemRepository->findBy([], ['title' => 'ASC']);
        return $this->render('pages/index.html.twig', ['items' => $allItems]);
    }

    #[Route('/abc', name: 'alphabeticalsortreverse')]
    public function alphabeticalreverse(ItemRepository $itemRepository): Response
    {
        $allItems = $itemRepository->findBy([], ['title' => 'DESC']);
        return $this->render('pages/index.html.twig', ['items' => $allItems]);
    }
}
