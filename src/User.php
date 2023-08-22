<?php

namespace Velsym\Auth;

use Velsym\Database\BaseModel;

abstract class User extends BaseModel
{
    const TABLE_NAME = "user";

    protected string $role;

    final public function getRole(): string
    {
        return $this->role;
    }

    final public function setRole(string $role): void
    {
        $this->role = $role;
    }
}