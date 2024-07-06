@extends('master.ad')

@section('title', 'Tạo hóa đơn nhập')

@section('main')
<div class="container">
    <form action="{{ route('hoadonnhap.store') }}" method="POST" id="invoice-form">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="maNhaPhanPhoi">Mã nhà phân phối</label>
                    <select name="maNhaPhanPhoi" class="form-control" id="maNhaPhanPhoi">
                        <option value="">Chọn nhà phân phối</option>
                        @foreach($matk as $matks)
                        <option value="{{ $matks->MaNPP }}">{{ $matks->TenNPP }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kieuthanhtoan">Kiểu thanh toán</label>
                    <input type="text" class="form-control" id="kieuthanhtoan" name="kieuthanhtoan" required>
                </div>
                <div class="form-group">
                    <label for="account">Tài khoản nhập</label>
                    <input type="hidden" class="form-control" id="maTaiKhoan" name="maTaiKhoan" value="{{ $currentUser->id }}">
                    <input type="text" class="form-control" value="{{ $currentUser->name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="tongtien">Tổng tiền hóa đơn</label>
                    <input type="number" class="form-control" id="tongtien" name="tongtien" readonly required>
                </div>
            </div>
            <div class="col-md-6">
                <h4>Chi tiết sản phẩm</h4>
                <div id="product-details">
                    <div class="product-detail">
                        <div class="form-group">
                            <label for="sanpham_id">Sản phẩm</label>
                            <select name="chitiets[0][sanpham_id]" class="form-control sanpham_id">
                                <option value="">Chọn sản phẩm</option>
                                @foreach($nhaps as $nhap)
                                <option value="{{ $nhap->id }}">{{ $nhap->tensp }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Số lượng</label>
                            <input type="number" name="chitiets[0][soLuong]" class="form-control quantity" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Giá nhập</label>
                            <input type="number" name="chitiets[0][giaNhap]" class="form-control price" required>
                        </div>
                        <div class="form-group">
                            <label for="total_price">Tổng tiền</label>
                            <input type="number" name="chitiets[0][tongtien]" class="form-control total_price" readonly>
                        </div>
                    </div>
                </div>
                <button type="button" id="add-product" class="btn btn-secondary">Thêm sản phẩm</button>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Biến để theo dõi chỉ số của sản phẩm trong hóa đơn
    let productIndex = 1;

    // Hàm tính tổng tiền của hóa đơn
    function calculateTotal() {
        // Biến để lưu tổng tiền của hóa đơn
        let totalInvoicePrice = 0;

        // Lặp qua từng sản phẩm trong hóa đơn
        $('.product-detail').each(function() {
            // Lấy giá trị số lượng từ ô nhập tương ứng, nếu không có giá trị thì mặc định là 0
            const quantity = parseFloat($(this).find('.quantity').val()) || 0;
            // Lấy giá trị giá nhập từ ô nhập tương ứng, nếu không có giá trị thì mặc định là 0
            const price = parseFloat($(this).find('.price').val()) || 0;
            // Tính tổng tiền của sản phẩm bằng cách nhân số lượng với giá
            const total = quantity * price;
            // Gán giá trị tổng tiền của sản phẩm vào ô "Tổng tiền" tương ứng
            $(this).find('.total_price').val(total);
            // Cộng tổng tiền của sản phẩm vào biến tổng tiền của hóa đơn
            totalInvoicePrice += total;
        });

        // Gán giá trị tổng tiền của hóa đơn vào ô "Tổng tiền" của biểu mẫu
        $('#tongtien').val(totalInvoicePrice);
    }

    // Hàm thêm chi tiết sản phẩm vào hóa đơn
    function addProductDetail() {
        // Mẫu HTML cho chi tiết sản phẩm
        const productDetailTemplate = `
        <div class="product-detail">
                <div class="form-group">
                    <label for="sanpham_id">Sản phẩm</label>
                    <select name="chitiets[${productIndex}][sanpham_id]" class="form-control sanpham_id">
                        <option value="">Chọn sản phẩm</option>
                        @foreach($nhaps as $nhap)
                        <option value="{{ $nhap->id }}">{{ $nhap->tensp }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Số lượng</label>
                    <input type="number" name="chitiets[${productIndex}][soLuong]" class="form-control quantity" required>
                </div>
                <div class="form-group">
                    <label for="price">Giá nhập</label>
                    <input type="number" name="chitiets[${productIndex}][giaNhap]" class="form-control price" required>
                </div>
                <div class="form-group">
                    <label for="total_price">Tổng tiền</label>
                    <input type="number" name="chitiets[${productIndex}][tongtien]" class="form-control total_price" readonly>
                </div>
                <button type="button" class="btn btn-danger remove-product">Xóa</button>
            </div>
        `;

        // Thêm mẫu chi tiết sản phẩm vào danh sách sản phẩm trong hóa đơn
        $('#product-details').append(productDetailTemplate);

        // Tăng chỉ số sản phẩm để chuẩn bị cho sản phẩm tiếp theo
        productIndex++;
    }

    // Sự kiện khi giá trị số lượng hoặc giá nhập của sản phẩm thay đổi
    $('#product-details').on('input', '.quantity, .price', calculateTotal);

    // Sự kiện khi nhấn nút "Thêm sản phẩm"
    $('#add-product').click(addProductDetail);

    // Sự kiện khi nhấn nút "Xóa sản phẩm"
    $('#product-details').on('click', '.remove-product', function() {
        // Loại bỏ sản phẩm chứa nút "Xóa" khỏi danh sách sản phẩm trong hóa đơn
        $(this).closest('.product-detail').remove();
        // Tính lại tổng tiền của hóa đơn sau khi xóa sản phẩm
        calculateTotal();
    });

    // Tính tổng tiền của hóa đơn lần đầu tiên khi trang web được tải
    calculateTotal();
});

</script>
@endsection
