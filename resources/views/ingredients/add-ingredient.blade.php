@include('component.header')
@include('component.sidebar')
<!-- / Navbar -->

<!-- Content wrapper -->
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
      <div class="container-fluid" id="addIngreHere">

        <div>
          <button class="btn btn-primary mb-3" id="addedIngre" onclick="addIngredients(this)"><i class="fa fa-plus"></i>&nbsp;Add Ingredients</button>
        </div>
        @if(session()->has('status'))
                    <div class="alert my-3 p-3 alert-success">
                    {{session('status')}}
                    </div>
                    @endif
        <div class="card" id="destro" style="display: none;">
          <div class="card-header">
            <div class="card-title">
              <h5>Add Ingredients</h5>
            </div>
        </div>
        <form action="save-ingredient" method="POST">
          @csrf
            <div class="card-body">
                <!-- Main row -->
                <div class="row p-2">

                <div class="col-12">
                    <div class="form-group">
                      <label for="ingredients">Ingredient Name *</label>
                      <input type="text" name="ingredient" id="ingredients" class="form-control" required>
                    </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
                <div class=" d-flex flex-column flex-sm-row justify-content-between">
                    <button class="btn btn-primary my-2 my-sm-0">Save</button>
                    <button type="button" class="btn btn-default my-2 my-sm-0" onclick="destroyIngred()">Cancel</button>
                </div>
            </div>
          </form>
        </div>  

        
        <div class="card" id="destroUpdate" style="display: none;">
          <div class="card-header">
            <div class="card-title">
              <h5>Update Ingredients</h5>
            </div>
          </div>
          <form action="{{route('update-ingredient')}}"  method="POST">
          @csrf
              <div class="card-body">
                  <!-- Main row -->
                  <div class="row p-2">

                  <div class="col-12">
                      <div class="form-group">
                        <label for="ingredients">Ingredient Name *</label>
                        <input type="hidden"  name="id"  id="id" >
                        <input type="text" name="ingredient"  id="ingredient" class="form-control" required>
                      </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                  <div class=" d-flex flex-column flex-sm-row justify-content-between">
                      <button class="btn btn-info my-2 my-sm-0">Update</button>
                      <button type="button" class="btn btn-default my-2 my-sm-0" onclick="destroyIngred()">Cancel</button>
                  </div>
              </div>
          </form>
        </div>  

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Ingredients</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($ingredient as $ingredients)
                    <tr>
                      <td>{{$ingredients->ingredient}}</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default">Action</button>
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="#"  value="{{$ingredients->id}}"onclick="updateIngredients(this)"><i class="fa fa-pen"></i>&emsp;Edit</a>
                            <a class="dropdown-item" href="{{route('delete-ingredient',['id'=>$ingredients->id])}}"><i class="fa fa-trash"></i>&emsp;Delete</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Ingredients</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- / Content -->
<!-- Footer -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  function addIngredients(btn){
      document.getElementById('destro').style.display = "block";
      document.getElementById('destroUpdate').style.display = "none";

  }

  
  function updateIngredients(btn){
    var id = btn.getAttribute("value");
    $.ajax({
      url: "/edit-ingredient/" + id, 
        type: "GET", 
        success: function(response) {
            console.log("Response from server:", response);
            $("#id").val(response.ingredient.id);
            $("#ingredient").val(response.ingredient.ingredient);

            
        },
        error: function(xhr, status, error) {
            console.error("Error:", error);
        }
    });
      document.getElementById('destroUpdate').style.display = "block";
      document.getElementById('destro').style.display = "none";

  }

  function destroyIngred(){
      document.getElementById('destro').style.display = "none";
      document.getElementById('destroUpdate').style.display = "none";
      document.getElementById('addedIngre').disabled=false;
  }
</script>
@include("component.footer");

<script>
  
</script>