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
        Schema::rename('intervention_domains_service', 'intervention_domain_service');
        Schema::table('intervention_domain_service', function (Blueprint $table) {
            $table->renameColumn('intervention_domains_id', 'intervention_domain_id');
        });

        Schema::rename('intervention_domains_ngo', 'intervention_domain_ngo');
        Schema::table('intervention_domain_ngo', function (Blueprint $table) {
            $table->renameColumn('intervention_domains_id', 'intervention_domain_id');
        });

        Schema::table('intervention_domains', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('intervention_domain_service', 'intervention_domains_service');
        Schema::table('intervention_domains_service', function (Blueprint $table) {
            $table->renameColumn('intervention_domain_id', 'intervention_domains_id');
        });

        Schema::rename('intervention_domain_ngo', 'intervention_domains_ngo');
        Schema::table('intervention_domains_ngo', function (Blueprint $table) {
            $table->renameColumn('intervention_domain_id', 'intervention_domains_id');
        });
    }
};
