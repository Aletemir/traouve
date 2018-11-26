<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Traobject
 *
 * @ORM\Table(name="traobject", indexes={@ORM\Index(name="fk_traobject_category_idx", columns={"category_id"}), @ORM\Index(name="fk_traobject_departement1_idx", columns={"departement_id"}), @ORM\Index(name="fk_traobject_user1_idx", columns={"user_id"}), @ORM\Index(name="fk_traobject_state1_idx", columns={"state_id"})})
 * @ORM\Entity
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
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @var \Departement
     *
     * @ORM\ManyToOne(targetEntity="Departement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="departement_id", referencedColumnName="id")
     * })
     */
    private $departement;

    /**
     * @var \State
     *
     * @ORM\ManyToOne(targetEntity="State")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     * })
     */
    private $state;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;


}
