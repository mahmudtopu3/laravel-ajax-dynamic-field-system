@extends('admin.layout') @section('content')
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
<style>
.loader {
    border: 16px solid #f3f3f3;
    border-radius: 50%;
    border-top: 15px solid #3498db;
    width: 120px;
    height: 120px;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
    position: fixed;
    opacity: 1;
    margin-top: 20%;
    margin-left: 35%;
    z-index: 10;
}
/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List of Data</h1>
        <hr>
        <div style="display:none" class="loader"></div>
    </div>
    

        <div class="modal fade" id="notification" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body"> 
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <p> Data Has Been Inserted Succesfully</p>
                    
                    </div>
                </div>
            </div>
       </div>
       <div class="modal fade" id="error" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body"> 
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <p></p>
                    
                    </div>
                </div>
            </div>
       </div>

   
    
    <!-- Dyanamic Row Row -->

    <div class="card shadow mb-4">

        <div class="row">
            <div class="col-md-12">
                <div class="card-body">

                    <form method="post"  id="dynamic_form" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                        <span id="result"></span>
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Information 1</h6>
                            
                        </div>
                        
                        <table class="table table-responsive table-bordered table-striped" id="data1_table">
                            <thead>
                                <tr>
                                    <th width="20%">Name</th>
                                    <th width="20%">Country</th>
                                    <th width="20%">District</th>
                                    <th width="20%">Address</th>
                                    <th width="20%">Image</th>
                                    <th width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody id="table1"></tbody>
                       
                        </table>
                        <br>
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Information 2</h6>
                        </div>
                        <table class="table table-responsive table-bordered table-striped" id="data2_table">
                            <thead>
                                <tr>
                                    <th width="20%">Name</th>
                                    <th width="20%">Country</th>
                                    <th width="20%">District</th>
                                    <th width="20%">Address</th>
                                    <th width="20%">Image</th>
                                    <th width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody id="table2"></tbody>
                           
                        </table>
                        <button style="display:none" type="submit" id="submit"></button>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <!-- All Button -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Submit Data</h6>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <button type="button"  id="allsubmit" class="btn btn-success">Submit</button>
                   

                </div>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script>
$(document).ready(function(){

 var count = 1;

 dynamic_field1(count);

 function dynamic_field1(number1)
 {
  html = '<tr>';
        html += '<td><input type="text" name="name[0][]" class="form-control"  placeholder="Enter Name" required/></td>';
        html += '<td><select name="country[0][]" class="form-control" required> <option value="">Select One</option> <option value="Bangladesh">Bangladesh</option> <option value="Australia">Australia</option><option value="Japan">Japan</option></select></td>';
        html += '<td><select name="district[0][]" class="form-control" required> <option value="">Select One</option> <option value="Dhaka">Dhaka</option> <option value="Melborne">Melborne</option><option value="Tokio">Tokio</option></select></td>';
        html += '<td><input type="text" name="address[0][]" class="form-control"  placeholder="Enter Address" required/></td>';
        html += '<td ><input type="file" accept="image/*" name="select_file[0]['+number1+']" id="select_file"   class="form-control" onchange="liveimgOne(this,'+number1+',\'one\')" required/><br><img class="img img-responsive" style="display:none"src="#" id="one'+number1+'" width="200px" height="100px"></td>';

        if(number1 > 1)
        {
            html += '<td><button type="button" name="remove" id="remove" class="btn btn-danger remove">-</button></td></tr>';
            $('#table1').append(html);

         
        }
        else
        {   
            html += '<td><button type="button" name="add" id="add" class="btn btn-success">+</button></td></tr>';
            $('#table1').html(html);
        }
 }

 $(document).on('click', '#add', function(){
  count++;
  dynamic_field1(count);
 });

 $(document).on('click', '.remove', function(){
  count--;
  $(this).closest("tr").remove();
 });

//Second Dynamic Field Code
 var count2 = 1;

dynamic_field2(count2);

function dynamic_field2(number2)
{
 html = '<tr>';
        html += '<td><input type="text" name="name[1][]" class="form-control"  placeholder="Enter Name" required/></td>';
        html += '<td><select name="country[1][]" class="form-control" required> <option value="">Select One</option> <option value="Bangladesh">Bangladesh</option> <option value="Australia">Australia</option><option value="Japan">Japan</option></select></td>';
        html += '<td><select name="district[1][]" class="form-control" required> <option value="">Select One</option> <option value="Dhaka">Dhaka</option> <option value="Melborne">Melborne</option><option value="Tokio">Tokio</option></select></td>';
        html += '<td><input type="text" name="address[1][]" class="form-control"  placeholder="Enter Address" required/></td>';
        html += '<td ><input type="file" accept="image/*" name="select_file[1]['+number2+']" id="select_file"   class="form-control" onchange="liveimgTwo(this,'+number2+',\'two\')" required/><br><img class="img img-responsive" style="display:none"src="#" id="two'+number2+'" width="200px" height="100px"></td>';
      
       if(number2 > 1)
       {
           html += '<td><button type="button" name="remove" id="remove2" class="btn btn-danger remove2">-</button></td></tr>';
           $('#table2').append(html);
       }
       else
       {   
           html += '<td><button type="button" name="add2" id="add2" class="btn btn-success">+</button></td></tr>';
           $('#table2').html(html);
       }
}

$(document).on('click', '#add2', function(){
 count2++;
 dynamic_field2(count2);
});

$(document).on('click', '.remove2', function(){
 count2--;
 $(this).closest("tr").remove();
});

 
});
</script>

<!--Submit Button-->


<script>
$(document).ready(function(){
    

  $( "#allsubmit" ).click(function() {
        // $("#models2_form").submit();
        $("#submit").click();
       
        
        
    });

});
</script>
<!--//Submit Button-->

<!--Live Image Preview -->

<script>
    

function liveimgOne(element,id,one){

    


  

    
    //select_file
    document.getElementById(one+id).style.display ="block";
    document.getElementById(one+id).src = window.URL.createObjectURL(element.files[0])
    console.log(one+id);

    
    // $("<img width=\"80px\" height=\"60px\" src="+window.URL.createObjectURL(element.files[0])+">").insertAfter("#select_file2"+id+""); 

}
function liveimgTwo(element,id,two){
   
    
    // document.getElementById(id).style.display ="block";
    // document.getElementById(id).src = window.URL.createObjectURL(element.files[0])

    document.getElementById(two+id).style.display ="block";
    document.getElementById(two+id).src = window.URL.createObjectURL(element.files[0])
    console.log(two+id);

   

}

</script>

<!--//Live Image Preview -->

<!--Storing Ajax Code-->

<script>
$(document).ready(function(){

$('#dynamic_form').on('submit', function(event){
    $(".loader").css("display", "block");
 event.preventDefault();
 $.ajax({
  url:"{{ route('form.submit') }}",
  method:"POST",
  data:new FormData(this),
  dataType:'JSON',
  contentType: false,
  cache: false,
  processData: false,
  success:function(data)
  {
   
    if(data.success){
    $("#notification").modal('show');
    $('#dynamic_form').trigger("reset");
    $('.img').hide();
    $(".loader").css("display", "none");

   }
   if(data.error){
    $('#error P').html(data.error);
    $("#error").modal('show');
    $(".loader").css("display", "none");
   }
   
   
   
   
  }
 })
});

});

</script>

<!--//Storing Ajax Code-->
