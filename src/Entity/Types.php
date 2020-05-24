<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Types
 *
 * @ORM\Table(name="types")
 * @ORM\Entity
 */
class Types
{
    /**
     * @var int
     *
     * @ORM\Column(name="type_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $typeId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptions", type="string", length=255, nullable=false)
     */
    private $descriptions;

    public function getTypeId(): ?int
    {
        return $this->typeId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescriptions(): ?string
    {
        return $this->descriptions;
    }

    public function setDescriptions(string $descriptions): self
    {
        $this->descriptions = $descriptions;

        return $this;
    }


}
