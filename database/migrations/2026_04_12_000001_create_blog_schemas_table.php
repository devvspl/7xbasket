<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['schema_markup', 'schema_type']);
        });

        Schema::create('blog_schemas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_id')->constrained()->cascadeOnDelete();
            $table->string('schema_type', 50)->default('BlogPosting');
            $table->longText('schema_markup');
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_schemas');

        Schema::table('blogs', function (Blueprint $table) {
            $table->text('schema_markup')->nullable();
            $table->string('schema_type', 50)->nullable();
        });
    }
};
