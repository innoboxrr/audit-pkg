<?php

namespace Itecschool\AuditPkg\Database\Factories;

/*
 * Docs: https://fakerphp.github.io/ 
 */

use Itecschool\AuditPkg\Models\Action;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActionFactory extends Factory
{

    protected $model = Action::class;

    public function definition()
    {
        return [
            'type' => 'create',
            'actionable_id' => 1,
            'actionable_type' => 'App\Models\User',
            'template' => fake()->text(),
        ];
    }

}
