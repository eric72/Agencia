<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LotRepository")
 */
class Lots
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Clients")
     */
    private $client;

    /**
     * @ORM\Column(type="integer")
     */
    private $surface;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function get_Id(): ?string
    {
        return $this->_id;
    }

    public function set_Id(string $_id): ?string
    {
        $this->_id = $_id;

        return $this->_id;
    }

    public function getClient(): ?Clients
    {
        return $this->client;
    }

    public function setClient(?Clients $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }
}
