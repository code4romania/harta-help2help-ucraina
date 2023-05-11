<?php

declare(strict_types=1);

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
        Schema::table('activity_domains', function (Blueprint $table) {
            $table->json('name')->change();
        });
        Schema::table('intervention_domains', function (Blueprint $table) {
            $table->json('name')->change();
        });
        Schema::table('beneficiary_groups', function (Blueprint $table) {
            $table->json('name')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
