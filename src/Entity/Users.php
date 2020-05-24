<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class Users
{
    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=32, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=64, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=64, nullable=false)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=64, nullable=false)
     */
    private $email;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Roles", inversedBy="user")
     * @ORM\JoinTable(name="roles_users",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="role_id", referencedColumnName="role_id")
     *   }
     * )
     */
    private $role;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->role = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

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

    /**
     * @return Collection|Roles[]
     */
    public function getRole(): Collection
    {
        return $this->role;
    }

    public function addRole(Roles $role): self
    {
        if (!$this->role->contains($role)) {
            $this->role[] = $role;
        }

        return $this;
    }

    public function removeRole(Roles $role): self
    {
        if ($this->role->contains($role)) {
            $this->role->removeElement($role);
        }

        return $this;
    }

}
