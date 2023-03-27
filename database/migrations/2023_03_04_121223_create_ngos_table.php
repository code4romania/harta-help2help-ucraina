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
        Schema::create('ngos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\City::class)->nullable()->constrained();
            $table->foreignIdFor(\App\Models\County::class)->nullable()->constrained();
            $table->text('name');
            $table->string('slug');
            $table->text('description');
            $table->integer('number_of_beneficiaries')->nullable();
            $table->json('activity_domains');
            $table->string('phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('address')->nullable();
            $table->string('website');
            $table->string('story')->nullable();
            $table->json('social_icons');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('n_g_o_s');
    }
};
