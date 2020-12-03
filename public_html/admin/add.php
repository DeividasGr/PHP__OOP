<?php

use App\app;

require '../../bootloader.php';


$nav = nav();

if (!App::$session->getUser()) {
    header('Location: login.php');
    exit();
}

$form = [
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
            'label' => '',
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
];

$clean_inputs = get_clean_input($form);

if ($clean_inputs) {
    $success = validate_form($form, $clean_inputs);

    if ($success) {
        App::$db->createTable('pixels');
        App::$db->insertRow('pixels', $clean_inputs + ['email' => $_SESSION['email']]);
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/media/style.css">
    <title>Add</title>
</head>
<body>
<main>

    <?php require ROOT . '/app/templates/nav.tpl.php'; ?>


    <?php require ROOT . '/core/templates/form.tpl.php'; ?>


</main>
</body>
</html>

