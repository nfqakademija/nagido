<?php

namespace App\Controller;

use App\Entity\Document;
use App\Service\DataService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{
    /**
     * @param Request $request
     * @param DataService $dataService
     * @return JsonResponse
     */
    public function index(Request $request, DataService $dataService)
    {
        $input = $request->request->get('category');

        $documents = $this->getDoctrine()->getRepository(Document::class)
            ->categoryFiles($input, $this->getUser());

        return $dataService->processData($documents);
    }
}
