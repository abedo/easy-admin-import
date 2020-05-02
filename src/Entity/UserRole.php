<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRoleRepository")
 */
class UserRole
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $role_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $import_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getRoleId(): ?int
    {
        return $this->role_id;
    }

    public function setRoleId(int $role_id): self
    {
        $this->role_id = $role_id;

        return $this;
    }

    public function getImportId(): ?int
    {
        return $this->import_id;
    }

    public function setImportId(int $import_id): self
    {
        $this->import_id = $import_id;

        return $this;
    }
}
