<?php

namespace App\Views\Forms\Admin;

use Core\Views\Form;

class AddForm extends Form
{
    public function __construct()
    {
        parent::__construct([
            'attr' => [
                'method' => 'POST'
            ],
            'fields' => [
                'X' => [
                    'label' => '',
                    'type' => 'text',
                    'value' => '',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_coordinates'

                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'X koordinate',
                            'class' => 'input-field'
                        ]
                    ]
                ],
                'Y' => [
                    'label' => '',
                    'type' => 'number',
                    'value' => '',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_coordinates'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Y koordinate',
                            'class' => 'input-field'
                        ]
                    ]
                ],
                'colors' => [
                    'type' => 'select',
                    'options' => [
                        'black' => 'Juoda',
                        'red' => 'Raudona',
                        'green' => 'Zalia',
                        'blue' => 'Melyna'
                    ],
                    'validators' => [
                        'validate_select',
                    ],
                    'value' => 'Raudona'
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Ideti pixeli',
                    'type' => 'submit',
                    'extra' => [
                        'attr' => [
                            'class' => 'btn'
                        ]
                    ]
                ]
            ],
            'validators' => [
                'validate_pixel_space_available' => [
                    'X',
                    'Y'
                ]
            ]
        ]);
    }
}