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



    public function createEvent($data)
    {
        Event::insert([
            'organization_id' => $this->id,
            'title' => $data['title'],
            'content' => $data['content'],
            'date' => $data['date']
            //'talents_ids' => implode(',', $data['talent-types'])
            // 'media' => $data['file']
        ]);
    }
}