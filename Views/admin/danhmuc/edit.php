<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Id danh mục</label>
    <input type="text"  name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $danhmuc['id'] ?>" disabled>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Tên danh mục</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="ten_danhmuc" value="<?= $danhmuc['ten_danhmuc'] ?>">
  </div>
  <button type="submit" class="btn btn-primary">Sửa</button>
  <a href="index.php">Danh sách</a>
</form>
</body>
</html>

