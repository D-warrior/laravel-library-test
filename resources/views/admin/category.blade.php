<!doctype html>
<!-- 
* Bootstrap Simple Admin Template
* Version: 2.1
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
<html lang="en">
   
@include('admin.css')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                            @if(session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session()->get('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                            </div>
                        @endif
                        


                            <div class="card">
                                <div>
                                     
                                </div>
                                <div class="card-header">Add category</div>
                                 <div class="card-body">
                                    
                                    <form action="{{url('add_category')}}" method="POST" accept-charset="utf-8" onsubmit="return validateForm()">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Name</label>
                                            <input type="text" name="category" id="category" placeholder="Category name" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="submit" class="btn btn-primary" value="Submit">
                                        </div>
                                    </form>
                                    </form>
                                </div>
                            </div>







                        </div>
                    
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">Basic Table</div>
                                    <div class="card-body">
                                        <p class="card-title">Add class <code>.table</code> inside table element</p>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        
                                                        <th>Categories</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($data as $data)
                                                    <tr>
                                                      
                                                        <td>{{$data->titre}}</td>
                                                        <th><a onclick="confirmation(event)" class="btn btn-danger" href="{{ url('cat_delete', $data->id) }}">Delete</a>
                                                        </th>
                                                        
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
 


        <script src="{{asset('admin/assets/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('admin/assets/vendor/datatables/datatables.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/initiate-datatables.js')}}"></script>
        <script src="{{asset('admin/assets/js/script.js')}}"></script>
        <script src="{{asset('admin/assets/js/form-validator.js')}}"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function validateForm() {
        var categoryInput = document.getElementById('category').value;
        // Check if the input starts with an uppercase letter
        if (categoryInput.charAt(0) !== categoryInput.charAt(0).toUpperCase()) {
            alert('Category name must start with an uppercase letter.');
            return false; // Prevent form submission
        }
        return true; // Allow form submission
    }

            function confirmation(event) { 
                event.preventDefault(); // Prevent the default action of the link
        
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If user confirms, proceed with the deletion
                        window.location = event.target.href; // Proceed with the link action (delete)
                    }
                });
            }
        </script>
        

</body>

</html>
