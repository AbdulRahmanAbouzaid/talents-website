<?php 


Class Model {

    protected static $table;

    public static function getBuilder(){
        return require 'core/bootstrap.php';
    }


    public static function selectAll()
	{

		$statement = self::getBuilder()->prepareStatemnt('select * from ' . self::$table);

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS);
		
    }
    

    public static function find($key, $value)
	{

		$statement = self::getBuilder()->prepareStatemnt("select * from ". self::$table ." where {$key} = {$value}");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS);
		
    }
    


    public static function where($key, $operator = '=', $value)
    {
        $statement = self::getBuilder()->prepareStatemnt("select * from " . self::$table ." where `" . $key . "` {$operator} '{$value}'");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS);
    }



    public function insert($data)
    {
        $keys = implode(', ', array_keys($data));
        $values = ':'. implode(',:', array_values($data));

        $statement = self::getBuilder()->prepareStatemnt("insert into {$this->table} ({$keys}) values ({$values})");

		$statement->execute();
    }


}