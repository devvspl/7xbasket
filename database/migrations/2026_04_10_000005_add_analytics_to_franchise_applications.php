<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('franchise_applications', function (Blueprint $table) {
            $table->string('device_type', 20)->nullable()->after('submission_count');  // mobile|tablet|desktop
            $table->string('user_agent', 500)->nullable()->after('device_type');
            $table->string('page_url', 500)->nullable()->after('user_agent');
            $table->string('referer_url', 500)->nullable()->after('page_url');
        });
    }

    public function down(): void
    {
        Schema::table('franchise_applications', function (Blueprint $table) {
            $table->dropColumn(['device_type', 'user_agent', 'page_url', 'referer_url']);
        });
    }
};
