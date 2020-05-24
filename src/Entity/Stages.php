<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stages
 *
 * @ORM\Table(name="stages")
 * @ORM\Entity
 */
class Stages
{
    /**
     * @var int
     *
     * @ORM\Column(name="stage_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $stageId;

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

    public function getStageId(): ?int
    {
        return $this->stageId;
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
