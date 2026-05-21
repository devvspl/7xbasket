<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('preview_token', 64)->nullable()->unique()->after('published_at');
            $table->timestamp('preview_expires_at')->nullable()->after('preview_token');
            $table->boolean('allow_backdate')->default(false)->after('preview_expires_at');
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['preview_token', 'preview_expires_at', 'allow_backdate']);
        });
    }
};