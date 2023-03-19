<?php

namespace Itecschool\AuditPkg\Database\Factories;

/*
 * Docs: https://fakerphp.github.io/ 
 */

use Itecschool\AuditPkg\Models\Audit;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuditFactory extends Factory
{

    protected $model = Audit::class;

    public function definition()
    {
        return [
            'before' => json_encode([]),
            'after' => json_encode([]),
            'loggable_id' => 1,
            'loggable_type' => 'App\Models\User',
            'route' => fake()->url(),
            'ip_address' => fake()->ipv4(),
            'user_agent' => fake()->userAgent(),
            'user_id' => 1,
            'action_id' => 1,
        ];
    }

}
