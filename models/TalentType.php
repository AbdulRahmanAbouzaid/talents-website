<?php

class TalentType extends Model {

    protected static $table = 'talent_types';


    public function getTalented()
    {
        $query = "SELECT * FROM talented WHERE FIND_IN_SET('{$this->id}',talents_ids)";

        $statement = self::getBuilder()->prepareStatemnt($query);
        $statement->execute();
		return $statement->fetchAll(PDO::FETCH_CLASS, 'Talented');
    }




    public static function modify($data)
    {
        $updated_data['name'] = $data['name'];
        if(isset($_FILES['icon']['name']) && !empty($_FILES['icon']['name'])){
            $dir = 'public/uploads/talents/';
            $file_name = uniqid() . '-' . str_replace(" ", "-", strtolower($_FILES['icon']['name']));

            move_uploaded_file($_FILES['icon']['tmp_name'], $dir . $file_name);

            $updated_data['icon'] = $file_name;
        }
        self::update( $data['id'], $updated_data);
    }




    public static function create($data)
    {
        $dir = 'public/uploads/talents/';
        $file_name = uniqid() . '-' . str_replace(" ", "-", strtolower($_FILES['icon']['name']));
        

        move_uploaded_file($_FILES['icon']['tmp_name'], $dir . $file_name);

        self::insert([
            'name' => $_POST['name'],
            'icon' => $file_name
        ]);
    }

}