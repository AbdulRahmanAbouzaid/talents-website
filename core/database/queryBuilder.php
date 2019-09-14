<?php 

class QueryBuilder{

	protected $pdo;

	public function __construct($pdo)
	{
	
		$this->pdo = $pdo;

	}


	public function getPDO()
	{
		return $this->pdo;
	}

	public function prepareStatemnt($query)
	{

		return $this->pdo->prepare($query);
		
	}


	public function find($sql, $model)
	{
		$statement = $this->prepareStatemnt("select * from ". $table ." where id = {$value}");
		$statement->execute();
		$statement->fetchAll(PDO::FETCH_CLASS, $model);
	}

}