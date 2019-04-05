<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'body'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    //php queries with associations
    //$question = Question::find(1);
    //$question->user->name;

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function getUrlAttribute(){
        return route("questions.show", $this->slug);
    }

    public function getStatusAttribute(){
        if($this->answers > 0){
            if($this->best_answer_id){
                return "answer-accepted";
            }
            return "answer";
        }else{
            return "unanswered";
        }
    }

    public function getBodyHtmlAttribute(){
        return \Parsedown::instance()->text($this->body); #formats the spaces in html for a nice display
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }
}
