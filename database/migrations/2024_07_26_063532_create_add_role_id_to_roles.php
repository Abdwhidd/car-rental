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
        Schema::table('users', function (Blueprint $table) {
            // Pastikan tabel roles sudah ada sebelum melakukan ini
            $table->unsignedBigInteger('role_id')->nullable()->after('email');

            // Tambahkan foreign key ke kolom role_id yang mengacu ke tabel roles
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus foreign key dan kolom role_id
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });
    }
};
