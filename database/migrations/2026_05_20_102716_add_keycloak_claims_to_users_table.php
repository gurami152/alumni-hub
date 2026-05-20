<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $usersTable;

    public function __construct()
    {
        $this->usersTable = config('keycloak.user.table_name', 'users');
    }

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable($this->usersTable)) {
            Schema::table($this->usersTable, function (Blueprint $table) {
                $table->text('kc_refresh_token')->nullable()->default(null); // keycloak refresh token
                $table->string('kc_session_id')->nullable()->default(null); // keycloak session ID
                $table->text('kc_id_token')->nullable()->default(null); // keycloak ID token
                $table->timestamp('kc_token_expires_at')->nullable()->default(null); // keycloak token expiration time
            });
        } else {
            Schema::create('keycloak_sessions', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id')->index();
                $table->text('kc_refresh_token')->nullable()->default(null);
                $table->string('kc_session_id')->nullable()->default(null);
                $table->text('kc_id_token')->nullable()->default(null);
                $table->timestamp('kc_token_expires_at')->nullable()->default(null);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable($this->usersTable)) {
            Schema::table($this->usersTable, function (Blueprint $table) {
                $table->dropColumn('kc_refresh_token');
                $table->dropColumn('kc_session_id');
                $table->dropColumn('kc_id_token');
                $table->dropColumn('kc_token_expires_at');
            });
        }

        Schema::dropIfExists('keycloak_sessions');
    }
};
