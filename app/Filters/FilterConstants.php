<?php

namespace App\Filters;


class FilterConstants
{
    // USER
    const USER_INCLUDES = ['role', 'brands'];
    const USER_EXACT = ['id', 'role_id', 'client_id'];
    const USER_PARTIAL = [

        'email',
    ];
}
