<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class PublicStorageController extends Controller
{
    public function show(string $path)
    {
        $path = $this->normalizePublicPath($path);

        if ($path === null || str_contains($path, '..')) {
            abort(404);
        }

        $disk = Storage::disk('public');

        if ($disk->exists($path)) {
            return $disk->response($path, null, [
                'Cache-Control' => 'public, max-age=86400',
            ]);
        }

        // Legacy fallback: some repos keep files directly in public/storage.
        $legacyPath = public_path('storage/' . $path);
        if (is_file($legacyPath)) {
            return response()->file($legacyPath, [
                'Cache-Control' => 'public, max-age=86400',
            ]);
        }

        abort(404);
    }

    private function normalizePublicPath(string $path): ?string
    {
        $path = rawurldecode($path);
        $path = str_replace('\\', '/', $path);
        $path = preg_replace('#/+#', '/', $path) ?? $path;
        $path = ltrim($path, '/');

        if (str_starts_with($path, 'storage/')) {
            $path = substr($path, strlen('storage/'));
        }

        if (str_starts_with($path, 'public/')) {
            $path = substr($path, strlen('public/'));
        }

        if (str_starts_with($path, 'app/public/')) {
            $path = substr($path, strlen('app/public/'));
        }

        return $path !== '' ? $path : null;
    }
}
