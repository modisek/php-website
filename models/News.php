<?php

class News
{
    private $conn;
    private $table_name = "news";

    public $id;
    public $heading;
    public $content;
    public $createdAt;

    public function __construct($db)
    {

        $this->conn = $db;

    }

    public function create()
    {

        $query = "INSERT INTO " . $this->table_name . " SET id=:id,heading=:heading,content=:content,createdAt=:createdAt";
        $stmnt = $this->conn->prepare($query);

        //values
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->heading = htmlspecialchars(strip_tags($this->heading));
        $this->content = htmlspecialchars(strip_tags($this->content));
        $this->createdAt = date('Y-m-d H:i:s');

        //bind values
        $stmnt->bindParam(":id", $this->id);
        $stmnt->bindParam(":heading", $this->heading);
        $stmnt->bindParam(":content", $this->content);
        $stmnt->bindParam(":createdAt", $this->createdAt);

        if ($stmnt->execute()) {
            return true;

        } else {
            return false;
        }

    }

    public function read()
    {
        $query = "SELECT content, '_time' FROM " . $this->table_name . " ORDER BY _time";

        $stmnt = $this->conn->prepare($query);
        $stmnt->execute();

        return $stmnt;
    }

    public function delete()
    {}
}
