@extends('admin.layouts.master')
@section('title')
    Quản lý mã giảm giá
@endsection
@section('css')
    {{-- CSS --}}
    <style>
        .giaTri {
            display: none;
        }
        .checkRadio {
            display: flex;
            gap: 40px;
        }
        .input-group {
            align-items: baseline;
        }
        .lableValue {
            width: 5%;
            text-align: center;

        }
        #Value {
            width: 90%;
        }
        #radioV {
            padding-bottom: 0px;
            height: 39px !important;
        }
        #Value:focus {
            outline: none !important;
        }
        .nav-pills .nav-link.active{
            color: #555 !important;
            background-color: #cccccc;
            border-radius: 0px !important;
        }
        .flex-column {
            border-right: 1px solid #eee;
            background-color: #fafafa !important; 
        }
        .link-a {
            color: #2271b1 !important;
        }
        .link-a:hover {
            color: #1d5e94;
        }
        .flex-content {
            padding: 10px !important;
        }
        .alycia {
            align-items: baseline;
            margin: 0px;
        }
    </style>
    <style>
        .modal-backdrop {
            z-index: -1;
        }
        .modal-content {
            margin-top: 80px !important;
        }
    </style>
@endsection
@section('content')
    <section class="p-t-20">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-5 m-b-35">Sửa mã giảm giá</h3>
                </div>
            </div>
            <div>
                <div class="">
                    <form action="{{ route('admin.voucher.update',$voucher->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-9">
                                <div class="card">
                                    <div class="card-header" style="padding: 5px 10px !important;">
                                        <label class="m-0 p-0" for="name">Tên</label>
                                    </div>
                                    <div class="card-body" style="padding: 10px">
                                        <input type="text" class="form-control form-control" value="{{$voucher->name}}" name="name" id="voucher_code">
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" style="padding: 5px 10px !important;">
                                        <label class="m-0 p-0" for="voucher_code">Mã</label>
                                    </div>
                                    <div class="card-body" style="padding: 10px">
                                        <input type="text" class="form-control form-control" value="{{$voucher->voucher_code}}" name="voucher_code" id="voucher_code">
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" style="padding: 5px 10px !important;">
                                        <label class="m-0 p-0" for="description">Mô tả</label>
                                    </div>
                                    <div class="card-body" style="padding: 10px">
                                        <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{$voucher->description}}</textarea>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" style="padding: 5px 10px !important;">
                                        <label class="m-0 p-0" for="">Chi tiết</label>
                                    </div>
                                    <div class="tab-content row m-0" id="myTabContent">
                                        <ul class="col-3 nav nav-pills flex-column text-center p-0">
                                            <li class="nav-item">
                                            <a class="nav-link link-a active" data-bs-toggle="pill" href="#home">Tổng Quan</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link link-a" data-bs-toggle="pill" href="#menu1">Giá trị</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link link-a" data-bs-toggle="pill" href="#menu2">Điều kiện</a>
                                            </li>
                                        </ul>
                                        <div class="col-9 tab-content flex-content">
                                            <div class="tab-pane container active p-0" id="home">
                                                <div>
                                                    <div class="row p-0 alycia mb-3">
                                                        <label class="p-0 col-3" for="value">Loại giảm giá:</label>
                                                        <select class="form-control form-control-sm col" name="value" onchange="typeVoucher()" id="value">
                                                            <option {{$voucher->value == "Phần trăm"?"selected":""}} value="Phần trăm">Giảm giá theo phần trăm</option>
                                                            <option {{$voucher->value == "Cố địng"?"selected":""}} value="Cố định">Giảm giá cố định</option>
                                                        </select>
                                                    </div>
                                                    <div class="row p-0 alycia mb-3">
                                                        <label class="p-0 col-3" for="quanlity">Số lượng mã:</label>
                                                        <input type="number" class="form-control form-control-sm col" value="{{$voucher->quanlity}}" name="quanlity" id="quanlity"><!-- Kiểu giảm -->
                                                    </div>
                                                    <div class="row p-0 alycia mb-3">
                                                        <label class="p-0 col-3" for="date_start">Ngày bắt đầu:</label>
                                                        <input type="date" onchange="changeDate()" class="form-control form-control-sm col" value="{{$voucher->date_start}}" name="date_start" id="date_start"><!-- Kiểu giảm -->
                                                    </div>
                                                    <div class="row p-0 alycia mb-3">
                                                        <label class="p-0 col-3" for="date_end">Ngày kết thúc:</label>
                                                        <input type="date" onchange="changeDate()" class="form-control form-control-sm col" value="{{$voucher->date_end}}" name="date_end" id="date_end"><!-- Kiểu giảm -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane container fade p-0" id="menu1">
                                                <div>
                                                    <div class="row p-0 alycia mb-3">
                                                        <label class="p-0 col-3" for="decreased_value">Mức giảm:</label>
                                                        <input type="number" class="form-control form-control-sm col" value="{{$voucher->decreased_value}}" name="decreased_value" id="decreased_value">
                                                        <input class="form-control form-control-sm col-1 text-center" value="{{$voucher->value == 'Phần trăm'?'%':'VNĐ'}}" type="text" id="iconV" disabled>
                                                    </div>
                                                    <div class="row p-0 alycia mb-3">
                                                        <label class="p-0 col-3" for="max_value">Giảm tối đa:</label>
                                                        <input type="number" class="form-control form-control-sm col" value="{{$voucher->max_value}}" name="max_value" id="max_value">
                                                        <input class="form-control form-control-sm col-1 text-center" value="VNĐ" type="text" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane container fade" id="menu2">
                                                <div>
                                                    <div class="row p-0 alycia mb-3">
                                                        <p class="col">Phiếu giảm giá áp dụng cho đơn đơn hàng có giá trị tối thiểu tương đương</p>
                                                    </div>
                                                    <div class="row p-0 alycia mb-3">
                                                        <label class="p-0 col-3" for="quanlity">Đơn hàng tối thiểu:</label>
                                                        <input type="number" class="form-control form-control-sm col" value="{{$voucher->condition}}" name="condition" id="quanlity">
                                                        <input class="form-control form-control-sm col-1 text-center" value="VNĐ" type="text" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card">
                                    <div class="card-header" style="padding: 9px 12px !important">
                                        <h5 class="m-0 p-0">Cập nhật</h5>
                                    </div>
                                    <div class="card-body" style="padding: 8px 20px 20px">
                                        <div class=""><p style="font-size: 14px">
                                            <span class="label">Trạng thái</span>:
                                            <select onchange="loadStatus()" name="status" id="status">
                                                <option {{ $voucher->status == "Chưa diễn ra" ? "selected" : "disabled"}} id="ChuaDienRa" value="Chưa diễn ra">Chưa diễn ra</option>
                                                <option {{ $voucher->status == "Đang diễn ra" ? "selected" : ""}} @if($voucher->status != "Chưa diễn ra" && $voucher->status != "Đang diễn ra") disabled @endif id="DangDienRa" value="Đang diễn ra">Đang diễn ra</option>
                                                <option {{ $voucher->status == "Đã ngừng" ? "selected" : ""}} @if($voucher->status == "Chưa diễn ra") disabled @endif id="DaNgung" value="Đã ngừng">Đã ngừng</option>
                                                <option {{ $voucher->status == "Hết hàng" ? "selected" : ""}} value="Hết hàng">Hết hàng</option>
                                            </select>
                                        </p></div>
                                        <div class=""><p style="font-size: 14px">
                                            <span class="label">Hiển thị</span>: <span class="text-success"><strong>{{$voucher->type_code}}</strong></span>
                                            <input type="hidden" name="type_code" value="{{$voucher->type_code}}">
                                        </p></div>
                                        <div class=""><p style="font-size: 14px">
                                            <span class="label">Ngày nhập</span>: <span class="text-dark">{{$voucher->created_at}}</span>
                                        </p></div>
                                        <div class=""><p style="font-size: 14px">
                                            <span class="label">Cập nhập ngày</span>: <span class="text-dark">{{$voucher->updated_at}}</span>
                                        </p></div>
                                    </div>
                                    <div class="card-footer">
                                        <div>
                                            @if ($voucher->date_start > today())
                                                <a href="" style="font-size: 14px;color:#b02a37 !important;text-decoration:underline;" data-bs-toggle="modal" data-bs-target="#exampleModal">Xóa mã này</a>
                                            @endif
                                        </div>
                                        <div>
                                            <a href="{{ route('admin.voucher.index') }}" style="font-size: 14px;color:#b02a37 !important;text-decoration:underline;">Hủy thay đổi</a>
                                        </div>
                                        <div style="text-align: end;">
                                            <button class="btn btn-primary">Cập nhập</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.voucher.destroy',$voucher->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h3 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có chắc muốn <span class="text-danger">Xóa</span> mã giảm giá: {{$voucher->name}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    {{-- JAVA SCRIPT --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2e8884d211.js" crossorigin="anonymous"></script>
    <script>
        typeVoucher();
        function typeVoucher() {
            const typeV = document.querySelector('#value');
            const decreased_value = document.querySelector('#decreased_value');
            const max_value = document.querySelector('#max_value');
            const iconV = document.querySelector('#iconV');
            if (typeV.value == "Phần trăm") {
                decreased_value.max = 100;
                if (decreased_value.value > 100) {
                    decreased_value.value = 100;
                    iconV.innerText = "%";
                }
            }
            else {
                decreased_value.value = max_value.value;
                iconV.innerText = "VNĐ";
            }
        }
        function loadStatus() {
            const status = document.querySelector('#status');
            const date_start = document.querySelector('#date_start');
            const date_end = document.querySelector('#date_end');
            const current_State = "{{ $voucher->status }}";
            const today = "{{date('Y-m-d')}}";
            if (status.value == "Chưa diễn ra") {
                if (status.value == current_State) {
                    date_start.value = "{{ $voucher->date_start }}";
                    date_end.value = "{{ $voucher->date_end }}";
                }
            }
            else if(status.value == "Đang diễn ra") {
                if (status.value == current_State) {
                    date_start.value = "{{ $voucher->date_start }}";
                    date_end.value = "{{ $voucher->date_end }}";
                }
                else {
                    date_start.value = today;
                    if(date_end.value < today) {
                        date_end.value = today;
                    }
                    else {
                        date_end.value = "{{ $voucher->date_end }}";
                    }
                }
            }
            else if(status.value == "Đã ngừng") {
                if (status.value == current_State) {
                    date_start.value = "{{ $voucher->date_start }}";
                    date_end.value = "{{ $voucher->date_end }}";
                }
                else {
                    const date_Today = new Date();
                    date_Today.setDate(date_Today.getDate() - 1);
                    const mon = date_Today.getMonth() + 1;
                    const yesterday = date_Today.getFullYear() + "-" + mon + "-" + date_Today.getDate();
                    date_end.value = yesterday;
                    if(date_start.value > today) {
                        date_start.value = yesterday;
                    }
                    else {
                        date_start.value = "{{ $voucher->date_start }}";
                    }
                }
            }
            else {
                date_start.value = "{{ $voucher->date_start }}";
                date_end.value = "{{ $voucher->date_end }}";
                document.querySelector('#DaNgung').disabled = true;
            }
        }
        function changeDate() {
            if(date_start.value <= "{{date('Y-m-d')}}" && date_end.value >= "{{date('Y-m-d')}}") {
                document.querySelector('#DangDienRa').disabled = false;
                document.querySelector('#DangDienRa').selected = true;
            }
            else if(date_end.value < "{{date('Y-m-d')}}") {
                document.querySelector('#DaNgung').disabled = false;
                document.querySelector('#DaNgung').selected = true;
            }
        }
    </script>
@endsection
