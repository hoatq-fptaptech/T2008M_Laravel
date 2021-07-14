@extends("layout")
@section("main")
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Checkout</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Simple Tables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Đặt hàng</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-10">
                        <form action="{{url("checkout")}}" method="post">
                         <div class="row">

                             <div class="col-md-6">

                                    @csrf
                                    <div class="form-group">
                                        <label>Customer Name</label>
                                        <input type="text" name="customer_name" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Customer Tel</label>
                                        <input type="tel" name="customer_tel" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Customer Address</label>
                                        <textarea class="form-control" name="customer_address"></textarea>
                                    </div>

                             </div>
                             <div class="col-md-6">
                                <table class="table">
                                    <tbody>
                                        @php $total = 0;$checkout=0; @endphp
                                        @foreach($cart as $item)
                                            @php $total += $item->cart_qty * $item->__get("price") @endphp
                                            <tr>
                                                <td><img src="{{$item->getImage()}}" width="50" height="50"/> </td>
                                                <td>
                                                    <p>{{$item->__get("name")}}</p>
                                                    @if($item->qty < $item->cart_qty)
                                                        <p class="text-danger"><i>Sản phẩm không đủ số lượng</i></p>
                                                        @php $checkout++ @endphp
                                                    @endif
                                                </td>
                                                <td>{{$item->__get("price")}}</td>
                                                <td>{{$item->cart_qty}}</td>
                                                <td>{{$item->cart_qty * $item->__get("price")}}</td>
                                            </tr>
                                        @endforeach
                                        <tfoot>
                                            <tr>
                                                <td colspan="4">Grand Total</td>
                                                <td>{{$total}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5">
                                                    @if($checkout ==0)
                                                    <div class="form-group">
                                                        <button class="btn btn-outline-primary" type="submit">Place order</button>
                                                    </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </tbody>
                                </table>
                             </div>

                         </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </section>
    </div>

@endsection
