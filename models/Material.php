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

        $statement = self::getBuilder()->prepareStatemnt('DELETE FROM ' . $table . ' where user_id = ' . $id . ' AND material_id = '. $this->id);
		$statement->execute();
    }
}