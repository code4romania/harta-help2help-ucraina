<?php

declare(strict_types=1);

use App\Models\Ngo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Collection;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $this->getNgos()
            ->reject(fn (Ngo $ngo) => ! array_key_exists('name', $ngo->social_icons))
            ->map(function (Ngo $ngo) {
                $ngo->update([
                    'social_icons' => [
                        'facebook' => data_get($ngo->social_icons, 'url'),
                    ],
                ]);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->getNgos()
            ->reject(fn (Ngo $ngo) => array_key_exists('name', $ngo->social_icons))
            ->map(function (Ngo $ngo) {
                $ngo->update([
                    'social_icons' => [
                        'name' => 'facebook',
                        'url' => data_get($ngo->social_icons, 'facebook'),
                    ],
                ]);
            });
    }

    private function getNgos(): Collection
    {
        return Ngo::query()
            ->withoutEagerLoads()
            ->get(['id', 'social_icons']);
    }
};
