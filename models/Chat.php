<?php 


class Chat extends Model {
    protected static $table = 'chats';


    public static function findOrCreate($first, $second)
    {
        $sql = "select * from chats";
        $sql .= " where (first_side = '{$first}' and second_side = '{$second}')";
        $sql .= " OR (first_side = '{$second}' and second_side = '{$first}')";

        $statement = self::getBuilder()->prepareStatemnt($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Chat')[0];
        return isset($result) ? $result : self::create($first, $second);
    }




    public static function create($first, $second)
    {
        $id = self::insert([
            'first_side' => $first,
            'second_side' => $second
        ]);


        return self::find($id);
    }





    public function addMessage($data)
    {
        $this->updateChat($data['from'], $data['to']);

        Message::insert([
            'sent_from' => $data['from'],
            'sent_to' => $data['to'],
            'body' => $data['text'],
            'chat_id' => $this->id
        ]);
    }




    public function updateChat($from, $to)
    {
        $now = date('Y-m-d H:i:s',strtotime("now"));
        $sql = "update chats SET updated_at = '{$now}'";
        $sql .= " where (first_side = '{$from}' and second_side = '{$to}')";
        $sql .= " OR (first_side = '{$to}' and second_side = '{$from}')";

        $statement = self::getBuilder()->prepareStatemnt($sql);
		$statement->execute();
    }





    public function messages()
    {
        $sql = "select * from messages where chat_id = {$this->id} ORDER BY created_at ASC";
        $statement = self::getBuilder()->prepareStatemnt($sql);
		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS, 'Message');
    }




    public function markAsRead()
    {
        $true = true;
        $sql = "update messages SET is_read = 1 where chat_id = {$this->id}";
        $statement = self::getBuilder()->prepareStatemnt($sql);
		$statement->execute();
    }

}