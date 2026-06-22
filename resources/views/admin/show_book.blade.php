<!doctype html>
<!-- 
* Bootstrap Simple Admin Template
* Version: 2.1
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
    <html lang="en">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @include('admin.css')
    <style>

    .img_book{
        width: 200px;
        height: auto;
    }

    </style>
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
                            <div class="col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">Book list</div>
                                    <div class="card-body">
                                        <p class="card-title"></p>
                                        <table class="table table-hover" id="dataTables-example" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Title</th>
                                                    <th>Author</th>
                                                    <th>editor</th>
                                                    <th>editionDate</th>
                                                    <th>NbreExemplaire</th>
                                                    <th>price</th>
                                                    <th>category</th>
                                                    <th>image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($book as $book)
                                                <tr><td>{{$book->id}}</td>
                                                    <td>{{$book->titre}}</td>
                                                    <td>{{$book->auteur}}</td>
                                                    <td>{{$book->editeur}}</td>
                                                    <td>{{$book->dateEdition}}</td>
                                                    <td>{{$book->NbreExemplaire}}</td>
                                                    <td>{{$book->price}}</td>
                                                    <td>{{$book->category->titre}}</td>
                                                    <td><img class="img_book" src="book/{{$book->book_img}}" alt=""></td>
                                                    <td>
                                                        <a class="btn btn-Info" href="{{url('edit_book', $book->id)}}">update</a>
                                                        <form id="delete-form-{{ $book->id }}" method="POST" action="{{ url('book_delete', $book->id) }}" class="delete-form">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger delete-book" data-id="{{ $book->id }}">Delete</button>
                                                        </form>
                                                        
                                                        <script>
                                                        document.addEventListener('DOMContentLoaded', function () {
                                                            document.querySelectorAll('.delete-book').forEach(function(button) {
                                                                button.addEventListener('click', function(event) {
                                                                    event.preventDefault(); // Prevent the form from submitting immediately
                                                                    var confirmed = confirm('Are you sure you want to delete this book?');
                                                                    if (confirmed) {
                                                                        button.removeEventListener('click', arguments.callee); // Remove the event listener before submitting
                                                                        button.closest('form').submit(); // Submit the form if the user confirms
                                                                    }
                                                                });
                                                            });
                                                        });
                                                        </script>
                                                        
                                                        
                                                        
                                                    </td>
                                                    
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
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<!-- Your script for initializing DataTables -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            "paging": true, // Enable pagination
            "searching": true, // Enable search functionality
            "ordering": true, // Enable sorting
            "info": true // Enable table information display
        });
    });
</script>


<script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor/chartsjs/Chart.min.js')}}"></script>
<script src="{{asset('admin/assets/js/dashboard-charts.js')}}"></script>
<script src="{{asset('admin/assets/js/script.js')}}"></script>
</body>

</html>
