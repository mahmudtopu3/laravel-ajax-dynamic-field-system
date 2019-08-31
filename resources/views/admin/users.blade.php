@extends('admin.layout')

@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List of Users</h1>
            <hr>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#form">Add New User</button>
          </div>

          
          

          <!-- Content Row -->

                 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Information</h6>
            </div>
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
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>  
                      <th>Name</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th>Approval Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>  
                      <th>Name</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th>Approval Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach($data as $value)
                    <tr>
                      
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->email }}</td>
                      <td>{{ $value->type }}</td>
                      <td>
                            @if($value->approve_status) Approved
                            <i style="color:green" class="fas fa-toggle-on   "></i>
                            @else Pending
                            <i style="color:red" class="fas fa-toggle-off  "></i>
                            @endif
                      </td>
                 
                     

                      <td>
                          <form action="{{ route('delete') }}" method="POST"> 
                          {{ csrf_field() }}
                              
                              <input type="hidden" name="id" value="{{$value->id}}">
                              <button
                                  type="button"
                                  class="btn btn-success"
                                  onclick="location.href='user/{{$value->id}}/edit'">
                                  Edit</button>

                              <button onclick="return confirm('Are you sure you want to delete this user?');" type="submit" class="btn btn-danger">
                                  Delete</button>

                          </form>
                      </td>
                    </tr>
                    @endforeach
                
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
           </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


      <div class="modal fade" id="form" role="dialog">
                    <div class="modal-dialog modal-lg">
                    
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                       
                        <h4 class="modal-title">Add New User's Info</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                        <!--form-->
                        <form
                                method="POST"
                                action="{{ route('create') }}"
                                aria-label="{{ __('Add New Users Info') }}">
                                {{ csrf_field() }}

                            
                                <div class="row">

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="t_name">Name:</label>
                                      <input type="hidden" name="id" value="" required>
                                      <input type="text" class="form-control" id="name" name="name" value="" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="email">Email:</label>
                                      <input type="email" class="form-control" id="email" name="email" value="" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="password">Password:</label>
                                      <input type="password" class="form-control" id="password" name="password" value="" required>
                                  </div>

                                
                              
                              </div>

                              <div class="col-md-6">
                                  
                                  <div class="form-group">
                                      <label for="type">Admin Status:</label>
                                      <select name="type" class="form-control" id="type">
                                          <option value="" >Select One</option>
                                          
                                          <option value="admin" >Admin</option>
                                          <option value="user" >User</option>
                                      </select>

                                  </div>

                                  <div class="form-group">
                                      <label for="approve_status">Approval Status:</label>
                                      <select name="approve_status" class="form-control" id="approve_status">
                                              <option value="" >Select One</option>        
                                              <option value="1"  >Approved</option>
                                              <option value="0" >Pending</option>
                                      </select>

                                  </div>


                              </div>
                              </div>

                              <button type="submit" class="btn btn-success">Submit</button>

                            </form>


                        <!--form-->
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    
                    </div>
                </div>
  @endsection
  @push('scripts')
   <script src="{{ asset('adminvendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('adminvendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('adminjs/demo/datatables-demo.js') }}"></script>
 
  
  @endpush