<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MeasuringSystems
 *
 * @ORM\Table(name="measuring_systems")
 * @ORM\Entity
 */
class MeasuringSystems
{
    /**
     * @var int
     *
     * @ORM\Column(name="measuring_sys_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $measuringSysId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false, options={"comment"="указывается система измерения "})
     */
    private $name;

    public function getMeasuringSysId(): ?int
    {
        return $this->measuringSysId;
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


}
