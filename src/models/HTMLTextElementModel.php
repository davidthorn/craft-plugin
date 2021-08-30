<?php

namespace davidthorn\models;

/**
 *
 */
class HTMLTextElementModel
{
    /**
     * @var ?string
     */
    private ?string $elementType = null;
    /**
     * @var string
     */
    private ?string $elementID = null;
    /**
     * @var ?string
     */
    private ?string $elementName = null;
    /**
     * @var ?string
     */
    private ?string $elementTextValue = null;
    /**
     * @var ?string
     */
    private ?string $elementClassList = null;

    /**
     * @return ?string
     */
    public function getElementType(): ?string
    {
        return $this->elementType;
    }

    /**
     * @param ?string $elementType
     */
    public function setElementType(?string $elementType): void
    {
        $this->elementType = $elementType;
    }

    /**
     * @return ?string
     */
    public function getElementID(): ?string
    {
        return $this->elementID;
    }

    /**
     * @param ?string $elementID
     */
    public function setElementID(?string $elementID): void
    {
        $this->elementID = $elementID;
    }

    /**
     * @return ?string
     */
    public function getElementName(): ?string
    {
        return $this->elementName;
    }

    /**
     * @param ?string $elementName
     */
    public function setElementName(?string $elementName): void
    {
        $this->elementName = $elementName;
    }

    /**
     * @return ?string
     */
    public function getElementTextValue(): ?string
    {
        return $this->elementTextValue;
    }

    /**
     * @param ?string $elementTextValue
     */
    public function setElementTextValue(?string $elementTextValue): void
    {
        $this->elementTextValue = $elementTextValue;
    }

    /**
     * @return ?string
     */
    public function getElementClassList(): ?string
    {
        return $this->elementClassList;
    }

    /**
     * @param ?string $elementClassList
     */
    public function setElementClassList(?string $elementClassList): void
    {
        $this->elementClassList = $elementClassList;
    }
}