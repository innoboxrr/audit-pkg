<?php

namespace Itecschool\AuditPkg\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Itecschool\AuditPkg\Tests\TestCase;

class LoginAttemptEndpointsTest extends TestCase
{

    public function test_login_attempt_policies_endpoint()
    {

        $loginAttempt = \Itecschool\AuditPkg\Models\LoginAttempt::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $loginAttempt->id
        ];

        $this->json('POST', '/api/itecschool/auditpkg//login-attempt/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_login_attempt_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('POST', '/api/itecschool/auditpkg//login-attempt/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_login_attempt_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/itecschool/auditpkg//login-attempt/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_login_attempt_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/itecschool/auditpkg//login-attempt/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_login_attempt_show_auth_endpoint()
    {

        $loginAttempt = \Itecschool\AuditPkg\Models\LoginAttempt::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'login_attempt_id' => $loginAttempt->id
        ];

        $this->json('POST', '/api/itecschool/auditpkg//login-attempt/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_login_attempt_show_guest_endpoint()
    {

        $loginAttempt = \Itecschool\AuditPkg\Models\LoginAttempt::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'login_attempt_id' => $loginAttempt->id
        ];

        $this->json('POST', '/api/itecschool/auditpkg//login-attempt/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_login_attempt_create_endpoint()
    {

        $user = \Itecschool\AuditPkg\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Itecschool\AuditPkg\Models\LoginAttempt::factory()->make()->getAttributes();

        $this->json('POST', '/api/itecschool/auditpkg//login-attempt/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_login_attempt_update_endpoint()
    {

        $loginAttempt = \Itecschool\AuditPkg\Models\LoginAttempt::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Itecschool\AuditPkg\Models\LoginAttempt::factory()->make()->getAttributes(),
            'login_attempt_id' => $loginAttempt->id
        ];

        $this->json('PUT', '/api/itecschool/auditpkg//login-attempt/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_login_attempt_delete_endpoint()
    {

        $loginAttempt = \Itecschool\AuditPkg\Models\LoginAttempt::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'login_attempt_id' => $loginAttempt->id
        ];

        $this->json('DELETE', '/api/itecschool/auditpkg//login-attempt/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_login_attempt_restore_endpoint()
    {

        $loginAttempt = \Itecschool\AuditPkg\Models\LoginAttempt::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'login_attempt_id' => $loginAttempt->id
        ];

        $this->json('POST', '/api/itecschool/auditpkg//login-attempt/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_login_attempt_force_delete_endpoint()
    {

        $loginAttempt = \Itecschool\AuditPkg\Models\LoginAttempt::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'login_attempt_id' => $loginAttempt->id
        ];

        $this->json('DELETE', '/api/itecschool/auditpkg//login-attempt/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_login_attempt_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/itecschool/auditpkg//login-attempt/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
