@extends('front.master')
@section('body')
    <!--Body-->
    <div class="container py-4">
        @if (session('cart'))
            <div class="row">
                <div class="col-lg-10 col-xl-8 mx-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-2">
                            <li class="breadcrumb-item small"><a href="/">Trang chủ</a></li>
                            <li class="breadcrumb-item small">Giỏ hàng</li>
                        </ol>
                    </nav>
                    <div class="border-1 rounded shadow-sm bg-white">
                        <h4 class="py-2 border-bottom px-4">Có {{ count(session('cart')) }} sản phẩm trong giỏ hàng</h4>
                        <!--Table 0-->
                        <div class="table-responsive pt-2">
                            <table class="table">
                                <tbody>
                                @php $total = 0 @endphp
                                @php $amount = 0 @endphp
                                @foreach (session('cart') as $id => $cart)
                                    @php $total += $cart['price'] * $cart['qty'] @endphp
                                    @if ($cart['sale'])
                                        @php $amount += $cart['sale'] * $cart['qty'] @endphp
                                    @else
                                        @php $amount += $cart['price'] * $cart['qty'] @endphp
                                    @endif
                                    <tr>
                                        <td class="fw-semibold py-3 ps-4">
                                            <img src="front/img/{{ $cart['img'] }}"
                                                 class="float-start" width="80" alt="">
                                            <span class="d-block pleft90px">{{ $cart['name'] }}</span>
                                        </td>
                                        <td class="py-3">
                                            <div class="vstack gap-2 w100px">
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <button type="button"
                                                            class="btn btn-outline-light border-dark text-dark border-opacity-10 text-opacity-75 w-100 minus"
                                                            @if ($cart['qty'] < 2) disabled @endif
                                                            onclick="window.location.href='{{ route('cartMinus', $id) }}'">
                                                        <i class="fa-solid fa-minus"></i></button>
                                                    <button type="button"
                                                            class="btn btn-outline-light pe-none border-dark text-dark border-opacity-10 text-opacity-75 w-100">
                                                        {{ $cart['qty'] }}</button>
                                                    <button type="button"
                                                            class="btn btn-outline-light border-dark text-dark border-opacity-10 text-opacity-75 w-100 plus"
                                                            @if ($cart['qty'] > 2) disabled @endif
                                                            onclick="window.location.href='{{ route('cartPlus', $id) }}'">
                                                        <i class="fa-solid fa-plus"></i></button>
                                                </div>
                                                <div class="link-secondary small mx-auto align-middle"
                                                     onclick="window.location='{{ route('cartRemove', $id) }}'">
                                                    <div class="d-inline-block small fw-semibold cursor">
                                                        <i class="fa-regular fa-trash-can pe-2"></i>Xóa
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3 text-end pe-4">
                                            <div class="vstack gap-1 small fw-semibold">
                                                @if ($cart['sale'])
                                                    <span class="text-danger">{{ number_format($cart['sale'] * $cart['qty'], 0, ',', '.') }}₫</span>
                                                    <span class="text-decoration-line-through text-muted">{{ number_format($cart['price'] * $cart['qty'], 0, ',', '.') }}₫</span>
                                                @else
                                                    <span class="text-danger">{{ number_format($cart['price'] * $cart['qty'], 0, ',', '.') }}₫</span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td class="py-3">
                                        <div class="vstack gap-1">
                                            <span class="small">Tổng tiền:</span>
                                            @if ($total - $amount <> 0)
                                                <span class="small">Giảm:</span>
                                            @endif
                                            <span class="fw-semibold mt-2">Cần thanh toán:</span>
                                        </div>
                                    </td>
                                    <td class="py-3 text-end pe-4">
                                        <div class="vstack gap-1">
                                            <span class="small">{{ number_format($total, 0, ',', '.') }}đ</span>
                                            @if ($total - $amount <> 0)
                                                <span
                                                    class="small">-{{ number_format($total - $amount, 0, ',', '.') }}đ</span>
                                            @endif
                                            <span class="fw-semibold text-danger mt-2">{{ number_format($amount, 0, ',', '.') }}đ</span>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <form class="row mx-0 px-3 g- d-flex" method="post">
                            @csrf
                            <div class="col-md-6 mb-2">
                                <label for="name" class="form-label small">Họ và Tên</label>
                                <input type="text" class="form-control" id="name" name="name">
                                @error('name') <span class="d-block mt-1 text-danger small"><i
                                        class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="phone" class="form-label small">Số điện thoại</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                                @error('phone') <span class="d-block mt-1 text-danger small"><i
                                        class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}</span> @enderror
                            </div>
                            <div class="col-12 mb-2">
                                <label for="address" class="form-label small">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="address">
                                @error('address') <span class="d-block mt-1 text-danger small"><i
                                        class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}</span> @enderror
                            </div>
                            <div class="col-12 mb-2">
                                <label for="note" class="form-label small">Yêu cầu khác (không bắt buộc)</label>
                                <input type="text" class="form-control" id="note" name="note">
                            </div>
                            <div class="vstack py-2">
                                <button type="submit"
                                        class="btn btn-danger text-uppercase fs-5 fw-bold py-3 px-4 mx-auto d-block">
                                    Hoàn tất đặt hàng
                                </button>
                                <span class="small fw-light py-3 mx-auto text-center">Bằng cách đặt hàng, bạn đồng ý với <a
                                        href="/" class="link-secondary text-decoration-none">Điều khoản sử dụng</a> của SilverStore</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @elseif (session('orderCompleted'))
            <div class="row">
                <div class="col-md-8 mx-auto mt-3">
                    <div class="border-1 rounded shadow-sm bg-white">
                        <h4 class="p-2 border-bottom px-4">Đặt hàng thành công</h4>
                        <div class="d-flex flex-column gap-1 text-center col-lg-6 mx-auto py-3">
                            <i class="fa-solid fa-gift text-danger fa-4x"></i>
                            <span class="fw-semibold">Cám ơn quý khách đã mua hàng tại SilverStore.com</span>
                            <span class="small">Bộ phận chăm sóc khách hàng SilverStore sẽ liên hệ đến Quý khách trong vòng <span
                                    class="fw-semibold">5 phút.</span></span>
                        </div>
                        <!--Table 1-->
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-light">
                                <tr>
                                    <th colspan="2" class="fw-semibold px-4">Thông tin khách hàng</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-muted small ps-4 w35p">Mã số đơn hàng</td>
                                    <td class="fw-semibold pe-4">{{ session('orderInformation')['orderDate']->format('jny').session('orderInformation')['orderID'] }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted small ps-4 w35p">Họ và tên</td>
                                    <td class="fw-semibold small pe-4">{{ session('orderInformation')['orderName'] }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted small border-bottom-0 ps-4 w35p">Số điện
                                        thoại
                                    </td>
                                    <td class="fw-semibold border-bottom-0 small pe-4">{{ session('orderInformation')['orderPhone'] }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--Table 2-->
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-light">
                                <tr>
                                    <th class="fw-semibold ps-4">Thông tin đơn hàng</th>
                                    <th class="fw-semibold">Số&nbsp;lượng</th>
                                    <th class="text-end fw-semibold pe-4">Thành&nbsp;tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $total = 0 @endphp
                                @php $amount = 0 @endphp
                                @foreach (session('orderCompleted') as $id => $value)
                                    @php $total+= $value['price'] * $value['qty'] @endphp
                                    @if ($value['sale'])
                                        @php $amount += $value['sale'] * $value['qty'] @endphp
                                    @else
                                        @php $amount += $value['price'] * $value['qty'] @endphp
                                    @endif
                                    <tr>
                                        <td class="fw-semibold py-3 ps-4">
                                            <img src="front/img/{{ $value['img'] }}"
                                                 class="float-start" width="60" alt="">
                                            <span class="d-block pleft70px">{{ $value['name'] }}</span>
                                        </td>
                                        <td class="py-3">{{ $value['qty'] }}</td>
                                        <td class="py-3 text-end pe-4">
                                            <div class="vstack small fw-semibold">
                                                @if ($value['sale'])
                                                    <span class="text-danger">{{ number_format($value['sale'], 0, ',', '.') }}₫</span>
                                                    <span class="text-decoration-line-through text-muted">{{ number_format($value['price'], 0, ',', '.') }}₫</span>
                                                @else
                                                    <span class="text-danger">{{ number_format($value['price'], 0, ',', '.') }}₫</span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td class="py-3">
                                        <div class="vstack">
                                            <span class="small">Tổng tiền:</span>
                                            @if ($total - $amount <> 0)
                                                <span class="small">Giảm:</span>
                                            @endif
                                            <span class="fw-semibold mt-2">Cần thanh toán:</span>
                                        </div>
                                    </td>
                                    <td class="py-3 text-end pe-4">
                                        <div class="vstack">
                                            <span class="small">{{ number_format($total, 0, ',', '.') }}đ</span>
                                            @if ($total - $amount <> 0)
                                                <span
                                                    class="small">-{{ number_format($total - $amount, 0, ',', '.') }}đ</span>
                                            @endif
                                            <span class="fw-semibold text-danger mt-2">{{ number_format($amount, 0, ',', '.') }}đ</span>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="pb-3">
                            <button class="btn btn-danger text-uppercase fs-5 fw-bold py-3 px-4 mx-auto d-block"
                                    onclick="window.location.href='/';">Về trang chủ
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @elseif (session('orderFailure'))
            <div class="row">
                <div class="col-md-8 mx-auto mt-3">
                    <div class="border-1 rounded shadow-sm bg-white">
                        <h4 class="p-2 border-bottom px-4">Đặt hàng thất bại</h4>
                        <div class="d-flex flex-column gap-1 text-center col-lg-6 mx-auto py-3">
                            <i class="fa-solid fa-triangle-exclamation text-danger fa-4x"></i>
                            <span class="fw-semibold">Đã có lỗi trong quá trình đặt hàng</span>
                            <span class="small px-3 px-md-4 px-lg-0">Vui lòng liên hệ số đường dây nóng <span
                                    class="fw-semibold">1800 8888</span> để được hỗ trợ và giải đáp thắc mắc</span></span>
                        </div>
                        <div class="pb-3">
                            <button class="btn btn-danger text-uppercase fw-bold py-2 px-3 mx-auto d-block"
                                    onclick="window.location.href='/';">Về trang chủ
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row mt-5">
                <div class="col-md-8 col-lg-6 mx-auto">
                    <i class="fa-solid fa-cart-plus text-danger d-block text-center fa-4x"></i>
                    <span class="d-block text-center p-2"><h>Không có sản phẩm nào trong giỏ hàng</h></span>
                    <a href="/" class="btn active text-uppercase link-primary fw-bold w-100">Về trang chủ</a>
                    <p class="text-center p-2 mb-0">Khi cần trợ giúp vui lòng gọi <span
                            class="text-primary">1800 8888</span> (8h- 22h)</p>
                </div>
            </div>
        @endif
    </div>
    <!--End Body-->

    <script>
        $(document).ready(function () {
            $(".minus, .plus").one('click', function (e) {
                e.preventDefault();
                $(this).prop('disabled', true);
            });
        });
    </script>
@endsection
