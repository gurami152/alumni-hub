<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('keycloak_role_mappings', function (Blueprint $table) {
            $table->id();
            $table->string('kc_role_name');
            $table->string('local_role');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('keycloak_role_mappings');
    }
};
