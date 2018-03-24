<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Duy</title>
</head>

<body style="background-color: rgba(0,0,0,0.1);">
<div style="width: 50%; margin: auto; background-color: white;padding: 10px;">
    <a href="">Shop.zent</a>
    <div style="padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;">
        <b>Đơn hàng đã sẵn sàng để giao đến quý khách <label>{{$order->name}}</label>!</b>
        <p>Chúng tôi vừa bàn giao đơn hàng của quý khách đến đối tác vận chuyển T. Dự kiến giao hàng vào <label> kể từ sau thời điểm email được gửi đi 2 ngày</label></p>
        <p>Để kiểm tra thời gian giao hàng của đối tác Thạch Thất,</p>
        <legend style="display: block;width: 100%;padding: 0;margin-bottom: 20px;font-size: 21px;line-height: inherit;color: #333;border: 0;border-bottom: 1px solid #e5e5e5;">Thông tin đơn hàng #{{$order->code}} <small style="color: #777;">{{$order->updated_at}}</small></legend>
        <div style="@media screen and (min-width: 766px) {
                width: 50%;
                float: left;
        }">
            <th>Thông tin thanh toán</th>
            <ul>
                <li>{!! $order->name !!}</li>
                <li><a href="#">{!! $order->email !!}</a></li>
                <li>{!! $order->mobile !!}</li>
            </ul>
        </div>
        <div style=" @media screen and (min-width: 766px) {
                width: 50%;
                float: left;
        }">
            <th>Địa chỉ giao hàng</th>
            <ul>
                <li>{!! $order->name !!}</li>
                <li>{!! $order->address !!}</li>
                <li>{!! $order->mobile !!}</li>
            </ul>　
        </div>
        <p><b>Phí vận chuyển: </b>0đ (miễn phí)</p>
        <p><b>Phương thức thanh toán: </b>Thanh toán tiền mặt khi nhận hàng</p>
        <table style="clear: both;margin: auto;border: 1px solid black;line-height: 30px;">
            <legend>CHI TIẾT ĐƠN HÀNG</legend>
            <tr style="color: #fff;background-color: #337ab7;border-color: #2e6da4;">
                <th>SẢN PHẨM</th>
                <th>ĐƠN GIÁ</th>
                <th>SỐ LƯỢNG</th>
                <th>GIẢM GIÁ</th>
                <th>TỔNG TẠM</th>
            </tr>
            @foreach($content as $od)
                <tr>
                    <th>Giày thể thao</th>
                    <th>{{$od->price}}</th>
                    <th>{{$od->qty}}</th>
                	<th>0%</th>
                    <th>${!! $od->price*$od->qty !!}</th>
                </tr>
            @endforeach
            <tr>
                <td>&nbsp;</td>
                <td colspan="3">Tổng giá trị sản phẩm chưa giảm giá</td>
                <td>{{$order->total_price}}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3">Giảm giá Phiếu Quà Tặng</td>
                <td>0.00đ</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3">Chi phí vận chuyển</td>
                <td>0.00đ</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"><b>Tổng giá trị đơn hàng</b></td>
                <td><b>{{$order->total_price}}</b></td>
            </tr>
        </table>

        <p>Trường hợp quý khách có những băn khoăn về đơn hàng, có thể xem thêm mục <a href="#">Các câu hỏi thường gặp.</a></p>
        <p>Bạn cần được hỗ trợ ngay? chỉ cần truy cập <a href="https://www.facebook.com/quang.peter.7" class="text-success">Văn Duy Facebook</a>, hoặc gọi số điện thoại <label class="text-success">01684031786</label> (8-21h cả ngày T7, CN). Đội ngũ Shop.zent luôn sẵn sàng hỗ trợ bạn bất kì lúc nào.</p>
        <p><b>Một lần nữa Shop.zent xin cảm ơn quý khách.</b></p>
    </div>
</div>
</body>
</html>