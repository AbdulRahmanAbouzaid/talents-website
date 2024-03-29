<?php 


class Material extends Model {

    protected static $table = 'materials';

    public function addLikeBy($user_id)
    {
        $this->insertInto('likes', [
            'material_id' => $this->id,
            'user_id' => $user_id
        ]);
    }



    public function unlike($user_id)
    {
        $statement = self::getBuilder()->prepareStatemnt('DELETE FROM likes where user_id = ' . $user_id . ' AND material_id = '. $this->id);
		$statement->execute();
    }




    public function comments()
    {
        return Comment::where('material_id', '=', $this->id);
    }



    public function isLikedBy($user_id)
    {
        $statement = self::getBuilder()->prepareStatemnt('SELECT * FROM likes where user_id = ' . $user_id . ' AND material_id = '. $this->id);
        $statement->execute();
        return $statement->fetchColumn() > 0 ? true : false;
    }




    public function addComment($data)
    {
        Comment::insert([
            'user_id' => $data['user_id'],
            'material_id' => $this->id,
            'body' => $data['body']
        ]);
    }




    public function deleteComments()
    {
        $sql = "delete from comments where material_id = {$this->id}";
        $statement = self::getBuilder()->prepareStatemnt($sql);
		$statement->execute();
    }




    public function deleteLikes(Type $var = null)
    {
        $sql = "delete from likes where material_id = {$this->id}";
        $statement = self::getBuilder()->prepareStatemnt($sql);
		$statement->execute();
    }




    public function user()
    {
        return Talented::find($this->talented_id)->user();
    }


}