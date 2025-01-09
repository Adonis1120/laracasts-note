<?php

namespace Core;

use PDO;    // Due to the use of namespace, you have also to declare all classes. All PHP classes like PDO will be use the root directory.

Class Database {
    public $connection;
    public $statement;

    public function __construct($config, $username = "root", $password = "") {
        $dsn = "mysql:" . http_build_query($config, "", ";");   // $dsn = "mysql:host=localhost;dbname=laracasts_note;user=root";
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            // if "use PDO" was not set but namespace was set, you can also do this instead of "use PDO"
            // \PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = []) {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function get() {
        return $this->statement->fetchAll();
    }

    public function find() {
        return $this->statement->fetch();
    }

    public function findOrFail() {
        $result = $this->find();

        if (!$result) {
            $abort = new Router;
            $abort->abort();
        }

        return $result;
    }
}