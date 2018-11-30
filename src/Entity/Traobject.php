<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * Traobject
 *
 * @ORM\Table(name="traobject", indexes={@ORM\Index(name="fk_traobject_category_idx", columns={"category_id"}), @ORM\Index(name="fk_traobject_departement1_idx", columns={"departement_id"}), @ORM\Index(name="fk_traobject_user1_idx", columns={"user_id"}), @ORM\Index(name="fk_traobject_state1_idx", columns={"state_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\TraobjectRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Vich\Uploadable()
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
     * @ORM\Column(name="picture", type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @Vich\UploadableField(mapping="traobject_image", fileNameProperty="picture")
     * @var File
     */
    private $pictureFile;


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
     * @var \DateTimeInterface
     *
     * @ORM\Column(name="event_at", type="datetime", nullable=false)
     */
    private $eventAt;

    /**
     * @var \DateTimeInterface|null
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
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", length=255, nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="update_at", type="datetime", length=255, nullable=true)
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
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getpicture(): ?string
    {
        return $this->picture;
    }

    /**
     * @param null|string $picture
     * @return Traobject
     */
    public function setpicture(?string $picture): Traobject
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * @return null|File
     */
    public function getpictureFile(): ?File
    {
        return $this->pictureFile;
    }

    /**
     * @param File|null $picture
     */
    public function setpictureFile(File $picture = null)
    {
        $this->pictureFile = $picture;

        if ($picture) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDescritption(): ?string
    {
        return $this->descritption;
    }

    public function setDescritption(?string $descritption): self
    {
        $this->descritption = $descritption;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEventAt(): ?\DateTimeInterface
    {
        return $this->eventAt;
    }


    public function setEventAt(\DateTimeInterface $eventAt): self
    {
        $this->eventAt = $eventAt;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->dateEnd;
    }

    public function setDateEnd(?\DateTimeInterface $dateEnd): self
    {
        $this->dateEnd = $dateEnd;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAdress(): ?string
    {
        return $this->adress;
    }


    public function setAdress(?string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }


    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getUpdateAt(): ?string
    {
        return $this->updateAt;
    }

    public function setUpdateAt(?string $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * @return Category
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }


    public function setCategory(?Category $category): self
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return Departement
     */
    public function getDepartement(): ?Departement
    {
        return $this->departement;
    }

    public function setDepartement(?Departement $departement): self
    {
        $this->departement = $departement;
        return $this;
    }

    /**
     * @return State
     */
    public function getState(): ?State
    {
        return $this->state;
    }

    public function setState(?State $state): self
    {
        $this->state = $state;
        return $this;

    }

    /**
     * @return User
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->setUpdatedAt(new \DateTime());
    }


    public function __toString()
    {
        return $this->getLabel();
    }

}
