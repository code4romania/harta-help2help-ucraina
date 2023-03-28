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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Ngo::class)->constrained();
            $table->foreignIdFor(\App\Models\City::class)->constrained();
            $table->foreignIdFor(\App\Models\County::class)->constrained();
            $table->float('lat');
            $table->float('lng');
            $table->text('project_name');
            $table->string('slug');
            $table->text('name');
            $table->json('intervention_domains');
            $table->json('beneficiary_groups');
            $table->string('duration');
            $table->enum('status', ['active', 'finished']);
            $table->json('application_methods');
            $table->string('budget')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
