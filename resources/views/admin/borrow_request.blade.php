<html lang="en">

@include('admin.css')
<style>
    <style>
    .btn-highlight {
        background-color: yellow;
        color: black;
    }
    .btn-dark {
        opacity: 0.5;
    }
</style>

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
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
            </div>
            @endif
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">reservation request</div>
                    <div class="card-body">
                        <p class="card-title"></p>
                        <table class="table table-hover" id="dataTables-example" width="100%">
                            <thead>
                                <tr>
                                    <th>reservation ID</th>
                                    <th>book image</th>
                                    <th>Book Name</th>
                                    <th>days</th>
                                    <th>category</th>
                                    <th>by</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>address</th>
                                    <th>approve date</th>
                                    <th>return date</th>
                                    <th>action</th>
                                    

                                   
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                <tr><td>{{$data->reservation->id}}</td>
                                    <th><img class="img_book" src="book/{{$data->book->book_img}}" alt=""></th>
                                    <td>{{$data->book->titre}}</td>
                                    <td>{{$data->reservation->NbreJour}}</td>
                                    <td>{{$data->book->category->titre}}</td>
                                    <td>{{$data->reservation->user->name}}</td>
                                    <td>{{$data->reservation->user->email}}</td>
                                    <td>{{$data->reservation->user->phone}}</td>
                                    <td>{{$data->reservation->user->address}}</td>
                                    <td>{{$data->reservation->dateSortie}}</td>
                                    <td>{{$data->dateRetour }}</td>
                                    <td> 
                                                                        
                                        @php
                                        $status = $data->reservation->status;
                                    @endphp
                                
                                    <a class="btn btn-warning {{ $status == 'approved' ? 'btn-highlight' : ($status == 'pending' ? 'btn-highlight' : 'btn-dark') }}" href="{{ url('approve_book', $data->reservation->id) }}">approve</a>
                                    <a class="btn btn-danger {{ $status == 'rejected' ? 'btn-highlight' : ($status == 'pending' ? 'btn-highlight' : 'btn-dark') }}" href="{{ url('reject_book', $data->reservation->id) }}">reject</a>
                                    <a class="btn btn-info {{ $status == 'returned' ? 'btn-highlight' : 'btn-dark' }}" href="{{ url('return_book', $data->reservation->id) }}">returned</a>
                                
                                    
                                    </td>
                                </tr>  
                                @endforeach
                            
            </div>
        </div>
    </div>
   @include('admin.footer')
</body>

</html>