<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'email_verified_at' => 'Email verified at',
            'password' => 'Password',
            'phone' => 'Phone',
            
        ],
    ],

    'event' => [
        'title' => 'Events',

        'actions' => [
            'index' => 'Events',
            'create' => 'New Event',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'category' => 'Category',
            'total_seats' => 'Total seats',
            'start_time' => 'Start time',
            'end_time' => 'End time',
            'is_custom_seat' => 'Is custom seat',
            'custom_seats' => 'Custom seats',
            
        ],
    ],

    'reservation' => [
        'title' => 'Reservations',

        'actions' => [
            'index' => 'Reservations',
            'create' => 'New Reservation',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'user_id' => 'User',
            'event_id' => 'Event',
            'seats' => 'Seats',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];