<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as SymfonyConstraints;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 * @UniqueEntity(fields={"name"})
 */
class Category
{
    use IdentifiableEntityTrait;
    use TimestampableEntityTrait;

    /**
     * @var string|null
     * @ORM\Column(type="string")
     * @SymfonyConstraints\NotBlank()
     */
    private $name;

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->name;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $value
     * @return $this
     */
    public function setName(?string $value)
    {
        $this->name = $value;

        return $this;
    }
}
