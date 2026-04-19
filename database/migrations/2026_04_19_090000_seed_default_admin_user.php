<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        User::updateOrCreate(
            ['email' => 'sarin@gmail.com'],
            [
                'name' => 'Sarin',
                'password' => Hash::make('11223344'),
                'role' => 'admin',
                'profile_photo' => 'avatars/rinn.jpg',
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Keep the default admin account intact on rollback.
    }
};
