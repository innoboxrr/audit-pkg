<?php
 
namespace Innoboxrr\LaravelAudit\Observers;
 
use Innoboxrr\LaravelAudit\Models\LoginAttempt;
 
class LoginAttemptObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the LoginAttempt "created" event.
     */
    public function created(LoginAttempt $loginAttempt): void
    {
        // ...
    }
 
    /**
     * Handle the LoginAttempt "updated" event.
     */
    public function updated(LoginAttempt $loginAttempt): void
    {
        // ...
    }
 
    /**
     * Handle the LoginAttempt "deleted" event.
     */
    public function deleted(LoginAttempt $loginAttempt): void
    {
        // ...
    }
 
    /**
     * Handle the LoginAttempt "restored" event.
     */
    public function restored(LoginAttempt $loginAttempt): void
    {
        // ...
    }
 
    /**
     * Handle the LoginAttempt "forceDeleted" event.
     */
    public function forceDeleted(LoginAttempt $loginAttempt): void
    {
        // ...
    }
}