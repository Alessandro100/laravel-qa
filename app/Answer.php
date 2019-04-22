<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //this confirms the one-to-many association
    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getBodyHtmlAttribute(){
        return \Parsedown::instance()->text($this->body); #formats the spaces in html for a nice display
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }

    public static function boot(){
        //this function calls initiates lifecycle hooks to eloquent functions. Can add code to them
        parent::boot();

        static::created(function($answer){
            $answer->question->increment('answers_count');
            $answer->question->save();
        });

        static::saved(function($answer){
            echo "Answer saved\n";
        });
    }
}
