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
        Schema::table('ngos', function (Blueprint $table) {
            $table->json('name')->change();
            $table->json('description')->change();
            $table->text('slug')->change();
        });
        Schema::table('services', function (Blueprint $table) {
            $table->json('name')->change();
            $table->json('project_name')->change();
            $table->text('slug')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('json', function (Blueprint $table) {
            //
        });
    }
};
