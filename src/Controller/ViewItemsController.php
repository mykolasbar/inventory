<?php

namespace App\Controller;

use App\Service\SumTotal;
use App\Repository\ItemRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ViewItemsController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ItemRepository $itemRepository, SumTotal $sumtotal): Response
    {
        $allItems = $itemRepository->findAll();

        return $this->render('pages/index.html.twig', ['items' => $allItems, 'total' => $sumtotal->getSumTotal($allItems)]);
    }
}
