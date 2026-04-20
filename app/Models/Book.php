<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'kategori',
        'tahun_terbit',
        'isbn',
        'stok',
        'cover',
        'kode_buku',
        'profile_path',
        'book_profile',
    ];

    protected $casts = [
        'tahun_terbit' => 'integer',
        'book_profile' => 'array',
    ];

    public function getCoverUrlAttribute(): string
    {
        $defaultCover = asset('cover_buku/default-cover.svg');
        $cover = $this->normalizePublicPath($this->cover);

        if ($cover === null) {
            return $defaultCover;
        }

        $disk = Storage::disk('public');

        if ($disk->exists($cover)) {
            return route('media.show', ['path' => $cover]);
        }

        // Legacy fallback: file is physically available in public/storage.
        $legacyPublicPath = public_path('storage/' . $cover);
        if (is_file($legacyPublicPath)) {
            return asset('storage/' . $this->encodePathForUrl($cover));
        }

        return $defaultCover;
    }

    private function normalizePublicPath(?string $value): ?string
    {
        $value = trim((string) $value);
        if ($value === '') {
            return null;
        }

        if (filter_var($value, FILTER_VALIDATE_URL)) {
            $path = parse_url($value, PHP_URL_PATH);
            $value = is_string($path) ? $path : '';
        }

        $value = rawurldecode($value);
        $value = str_replace('\\', '/', $value);
        $value = preg_replace('#/+#', '/', $value) ?? $value;
        $value = ltrim($value, '/');

        if (str_starts_with($value, 'storage/')) {
            $value = substr($value, strlen('storage/'));
        }

        if (str_starts_with($value, 'public/')) {
            $value = substr($value, strlen('public/'));
        }

        if (str_starts_with($value, 'app/public/')) {
            $value = substr($value, strlen('app/public/'));
        }

        return $value !== '' ? $value : null;
    }

    private function encodePathForUrl(string $path): string
    {
        $segments = array_filter(explode('/', $path), static fn ($segment) => $segment !== '');

        return implode('/', array_map('rawurlencode', $segments));
    }

    public function borrowRequests(): HasMany
    {
        return $this->hasMany(BorrowRequest::class);
    }
}
