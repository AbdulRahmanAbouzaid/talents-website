<?php 

class QueryBuilder{

	protected $pdo;

	public function __construct($pdo)
	{
	
		$this->pdo = $pdo;

	}

	public function prepareStatemnt($query)
	{

		return $this->pdo->prepare($query);
		
	}

}