<?php

use App\Models\Algorithm;
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
        Schema::table('datasets', function (Blueprint $table) {
            $table->foreignIdFor(Algorithm::class)->nullable()->after('name');
            $table->dropColumn('algorithm');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('datasets', function (Blueprint $table) {
            $table->dropForeign(['algorithm_id']);
            $table->dropColumn('algorithm_id');
            $table->string('algorithm')->nullable();
        });
    }
};
