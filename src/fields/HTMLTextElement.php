<?php

namespace davidthorn\fields;

use craft\base\ElementInterface;
use craft\base\Field;
use Craft;
use craft\helpers\Html;
use craft\web\View;
use davidthorn\models\HTMLTextElementModel;

/**
 *
 */
class HTMLTextElement extends Field
{
    /**
     *
     */
    const SETTINGS_TMPL_PATH = 'davidthorn/_components/fields/html-text-element/settings.twig';

    /**
     *
     */
    const INPUT_TMPL_PATH = 'davidthorn/_components/fields/html-text-element/input.twig';

    /**
     * @return string
     */
    public static function displayName(): string
    {
        return Craft::t('app', 'HTML Text Element');
    }

    /**
     * @param mixed $value
     * @param ElementInterface|null $element
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     * @throws \yii\base\Exception
     */
    public function getInputHtml($value, ElementInterface $element = null): string
    {

        /** @var HTMLTextElementModel $dto */
        $dto = $value;
        $id = Html::id($this->handle);
        $handle = $this->handle;
        return $this->view()->renderTemplate(self::INPUT_TMPL_PATH, [
            'value' => $value ,
            'elements' => [
                'type' => [
                    'id' => "$id-elementType",
                    'name' => sprintf('%s[%s]', $handle, 'elementType'),
                    'value' => $dto->getElementType()
                ],
                'textValue' => [
                    'id' => "$id-elementTextValue",
                    'name' => sprintf('%s[%s]', $handle, 'elementTextValue'),
                    'value' => $dto->getElementTextValue()
                ],
                'classList' => [
                    'id' => "$id-elementClassList",
                    'name' => sprintf('%s[%s]', $handle, 'elementClassList'),
                    'value' => $dto->getElementClassList()
                ],
                'elementID' => [
                    'id' => "$id-elementID",
                    'name' => sprintf('%s[%s]', $handle, 'elementID'),
                    'value' => $dto->getElementID()
                ],
                'elementName' => [
                    'id' => "$id-elementName",
                    'name' => sprintf('%s[%s]', $handle, 'elementName'),
                    'value' => $dto->getElementName()
                ]
            ]
        ]);
    }

    /**
     * @return string|null
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     * @throws \yii\base\Exception
     */
    public function getSettingsHtml()
    {
        return $this->view()->renderTemplate(self::SETTINGS_TMPL_PATH, []);
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
     */
    public function normalizeValue($value, ElementInterface $element = null)
    {
        if($value == null) {
            return new HTMLTextElementModel();
        }

        if(is_array($value)) {
            $dto = new HTMLTextElementModel();
            $dto->setElementClassList($value['elementClassList']);
            $dto->setElementID($value['elementID']);
            $dto->setElementName($value['elementName']);
            $dto->setElementTextValue($value['elementTextValue']);
            $dto->setElementType($value['elementType']);
            return $dto;
        }

        if(is_string($value)) {
            return $this->normalizeValue(json_decode($value, true), $element);
        }

        return $value;
    }

    /**
     * @param mixed $value
     * @param ElementInterface|null $element
     * @return false|string
     */
    public function serializeValue($value, ElementInterface $element = null)
    {
       if($value instanceof HTMLTextElementModel) {
           return json_encode([
               'elementClassList' => $value->getElementClassList(),
               'elementID' => $value->getElementID(),
               'elementName' => $value->getElementName(),
               'elementType' => $value->getElementType(),
               'elementTextValue' => $value->getElementTextValue()
           ]);
       }
        return json_encode($value);
    }
}