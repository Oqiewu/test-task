<?php

namespace App\Services;

class Validation
{
    // Validation by phone
    public function validationToPhone($phone): bool
    {
        $phone_pattern = "^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$^";

        return preg_match($phone_pattern, $phone);
    }
    
    // Validation by email
    public function validationToEmail($email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}