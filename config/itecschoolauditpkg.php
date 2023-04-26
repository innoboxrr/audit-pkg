<?php

return [

	'db_prefix' => 'auditpkg_',

	'user_class' => 'App\Models\User',

	'excel_view' => 'itecschoolauditpkg::excel.',

	'notification_via' => ['mail', 'database'],

	'export_disk' => 's3',
	
];