<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Topic;
use App\Models\Comment;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function topic()
    {
        return $this->hasMany(Topic::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }


    public static function userValidation()
    {
        return[
            'name' =>[
                'required',
                'regex:/^[\pL\s]+$/u',
                'max:50',
            ],
            // alpha:ascii (for user only)
          
            'email' => ' email|required ',
            'password' => [
                'required',
                'confirmed',
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            ],
            
            'avatar' => 'image | mimes:jpg,png',

            // 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

             
            'role' => [
                'required',
                Rule::in(['user', 'moderator', 'admin']),   
            ],
        ];
    }
}
