<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // We'll store global schemas in a special row with page_key = '_global'
        // No schema change needed — we already have schema_markup as text
        // Just ensure the row exists
        \App\Models\SeoMeta::firstOrCreate(
            ['page_key' => '_global'],
            [
                'title' => null,
                'description' => null,
                'schema_markup' => null,
                'faq_schema' => null,
            ]
        );
    }

    public function down(): void
    {
        \App\Models\SeoMeta::where('page_key', '_global')->delete();
    }
};
