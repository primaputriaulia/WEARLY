<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('destination_id')->nullable();
            $table->string('destination_name')->nullable();
            $table->string('kurir')->nullable();
            $table->string('layanan_kurir')->nullable();
            $table->string('estimasi_pengiriman')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'destination_id',
                'destination_name',
                'kurir',
                'layanan_kurir',
                'estimasi_pengiriman',
            ]);
        });
    }
};