<?php

namespace App\Models;

use Database\Seeders\TagSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    use HasFactory;


    protected $fillable = ['user_id','topic_id','title','excerpt','slug','body'];

    protected $with = ['user','topic','answers'];

    public function scopeFilter($query,array $filters){

        $query->when($filters['keyword'] ?? false,function ($query,$keyword){
            $query
                ->where('title','like','%'.$keyword.'%')
                ->orWhere('body','like','%'.$keyword.'%')
                ->orWhere('excerpt','like','%'.$keyword.'%')
                ->orWhereExists(fn ($query) =>
                    $query->from('users')
                        ->whereColumn('users.id','questions.user_id')
                        ->where('users.username','like','%'.$keyword.'%')
                );
        });

        $query->when($filters['topic'] ?? false,function ($query,$topic){
            $query->whereHas('topic',fn($query) =>
                $query->where('slug',$topic)
            );
        });
    }


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function topic(){
        return $this->belongsTo(Topic::class);
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function reactions(){
        return $this->hasMany(Reaction::class);
    }

}
