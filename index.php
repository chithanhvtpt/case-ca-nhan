<?php
include_once "Controller/AuthController.php";
include_once "Model/NoteModel.php";
include_once "Controller/NoteController.php";
session_start();
$noteController = new NoteController();
$noteModel = new NoteModel();
$authController = new AuthController();
$page = (isset($_GET["page"]) ? $_GET["page"] : "");
$username = ($_SESSION["username"] ?? "");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
    body{
    }
</style>
<body>
<div class="navbar">
    <p>Name : <?php echo $username;?></p>
    <a href="index.php?page=login" type="button" class="btn btn-warning bt-sm">Logout</a>
</div>
<?php
switch ($page) {
    case "login":
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $authController->showFormLogin();
        } else {
            $authController->login($_REQUEST);
        }
        break;
    case "logout":
        $authController->logOut();
        break;
    case "note-list":
        $noteController->index();
        $authController->checkAuth();
        break;
    case "create":
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $noteController->showFormCreate();
        }else{
            $noteController->Create($_REQUEST);
        }
        break;
    case "delete":
        $noteController->DeleteNote($_REQUEST["id"]);
        break;
    case "detail":
        $id = $_GET["id"];
        $noteController->showDetail($id);
        break;
    case "edit":
        $id = $_GET["id"];
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $noteController->showFormEdit();
        }else {
            $noteController->edit($id, $_REQUEST);
        }
        break;
    default:
        $noteController->index();
}
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
