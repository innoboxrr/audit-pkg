<?php

namespace Innoboxrr\LaravelAudit\Database\Factories;

/*
 * Docs: https://fakerphp.github.io/ 
 */

use Innoboxrr\LaravelAudit\Models\LoginAttempt;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoginAttemptFactory extends Factory
{

    protected $model = LoginAttempt::class;

    public function definition()
    {
        return [
            'email' => fake()->email(),
            'status' => 0,
            'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36'
        ];
    }

}
