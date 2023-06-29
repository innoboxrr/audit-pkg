<?php

namespace Innoboxrr\LaravelAudit\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Innoboxrr\LaravelAudit\Tests\TestCase;

class ActionEndpointsTest extends TestCase
{

    public function test_action_policies_endpoint()
    {

        $action = \Innoboxrr\LaravelAudit\Models\Action::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $action->id
        ];

        $this->json('POST', '/api/itecschool/auditpkg//action/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_action_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('POST', '/api/itecschool/auditpkg//action/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_action_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/itecschool/auditpkg//action/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_action_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/itecschool/auditpkg//action/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_action_show_auth_endpoint()
    {

        $action = \Innoboxrr\LaravelAudit\Models\Action::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'action_id' => $action->id
        ];

        $this->json('POST', '/api/itecschool/auditpkg//action/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_action_show_guest_endpoint()
    {

        $action = \Innoboxrr\LaravelAudit\Models\Action::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'action_id' => $action->id
        ];

        $this->json('POST', '/api/itecschool/auditpkg//action/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_action_create_endpoint()
    {

        $user = \Innoboxrr\LaravelAudit\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Innoboxrr\LaravelAudit\Models\Action::factory()->make()->getAttributes();

        $this->json('POST', '/api/itecschool/auditpkg//action/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_action_update_endpoint()
    {

        $action = \Innoboxrr\LaravelAudit\Models\Action::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Innoboxrr\LaravelAudit\Models\Action::factory()->make()->getAttributes(),
            'action_id' => $action->id
        ];

        $this->json('PUT', '/api/itecschool/auditpkg//action/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_action_delete_endpoint()
    {

        $action = \Innoboxrr\LaravelAudit\Models\Action::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'action_id' => $action->id
        ];

        $this->json('DELETE', '/api/itecschool/auditpkg//action/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_action_restore_endpoint()
    {

        $action = \Innoboxrr\LaravelAudit\Models\Action::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'action_id' => $action->id
        ];

        $this->json('POST', '/api/itecschool/auditpkg//action/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_action_force_delete_endpoint()
    {

        $action = \Innoboxrr\LaravelAudit\Models\Action::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'action_id' => $action->id
        ];

        $this->json('DELETE', '/api/itecschool/auditpkg//action/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_action_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/itecschool/auditpkg//action/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
