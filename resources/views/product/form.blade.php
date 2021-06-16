@extends("layout")
@section("main")
    <div class="content-wrapper" style="min-height: 1299.69px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product</h1>
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
                        <h3 class="card-title">New a product</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{url("/products/save")}}" method="post" class="col-md-6">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{old("name")}}" class="form-control">
                                @error("name")<div class="alert alert-danger">{{$message}}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="text" name="image" value="{{old("image")}}"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control">{{old("description")}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" min="0" value="{{old("price")}}" name="price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Qty</label>
                                <input type="number" min="0" value="{{old("qty")}}" name="qty" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="0">Select a category</option>
                                    @foreach($categories as $item)
                                        <option @if(old("category_id") == $item->__get("id")) selected @endif value="{{$item->__get("id")}}">{{$item->__get("name")}}</option>
                                    @endforeach
                                </select>
                                @error("category_id")<div class="alert alert-danger">{{$message}}</div>@enderror
                            </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </section>
    </div>

@endsection
