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
    <input type="hidden" name="id" id="" value="<?= $sanpham['id'] ?>">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
      <input type="varchar" class="form-control" id="exampleInputPassword1" name="ten" value="<?= $sanpham['ten'] ?>">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Link Ảnh</label>
      <input type="file" class="form-control" id="exampleInputPassword1" name="anh" value="<?= $sanpham['anh'] ?>">
      <input type="hidden" name="anh" id="anh" value = "<?= $sanpham['anh'] ?>">
      <img src="<?= $sanpham['anh'] ?>" width="100px" alt="">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Giá sản phẩm</label>
      <input type="double" class="form-control" id="exampleInputPassword1" name="gia" value="<?= $sanpham['gia'] ?>">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Số lượng</label>
      <input type="int" class="form-control" id="exampleInputPassword1" name="soluongton" value="<?= $sanpham['soluongton'] ?>">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Mô tả</label>
      <input type="text" class="form-control" id="exampleInputPassword1" name="mota" value="<?= $sanpham['mota'] ?>">
    </div>
    <label for="iddm" class="form-label">Danh mục</label>
    <select id="iddm" name="iddm" class="form-select">
      <!-- PHP thêm danh sách danh mục tại đây -->
      <?php foreach ($danhmuc as $dm): ?>
        <option value="<?= ($dm['id']) ?>" <?= ($dm['id'] == $sanpham['iddm']) ? 'selected' : '' ?>>
          <?= $dm['ten_danhmuc'] ?>
        </option>
      <?php endforeach; ?>
    </select>
    <label for="trangthai" class="form-label">Trạng thái</label>
    <select name="trangthai" id="trangthai" class="form-select">
      <option value="Còn hàng">Còn hàng</option>
      <option value="Hết hàng">Hết hàng</option>
    </select>
    <button type="submit" class="btn btn-primary">Sửa</button>
  </form>

</body>

</html>