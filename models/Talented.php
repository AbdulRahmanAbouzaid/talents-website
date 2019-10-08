<?php 


class Talented extends Model {

    protected static $table = 'talented';


    public function createMaterial($data)
    {
        $data['talented_id'] = $this->id;

        Material::insert($data);
    }



    public function getMaterials()
    {
        return Material::where('talented_id', '=', $this->id);
    }


    public function user()
    {
        return User::find($this->user_id);
    }


    public function getTalents()
    {
        return TalentType::whereIn('id', $this->talents_ids);

    }




    public function addComment($data)
    {
        Comment::insert([
            'material_id' => $data['material_id'],
            'user_id' => $this->user->id
        ]);
    }

}