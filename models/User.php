<?php 


class User extends Model{
    
    protected static $table = 'users';


    public static $user_types = [
        1 => 'admin',
        2 => 'talented',
        3 => 'organization',
        4 => 'visitor'
    ];



    public function getTalented()
    {
        return Talented::where('user_id', '=', $this->id)[0];
    }


    public function getOrganization()
    {
        return Organization::where('user_id', '=', $this->id)[0];
    }

    public function isAdmin()
    {
        return $this->type == 1 ? true : false;
    }



    public function isTalented()
    {
        return $this->type == 2 ? true : false;
    }




    public function isOrganization()
    {
        return $this->type == 3 ? true : false;
    }



    public function isVisitor()
    {
        return $this->type == 4 ? true : false;
    }


    public function addTalented($talents)
    {
        Talented::insert([
            'user_id' => $this->id,
            'talents_ids' => implode(',', $talents)
        ]);
    }


    public function addOrganization($description = 'new organization')
    {
        Organization::insert([
            'user_id' => $this->id,
            'description' => $description
        ]);
    }



    public function updateInfo($data){
        $updated_data = [
            'full_name' => $data['name'],
        ];

        if(isset($data['password']) && !empty($data['password'])){
            $updated_data['password'] = password_hash($data['password'], PASSWORD_BCRYPT, ['cost' => 12]);
        }

        User::update($this->id, $updated_data);

    }



    public static function create($data)
    {
        $user = static::insert([
            'email' => $data['email'],
            'password' => $data['password'],
            'full_name' => $data['full_name'],
            'type' => $data['user_type']
        ]);

        return $user;
    }





    public function messagesWith($other_side)
    {
        $sql = "select * from messages ";
        $sql .= "where(sent_to = {$this->id} OR sent_from = {$this->id}) ";
        $sql .= " and (sent_to = {$other_side->id} OR sent_from = {$other_side->id})";

        $statement = self::getBuilder()->prepareStatemnt($sql);
        $statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS, 'Message');
    }





    public function chats()
    {
        $sql = "select * from chats";
        $sql .= " where first_side = {$this->id} OR second_side = {$this->id}";
        $sql .= " ORDER BY updated_at DESC";
        $statement = self::getBuilder()->prepareStatemnt($sql);
        $statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS);
    }







    function recentChatWith() {
        $chats = $this->chats();
        
        $other_sides = [];
        foreach($chats as $chat){
            if($chat->first_side == $this->id){
                $other_sides[] = User::find($chat->second_side); 
            }else{
                $other_sides[] = User::find($chat->first_side); 
            }
        }

        return $other_sides;
    }





    public function msgNotifications()
    {
        $sql = "select * from notifications";
        $sql .= " where sent_to = {$this->id} AND type = 2 AND is_read = 0";
        $statement = self::getBuilder()->prepareStatemnt($sql);
        $statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS);
    }





    public function commentNotifications()
    {
        $sql = "select * from notifications";
        $sql .= " where sent_to = {$this->id} AND type = 3 AND is_read = 0";
        $statement = self::getBuilder()->prepareStatemnt($sql);
        $statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    


}