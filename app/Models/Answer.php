<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $guarded = []; //app service provider model::unguard da se dozvoli mass assignemtn

    protected $with = ['author'];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id'); //ako necemo da metod ima isto ime kao i model onda moramo da naglasimo sta je strani kljux
    }

    public function getMostAnswersUser(){
        $users = User::select(['id'])->get();
        $ids = [];

        foreach ($users as $u){
            $ids[] = $u->id;
        }

        return Answer::whereIn('answers.user_id',$ids)
            ->with('author')
            ->orderBy('total', 'desc')
            ->selectRaw('answers.user_id, count(*) as total')
            ->groupBy('answers.user_id')
            ->take(5)
            ->get();
    }
}
