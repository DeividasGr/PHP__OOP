<?php

namespace Core\Views;

use Core\View;

class Form extends View
{
    public function render($template_path = ROOT . '/core/templates/form.tpl.php')
    {
        return parent::render($template_path); // TODO: Change the autogenerated stub
    }

    public function values(): ?array
    {
        $parameters = [];

        foreach ($this->data['fields'] as $key => $input) {
            $parameters[$key] = FILTER_SANITIZE_SPECIAL_CHARS;
        }

        return filter_input_array(INPUT_POST, $parameters);
    }


    public function isSubmitted(): bool
    {
        return (bool)$this->values();
    }

    /**
     * Tikrinama pateikta forma pritaikant kiekvieno laukelio validatorius.
     *
     * @param array $form Formos masyvas.
     * @param array $form_values Išvalytos input'ų vertės.
     * @return bool
     */
    public function validate(): bool
    {
        if (!$this->isSubmitted()) {
            return false;
        }

        $is_valid = true;
        $form_values = $this->values();

        foreach ($this->data['fields'] as $field_id => &$field) {
            foreach ($field['validators'] ?? [] as $function_index => $function_name) {

                if (is_array($function_name)) {
                    $params = $function_name;
                    $field_is_valid = $function_index($form_values[$field_id], $field, $params);
                } else {
                    $field_is_valid = $function_name($form_values[$field_id], $field);
                }

                if (!$field_is_valid) {
                    $is_valid = false;
                    break;
                }
            }

        }

        foreach ($this->data['validators'] ?? [] as $validator_name => $validator) {

            if (is_array($validator)) {
                $field_is_valid = $validator_name($form_values, $this->data, $params = $validator);
            } else {
                $field_is_valid = $validator($form_values, $this->data);
            }

            if (!$field_is_valid) {
                $is_valid = false;
                break;
            }
        }

        return $is_valid;
    }
}