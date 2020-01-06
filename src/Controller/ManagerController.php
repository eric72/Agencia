<?php

namespace App\Controller;

use App\Entity\Clients;
use App\Entity\Gestionnaires;
use App\Entity\Lots;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ManagerController extends AbstractController
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
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
     * @Route("/getCombinations", name="getCombinations", methods={"GET"})
     */
    public function getCombinations() : JsonResponse
    {
        try {

            // $gestionnaires = $this->em->getRepository(Gestionnaires::class)->findOneBy(["id" => $request->request->get('id')]);
            $gestionnaires = new Gestionnaires();
            // TODO: Trouver le nombre de combinaisons possible

            // TODO: Retourner le nombre de combinaisons possible
            return new JsonResponse('toto', 200);

        } catch(\Exception $exception) {

            return new JsonResponse(['error' => $exception.message], $exception->getCode());
        }

    }
}
