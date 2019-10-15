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





    public function chats()
    {
        return Message::whereOr('sent_to = '.$this->id, 'sent_from = '.$this->id);
    }


}