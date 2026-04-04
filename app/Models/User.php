<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_photo',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get profile photo URL with default fallback
     */
    public function profilePhotoUrl(): string
    {
        if ($this->profile_photo) {
            return asset('storage/' . $this->profile_photo);
        }
        
        // Default SVG avatar
        return 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTE2IDdhNCA0IDAgMTEtOCAwIDQgNCAwIDAgMSA4IDB6IiBzdHJva2U9IiM2QjNGQzIiBzdHJva2Utd2lkdGg9IjIiLz4KPHBhdGggZD0iTTEyIDE0YTcgNyAwIDAwLTcgN2gxNGExIDcgNyAwIDAwLTctN3oiIHN0cm9rZT0iIzZCM0ZDIiBzdHJva2Utd2lkdGg9IjIiLz4KPC9zdmc+';
    }
}
