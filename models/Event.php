<?php 


class Event extends Model {

    protected static $table = 'events';


    public function getOrganization()
    {
        return User::find(Organization::find($this->organization_id)->user_id);
    }


    public static function getLatest()
    {
        $statement = self::getBuilder()->prepareStatemnt('select * from ' . self::$table . ' ORDER BY date DESC LIMIT 5');
		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS, 'Event');
    }



    public function getTalents()
    {
        return TalentType::whereIn('id', $this->talents_ids);
    }


}