<?php

declare(strict_types=1);

use App\Models\BeneficiaryGroup;
use App\Models\InterventionDomain;
use App\Models\Ngo;
use App\Models\Service;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('intervention_domains_service', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Service::class)->constrained();
            $table->foreignIdFor(InterventionDomain::class)->constrained();
        });
        Schema::create('beneficiary_group_service', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Service::class)->constrained();
            $table->foreignIdFor(BeneficiaryGroup::class)->constrained();
        });
        Schema::create('intervention_domains_ngo', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Ngo::class)->constrained();
            $table->foreignIdFor(InterventionDomain::class)->constrained();
        });
        $services = Service::all();
        $interventionDomainsIds = [];
        $beneficiaryGroupsIds = [];
        foreach ($services as $service) {
            foreach ($service->intervention_domains as $id) {
                $interventionDomainsIds[] = [
                    'service_id' => $service->id,
                    'intervention_domains_id' => $id,
                ];
            }
            foreach ($service->beneficiary_groups as $beneficiaryGroupId) {
                $beneficiaryGroupsIds[] = [
                    'service_id' => $service->id,
                    'beneficiary_group_id' => $beneficiaryGroupId];
            }
        }

        DB::table('intervention_domains_service')->insert($interventionDomainsIds);
        DB::table('beneficiary_group_service')->insert($beneficiaryGroupsIds);

        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('beneficiary_groups');
            $table->dropColumn('intervention_domains');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('separtatetable', function (Blueprint $table) {
            //
        });
    }
};
