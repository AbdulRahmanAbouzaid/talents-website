<?php 


class Talented extends Model {

    protected static $table = 'talented';


    public function createMaterial($data)
    {
        $data['talented_id'] = $this->id;

        Material::insert($data);
    }

}