<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('cv')->after('email');
            $table->string('job_title')->after('cv');
            $table->string('bio',200)->after('job_title');
            $table->string('twiter',200)->after('bio');
            $table->string('facebook',200)->after('twiter');
            $table->string('linkedin',200)->after('facebook');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('cv');
            $table->dropColumn('job_title');
            $table->dropColumn('bio');
            $table->dropColumn('twiter');
            $table->dropColumn('facebook');
            $table->dropColumn('linkedin');
        });
    }
};
