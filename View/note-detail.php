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
<a href="index.php"  type="button" class="btn btn-success ">Trở lại</a>
<div class="card text-white bg-secondary container-fluid mt-5" style="max-width: 80%" >
    <div class="card-header">Thời gian : <?php echo $note["dates"];?></div>
    <div class="card-body">
        <h5 class="card-title">Tiêu đề : <?php echo $note["title"];?></h5>
        <p class="card-text">Nội dung : <?php echo $note["content"];?></p>
        <p class="card-text">Tag : <?php echo $note["tag"];?></p>
    </div>
</div>
</body>
</html>