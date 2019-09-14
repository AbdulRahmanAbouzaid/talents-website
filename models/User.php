<?php 


class User extends Model{
    
    protected static $table = 'users';


    public static $user_types = [
        1 => 'admin',
        2 => 'talented',
        3 => 'organization',
        4 => 'visitor'
    ];



    public function isAdmin()
    {
        return $this->type == 1 ? true : false;
    }



    public function isTalented()
    {
        return $this->type == 2 ? true : false;
    }




    public function isOrganization()
    {
        return $this->type == 3 ? true : false;
    }



    public function isVisitor()
    {
        return $this->type == 4 ? true : false;
    }


}