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

}