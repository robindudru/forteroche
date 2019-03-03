<?php
/**
 * Managing actions to perform regarding database requests.
 *
 * @package    Forteroche
 * @author     Robin Dupont-Druaux <contact@robindupontdruaux.fr>
 */

namespace Model;

class Manager
{
    /**
     * Connects to database
     */
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=forteroche;charset=utf8', 'root', '');
        return $db;
    }

    /**
     * Executes a prepared request for a single variable parameter
     *
     * @param  string $request the request to prepare
     * @param  mixed $variable the single value for the prepared request
     * @return  bool
     */
    protected function reqSinglePrepare($request, $variable)
    {
        $db = $this->dbConnect();
        $req = $db->prepare($request);
        $req->execute(array($variable));
        return $req;
    }
    /**
     * Executes a prepared request for an array of variable parameters
     *
     * @param  string $request the request to prepare
     * @param  array $array an array of values for the prepared request
     * @return  object
     */
    protected function reqArrayPrepare($request, $array)
    {
        $db = $this->dbConnect();
        $req = $db->prepare($request);
        $req->execute($array);
        return $req;
    }
    /**
     * Executes a prepared request without variable parameters
     *
     * @param  string $request the request to prepare and execute
     * @return  object
     */
    protected function reqExec($request)
    {
        $db = $this->dbConnect();
        $req = $db->prepare($request);
        $req->execute();
        return $req;
    }
}
