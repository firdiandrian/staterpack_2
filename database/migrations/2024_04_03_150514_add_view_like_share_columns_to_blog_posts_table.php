<?php

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
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->integer('count_view')->default(0)->after('image');
            $table->integer('count_like')->default(0)->after('count_view');
            $table->integer('count_share')->default(0)->after('count_like');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropColumn('count_view');
            $table->dropColumn('count_like');
            $table->dropColumn('count_share');
        });
    }
};
