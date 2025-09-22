<?php
class Validator
{
    public static function sanitizeEmail(string $email): string
    {
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    public static function sanitizePassword(string $password): string
    {
        return trim(filter_var(
            $password,
            FILTER_UNSAFE_RAW,
            FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH
        ));
    }

    public static function isValidEmail(string $email): bool
    {
        $email = self::sanitizeEmail($email);

        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function isValidPassword(string $password): bool
    {
        $password = self::sanitizePassword($password);
        return (bool) preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password);
    }
}