@extends('admin.layout') @section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit User Data</h1>
    </div>

    <!-- Content Row -->
    


    
    <div class="row">
    <div class="col-md-12">

    @if ($message = Session::get('success'))

<div class="alert alert-success">

    <p>{{ $message }}</p>

</div>

@endif
@if ($errors->any())

<div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif
        <form action="{{ route('update') }}" method="post" >
           
            {{ csrf_field() }}
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="t_name">Name:</label>
                        <input type="hidden" name="id" value="{{$data->id}}" required>
                        <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$data->email}}" required>
                    </div>
                
                  
                 
                </div>

                <div class="col-md-6">
                    
                    <div class="form-group">
                        <label for="type">Admin Status:</label>
                        <select name="type" class="form-control" id="type">
                            <option value="" >Select One</option>
                            
                            <option value="admin" <?php if($data->type=="admin"){ echo "selected='selected'";}?>  >Admin</option>
                            <option value="user" <?php if($data->type=="user"){ echo "selected='selected'";}?>>User</option>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="approve_status">Approval Status:</label>
                        <select name="approve_status" class="form-control" id="approve_status">
                                <option value="" >Select One</option>        
                                <option value="1" <?php if($data->approve_status==1){ echo "selected='selected'";}?>  >Approved</option>
                                <option value="0" <?php if($data->approve_status==0){ echo "selected='selected'";}?>>Pending</option>
                        </select>

                    </div>
   

                </div>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
     </div>
    </div>

    <!-- Content Row -->

    <div class="row"></div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection