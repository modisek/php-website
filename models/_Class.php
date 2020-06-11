<?php

class _Class
{

    private $conn;
    private $table_name = "classes";

    public $id;
    public $class_name;
    public $class_time;
    public $class_desc;

    public function __construct($db)
    {

        $this->conn = $db;

    }

    //create

    public function create()
    {

        $query = "INSERT INTO " . $this->table_name . " SET id=:id, class_name=:class_name, class_time=:class_time,class_desc=:class_desc";
        $stmnt = $this->conn->prepare($query);

        //values
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->class_name = htmlspecialchars(strip_tags($this->class_name));
        $this->class_time = htmlspecialchars(strip_tags($this->class_time));
        $this->class_desc = htmlspecialchars(strip_tags($this->class_desc));

        //bind values
        $stmnt->bindParam(":id", $this->id);
        $stmnt->bindParam(":class_name", $this->class_name);
        $stmnt->bindParam(":class_time", $this->class_time);
        $stmnt->bindParam(":class_desc", $this->class_desc);

        if ($stmnt->execute()) {
            return true;

        } else {
            return false;
        }

    }

    //read
    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY class_time";

        $stmnt = $this->conn->prepare($query);
        $stmnt->execute();

        return $stmnt;
    }
    //TODO:update
    public function update()
    {

        $query = "UPDATE
                " . $this->table_name . "
            SET id=:id, class_name=:class_name, class_time=:class_time,class_desc=:class_desc
            WHERE
                id = :id";

        $stmt = $this->conn->prepare($query);

        // posted values

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->class_name = htmlspecialchars(strip_tags($this->class_name));
        $this->class_time = htmlspecialchars(strip_tags($this->class_time));
        $this->class_desc = htmlspecialchars(strip_tags($this->class_desc));

        //bind values
        $stmnt->bindParam(":id", $this->id);
        $stmnt->bindParam(":class_name", $this->class_name);
        $stmnt->bindParam(":class_time", $this->class_time);
        $stmnt->bindParam(":class_desc", $this->class_desc);

        // execute the query
        if ($stmt->execute()) {
            return true;
        }

        return false;

    }

    //TODO: delete

   

}
