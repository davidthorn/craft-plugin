<?php

namespace davidthorn\validators;

use davidthorn\models\TextFieldDTO;
use yii\base\Model;
use yii\validators\Validator;

/**
 * Class FormTextFieldValidator
 * @package davidthorn\validators
 */
class FormTextFieldValidator extends  Validator
{

    /**
     * Validates if the attribute is a property of the mode
     * and also if the attribute contains the correct properties
     * and that the properties are correctly formatted.
     *
     * @param Model $model
     * @param string $attribute
     */
    public function validateAttribute(Model $model, string $attribute)
    {
        $data = $model->$attribute;

        if(!$data instanceof TextFieldDTO) {
            $this->addError($model, $attribute, "Value is not an object");
        }

        if($data->label == null) {
            $this->addError($model, $attribute, "The label cannot be null " . $data->label);
        }

        if(strlen($data->label) <= 1 ) {
            $this->addError($model, $attribute, "The labels content length is too short" . $data->label);
        }

        if($data->placeholder == null) {
            $this->addError($model, $attribute, "The placeholder cannot be null" . $data->placeholder);
        }

        if($data->fieldName == null) {
            $this->addError($model, $attribute, "The fieldName cannot be null" . $data->fieldName);
        }

        if($data->fieldType == null) {
            $this->addError($model, $attribute, "The fieldType cannot be null " . $data->fieldType);
        }

    }

}