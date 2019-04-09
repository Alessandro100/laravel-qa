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
}
