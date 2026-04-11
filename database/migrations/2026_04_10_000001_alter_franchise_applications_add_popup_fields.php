<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('franchise_applications', function (Blueprint $table) {
            // New popup fields
            $table->string('pincode', 10)->nullable()->after('phone');
            $table->string('store_area')->nullable()->after('pincode');
            $table->string('property_type')->nullable()->after('store_area');
            $table->string('opening_timeline')->nullable()->after('property_type');
            // Spam tracking
            $table->string('source')->default('website')->after('opening_timeline'); // website | popup
            $table->boolean('is_spam')->default(false)->after('source');
            $table->integer('submission_count')->default(1)->after('is_spam'); // per IP per day
        });
    }

    public function down(): void
    {
        Schema::table('franchise_applications', function (Blueprint $table) {
            $table->dropColumn([
                'pincode', 'store_area', 'property_type',
                'opening_timeline', 'source', 'is_spam', 'submission_count',
            ]);
        });
    }
};
