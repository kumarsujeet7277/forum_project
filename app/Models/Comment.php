<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'topic_id',
        'content',
        'parent_id',
    ];

 


    public static function commentValidation()
    {
        return[
            'user_id' =>'required',
            'topic_id' => 'required',
            'content' => 'required', 
            'parent_id' => 'required',               
            
        ];  
    }




    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

}
