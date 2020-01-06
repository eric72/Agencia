<?php
/**
 * Created by PhpStorm.
 * User: Eric
 * Date: 04/01/2020
 * Time: 00:56
 */

namespace App\Services;

use App\Entity\Clients;
use App\Entity\Gestionnaires;
use App\Entity\Lots;
use Doctrine\ORM\EntityManagerInterface;

class HandleExternData
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function loadJsonData() {
        $this->loadJsonGestionnaires();
        $this->loadJsonClients();
        $this->loadJsonLots();
    }

    public function loadJsonGestionnaires() {
        $gestionnairesFile = file_get_contents("./src/DataFixtures/fixtures/gestionnaires.json");
        $contents = utf8_encode($gestionnairesFile);
        $gestionnairesData = json_decode(str_replace("/([{,])([a-zA-Z][^: ]+):/", "$1\"$2\":", $contents), true);

        foreach ($gestionnairesData as $key => $value) {
            set_time_limit(300);
            $gestionnaire = new Gestionnaires();
            $gestionnaire->set_Id($value['_id']['$oid']);
            $gestionnaire->setFullname($value['fullname']);
            $gestionnaire->setNumero(serialize($value['numeros']));

            $this->em->persist($gestionnaire);
            $this->em->flush();
        }
    }

    public function loadJsonClients() {
        $clientsFile = file_get_contents("./src/DataFixtures/fixtures/clients.json");
        $contents = utf8_encode($clientsFile);
        $clientsData = json_decode(str_replace("/([{,])([a-zA-Z][^: ]+):/", "$1\"$2\":", $contents), true);

        foreach ($clientsData as $key => $value) {
            $clients = new Clients();
            $clients->set_Id($value['_id']['$oid']);
            $clients->setEmail($value['email']);
            $clients->setEmail2($value['email2']);
            $clients->setFax($value['fax']);
            $clients->setFullname($value['fullname']);
            $clients->setSexe($value['sexe']);
            $clients->setTelDomicile($value['telDomicile']);
            $clients->setTelMobile($value['telMobile']);
            $clients->setTelMobile2($value['telMobile2']);
            $clients->setTelPro($value['telPro']);

            $this->em->persist($clients);
            $this->em->flush();
        }
    }

    public function loadJsonLots() {
        $lotsFile = file_get_contents("./src/DataFixtures/fixtures/lots.json");
        $contents = utf8_encode($lotsFile);
        $lotsData = json_decode(str_replace("/([{,])([a-zA-Z][^: ]+):/", "$1\"$2\":", $contents), true);

        foreach ($lotsData as $key => $value) {
            $lots = new Lots();
            $client = $this->em->getRepository(Clients::class)->findOneBy(["_id" => $value['client']['$oid']]);
            $lots->set_Id($value['_id']['$oid']);
            $lots->setClient($client);
            $lots->setSurface($value['surface']);

            $this->em->persist($lots);
            $this->em->flush();
        }
    }
}