<?php

namespace davidthorn\models;

/**
 * Class TextFieldDTO
 * @package davidthorn\models
 */
final class TextFieldDTO {

    /**
     * @var string|null
     */
    public ?string $label;

    /**
     * @var string|null
     */
    public ?string $placeholder;

    /**
     * @var string|null
     */
    public ?string $fieldName;

    /**
     * @var string|null
     */
    public ?string $fieldType;

    /**
     * TextFieldDTO constructor.
     */
    public function __construct()
    {
        $this->label = null;
        $this->placeholder = null;
        $this->fieldName = null;
        $this->fieldType = null;
    }

    /**
     * @return string|null
     */
    public function label(): ?string
    {
        return $this->label;
    }

    /**
     * @return string|null
     */
    public function placeholder(): ?string
    {
        return $this->placeholder;
    }

    /**
     * @return string|null
     */
    public function getFieldName(): ?string
    {
        return $this->fieldName;
    }

    /**
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->getFieldName();
    }

    /**
     * @return string|null
     */
    public function getFieldType(): ?string
    {
        return $this->fieldType;
    }

    /**
     * @param string|null $fieldType
     */
    public function setFieldType(?string $fieldType): void
    {
        $this->fieldType = $fieldType;
    }

    /**
     * @param string|null $fieldName
     */
    public function setFieldName(?string $fieldName): void
    {
        $this->fieldName = $fieldName;
    }

    /**
     * Converts a stdClass to a TextFieldDTO
     *
     * @param \stdClass $stdClass
     * @return TextFieldDTO
     */
    public static function convert(\stdClass $stdClass): TextFieldDTO {

        $obj = new TextFieldDTO();

        if(property_exists($stdClass, 'placeholder')) {
            $obj->placeholder = $stdClass->placeholder;
        }

        if(property_exists($stdClass, 'label')) {
            $obj->label = $stdClass->label;
        }

        if(property_exists($stdClass, 'fieldName')) {
            $obj->fieldName = $stdClass->fieldName;
        }

        if(property_exists($stdClass, 'fieldType')) {
            $obj->fieldType = $stdClass->fieldType;
        }

        return $obj;
    }

    /**
     * Coverts an json string to a TextFieldDTO
     *
     * @param string $json
     * @return TextFieldDTO
     */
    public static function convertString(string $json): TextFieldDTO {
        return self::convert(json_decode($json));
    }

    /**
     * Converts an associated array to a TextFieldDTO
     *
     * @param array $associatedArray
     * @return TextFieldDTO
     */
    public static function convertArray(array $associatedArray): TextFieldDTO {
        $obj = new TextFieldDTO();
        $obj->label = $associatedArray['label'];
        $obj->placeholder = $associatedArray['placeholder'];
        $obj->fieldName = $associatedArray['fieldName'];
        $obj->fieldType = $associatedArray['fieldType'];
        return $obj;
    }

}