<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products", indexes={@ORM\Index(name="category_id", columns={"category_id"}), @ORM\Index(name="measuring_sys_id", columns={"measuring_sys_id"}), @ORM\Index(name="user_id", columns={"user_id"}), @ORM\Index(name="warehouse_id", columns={"warehouse_id"})})
 * @ORM\Entity
 */
class Products
{
    /**
     * @var int
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="barcode", type="string", length=255, nullable=false)
     */
    private $barcode;

    /**
     * @var int
     *
     * @ORM\Column(name="category_id", type="integer", nullable=false, options={"unsigned"=true,"comment"="к какой категории относится"})
     */
    private $categoryId;

    /**
     * @var int
     *
     * @ORM\Column(name="warehouse_id", type="integer", nullable=false, options={"unsigned"=true,"comment"="к какому складу принадлежит"})
     */
    private $warehouseId;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false, options={"unsigned"=true,"comment"="количество"})
     */
    private $quantity;

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
     * @var \MeasuringSystems
     *
     * @ORM\ManyToOne(targetEntity="MeasuringSystems")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="measuring_sys_id", referencedColumnName="measuring_sys_id")
     * })
     */
    private $measuringSys;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Categories", inversedBy="product")
     * @ORM\JoinTable(name="categories_products",
     *   joinColumns={
     *     @ORM\JoinColumn(name="product_id", referencedColumnName="product_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="category_id", referencedColumnName="category_id")
     *   }
     * )
     */
    private $category;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Warehouses", inversedBy="product")
     * @ORM\JoinTable(name="warehouses_products",
     *   joinColumns={
     *     @ORM\JoinColumn(name="product_id", referencedColumnName="product_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="warehouse_id", referencedColumnName="warehouse_id")
     *   }
     * )
     */
    private $warehouse;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
        $this->warehouse = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getProductId(): ?int
    {
        return $this->productId;
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

    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    public function setBarcode(string $barcode): self
    {
        $this->barcode = $barcode;

        return $this;
    }

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function setCategoryId(int $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function getWarehouseId(): ?int
    {
        return $this->warehouseId;
    }

    public function setWarehouseId(int $warehouseId): self
    {
        $this->warehouseId = $warehouseId;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

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

    public function getMeasuringSys(): ?MeasuringSystems
    {
        return $this->measuringSys;
    }

    public function setMeasuringSys(?MeasuringSystems $measuringSys): self
    {
        $this->measuringSys = $measuringSys;

        return $this;
    }

    /**
     * @return Collection|Categories[]
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Categories $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
        }

        return $this;
    }

    public function removeCategory(Categories $category): self
    {
        if ($this->category->contains($category)) {
            $this->category->removeElement($category);
        }

        return $this;
    }

    /**
     * @return Collection|Warehouses[]
     */
    public function getWarehouse(): Collection
    {
        return $this->warehouse;
    }

    public function addWarehouse(Warehouses $warehouse): self
    {
        if (!$this->warehouse->contains($warehouse)) {
            $this->warehouse[] = $warehouse;
        }

        return $this;
    }

    public function removeWarehouse(Warehouses $warehouse): self
    {
        if ($this->warehouse->contains($warehouse)) {
            $this->warehouse->removeElement($warehouse);
        }

        return $this;
    }

}
