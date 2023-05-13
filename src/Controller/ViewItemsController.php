<?php

namespace App\Controller;

use App\Entity\Item;
use App\Repository\ItemRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ViewItemsController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ItemRepository $itemRepository): Response
    {
        $allItems = $itemRepository->findAll();
        $totalprice = 0;
        $totalitems = 0;

        forEach($allItems as $item) {
            $totalprice += $item->getPrice();
            $totalitems += $item->getAmount();
        }

        return $this->render('pages/index.html.twig', ['items' => $allItems, 'totalprice' => $totalprice, 'totalamount' => $totalitems]);
    }
}
