<?php

namespace Velsym\Auth;

class Roles
{
    /**
     * Example $roles:
     * $roles = [
     *     'USER' => 0,
     *     'VIP' => 10,
     *     'ADMIN' => 20
     *     ];
     */
    private static array $roles;

    public static function get(): array
    {
        return self::$roles;
    }

    public static function set(array $roles): void
    {
        if(isset(self::$roles)) return;
        self::$roles = $roles;
    }
}