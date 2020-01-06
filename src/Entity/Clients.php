<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientsRepository")
 */
class Clients
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
     * @ORM\Column(type="string", length=255)
     */
    private $fullname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telDomicile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telPro;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telMobile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telMobile2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fax;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sexe;

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

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): self
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail2(): ?string
    {
        return $this->email2;
    }

    public function setEmail2(string $email2): self
    {
        $this->email2 = $email2;

        return $this;
    }

    public function getTelDomicile(): ?string
    {
        return $this->telDomicile;
    }

    public function setTelDomicile(string $telDomicile): self
    {
        $this->telDomicile = $telDomicile;

        return $this;
    }

    public function getTelPro(): ?string
    {
        return $this->telPro;
    }

    public function setTelPro(string $telPro): self
    {
        $this->telPro = $telPro;

        return $this;
    }

    public function getTelMobile(): ?string
    {
        return $this->telMobile;
    }

    public function setTelMobile(string $telMobile): self
    {
        $this->telMobile = $telMobile;

        return $this;
    }

    public function getTelMobile2(): ?string
    {
        return $this->telMobile2;
    }

    public function setTelMobile2(string $telMobile2): self
    {
        $this->telMobile2 = $telMobile2;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }
}
