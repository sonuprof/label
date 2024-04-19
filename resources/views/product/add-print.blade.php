@include('component.table-header')
@include('component.sidebar')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
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
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            <h5>Print Label</h5>
          </div>
        </div>
        <div class="card-body">
          <form action="{{route('save-print')}}" method="POST">
            @CSRF
            <!-- Main row -->
            <div class="row p-4">

              <div class="col-md-6 col-lg-4">
                <div class="form-group">
                  <label for="market_type">Market Type</label>
                  <select name="market_type" id="market_type" class="form-control">
                    <option value="DOMESTIC" selected>DOMESTIC</option>
                    <option value="EXPORT">EXPORT</option>
                  </select>
                </div>
              </div>

              <div class="col-md-6 col-lg-4">
                <div class="form-group">
                  <label for="parent_category"> Parent Category</label>
                  <select name="parent_category" id="parent_category" class="form-control select2" style="width: 100%;">
                    <option value="" selected>Select</option>
                    @foreach($parent as $parents)
                    <option value="{{$parents->parent_category}}">{{$parents->parent_category}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-md-6 col-lg-4">
                <div class="form-group">
                  <label for="category">Category</label>
                  <select name="category" id="category" class="form-control select2" style="width: 100%;">
                  </select>
                </div>
              </div>

              <div class="col-md-6 col-lg-4">
                <div class="form-group">
                  <label for="qty">Print Quantity</label>
                  <input type="number" name="qty" id="qty" class="form-control">
                </div>
              </div>

              <div class="col-md-6 col-lg-4">
                <div class="form-group">
                  <label for="fmd">MFD</label>
                  <input type="date" name="fmd_date" id="fmd_date" class="form-control">
                </div>
              </div>

              <div class="col-md-6 col-lg-4">
                <div class="form-group">
                  <label for="expire">Expiry Date</label>
                  <input type="date" name="expire" id="expire" class="form-control">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="searchProd">Search Product</label>
                  <select class="form-control select2" style="width: 100%;" name="product_name" id="product_name">
                    <option value="">Select</option>

                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="dimension">Dimension</label>
                  <select name="dimension" id="dimension" class="form-control">
                    <option value="">Select</option>
                    <option value="d1">100 ml</option>
                    <option value="d2">500 ml</option>
                    <option value="d3">1 ltr</option>
                    <option value="d4">5 ltr</option>
                    <option value="d5">25 ltr</option>
                  </select>
                </div>
              </div>

            </div>
       
        </div>
        <div class="card-footer">
          <button class="btn btn-primary"><i class="fa fa-print"></i> &nbsp;Print</button>
          <button class="btn btn-default float-right"><i class="fa fa-times"></i> &nbsp;Cancel</button>
        </div>
        </form>
      </div>
       
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




<script>
  $(document).ready(function() {
    // Handle change in the parent category dropdown
    $('#category').change(function() {
      var parentCategory = $('#parent_category').val();
      var market = $('#market_type').val();
      var category = $('#category').val();

      if (parentCategory) {
        $.ajax({
          type: 'GET',
          url: '{{ route('get.product_name') }}',
          data: {
            parentCategory: parentCategory,
            market: market,
            category: category
          },
          success: function(data) {
            // Clear existing category options
            $('#product_name').empty();

            // Populate category options based on the response
            $('#product_name').append('<option value="">Select Product</option>');
            $.each(data, function(key, value) {
              $('#product_name').append('<option value="' + value.product_name + '">' + value.product_name + '</option>');
            });
          },
          error: function(xhr, status, error) {
            console.error(xhr.responseText);
          }
        });
      } else {
        // If no parent category is selected, clear category options
        $('#product_name').empty();
      }
    });
  });
</script>
<script>
    $(document).ready(function () {
        // Handle change in the parent category dropdown
        $('#parent_category').change(function () {
            var parentCategory = $(this).val();
            var market = $('#market_type').val();
            if (parentCategory) {
                $.ajax({
                    type: 'GET',
                    url: '{{ route('get.categories1') }}',
                    data: {
                        parentCategory: parentCategory,
                        market: market
                    },
                    success: function (data) {
                        // Clear existing category options
                        $('#category').empty();

                        // Populate category options based on the response
                        $('#category').append('<option value="">Select Category</option>');
                        $.each(data, function (key, value) {
                            $('#category').append('<option value="' + value.category + '">' + value.category + '</option>');
                        });
                    },
                    error: function (xhr, status, error) {
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

<!-- <script>
    $(document).ready(function () {
        // Handle change in the parent category dropdown
        $('#parent_category1').change(function () {
            var parentCategory = $(this).val();
            var market = $('#market_type1').val();
            if (parentCategory) {
                $.ajax({
                    type: 'GET',
                    url: '{{ route('get.categories') }}',
                    data: {
                        parentCategory: parentCategory,
                        market: market
                    },
                    success: function (data) {
                        // Clear existing category options
                        $('#category1').empty();

                        // Populate category options based on the response
                        $('#category1').append('<option value="">Select Category</option>');
                        $.each(data, function (key, value) {
                            $('#category1').append('<option value="' + value.category + '">' + value.category + '</option>');
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                // If no parent category is selected, clear category options
                $('#category1').empty();
            }
        });
    });
</script> -->
@include('component.table-footer')