@extends('admin.layout')
<title>Information From Data1</title>
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List of Entries</h1>
            <hr>
          </div>

          
          

          <!-- Content Row -->

                 <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Information From Data1</h6>
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
                      <th>Country</th>
                      <th>District</th>
                      <th>Address</th>
                      <th>Image</th>
                    
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>  
                      <th>Name</th>
                      <th>Country</th>
                      <th>District</th>
                      <th>Address</th>
                      <th >Image</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach($data as $value)
                    <tr>
                      
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->country }}</td>
                      <td>{{ $value->district }}</td>
                      <td>{{ $value->address }}</td>
                      <td> <img src="{{ URL::to('/') }}/public/images/{{ $value->image }}" alt="Image Not Found" width="300px" height="150px" class="img img-responsive">
                          
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


   
  @endsection
  @push('scripts')
   <script src="{{ asset('adminvendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('adminvendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('adminjs/demo/datatables-demo.js') }}"></script>
 
  
  @endpush