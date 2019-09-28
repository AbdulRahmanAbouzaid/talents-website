<?php 


class Organization extends Model {

    protected static $table = 'organizations';

    public function user()
    {
        return User::find($this->user_id);
    }


    public function getEvents()
    {
        return Event::where('organization_id', '=', $this->id);
    }
}