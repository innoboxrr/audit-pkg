<?php

namespace Itecschool\AuditPkg\Models\Traits\Storage;

trait LoginAttemptStorage
{

    public function createModel($request)
    {

        $loginAttempt = $this->create($request->only($this->creatable));

        return $loginAttempt;

    }

    public function updateModel($request)
    {
     
        $this->update($request->only($this->updatable));

        return $this;

    }

    /*
    public function updateModelMetas($request)
    {

        $this->update_metas($request, 'LoginAttemptMeta', 'login_attempt_id')->updatePayload();

        return $this;

    }
    */

    public function deleteModel()
    {

        $this->delete();

    }

    public function restoreModel()
    {

        $this->restore();

    }

    public function forceDeleteModel()
    {

        abort(403);

        $this->forceDelete();
        
    }

}