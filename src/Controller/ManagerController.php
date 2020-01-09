<?php

namespace App\Controller;

use App\Entity\Clients;
use App\Entity\Managers;
use App\Entity\Lots;
use App\Services\ManagerServices;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ManagerController extends AbstractController
{

    private $em;
    private $managerServices;

    public function __construct(EntityManagerInterface $em, ManagerServices $managerServices)
    {
        $this->em = $em;
        $this->managerServices = $managerServices;
    }

    /**
     * @Route("/manager", name="manager")
     */
    public function index()
    {
        return $this->render('manager/index.html.twig', [
            'controller_name' => 'ManagerController',
        ]);
    }

    /**
     * @Route("/getCombinations/", name="getCombinations", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getCombinations(Request $request) : JsonResponse
    {
        try {

            $combinations = $request->query->get('combinations');

            /*$this->managerServices->resolveCombinations($combinations);
            dump($this->managerServices->resolveCombinations($combinations));*/

            return new JsonResponse(['Output' => $this->managerServices->resolveCombinations($combinations)], 200);

        } catch(\Exception $exception) {

            return new JsonResponse(['error' => $exception->getMessage()], 404);
        }

    }
}
