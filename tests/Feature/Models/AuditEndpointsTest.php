<?php

namespace Itecschool\AuditPkg\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Itecschool\AuditPkg\Tests\TestCase;

class AuditEndpointsTest extends TestCase
{

    public function test_audit_policies_endpoint()
    {

        $audit = \Itecschool\AuditPkg\Models\Audit::factory()->create();
        
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'id' => $audit->id
        ];

        $this->json('POST', '/api/itecschool/auditpkg//audit/policies', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_audit_policy_endpoint()
    {
        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'policy' => 'index'
        ];

        $this->json('POST', '/api/itecschool/auditpkg//audit/policy', $payload, $headers)
            ->assertJsonStructure([
                'index'
            ])
            ->assertStatus(200);

    }

    public function test_audit_index_auth_endpoint()
    {

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/itecschool/auditpkg//audit/index', $payload, $headers)
            ->assertStatus(200);

    }

    public function test_audit_index_guest_endpoint()
    {

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'managed' => true
        ];

        $this->json('POST', '/api/itecschool/auditpkg//audit/index', $payload, $headers)
            ->assertStatus(401);
            
    }
    
    public function test_audit_show_auth_endpoint()
    {

        $audit = \Itecschool\AuditPkg\Models\Audit::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'audit_id' => $audit->id
        ];

        $this->json('POST', '/api/itecschool/auditpkg//audit/show', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_audit_show_guest_endpoint()
    {

        $audit = \Itecschool\AuditPkg\Models\Audit::latest()->first();

        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'audit_id' => $audit->id
        ];

        $this->json('POST', '/api/itecschool/auditpkg//audit/show', $payload, $headers)
            ->assertStatus(401);
            
    }

    public function test_audit_create_endpoint()
    {

        $user = \Itecschool\AuditPkg\Models\User::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = \Itecschool\AuditPkg\Models\Audit::factory()->make()->getAttributes();

        $this->json('POST', '/api/itecschool/auditpkg//audit/create', $payload, $headers)
            ->assertStatus(201);
            
    }

    public function test_audit_update_endpoint()
    {

        $audit = \Itecschool\AuditPkg\Models\Audit::factory()->create();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            ...\Itecschool\AuditPkg\Models\Audit::factory()->make()->getAttributes(),
            'audit_id' => $audit->id
        ];

        $this->json('PUT', '/api/itecschool/auditpkg//audit/update', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_audit_delete_endpoint()
    {

        $audit = \Itecschool\AuditPkg\Models\Audit::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'audit_id' => $audit->id
        ];

        $this->json('DELETE', '/api/itecschool/auditpkg//audit/delete', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_audit_restore_endpoint()
    {

        $audit = \Itecschool\AuditPkg\Models\Audit::first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'audit_id' => $audit->id
        ];

        $this->json('POST', '/api/itecschool/auditpkg//audit/restore', $payload, $headers)
            ->assertStatus(200);
            
    }

    public function test_audit_force_delete_endpoint()
    {

        $audit = \Itecschool\AuditPkg\Models\Audit::latest()->first();

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            'audit_id' => $audit->id
        ];

        $this->json('DELETE', '/api/itecschool/auditpkg//audit/force-delete', $payload, $headers)
            ->assertStatus(403);
            
    }

    public function test_audit_export_endpoint()
    {   

        $headers = [
            'Authorization' => config('test.token'),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];  

        $payload = [
            //
        ];

        $this->json('POST', '/api/itecschool/auditpkg//audit/export', $payload, $headers)
            ->assertStatus(200);
            
    }

}
