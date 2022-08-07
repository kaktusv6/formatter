<?php

use Formatter\Formatter;

class User
{
    public int $id;
    public string $name;
    public \DateTime $registeredAt;
}

class UserFormatter extends Formatter
{
    public function __construct()
    {
        $this->setFormatter(function (User $user): array
        {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'registered_at' => $user->registeredAt->format('Y-m-d'),
            ];
        });
    }
}
