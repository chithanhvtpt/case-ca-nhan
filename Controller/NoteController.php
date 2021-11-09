<?php
include_once "Model/NoteModel.php";

class NoteController
{
    private $noteModel;

    public function __construct()
    {
        $this->noteModel = new NoteModel();
    }

    public function index()
    {
        $note = $this->noteModel->getAll();
        include_once "View/note-list.php";
    }

    public function Create($data)
    {
        $data2 =
            [
                "title" => $data["title"],
                "content" => $data["content"],
                "tag" => $data["tag"],
                "dates" => $data["dates"]
            ];
        $this->noteModel->Create($data2);
        header("location:index.php");
    }

    public function showFormCreate()
    {
        include_once "View/note-create.php";
    }

    public function DeleteNote($id)
    {
        if ($this->noteModel->getById($id) !== null) {
            $this->noteModel->delete($id);
            header("location:index.php");
        }
    }

    public function showDetail($id)
    {
        $note = $this->noteModel->getById($id);
        include_once "View/note-detail.php";
    }

    public function edit($id)
    {
        $note = $this->noteModel->getById($id, $request);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                "title" => $request["title"],
                "content" => $request["content"],
                "tag" => $request["tag"],
                "dates" => $request["dates"]
            ];
            $this->noteModel->edit($data);
            header("location:index.php");
        }
    }

    public function showFormEdit()
    {
        $id = $_REQUEST["id"];
        $note = $this->noteModel->getById($id);
        include_once "View/note-edit.php";
    }

}