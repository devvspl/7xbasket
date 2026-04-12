<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('schema_type', 50)->nullable()->after('schema_markup');
            $table->boolean('meta_index')->default(true)->after('schema_type');
            $table->boolean('meta_follow')->default(true)->after('meta_index');
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['schema_type', 'meta_index', 'meta_follow']);
        });
    }
};
