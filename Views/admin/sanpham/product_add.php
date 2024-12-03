<!DOCTYPE html>
<html>

<head>
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="container mt-5">
    <h1>Thêm sản phẩm</h1>
    <form action="index.php?ctl=store" method="post" enctype="multipart/form-data" class="mt-3">
    <div class="mb-3">
            <label for="ten" class="form-label">ID</label>
            <input type="text" id="id" name="id" class="form-control" placeholder="ID sản phẩm">
        </div>
        <div class="mb-3">
            <label for="ten" class="form-label">Tên sản phẩm</label>
            <input type="text" id="ten" name="ten" class="form-control" placeholder="Tên sản phẩm">
        </div>
        <div class="mb-3">
            <label for="gia" class="form-label">Giá sản phẩm</label>
            <input type="number" id="gia" name="gia" class="form-control" placeholder="Giá sản phẩm">
        </div>
        <div class="mb-3">
            <label for="soluongton" class="form-label">Số lượng tồn</label>
            <input type="number" id="soluongton" name="soluongton" class="form-control" placeholder="Số lượng tồn">
        </div>
        <div class="mb-3">
            <label for="mota" class="form-label">Mô tả</label>
            <textarea id="mota" name="mota" class="form-control" placeholder="Mô tả"></textarea>
        </div>
        <div class="mb-3">
            <label for="anh" class="form-label">Hình ảnh</label>
            <input type="file" id="anh" name="anh" class="form-control">
        </div>
        <div class="mb-3">
            <label for="madm" class="form-label">Danh mục</label>
            <select id="iddm" name="iddm" class="form-select">
                <!-- PHP thêm danh sách danh mục tại đây -->
                <?php if (!empty($danhmuc)): ?>
                    <?php foreach ($danhmuc as $dm): ?>
                        <option value="<?= htmlspecialchars($dm['id']) ?>">
                            <?= htmlspecialchars($dm['ten_danhmuc']) ?>
                        </option>
                    <?php endforeach; ?>
                <?php else: ?>
                    <option value="">Không có danh mục</option>
                <?php endif; ?>
            </select>
        </div>
        <div class="mb-3">
                <label for="trangthai" class="form-label">Trạng thái</label>
                <select name="trangthai" id="trangthai">
                    <option value="Còn hàng">Còn hàng</option>
                    <option value="Hết hàng">Hết hàng</option>
                </select>
            </div>
        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </form>
</body>

</html>