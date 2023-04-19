<?php

namespace Itecschool\AuditPkg\Database\Factories;

/*
 * Docs: https://fakerphp.github.io/ 
 */

use Itecschool\AuditPkg\Models\LoginAttempt;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoginAttemptFactory extends Factory
{

    protected $model = LoginAttempt::class;

    public function definition()
    {
        return [
            'name' => fake()->randomElement(['create', 'read', 'update', 'delete']),
            'description' => 'Operación sobre modelo.',
            'template' => 'Esto es un template, para que :name, lo pueda emplear en la plataforma.'
        ];
    }

}
