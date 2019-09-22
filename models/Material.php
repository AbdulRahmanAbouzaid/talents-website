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
}