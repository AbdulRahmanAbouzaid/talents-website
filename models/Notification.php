<?php


class Notification extends Model {

    protected static $table = 'notifications';


    public static function create($data)
    {
        return self::insert([
            'sent_to' => $data['to'],
            'content' => $data['content'],
            'type' => $data['type'] == 'message' ? 2 : 1  
        ]);
    }
}