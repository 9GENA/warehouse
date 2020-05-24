<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Documents
 *
 * @ORM\Table(name="documents", indexes={@ORM\Index(name="ind_in_doc", columns={"stage_id", "type_id", "user_id"}), @ORM\Index(name="type_id", columns={"type_id"}), @ORM\Index(name="user_id", columns={"user_id"}), @ORM\Index(name="IDX_A2B072882298D193", columns={"stage_id"})})
 * @ORM\Entity
 */
class Documents
{
    /**
     * @var int
     *
     * @ORM\Column(name="document_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $documentId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var \Stages
     *
     * @ORM\ManyToOne(targetEntity="Stages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stage_id", referencedColumnName="stage_id")
     * })
     */
    private $stage;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     * })
     */
    private $user;

    /**
     * @var \Types
     *
     * @ORM\ManyToOne(targetEntity="Types")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_id", referencedColumnName="type_id")
     * })
     */
    private $type;

    public function getDocumentId(): ?int
    {
        return $this->documentId;
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

    public function getStage(): ?Stages
    {
        return $this->stage;
    }

    public function setStage(?Stages $stage): self
    {
        $this->stage = $stage;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getType(): ?Types
    {
        return $this->type;
    }

    public function setType(?Types $type): self
    {
        $this->type = $type;

        return $this;
    }


}
