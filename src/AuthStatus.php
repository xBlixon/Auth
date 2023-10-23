<?php

namespace Velsym\Auth;

use ReflectionClass;
use Velsym\Communication\Session;
use Velsym\Database\DatabaseManager;

class AuthStatus
{
    private function __construct(){}

    public static function isLoggedIn(): bool
    {
        /** @var BaseUser|NULL $user */
        $user = self::getUser();
        if(!$user) return false;
        return DatabaseManager::isPresentInDatabase($user);
    }

    public static function logIn(BaseUser $user): void
    {
        Session::getInstance()->set('auth', $user);
    }

    public static function logOut(): void
    {
        Session::getInstance()->purge('auth');
    }

    public static function getUser(): BaseUser|NULL
    {
        return Session::getInstance()->get('auth');
    }
}