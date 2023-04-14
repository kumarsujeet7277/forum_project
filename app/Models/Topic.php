<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'content',
        'status',
        'views',
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }




    
    public static function topicValidation()
    {
        return[
            'user_id' =>'required',
            'title' => 'required',
            'description' => 'required| min:500',
            'content' => 'required',                 
            'status' => [
                'required',
                Rule::in(['open', 'closed', 'archived']),   
            ],
            'views' => 'required|numeric',
        ];   
    } 
}
