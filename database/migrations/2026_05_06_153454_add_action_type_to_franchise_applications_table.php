<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('franchise_applications', function (Blueprint $table) {
            $table->string('action_type', 50)->nullable()->after('source'); // whatsapp, call, brochure, null
        });
    }

    public function down(): void
    {
        Schema::table('franchise_applications', function (Blueprint $table) {
            $table->dropColumn('action_type');
        });
    }
};
