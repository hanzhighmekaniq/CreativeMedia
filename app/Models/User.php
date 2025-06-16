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
        'img',
        'description',
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

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    public function testimonialReplies()
    {
        return $this->hasMany(TestimonialReply::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function studentWorks()
    {
        return $this->hasMany(StudentWork::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'skill_users');
    }
}
