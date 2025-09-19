<?php
class Validator
{
    public static function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function isValidPassword(string $password): bool
    {
        return strlen($password) >= 8 && preg_match('/[A-Z]/', $password) && preg_match('/\d/', $password);
    }
}
