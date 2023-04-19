<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audits', function (Blueprint $table) {
            $table->id();
            $table->longText('before')->nullable();
            $table->longText('after')->nullable();
            $table->string('route')->nullable();
            $table->string('ip_address');
            $table->string('user_agent');
            $table->foreignId('loggable_id');
            $table->string('loggable_type');
            $table->foreignId('user_id');
            $table->foreignId('action_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audits');
    }
};
