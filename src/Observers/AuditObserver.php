<?php
 
namespace Innoboxrr\LaravelAudit\Observers;
 
use Innoboxrr\LaravelAudit\Models\Audit;
 
class AuditObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the Audit "created" event.
     */
    public function created(Audit $audit): void
    {
        // ...
    }
 
    /**
     * Handle the Audit "updated" event.
     */
    public function updated(Audit $audit): void
    {
        // ...
    }
 
    /**
     * Handle the Audit "deleted" event.
     */
    public function deleted(Audit $audit): void
    {
        // ...
    }
 
    /**
     * Handle the Audit "restored" event.
     */
    public function restored(Audit $audit): void
    {
        // ...
    }
 
    /**
     * Handle the Audit "forceDeleted" event.
     */
    public function forceDeleted(Audit $audit): void
    {
        // ...
    }
}