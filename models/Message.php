<?php


class Message extends Model {
    protected static $table = 'messages';



    // public static function create($data)
    // {
    //     self::updateChat($data['from'], $data['to']);

    //     self::insert([
    //         'sent_from' => $data['from'],
    //         'sent_to' => $data['to'],
    //         'body' => $data['text']
    //     ]);
    // }



    public static function updateChat($from, $to)
    {
        $now = date('Y-m-d H:i:s',strtotime("now"));
        $sql = "update chats SET updated_at = '{$now}'";
        $sql .= " where (first_side = '{$from}' and second_side = '{$to}')";
        $sql .= " OR (first_side = '{$to}' and second_side = '{$from}')";

        $statement = self::getBuilder()->prepareStatemnt($sql);
		$statement->execute();
    }
}