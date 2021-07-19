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
                        <h3 class="card-title">Giỏ hàng</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-10">
                        <div class="row">
                            <div class="col-md-12">
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
                                            <td><form action="{{url("update-qty",["id"=>$item->id])}}" method="get">
                                                    <input type="number" name="cart_qty" value="{{$item->cart_qty}}"/>
                                                    <button class="btn-outline-primary btn" type="submit">update</button>
                                                </form> </td>
                                            <td>{{$item->cart_qty * $item->__get("price")}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="4">Grand Total</td>
                                        <td>{{$total}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                            <div class="form-group">
                                                @if($checkout ==0)
                                                <a class="btn btn-outline-primary" href="{{url("checkout")}}">Checkout</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    </tfoot>

                                </table>
                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </section>
    </div>

@endsection
