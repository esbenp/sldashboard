<?php

namespace App\Helper;

class FormHelper
{
    /**
     * Create label for element
     *
     * @param string $name
     * @param array $options
     * @param array $attributes
     * @return null|string
     */
    public function createLabel(array $options, array $attributes = [])
    {
        // Check for label parameter
        if (!isset($options['label'])) {
            return null;
        }

        $attrString = null;

        if (isset($attributes['id'])) {
            $attrString = $this->attrToString(['for' => $attributes['id']]);
        }

        $label = '<label ' . $attrString . '>' . _($options['label']) . '</label>';

        return $label;
    }

    /**
     * Create element
     *
     * @param string $name
     * @param array $options
     * @param array $attributes
     * @param array $valueOptions
     * @return \Exception|null|string
     */
    public function createElement($name, array $options, array $attributes = [], array $valueOptions = [])
    {
        $type = $options['type'];
        $element = null;

        // Set standard attributes
        $attributes['name'] = $name;

        switch($type) {
            case 'radio':
            case 'checkbox':
            case 'password':
            case 'hidden':
            case 'text':
                $attributes['type'] = $type;
                $element = '<input ' . $this->attrToString($attributes) . '>';
                break;

            case 'textarea':
                $element = '<textarea ' . $this->attrToString($attributes) . '></textarea>';
                break;

            case 'select':
                $element = '<select ' . $this->attrToString($attributes) . '>';

                // Get value options from engine
                if (isset($options['engine'])) {
                    list($engineName, $actionName) = explode("@", $options['engine']);

                    $engine = \App::make($engineName);

                    $valueOptions = array_merge($engine->$actionName(), $valueOptions);
                }

                // Add options to select
                foreach ($valueOptions as $valueOption) {
                    $element .= '<option value="' . $this->escape($valueOption['value']) . '">' . _($valueOption['label']) . '</option>';
                }

                $element .= '</select>';
                break;

            default:
                return new \Exception(sprintf(_('HTML element of type \'%s\' could not be found'), $type));
        }

        return $element;
    }

    /**
     * Create label & element
     *
     * @param string $name
     * @param array $elementData
     * @param array $attributes
     * @return \Exception|string
     */
    public function row($name, array $elementData, array $attributes = [])
    {
        if (!isset($elementData['options'])) {
            return new \Exception('Please provide options for the html element');
        }

        $options = $elementData['options'];

        $valueOptions = [];

        if (isset($elementData['valueOptions'])) {
            $valueOptions = $elementData['valueOptions'];
        }

        $label = $this->createLabel($options, $attributes);
        $element = $this->createElement($name, $options, $attributes, $valueOptions);

        $html = $label . '<br />';
        $html .= $element;

        return $html;
    }

    /**
     * Convert attribute array to string
     *
     * @param array $attributes
     * @return string
     */
    public function attrToString(array $attributes = [])
    {
        $attributeArray = [];

        foreach ($attributes as $name => $value)
        {
            $attributeArray[] = $name . '=' . '"' . $this->escape($value) . '"';
        }

        return implode(" ", $attributeArray);
    }

    /**
     * Escape string
     *
     * @param string $string
     * @return string
     */
    protected function escape($string)
    {
        return str_replace('""', '\"', $string);
    }
}
