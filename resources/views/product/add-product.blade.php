@include('component.table-header')
@include('component.sidebar')

<style>
    .content-wrapper {
        min-height: fit-content !important;
        height: fit-content !important;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="outerWrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0">Dashboard</h1> -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol> -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid" id="addHere">

            <div class="my-2">
                <button class="btn btn-primary" id="prodAddition" onclick="addProduct()"><i class="fa fa-plus"></i> Add Products</button>
            </div>
            @if(session()->has('status'))
            <div class="alert my-3 p-3 alert-success">
                {{session('status')}}
            </div>
            @endif
            <div class="card" id="destro" style="display: none;">
                <div class="card-header">
                    <div class="card-title">
                        <h5>Product Master</h5>
                    </div>
                </div>

                <form action="{{route('save-product')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <!-- Main row -->
                        <div class="row p-2">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <select name="brand" class="form-control " style="width: 100%;">
                                        <option value="">Select</option>
                                        @foreach($brand as $brands)
                                        <option value="{{$brands->brand}}">{{$brands->brand}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="market_type">Market Type</label>
                                    <select name="market_type" id="market_type1" class="form-control">
                                        <option value="Domestic">Domestic</option>
                                        <option value="Export">Export</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="product_code">Product Code</label>
                                    <input type="text" name="product_code" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" name="product_name" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="parent"> Parent Category</label>
                                    <select name="parent_category" id="parent_category1" class="form-control " style="width: 100%;">
                                        <option value="All">Select</option>
                                        @foreach($category as $categorys)
                                        <option value="{{$categorys->parent}}">{{$categorys->parent}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="Category">Category</label>
                                    <select name="category" class="form-control " style="width: 100%;" id="category1">

                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <select name="title" class="form-control " style="width: 100%;">
                                      @foreach($tittle  as   $tittles)
                                        <option value="{{$tittles->title}}">{{$tittles->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="sub_title">Sub Title</label>
                                    <select name="sub_title" id="sub_title" class="form-control " style="width: 100%;">
                                        <option value="" selected disabled>Select</option>
                                        <option>Free From Alcohol Industrial Raw Material Not Intended For End Consumer Not For Direct Consumption</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="product_size">Product Size</label>
                                    <select name="product_size" class="form-control " style="width: 100%;">
                                        <option value="" selected disabled>Select One...</option>
                                        <option value="1ltr">1 Ltr</option>
                                        <option value="100ml">100 ml</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="ingredients">Ingredients</label>
                                    <select name="ingredients" class="form-control " style="width: 100%;">
                                        <option value="">Select</option>
                                        @foreach($ingredient as $ingredients )
                                        <option value="{{$ingredients->ingredient}}">{{$ingredients->ingredient}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="mrp">Mrp</label>
                                    <input type="number" name="mrp" class="form-control">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class=" d-flex flex-column flex-sm-row justify-content-between">
                            <button class="btn btn-primary my-2 my-sm-0">Save</button>
                            <button class="btn btn-default my-2 my-sm-0" onclick="destroyProd()">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="card" id="updateDestro" style="display: none;">
                <div class="card-header">
                    <div class="card-title">
                        <h5> Update Product Master</h5>
                    </div>
                </div>
                <form action="{{route('update-product')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <!-- Main row -->
                        <div class="row p-2">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <input type="hidden" name="id" id="id">
                                    <select name="brand" id="brand" class="form-control " style="width: 100%;">
                                        <option value="">Select</option>
                                        @foreach($brand as $brands)
                                        <option value="{{$brands->brand}}">{{$brands->brand}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="market_type">Market Type</label>
                                    <select name="market_type" id="market_type" class="form-control ">
                                        <option value="DOMESTIC">DOMESTIC</option>
                                        <option value="EXPORT">EXPORT</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="product_code">Product Code</label>
                                    <input type="text" name="product_code" id="product_code" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" name="product_name" id="product_name" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="parent"> Parent Category</label>
                                    <select name="parent_category" id="parent_category" class="form-control " style="width: 100%;">
                                        <option value="All">Select</option>
                                        @foreach($category as $categorys)
                                        <option value="{{$categorys->parent}}">{{$categorys->parent}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control" style="width: 100%;">
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <select name="title" id="title" class="form-control " style="width: 100%;">
                                    @foreach($tittle  as   $tittles)
                                        <option value="{{$tittles->title}}">{{$tittles->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="sub_title">Sub Title</label>
                                    <select name="sub_title" id="sub_title" class="form-control " style="width: 100%;">
                                        <option value="" selected disabled>Select One...</option>
                                        <option value="st1">Free From Alcohol Industrial Raw Material Not Intended For End Consumer Not For Direct Consumption</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="product_size">Product Size</label>
                                    <select name="product_size" id="product_size" class="form-control " style="width: 100%;">
                                        <option value="" selected disabled>Select One...</option>
                                        <option value="1ltr">1 Ltr</option>
                                        <option value="100ml">100 ml</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="ingredients">Ingredients</label>
                                    <select name="ingredients" id="ingredients" class="form-control " style="width: 100%;">
                                        <option value="">Select</option>
                                        @foreach($ingredient as $ingredients )
                                        <option value="{{$ingredients->ingredient}}">{{$ingredients->ingredient}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="mrp">Mrp</label>
                                    <input type="number" name="mrp" id="mrp" class="form-control">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class=" d-flex flex-column flex-sm-row justify-content-between">
                            <button class="btn btn-primary my-2 my-sm-0">Update</button>
                            <button class="btn btn-default my-2 my-sm-0" onclick="destroyProd()">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card my-4">
                <div class="card-header">
                    <h5 class="card-title">Product Details</h5>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped d-block" style="overflow-x: auto;">
                        <thead>
                            <tr style="text-wrap:nowrap;">
                                <th>Sr No</th>
                                <th>Brand</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Size</th>
                                <th> Parent Category</th>
                                <th>Category</th>
                                <th>Ingredients</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Market Type</th>
                                <th>Mrp</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="text-wrap:nowrap;">
                                @php $count = 1; @endphp
                                @foreach($product as $products)
                                <td>{{ $count++}}</td>
                                <td>{{ $products->brand}}</td>
                                <td>{{ $products->product_code}}</td>
                                <td>{{ $products->product_name}}</td>
                                <td> {{ $products->product_size}}</td>
                                <td> {{ $products->parent_category}}</td>
                                <td> {{ $products->category}}</td>
                                <td> {{ $products->ingredients}}</td>
                                <td> {{ $products->title}} </td>
                                <td> {{ $products->sub_title}} </td>
                                <td> {{ $products->market_type}}</td>
                                <td> {{ $products->mrp}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default">Action</button>
                                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="#" value="{{$products->id}}" onclick="updateProd(this)"><i class="fa fa-pen"></i>&emsp;Edit</a>
                                            <a class="dropdown-item" href="{{route('delete-product',['id'=>$products->id])}}"><i class="fa fa-trash"></i>&emsp;Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sr No</th>
                                <th>Brand</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Size</th>
                                <th>Parent Category</th>
                                <th>Category</th>
                                <th>Ingredients</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Market Type</th>
                                <th>Mrp</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="row"></div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    function addProduct() {
        document.getElementById('destro').style.display = "block";
        document.getElementById('updateDestro').style.display = "none";
    }

    function updateProd(btn) {
        var id = btn.getAttribute("value");
        $.ajax({
            url: "/edit-product/" + id,
            type: "GET",
            success: function(response) {
                console.log("Response from server:", response);
                $("#id").val(response.product.id);
                $("#brand").val(response.product.brand);
                $("#market_type").val(response.product.market_type);
                $("#product_code").val(response.product.product_code);
                $("#product_name").val(response.product.product_name);
                $("#parent_category").val(response.product.parent_category);
                $("#category").val(response.product.category);
                $("#title").val(response.product.title);
                $("#sub_title").val(response.product.sub_title);
                $("#product_size").val(response.product.product_size);
                $("#ingredients").val(response.product.ingredients);
                $("#mrp").val(response.product.mrp);
                $("#sub_title").val(response.product.sub_title);
                document.getElementById('destroUpdate').style.display = "block";
                document.getElementById('destro').style.display = "none";
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
        document.getElementById('destro').style.display = "none";
        document.getElementById('updateDestro').style.display = "block";
    }


    function destroyProd() {
        document.getElementById('destro').style.display = "none";
        document.getElementById('updateDestro').style.display = "none";
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script>
    $(document).ready(function() {
        // Handle change in the parent category dropdown
        $('#parent_category').change(function() {
            var parentCategory = $(this).val();
            var market = $('#market_type').val();
            if (parentCategory) {
                $.ajax({
                    type: 'GET',
                    url: '{{ route('get.categories')}}',
                    data: {
                        parentCategory: parentCategory,
                        market: market
                    },
                    success: function(data) {
                        // Clear existing category options
                        $('#category').empty();

                        // Populate category options based on the response
                        $('#category').append('<option value="">Select Category</option>');
                        $.each(data, function(key, value) {
                            $('#category').append('<option value="' + value.category + '">' + value.category + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                // If no parent category is selected, clear category options
                $('#category').empty();
            }
        });
    });
</script>



<script>
    $(document).ready(function() {
        // Handle change in the parent category dropdown
        $('#parent_category1').change(function() {
            var parentCategory = $(this).val();
            var market = $('#market_type1').val();
            if (parentCategory) {
                $.ajax({
                    type: 'GET',
                    url: '{{ route('get.categories1') }}',
                    data: {
                        parentCategory: parentCategory,
                        market: market
                    },
                    success: function(data) {
                        // Clear existing category options
                        $('#category1').empty();

                        // Populate category options based on the response
                        $('#category1').append('<option value="">Select Category</option>');
                        $.each(data, function(key, value) {
                            $('#category1').append('<option value="' + value.category + '">' + value.category + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                // If no parent category is selected, clear category options
                $('#category1').empty();
            }
        });
    });
</script>
@include('component.table-footer')