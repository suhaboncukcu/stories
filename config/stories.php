<?php
return [
    'Stories' => [
        'Users' => [
            'table' => 'Cms.Users',
            'id' => 'id'
        ],
        'DontLog' => [
            'Plugins' => [
                'DebugKit'
            ],
            'Fields' => [
                'password'
            ]
        ],
        'DataLogger' => true,
        'AllowTemplates' => [
            'forField' => 'role',
            'rule' => function ($fieldValue) {
                return $fieldValue === 'superadmin' || $fieldValue === 'admin';
            }
        ]
    ]
];