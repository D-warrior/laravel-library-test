<!doctype html>
<!-- 
* Bootstrap Simple Admin Template
* Version: 2.1
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
<html lang="en">

@include('admin.css')

<body>
 @include('admin.side')

        <div id="body" class="active">
            <!-- navbar navigation component -->
            @include('admin.navbar')
            <!-- end of navbar navigation -->
            <div class="content">
                <div class="container">
                    <div class="row">
                       
                        <div class="col-lg-12">
                          
                            <div class="card">
                                <div class="card-header">User List and Reservation Counts</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="dataTables-example" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Email Verified At</th>
                                                    <th>Created At</th>
                                                    <th>Reservation Count</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users as $user)
                                                    <tr>
                                                        <td>{{ $user->id }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->phone }}</td>
                                                        <td>{{ $user->address }}</td>
                                                        <td>{{ $user->email_verified_at }}</td>
                                                        <td>{{ $user->created_at }}</td>
                                                        <td>{{ $user->reservations_count }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
    </div>
</div>


              </div>          
            </div>
        </div>
    </div>
   @include('admin.footer')
</body>

</html>
