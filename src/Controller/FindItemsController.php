<?php

namespace App\Controller;

use App\Service\SumTotal;
use App\Repository\ItemRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FindItemsController extends AbstractController
{

    #[Route('/search', name: 'finditems')]
    public function indexAction(ItemRepository $itemRepository, Request $request, SumTotal $sumtotal)
{
    $results = null;
    $query = $request->query->get('q');
    $name = $request->query->get('name');
    $id = $request->query->get('id');

    if (!empty($query)) {

        if ($name === null && $id === null) {
            $results = [];

            return $this->render('pages/searchresults.html.twig', [
                'results' => $results, 'message' => 'Please select search constraints'
            ]);
        }

        if ($name === 'on' and $id === null) {
            $results = $itemRepository->findItem($query, 'title');
            return $this->render('pages/searchresults.html.twig', [
                    'results' => $results, 'message' => '', 'total' => $sumtotal->getSumTotal($results)
            ]);
        }

        if ($name === null and $id === 'on') {
            // dd($id);
            $results = $itemRepository->findItem($query, 'id');
            return $this->render('pages/searchresults.html.twig', [
                'results' => $results, 'message' => '', 'total' => $sumtotal->getSumTotal($results)
            ]);
        }

        if ($name === 'on' && $id === 'on') {
            $results = $itemRepository->findItems($query);
            return $this->render('pages/searchresults.html.twig', [
                'results' => $results, 'message' => '', 'total' => $sumtotal->getSumTotal($results)
            ]);
        }
    }
}

}
