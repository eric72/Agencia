<?php

namespace App\DataFixtures;

use App\Services\HandleExternData;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class AppFixtures extends Fixture
{
    private $encoder;
    private $em;
    private $externData;

    public function __construct(UserPasswordEncoderInterface $encoder, EntityManagerInterface $em, HandleExternData $externData)
    {
        $this->encoder = $encoder;
        $this->em = $em;
        $this->externData = $externData;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $user = $this->em->getRepository(User::class)->findOneBy(["username" => "john"]);
        if (!$user) {
            $this->createUser();
        }
        $this->externData->loadJsonData();

    }

    public function createUser() {
        $user = new User();
        $user->setUsername('john');
        $encoded = $this->encoder->encodePassword($user, 'myPa$$word3455**');
        $user->setPassword($encoded);

        $this->em->persist($user);
        $this->em->flush();
    }

}
