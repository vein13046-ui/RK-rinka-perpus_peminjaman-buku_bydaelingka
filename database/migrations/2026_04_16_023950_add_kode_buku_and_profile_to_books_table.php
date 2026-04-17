<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('kode_buku')->nullable()->after('isbn');
            $table->string('profile_path')->nullable()->after('kode_buku');
            $table->json('book_profile')->nullable()->after('profile_path');
        });

        // Generate kode_buku for existing books
        $books = DB::table('books')->get();
        foreach ($books as $book) {
            $kode = 'BK' . str_pad($book->id, 4, '0', STR_PAD_LEFT);
            DB::table('books')->where('id', $book->id)->update(['kode_buku' => $kode]);
        }

        Schema::table('books', function (Blueprint $table) {
            $table->string('kode_buku')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn(['kode_buku', 'profile_path', 'book_profile']);
        });
    }
};
