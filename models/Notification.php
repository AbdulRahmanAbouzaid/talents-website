<?php


class Notification extends Model {

    protected static $table = 'notifications';


    public static function create($data)
    {
        switch($data['type']){
            case 'message' : $type = 2;
                            break;
            case 'admin' : $type = 1;
                            break;
            case 'comments' : $type = 3;
                            break;
            default : $type = 1;
        }

        return self::insert([
            'sent_to' => $data['to'],
            'content' => $data['content'],
            'type' => $type,
            'related_element_id' => isset($data['relatedId']) ? $data['relatedId'] : 0
        ]);
    }




    public function markCommentAsRead()
    {
        $sql = "update notifications set is_read = 1 where id = {$this->id} and related_element_id = {$this->related_element_id}";
        $stmt = self::getBuilder()->prepareStatemnt($sql);
        $stmt->execute();

        // self::update($this->id, [
        //     'is_read' => 1
        // ]);
    }
}