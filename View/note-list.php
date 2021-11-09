<?php
include_once "Model/NoteModel.php";
$noteModel = new NoteModel();
$notes = $noteModel->getAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    th {
        text-align: center;
    }
</style>
<body>
<a type="button" class="btn btn-secondary btn-sm " href="index.php?page=create" >Thêm ghi chú</a>
<table border="1px" class="table table-dark table-hover table-bordered container-fluid">
    <thead>
    <tr>
        <th>ID</th>
        <th>Tiêu đề</th>
        <th>Nội dung</th>
        <th>Tag</th>
        <th>Ngày-tháng</th>
        <th colspan="3" >Chức năng</th>
    </tr>
    </thead>
    <tbody>
    <?php if(isset($notes)):?>
    <?php foreach($notes as $note):?>
         <tr>
             <td><?php echo $note["id"]?></td>
             <td><?php echo $note["title"]?></td>
             <td><?php echo $note["content"]?></td>
             <td><?php echo $note["tag"]?></td>
             <td><?php echo $note["dates"]?></td>
             <td> <a type="button" class="btn btn-info" href="index.php?page=detail&id=<?php echo $note["id"]?>">Chọn</a></td>
             <td><a type="button" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không ?')" href="index.php?page=delete&id=<?php echo $note["id"]?>">Xóa</a></button></td>
             <td><a type="button" class="btn btn-success" href="index.php?page=edit&id=<?php echo $note["id"]?>" >Sửa</a></td>
         </tr>
    <?php endforeach;?>
    <?php else:?>
    <tr>
        <td colspan="5"> Không có note nào !!!</td>
    </tr>
    <?php endif;?>
    </tbody>
</table>
</body>
</html>
