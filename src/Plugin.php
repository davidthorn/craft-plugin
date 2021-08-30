<?php

namespace davidthorn;

use craft\events\RegisterComponentTypesEvent;
use craft\services\Fields;
use davidthorn\fields\FormTextField;
use davidthorn\fields\HTMLTextElement;
use yii\base\Event;

/**
 * Class Plugin
 * @package davidthorn
 */
class Plugin extends \craft\base\Plugin
{
    /**
     *
     */
    public function init()
    {
        Event::on(
            Fields::class,
            Fields::EVENT_REGISTER_FIELD_TYPES,
            function(RegisterComponentTypesEvent $event) {
            $event->types[] = FormTextField::class;
            $event->types[] = HTMLTextElement::class;
        });

        parent::init();
    }
}