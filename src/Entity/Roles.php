<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Roles
 *
 * @ORM\Table(name="roles")
 * @ORM\Entity
 */
class Roles
{
    /**
     * @var int
     *
     * @ORM\Column(name="role_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $roleId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptions", type="string", length=255, nullable=false)
     */
    private $descriptions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Privilege", inversedBy="role")
     * @ORM\JoinTable(name="privilege_roles",
     *   joinColumns={
     *     @ORM\JoinColumn(name="role_id", referencedColumnName="role_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="priv_id", referencedColumnName="priv_id")
     *   }
     * )
     */
    private $priv;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Users", mappedBy="role")
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->priv = new \Doctrine\Common\Collections\ArrayCollection();
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getRoleId(): ?int
    {
        return $this->roleId;
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

    /**
     * @return Collection|Privilege[]
     */
    public function getPriv(): Collection
    {
        return $this->priv;
    }

    public function addPriv(Privilege $priv): self
    {
        if (!$this->priv->contains($priv)) {
            $this->priv[] = $priv;
        }

        return $this;
    }

    public function removePriv(Privilege $priv): self
    {
        if ($this->priv->contains($priv)) {
            $this->priv->removeElement($priv);
        }

        return $this;
    }

    /**
     * @return Collection|Users[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(Users $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
            $user->addRole($this);
        }

        return $this;
    }

    public function removeUser(Users $user): self
    {
        if ($this->user->contains($user)) {
            $this->user->removeElement($user);
            $user->removeRole($this);
        }

        return $this;
    }

}
