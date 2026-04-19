<?php

use App\Models\Book;
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
        $users = [
            [
                'email' => 'sarin@gmail.com',
                'name' => 'Sarin',
                'password' => '11223344',
                'role' => 'admin',
                'profile_photo' => 'avatars/rinn.jpg',
            ],
            [
                'email' => 'andi@gmail.com',
                'name' => 'Andi',
                'password' => '12345678',
                'role' => 'user',
                'profile_photo' => null,
            ],
            [
                'email' => 'siti@gmail.com',
                'name' => 'Siti',
                'password' => '12345678',
                'role' => 'user',
                'profile_photo' => null,
            ],
        ];

        foreach ($users as $userData) {
            User::updateOrCreate(
                ['email' => strtolower($userData['email'])],
                [
                    'name' => $userData['name'],
                    'password' => Hash::make($userData['password']),
                    'role' => $userData['role'],
                    'profile_photo' => $userData['profile_photo'],
                ]
            );
        }

        $books = [
            [
                'judul' => 'Laravel 11 for Beginners',
                'penulis' => 'John Doe',
                'penerbit' => 'Packt Publishing',
                'kategori' => 'Web Development',
                'tahun_terbit' => 2024,
                'isbn' => '978-1804619494',
                'stok' => 15,
                'cover' => 'cover_buku/sample1.jpg',
                'kode_buku' => 'BK000001',
            ],
            [
                'judul' => 'Clean Code',
                'penulis' => 'Robert C. Martin',
                'penerbit' => 'Prentice Hall',
                'kategori' => 'Software Engineering',
                'tahun_terbit' => 2008,
                'isbn' => '978-0132350884',
                'stok' => 8,
                'cover' => 'cover_buku/sample2.jpg',
                'kode_buku' => 'BK000002',
            ],
            [
                'judul' => 'Belajar PHP dari Nol',
                'penulis' => 'Sarin',
                'penerbit' => 'Self Published',
                'kategori' => 'PHP',
                'tahun_terbit' => 2024,
                'isbn' => null,
                'stok' => 25,
                'kode_buku' => 'BK000003',
            ],
            [
                'judul' => 'Desain Pattern PHP',
                'penulis' => 'Ahmad Rosid',
                'penerbit' => 'Elex Media',
                'kategori' => 'Design Pattern',
                'tahun_terbit' => 2023,
                'isbn' => '978-623-00-1234-5',
                'stok' => 12,
                'cover' => 'cover_buku/sample4.jpg',
                'kode_buku' => 'BK000004',
            ],
            [
                'judul' => 'JavaScript Modern',
                'penulis' => 'Jane Smith',
                'penerbit' => 'O\'Reilly',
                'kategori' => 'JavaScript',
                'tahun_terbit' => 2023,
                'isbn' => null,
                'stok' => 20,
                'kode_buku' => 'BK000005',
            ],
            [
                'judul' => 'Naruto',
                'penulis' => 'Masashi Kishimoto',
                'penerbit' => 'Shonen Jump',
                'kategori' => 'Anime',
                'tahun_terbit' => 1999,
                'isbn' => 'ANIME-001',
                'stok' => 10,
                'cover' => 'cover_buku/anime/naruto.jpg',
                'kode_buku' => 'BK000006',
            ],
            [
                'judul' => 'Attack on Titan',
                'penulis' => 'Hajime Isayama',
                'penerbit' => 'Kodansha',
                'kategori' => 'Anime',
                'tahun_terbit' => 2009,
                'isbn' => 'ANIME-002',
                'stok' => 10,
                'cover' => 'cover_buku/anime/attack on titan.jpg',
                'kode_buku' => 'BK000007',
            ],
            [
                'judul' => 'Jujutsu Kaisen',
                'penulis' => 'Gege Akutami',
                'penerbit' => 'Shueisha',
                'kategori' => 'Anime',
                'tahun_terbit' => 2018,
                'isbn' => 'ANIME-003',
                'stok' => 10,
                'cover' => 'cover_buku/anime/jujutsu kaisen.jpg',
                'kode_buku' => 'BK000008',
            ],
            [
                'judul' => 'Baki Hanma',
                'penulis' => 'Keisuke Itagaki',
                'penerbit' => 'Akita Shoten',
                'kategori' => 'Anime',
                'tahun_terbit' => 1991,
                'isbn' => 'ANIME-004',
                'stok' => 10,
                'cover' => 'cover_buku/anime/baki hanmajpg.jpg',
                'kode_buku' => 'BK000009',
            ],
            [
                'judul' => 'Kangean Asura',
                'penulis' => 'Unknown',
                'penerbit' => 'Anime Press',
                'kategori' => 'Anime',
                'tahun_terbit' => 2024,
                'isbn' => 'ANIME-005',
                'stok' => 10,
                'cover' => 'cover_buku/anime/kangean asura.jpg',
                'kode_buku' => 'BK000010',
            ],
            [
                'judul' => 'Kangean of the Baki',
                'penulis' => 'Unknown',
                'penerbit' => 'Anime Press',
                'kategori' => 'Anime',
                'tahun_terbit' => 2024,
                'isbn' => 'ANIME-006',
                'stok' => 10,
                'cover' => 'cover_buku/anime/kangean of the baki.jpg',
                'kode_buku' => 'BK000011',
            ],
            [
                'judul' => 'Suzune',
                'penulis' => 'Unknown',
                'penerbit' => 'Anime Press',
                'kategori' => 'Anime',
                'tahun_terbit' => 2024,
                'isbn' => 'ANIME-007',
                'stok' => 10,
                'cover' => 'cover_buku/anime/suzune.jpg',
                'kode_buku' => 'BK000012',
            ],
        ];

        foreach ($books as $bookData) {
            Book::updateOrCreate(
                ['kode_buku' => $bookData['kode_buku']],
                $bookData
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Keep seeded demo data intact to avoid deleting production records.
    }
};
