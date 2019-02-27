<?php
namespace Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=forteroche;charset=utf8', 'root', '');
        return $db;
    }

    protected function reqSinglePrepare($request, $variable)
    {
        $db = $this->dbConnect();
        $req = $db->prepare($request);
        $req->execute(array($variable));
        return $req;
    }

    protected function reqArrayPrepare($request, $array)
    {
        $db = $this->dbConnect();
        $req = $db->prepare($request);
        $req->execute($array);
        return $req;
    }

    protected function reqExec($request)
    {
    	$db = $this->dbConnect();
    	$req = $db->prepare($request);
    	$req->execute();
    	return $req;
    }
}