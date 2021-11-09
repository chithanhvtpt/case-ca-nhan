<?php
include_once "BaseModel.php";
include_once "Database/DB.php";
class UserModel extends BaseModel
{
    protected $table = "users";
    public function checkLogin($email, $password)
    {
        $sql = "select * from $this->table where email = :email and password = :password";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function getByEmail($email)
    {
        $sql = "select * from $this->table where email = :email";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

}