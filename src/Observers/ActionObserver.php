<?php
 
namespace Innoboxrr\LaravelAudit\Observers;
 
use Innoboxrr\LaravelAudit\Models\Action;
 
class ActionObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    // public $afterCommit = true;

    /**
     * Handle the Action "created" event.
     */
    public function created(Action $action): void
    {
        // ...
    }
 
    /**
     * Handle the Action "updated" event.
     */
    public function updated(Action $action): void
    {
        // ...
    }
 
    /**
     * Handle the Action "deleted" event.
     */
    public function deleted(Action $action): void
    {
        // ...
    }
 
    /**
     * Handle the Action "restored" event.
     */
    public function restored(Action $action): void
    {
        // ...
    }
 
    /**
     * Handle the Action "forceDeleted" event.
     */
    public function forceDeleted(Action $action): void
    {
        // ...
    }
}