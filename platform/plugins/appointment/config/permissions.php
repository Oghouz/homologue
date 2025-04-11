<?php

return [
    [
        'name' => 'Appointments',
        'flag' => 'appointment.index',
    ],
    [
        'name' => 'Create',
        'flag' => 'appointment.create',
        'parent_flag' => 'appointment.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'appointment.edit',
        'parent_flag' => 'appointment.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'appointment.destroy',
        'parent_flag' => 'appointment.index',
    ],
];
