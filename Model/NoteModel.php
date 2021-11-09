<?php
include_once "Database/DB.php";
include_once  "BaseModel.php";
class NoteModel extends BaseModel
{
    protected $table = "notes";

    public function Create($data)
    {
        $sql = "INSERT INTO $this->table(`title`, `content`, `tag`, `dates`) VALUES (?,?,?,?)";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(1, $data["title"]);
        $stmt->bindParam(2, $data["content"]);
        $stmt->bindParam(3, $data["tag"]);
        $stmt->bindParam(4, $data["dates"]);
        $stmt->execute();
    }

    public function edit($data)
    {
        $sql = "UPDATE $this->table SET `title` = ?, `content` = ?, `tag` = ?, `dates` = ? where id = ? ";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(1,$data["title"]);
        $stmt->bindParam(2,$data["content"]);
        $stmt->bindParam(3,$data["tag"]);
        $stmt->bindParam(4,$data["dates"]);
        $stmt->bindParam(5,$data["id"]);
        $stmt->execute();
    }

}