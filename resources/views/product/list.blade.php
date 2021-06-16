@extends("layout")
@section("main")
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Category</h1>
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
                        <h3 class="card-title">Danh sách</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <a href="{{url("/products/new")}}" class="btn btn-outline-primary">Thêm mới</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Category</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <td>{{$item->__get("id")}}</td>
                                    <td>{{$item->__get("name")}}</td>
                                    <td>{{$item->__get("image")}}</td>
                                    <td>{{$item->__get("description")}}</td>
                                    <td>{{$item->__get("price")}}</td>
                                    <td>{{$item->__get("qty")}}</td>
{{--                                    <td>{{$item->__get("category_name")}}</td>--}}
                                    <td>{{$item->Category->__get("name")}}</td>
                                    <td>{{$item->__get("created_at")}}</td>
                                    <td>{{$item->__get("updated_at")}}</td>
                                    <td><a href="{{url("/categories/edit",["id"=>$item->id])}}">Điều chỉnh</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </section>
    </div>

@endsection
