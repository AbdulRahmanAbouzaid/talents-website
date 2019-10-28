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


    public static function selectAll($options = [])
	{
        $model = get_called_class();
        $table = self::getTable($model);

        $order_by = isset($options['sort']) ? "ORDER BY  {$options['sort'][0]} {$options['sort'][1]}" : '';

        $statement = self::getBuilder()->prepareStatemnt("select * from {$table} {$order_by}");
		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS, $model);
		
    }
    

    public static function find($id)
	{
        $model = get_called_class();
        $table = self::getTable($model);
        
        $sql = "select * from ". $table ." where id = ".$id;
        $statement = self::getBuilder()->prepareStatemnt($sql);
        $statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS, $model)[0];
		
    }
    


    public static function where($key, $operator = '=', $value, $latest = false)
    {
        $model = get_called_class();
        $table = self::getTable($model);

        
        $order_by = $latest ? 'ORDER BY created_at DESC' : 'ORDER BY created_at ASC';
        
        $statement = self::getBuilder()->prepareStatemnt("select * from " . $table ." where `" . $key . "` {$operator} '{$value}' {$order_by}");
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

        foreach($data as $key => $value){
            $update_string .= "`{$key}`='{$value}',";
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




    public static function deleteWhere($column, $value)
    {
        $model = get_called_class();
        $table = self::getTable($model);
        $sql = 'DELETE FROM ' . $table . ' where ' . $column . '= ' . $value;
        $statement = self::getBuilder()->prepareStatemnt($sql);
		$statement->execute();
    }



    public function insertInto($table, $data)
    {
        $pdo = self::getBuilder()->getPDO();

        $keys = implode(', ', array_keys($data));
        $values = ':'. implode(', :', array_keys($data));

        $statement = $pdo->prepare("insert into " . $table . " (". $keys . ") values (". $values. ")");
        $statement->execute($data);

        $inserted_id = $pdo->lastInsertId();        

        return $inserted_id;
    }



    public static function whereIn($key, $values)
    {
        $model = get_called_class();
        $table = self::getTable($model);
        
        $statement = self::getBuilder()->prepareStatemnt("select * from " . $table ." where `" . $key . "` IN ({$values})");
		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS, $model);
    }





    public static function whereOr($first, $second)
    {
        $model = get_called_class();
        $table = self::getTable($model);
        
        $statement = self::getBuilder()->prepareStatemnt("select * from {$table} where {$first} OR {$second}");
		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS, $model);
    }


}