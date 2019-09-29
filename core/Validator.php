<?php 


class Validator {

    public $errors = [];
    public $request = [];


    public static function getBuilder(){
        return require 'core/bootstrap.php';
    }



    public function validate($request, $validatedData)
    {
        $this->request = $request;
        foreach($validatedData as $input => $rules){
            $this->validateInput($input, explode('|', $rules));
        }
        return $this->errors;
    }



    public function validateInput($input, $rules)
    {
        foreach($rules as $rule){
            if(strpos($rule, ':') == true){
                $rule = explode(':', $rule);
                $param = $rule[1];
                $rule = $rule[0];
                // var_dump($rule);
                $error = $this->$rule($input, $param);
            }else{
                $error = $this->$rule($input);
            }
            
            if($error){
                $this->errors[$input] = $error;
            }
        }
    }



    public function required($input)
    {
        if(!isset($this->request[$input]) || empty($this->request[$input])){
            return $input . ' is Required';
        }
        return false;
    }



    public function requiredFile($file)
    {
        if(!isset($this->request[$file]['name']) || empty($this->request[$file]['name'])){
            return $file . ' is not uploaded!';
        }
        return false;
    }



    public function unique($input, $table)
    {
        $value = $this->request[$input];
        $statement = self::getBuilder()->prepareStatemnt("select * from " . $table ." where `" . $input . "` = '{$value}'");
        $statement->execute();
       
		if($statement->fetchColumn() > 0){
            return $input . ' is already exists in ' . $table;
        }

        return false;
    }


    // public function file(Type $var = null)
    // {
    //     if($this->request['files'])
    // }
    

}