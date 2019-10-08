<?php


class Comment extends Model {
    protected static $table = 'comments';


    public function user()
    {
        return User::find($this->user_id);
    }
    
}