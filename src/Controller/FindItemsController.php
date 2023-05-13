<?php

namespace App\Controller;

use App\Entity\Item;
use App\Form\Type\SearchType;
use App\Repository\ItemRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FindItemsController extends AbstractController
{


    // #[Route('/search', name: 'finditems')]
    // public function search(ItemRepository $itemRepository, Request $request): Response
    // {
    //     $form = $this->createForm(SearchType::class);

    //     return $this->render('searchbar.html.twig', [
    //         'form' => $form,
    //     ]);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $results = $itemRepository->findBy(
    //             ['title' => $request->query->get('q')]
    //         );

    //         // dd('aaaaaaaaa');

    //         return $this->render('pages/searchresults.html.twig', [
    //             'results' => $results
    //         ]);

    //     }
    // }




    #[Route('/search', name: 'finditems')]
    public function indexAction(ItemRepository $itemRepository, Request $request)
{
    $results = null;
    $query = $request->query->get('q');
    $name = $request->query->get('name');
    $id = $request->query->get('id');

    if (!empty($query)) {

        // dd($request->query->get('id'));

        if ($name === null && $id === null) {
            $results = [];

            return $this->render('pages/searchresults.html.twig', [
                'results' => $results, 'message' => 'Please select search constraints'
            ]);
        }

        if ($name === 'on' and $id === null) {
            $results = $itemRepository->findItem($query, 'title');
            return $this->render('pages/searchresults.html.twig', [
                    'results' => $results, 'message' => ''
            ]);
        }

        if ($name === null and $id === 'on') {
            // dd($id);
            $results = $itemRepository->findItem($query, 'id');
            return $this->render('pages/searchresults.html.twig', [
                'results' => $results, 'message' => ''
            ]);
        }

        if ($name === 'on' && $id === 'on') {
            $results = $itemRepository->findItems($query);
            return $this->render('pages/searchresults.html.twig', [
                'results' => $results, 'message' => ''
            ]);
        }
    }
}

}
