<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Traobject
 *
 * @ORM\Table(name="traobject", indexes={@ORM\Index(name="fk_traobject_category_idx", columns={"category_id"}), @ORM\Index(name="fk_traobject_departement1_idx", columns={"departement_id"}), @ORM\Index(name="fk_traobject_user1_idx", columns={"user_id"}), @ORM\Index(name="fk_traobject_state1_idx", columns={"state_id"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\TraobjectRepository")
 */

class Traobject
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255, nullable=false)
     */
    private $label;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=false)
     */
    private $ville;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descritption", type="text", length=65535, nullable=true)
     */
    private $descritption;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="event_at", type="datetime", nullable=false)
     */
    private $eventAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_end", type="datetime", nullable=true)
     */
    private $dateEnd;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adress", type="string", length=255, nullable=true)
     */
    private $adress;

    /**
     * @var string
     *
     * @ORM\Column(name="created_at", type="string", length=255, nullable=false)
     */
    private $createdAt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="update_at", type="string", length=255, nullable=true)
     */
    private $updateAt;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="traobject")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @var Departement
     *
     * @ORM\ManyToOne(targetEntity="Departement", inversedBy="traobject")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="departement_id", referencedColumnName="id")
     * })
     */
    private $departement;

    /**
     * @var State
     *
     * @ORM\ManyToOne(targetEntity="State")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     * })
     */
    private $state;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * @return null|string
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param null|string $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getVille(): ?string
    {
        return $this->ville;
    }

    /**
     * @param string $ville
     */
    public function setVille(string $ville): void
    {
        $this->ville = $ville;
    }

    /**
     * @return null|string
     */
    public function getDescritption(): ?string
    {
        return $this->descritption;
    }

    /**
     * @param null|string $descritption
     */
    public function setDescritption(?string $descritption): void
    {
        $this->descritption = $descritption;
    }

    /**
     * @return \DateTime
     */
    public function getEventAt(): ?\DateTime
    {
        return $this->eventAt;
    }

    /**
     * @param \DateTime $eventAt
     */
    public function setEventAt(\DateTime $eventAt): void
    {
        $this->eventAt = $eventAt;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateEnd(): ?\DateTime
    {
        return $this->dateEnd;
    }

    /**
     * @param \DateTime|null $dateEnd
     */
    public function setDateEnd(?\DateTime $dateEnd): void
    {
        $this->dateEnd = $dateEnd;
    }

    /**
     * @return null|string
     */
    public function getAdress(): ?string
    {
        return $this->adress;
    }

    /**
     * @param null|string $adress
     */
    public function setAdress(?string $adress): void
    {
        $this->adress = $adress;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return null|string
     */
    public function getUpdateAt(): ?string
    {
        return $this->updateAt;
    }

    /**
     * @param null|string $updateAt
     */
    public function setUpdateAt(?string $updateAt): void
    {
        $this->updateAt = $updateAt;
    }

    /**
     * @return Category
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    /**
     * @return Departement
     */
    public function getDepartement(): ?Departement
    {
        return $this->departement;
    }

    /**
     * @param Departement $departement
     */
    public function setDepartement(Departement $departement): void
    {
        $this->departement = $departement;
    }

    /**
     * @return State
     */
    public function getState(): ?State
    {
        return $this->state;
    }

    /**
     * @param State $state
     */
    public function setState(State $state): void
    {
        $this->state = $state;
    }

    /**
     * @return User
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function __toString()
    {
        return $this->getLabel();
    }
}
