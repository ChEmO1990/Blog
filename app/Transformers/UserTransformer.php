<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'user_name'      => (string) $user->name,
            'user_email'     => (string) $user->email,
            'user_password'  => (string) $user->password,
        ];
    }

    public static function originalAttribute($index) {
        $attributes = [
            'user_name'      => 'name',
            'user_email'     => 'email',
            'user_password'  => 'password',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}