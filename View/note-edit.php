<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <input type="text" name="id" value="<?php echo $note['id'] ?>" hidden>
    <input type="text" name="title" placeholder="Tiêu đề" value="<?php echo $note["title"];?>">
    <input type="text" name="content" placeholder="Nội dung" value="<?php echo $note["content"];?>">
    <input type="text" name="tag" placeholder="Tag" value="<?php echo $note["tag"]?>">
    <input type="text" name="dates" placeholder="Ngày-Tháng" value="<?php echo $note["dates"]?>">
    <button type="submit" class="btn btn-success btn-sm">Sửa </button>
    <a type="button" href="index.php" class="btn btn-danger btn-sm">Trở lại</a>
</form>
</body>
</html>