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
        $totalprice = 0;
        $totalitems = 0;

        forEach($allItems as $item) {
            $totalprice += $item->getPrice();
            $totalitems += $item->getAmount();
        }
        return $this->render('pages/index.html.twig', ['items' => $allItems, 'totalprice' => $totalprice, 'totalamount' => $totalitems]);
    }

    #[Route('/desc', name: 'decreasingsort')]
    public function decreasing(ItemRepository $itemRepository): Response
    {
        $allItems = $itemRepository->findBy([], ['id' => 'DESC']);
        $totalprice = 0;
        $totalitems = 0;

        forEach($allItems as $item) {
            $totalprice += $item->getPrice();
            $totalitems += $item->getAmount();
        }
        return $this->render('pages/index.html.twig', ['items' => $allItems, 'totalprice' => $totalprice, 'totalamount' => $totalitems]);
    }

    #[Route('/abc', name: 'alphabeticalsort')]
    public function alphabetical(ItemRepository $itemRepository): Response
    {
        $allItems = $itemRepository->findBy([], ['title' => 'ASC']);
        $totalprice = 0;
        $totalitems = 0;

        forEach($allItems as $item) {
            $totalprice += $item->getPrice();
            $totalitems += $item->getAmount();
        }
        return $this->render('pages/index.html.twig', ['items' => $allItems, 'totalprice' => $totalprice, 'totalamount' => $totalitems]);
    }

    #[Route('/abcrev', name: 'alphabeticalsortreverse')]
    public function alphabeticalreverse(ItemRepository $itemRepository): Response
    {
        $allItems = $itemRepository->findBy([], ['title' => 'DESC']);
        $totalprice = 0;
        $totalitems = 0;

        forEach($allItems as $item) {
            $totalprice += $item->getPrice();
            $totalitems += $item->getAmount();
        }
        return $this->render('pages/index.html.twig', ['items' => $allItems, 'totalprice' => $totalprice, 'totalamount' => $totalitems]);
    }
}
