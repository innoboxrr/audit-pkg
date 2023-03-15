<?php

namespace Itecschool\AuditPkg\Models\Traits\Operations;

trait AuditOperations
{

    public function buildPayload()
    {

        return [];

    }

    public function updatePayload()
    {

        $this->update(['payload' => $this->buildPayload()]);

        return $this;

    }

}
