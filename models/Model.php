<?php 


Class Model {

    public static function getBuilder(){
        return require 'core/bootstrap.php';
    }


    public static function getTable($model)
    {
        $model_instance = new $model;
        return $model_instance::$table;        
    }


    public static function selectAll()
	{
        $model = get_called_class();
        $table = self::getTable($model);

		$statement = self::getBuilder()->prepareStatemnt('select * from ' . $table);
		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS, $model);
		
    }
    

    public static function find($id)
	{
        $model = get_called_class();
        $table = self::getTable($model);
        
        $sql = "select * from ". $table ." where id = {$id}";
        $statement = self::getBuilder()->prepareStatemnt($sql);
        $statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS, $model)[0];
		
    }
    


    public static function where($key, $operator = '=', $value)
    {
        $model = get_called_class();
        $table = self::getTable($model);

        $statement = self::getBuilder()->prepareStatemnt("select * from " . $table ." where `" . $key . "` {$operator} '{$value}'");
		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS, $model);
    }



    public static function insert($data)
    {
        $model = get_called_class();
        $table = self::getTable($model);
        $pdo = self::getBuilder()->getPDO();

        $keys = implode(', ', array_keys($data));
        $values = ':'. implode(', :', array_keys($data));

        $statement = $pdo->prepare("insert into " . $table . " (". $keys . ") values (". $values. ")");
        $statement->execute($data);

        $inserted_id = $pdo->lastInsertId();        

        return $inserted_id;
    }



    public static function update($id, $data)
    {
        $model = get_called_class();
        $table = self::getTable($model);

        $keys = array_keys($data);
        $update_string = '';

        foreach($keys as $key){
            $update_string = $key . '=:' . $key . ',';
        }

        $update_string = rtrim($update_string, ',');

        $statement = self::getBuilder()->prepareStatemnt('update ' . $table . ' SET ' . $update_string . ' where id = ' . $id);
		$statement->execute();

    }



    public static function delete($id)
    {
        $model = get_called_class();
        $table = self::getTable($model);

        $statement = self::getBuilder()->prepareStatemnt('DELETE FROM ' . $table . ' where id = ' . $id);
		$statement->execute();

    }


}