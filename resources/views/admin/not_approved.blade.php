@extends('admin.layout')


@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div  class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div  class="row">

            <!-- Pending User(s) -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Account Approval Status</div>
                      <div  class="h5 mb-0 font-weight-bold text-gray-800">Pending <i style="color:red" class="fas fa-circle-notch fa-spin"></i></div>
                    </div>
                    <div class="col-auto">
                      
                      <i class="fas fa-user-shield fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

           

           
            
          </div>

          

          <!-- Content Row -->

          <div style="height:45vh" class="row">

            

           </div>
           </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

@endsection
