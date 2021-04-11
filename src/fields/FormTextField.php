<?php

namespace davidthorn\fields;

use Craft;
use craft\base\ElementInterface;
use craft\base\Field;
use craft\helpers\Html;
use craft\web\View;
use davidthorn\models\TextFieldDTO;
use davidthorn\validators\FormTextFieldValidator;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use yii\base\Exception;
use yii\db\Schema;

/**
 * Class FormTextField
 * @package davidthorn\fields
 */
class FormTextField extends Field
{

    /**
     *
     */
    const SETTINGS_TMPL_PATH = 'djt_plugin/_components/fields/textfield/settings.twig';
    /**
     *
     */
    const INPUT_TMPL_PATH = 'djt_plugin/_components/fields/textfield/input.twig';

    /**
     * @return string
     */
    public static function displayName(): string
    {
        return Craft::t('app', 'Form Text Field');
    }

    /**
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws Exception
     */
    public function getSettingsHtml(): string
    {
        return $this->view()->renderTemplate(self::SETTINGS_TMPL_PATH, []);
    }

    /**
     * @param mixed $value
     * @param ElementInterface|null $element
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws Exception
     */
    public function getInputHtml($value, ElementInterface $element = null): string
    {
        $value = $value == null ? new TextFieldDTO() : $value;
        return $this->view()->renderTemplate(self::INPUT_TMPL_PATH, [
            'data' => $value ,
            'id' => Html::id($this->handle),
            'labelName' => "$this->handle[label]",
            'placeholderName' => "$this->handle[placeholder]",
            'fieldNameName' => "$this->handle[fieldName]",
            'fieldTypeName' => "$this->handle[fieldType]",
        ]);
    }

    /**
     * @return View
     */
    private function view(): View {
        return Craft::$app->getView();
    }

    /**
     * @param mixed $value
     * @param ElementInterface|null $element
     * @return TextFieldDTO
     */
    public function normalizeValue($value, ElementInterface $element = null): TextFieldDTO
    {
        if($value == null) {
            return new TextFieldDTO();
        }

        if($value instanceof TextFieldDTO) {
            return $value;
        }

        if(is_array($value)) {
            return TextFieldDTO::convertArray($value);
        }

        if(is_object($value) ) {
            return TextFieldDTO::convert($value);
        }

        return TextFieldDTO::convertString($value);
    }

    /**
     * @param mixed $value
     * @param ElementInterface|null $element
     * @return array|false|mixed|string|null
     */
    public function serializeValue($value, ElementInterface $element = null)
    {
        return json_encode($value);
    }

    /**
     * @inheritdoc
     */
    public function getElementValidationRules(): array
    {
        return [
            FormTextFieldValidator::class,
        ];
    }

}