<?php

namespace Innoboxrr\LaravelAudit\Models\Traits\Operations;

trait ActionOperations
{

    /*
    public function buildPayload()
    {

        return [];

    }

    public function updatePayload()
    {

        $this->update(['payload' => $this->buildPayload()]);

        return $this;

    }
    */

    public static function getId($type, $model)
    {

        $auditableType = get_class($model);
        
        $action = self::firstOrCreate([
            'type' => $type,
            'actionable_id' => $model->id,
            'actionable_type' => $auditableType,
            'description' => "Action type: \"$type\" for \"$auditableType\"",
        ]);

        return $action->id;

    }

}
