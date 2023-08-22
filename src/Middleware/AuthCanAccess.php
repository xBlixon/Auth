<?php

namespace Velsym\Auth\Middleware;

use Velsym\Auth\AuthStatus;
use Velsym\Auth\Roles;
use Velsym\Database\DatabaseManager;
use Velsym\Routing\BaseMiddleware;

class AuthCanAccess extends BaseMiddleware
{
    private static array $roles;

    public function __construct(
        private string $role,
        private string $redirectPath
    )
    {
        self::$roles = Roles::get();
    }

    public function handle()
    {
        $user = AuthStatus::getUser();
        if(
            !AuthStatus::isLoggedIn()
            ||
            self::$roles[$this->role] > self::$roles[$user->getRole()]
        ) {
            $this->redirect($this->redirectPath);
        }
    }
}