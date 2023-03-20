<?php

declare(strict_types=1);

use App\Models\NGO;
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
            $table->foreignIdFor(NGO::class)->constrained();
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            // @TODO add location
            $table->json('intervention_domains');
            $table->json('beneficiary_groups');
            $table->date('start');
            $table->date('end');
            $table->json('application_methods');
            $table->string('website_project');
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
