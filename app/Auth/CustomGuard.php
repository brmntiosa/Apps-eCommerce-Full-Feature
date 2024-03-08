<?php

namespace App\Auth;

use Illuminate\Auth\SessionGuard;

class CustomGuard extends SessionGuard
{
    public function validate(array $credentials = [])
    {
        // Implement your custom authentication logic here
        // For example, authenticate users based on their email without the need for a password
        // You can customize the authentication logic according to your requirements
    }
}
