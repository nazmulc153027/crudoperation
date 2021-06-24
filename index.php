<!DOCTYPE html>
<html lang="en">
<head>
  <title>OOP Crud</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h3>Crud Operation Using Object Orienrd PHP</h3>
</div><br><br> 

<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <h4>All Customers from Employee Records</h4>  
    </div>
    
    <div class="col-lg-6">
      <button type="button" class="btn btn-success m-1 float-right" data-toggle="modal" data-target="#addModal">
      <i class="fa fa-plus"></i> Add New Employee</button>
      <!--
      <a href="action.php?export=excel" class="btn btn-success m-1 float-right"> <i class="fa fa-download"></i> 
      Export To Excel</a>
    -->
    </div>
  </div><br>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="table-responsive" id="tableData">
        <h3 class="text-center text-success" style="margin-top: 150px;">Loading...</h3>
      </div>
    </div>
  </div>
</div>

<!-- Add Record  Modal -->
<div class="modal" id="addModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Customer</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form id="formData">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter name" required="">
          </div>
          <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email" required="">
          </div>
          <div class="form-group">
            <label for="date">Date of birth:</label>
            <input type="date" class="form-control" name="dob" placeholder="Enter dob" required="">
          </div>
          <div class="form-group">
             <label for="hobbies" class="col-sm-2 col-form-label">Your hobbies:</label>
              <select class="custom-select"  name="hobbies" required="">
                   <option value="select hobby">Selet hobbies</option>
                   <option value="Gardening">Gardening</option>
                   <option value="Fishing">Fishing</option>
                   <option value="Vocalize">Vocalize</option>
                   <option value="Travelling">Travelling</option>
                   <option value="Swimming">Swimming</option>
               </select>
           </div>
           <div class="form-group">
            <label for="number">Number:</label>
            <input type="number" class="form-control" name="tel" placeholder="Your number" required="">
          </div>
         <div class="form-group">
              <label for="mobile" class="col-sm-2 col-form-label">Gender:</label>
                <input type="radio"  id="gender" name="gender" value="Female"/>Female
                <input type="radio"  id="gender" name="gender" value="Male"/>Male
            </div>

            <div class="form-group row">
              <label for="image" class="col-sm-2 col-form-label">Image:</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="Your number" >
            </div>
            <div class="col-sm-10">
              <img src="" id="showImage" style="height:100px; width:100px; border: 1px solid #000; margin-left:150px;">
              </div>

          <hr>
          <div class="form-group float-right">
            <button type="submit" class="btn btn-success" id="submit">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>  
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Edit Record  Modal -->
<div class="modal" id="editModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Customer</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form id="EditformData">
          <input type="hidden" name="id" id="edit-form-id">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="uname" id="name" placeholder="Enter name" required="">
          </div>
          <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" name="uemail" id="email" placeholder="Enter email" required="">
          </div>
          <div class="form-group">
            <label for="date">Date of birth:</label>
            <input type="date" class="form-control" name="udob" id="dob" placeholder="Enter dob" required="">
          </div>
          <div class="form-group">
             <label for="hobbies" class="col-sm-2 col-form-label">Your hobbies:</label>
              <select class="custom-select"  name="uhobbies" id="hobbies" required="">
                   <option value="select hobby">Selet hobbies</option>
                   <option value="Gardening">Gardening</option>
                   <option value="Fishing">Fishing</option>
                   <option value="Vocalize">Vocalize</option>
                   <option value="Travelling">Travelling</option>
                   <option value="Swimming">Swimming</option>
               </select>
           </div>
           <div class="form-group">
            <label for="number">Number:</label>
            <input type="number" class="form-control" name="utel" id="tel" placeholder="Your number" required="">
          </div>
           <div class="form-group">
              <label for="mobile" class="col-sm-2 col-form-label">Gender:</label>
                <input type="radio"  id="gender" name="ugender" <?php if(isset($ugender) && $ugender =="Female") echo "checked";?> value="Female"/>Female
                <input type="radio"  id="gender" name="ugender" <?php if(isset($ugender) && $ugender =="Male") echo "checked";?> value="Male"/>Male
            </div>
            <div class="form-group row">
              <label for="image" class="col-sm-2 col-form-label">Image:</label>
                <input type="file" class="form-control" id="image" name="uimage" placeholder="Your number" >
            </div>
            <div class="col-sm-10">
              <img src="" id="showImage" style="height:100px; width:100px; border: 1px solid #000; margin-left:150px;">
              </div>
          <hr>
          <div class="form-group float-right">
            <button type="submit" class="btn btn-primary" id="update">Update</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>  
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script type="text/javascript">
  $(document).ready(function(){
    
  showAllCustomer();
  //View Record
  function showAllCustomer(){
    $.ajax({
      url : "action.php",
      type: "POST",
      data : {action:"view"},
      success:function(response){
          $("#tableData").html(response);
          $("table").DataTable({
            order:[0, 'DESC']
          });
        }
      });
    }

    //insert ajax request data
    $("#submit").click(function(e){
        if ($("#formData")[0].checkValidity()) {
          e.preventDefault();
          $.ajax({
            url : "action.php",
            type : "POST",
            data : $("#formData").serialize()+"&action=insert",
            success:function(response){
              Swal.fire({
                icon: 'success',
                title: 'Customer added successfully',
              });
              $("#addModal").modal('hide');
              $("#formData")[0].reset();
              showAllCustomer();
            }
          });
        }
    });

    //Edit Record
    $("body").on("click", ".editBtn", function(e){
      e.preventDefault();
      var editId = $(this).attr('id');
      $.ajax({
        url : "action.php",
        type : "POST",
        data : {editId:editId},
        success:function(response){
          var data = JSON.parse(response);
          $("#edit-form-id").val(data.id);
          $("#name").val(data.name);
          $("#email").val(data.email);
          $("#dob").val(data.dob);
          $("#hobbies").val(data.hobbies);
          $("#tel").val(data.tel);
          $("#gender").val(data.gender);
          //$("#image").val(data.image);
        }
      });
    });


    //update ajax request data
    $("#update").click(function(e){
      if ($("#EditformData")[0].checkValidity()) {
        e.preventDefault();
        $.ajax({
          url : "action.php",
          type : "POST",
          data : $("#EditformData").serialize()+"&action=update",
          success:function(response){
            Swal.fire({
              icon: 'success',
              title: 'Customer updated successfully',
            });
            $("#editModal").modal('hide');
            $("#EditformData")[0].reset();
            showAllCustomer();
          }
        });
      }
    });

    //Delete Record
    $("body").on("click", ".deleteBtn", function(e){
      e.preventDefault();
      var tr = $(this).closest('tr');
      var deleteBtn = $(this).attr('id');
      if (confirm('Are you sure want to delete this Record')) {
        $.ajax({
          url : "action.php",
          type : "POST",
          data : {deleteBtn:deleteBtn},
          success:function(response){
            tr.css('background-color','#ff6565');
            Swal.fire({
              icon: 'success',
              title: 'Customer delete successfully',
            });
            showAllCustomer();
          }
        });
      }
    });
  }); 
</script>
</body>
</html>