<?php

$ob=new MongoDBHelper;
$ob->GetActiveMongoManager();


class MongoDBHelper
{
    public $DB = "EmployeeDB";
    public $Server = "127.0.0.1";
    public $Port=27017;
    function GetActiveMongoManager()
    {
        $manager = new MongoDB\Driver\Manager("mongodb://". $this->Server.":".$this->Port);  // connect to mongodb
        return $manager;
    }
    function Find($Collection,$Filters,$Limit=9999)
    {
        $manager=$this->GetActiveMongoManager();
        
        $options = ['limit' => $Limit];
        $query = new MongoDB\Driver\Query($Filters,$options);
        $results = $manager->executeQuery($this->DB.".".$Collection, $query);
        return $results;
    }
    function Insert($Collection,$ObjectToWrite)
    {
        
        $manager=$this->GetActiveMongoManager();
        $bulkWrite = new MongoDB\Driver\BulkWrite;
        $doc =$ObjectToWrite;//['name' => 'John', age => 33, profession => 'Guess what?'];
        $bulkWrite->insert($doc);
        $manager->executeBulkWrite($this->DB.".".$Collection, $bulkWrite);
        return true;
        
    }
    function Update($Collection,$Filters,$ObjectToWrite)
    {
        $manager=$this->GetActiveMongoManager();
        $bulkWrite = new MongoDB\Driver\BulkWrite;      
        $options = ['multi' => false, 'upsert' => false];
        $bulkWrite->update($Filters, $ObjectToWrite, $options);
        $manager->executeBulkWrite($this->DB.".".$Collection, $bulkWrite); 
        return true;
    }
    function Delete($Collection,$Filters,$Limit=9999)
    {
        $manager=$this->GetActiveMongoManager();
        $bulkWrite = new MongoDB\Driver\BulkWrite;
        $options = ['limit' => $Limit];
        $bulkWrite->delete($Filters, $options);
        $manager->executeBulkWrite($this->DB.".".$Collection, $bulkWrite);
        return true;
    }
}



?>