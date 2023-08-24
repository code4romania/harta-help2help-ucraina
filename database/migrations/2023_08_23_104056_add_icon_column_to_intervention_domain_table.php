<?php

declare(strict_types=1);

use App\Models\InterventionDomain;
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
        Schema::table('intervention_domains', function (Blueprint $table) {
            $table->string('icon')->nullable();
        });

        InterventionDomain::all()
            ->each(function (InterventionDomain $domain) {
                $domain->icon = match ($domain->id) {
                    2 => 'food',
                    3 => 'house',
                    4 => 'hygiene',
                    5 => 'finance_support',
                    6 => 'protection',
                    7 => 'education',
                    8 => 'management',
                    9 => 'integration',
                    10 => 'health',
                    default => null,
                };

                $domain->save();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('intervention_domains', function (Blueprint $table) {
            $table->dropColumn('icon');
        });
    }
};
