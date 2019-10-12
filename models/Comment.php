<?php


class Comment extends Model {
    protected static $table = 'comments';


    public function user()
    {
        return User::find($this->user_id);
    }
    


    public function material(Type $var = null)
    {
        return Material::find($this->material_id);
    }
}