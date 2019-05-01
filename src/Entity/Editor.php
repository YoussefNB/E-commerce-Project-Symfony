<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EditorRepository")
 */
class Editor
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $editor_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $editor_description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $editor_image_url;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEditorName(): ?string
    {
        return $this->editor_name;
    }

    public function setEditorName(string $editor_name): self
    {
        $this->editor_name = $editor_name;

        return $this;
    }

    public function getEditorDescription(): ?string
    {
        return $this->editor_description;
    }

    public function setEditorDescription(string $editor_description): self
    {
        $this->editor_description = $editor_description;

        return $this;
    }

    public function getEditorImageUrl(): ?string
    {
        return $this->editor_image_url;
    }

    public function setEditorImageUrl(string $editor_image_url): self
    {
        $this->editor_image_url = $editor_image_url;

        return $this;
    }
}
