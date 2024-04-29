<?php

namespace App\Enums;

enum LoginOptions: string
{
    case Mobile = 'mobile';
    case Email = 'email';
    case Provider = 'provider';
}
