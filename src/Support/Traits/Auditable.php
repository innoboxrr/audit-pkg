<?php

namespace Itecschool\AuditPkg\Support\Traits;

use Illuminate\Support\Facades\Validator;
use Itecschool\AuditPkg\Models\Audit;

/**
 * Este trait lo debe implementar todo modelo que sea auditable
 **/

trait Auditable 
{

	public function audits()
	{
		return $this->morphMany('Itecschool\AuditPkg\Models\Audit', 'loggable');
	}

	/**
	 * PENDIENTE: Verificar que se necesita para
	 * crear el registro de operación sobre un modelo.
	 * Yo creque que Action sale sobrando. Considerar su eliminación
	 */
	public function log(array $data) : Audit
	{

		/**
		 * De acuerdo con el loggable_id, y loggable_type, + un valor que traiga la acción por ejemplo:
		 *  - create
		 *  - update
		 *  - delete
		 *  - read
		 *  - assignUser, etc
		 * Se debe recuperar de las acciones disponibles en la base de datos.
		 */
		// $action = Audit::getAction($data);

		$rules = [
		    'before' => 'nullable',
		    'after' => 'nullable',
		    'route' => 'nullable',
		    'ip_address' => 'required',
		    'user_agent' => 'required',
		    'loggable_id' => 'required',
		    'loggable_type' => 'required',
		    'user_id' => 'required',
		    'action_id' => 'required', // Ver como recuperar este valor
		];

		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {

		    $errors = $validator->errors();

		} else {
		    
		    return Audit::create($data);

		}

	}

}