<!DOCTYPE html>
<html lang="en">

  <head>

 @include('home.css')
  </head>
<style>
    body{

        background-color: #94ceec;

    }
    .img_book {
    max-width: 120px; /* Adjust the width as needed */
    max-height: 180px; /* Adjust the height as needed */
    object-fit: cover; /* This ensures the image covers the area, cropping if necessary */
    display: block; /* Ensures block-level element behavior */
    margin: 0 auto; /* Centers the image horizontally within the table cell */
}

</style>
<body>

@include('home.header') 
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session()->get('message') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
</div>
@endif
<div class="card-body">
    <p class="card-title"></p>
    <table class="table table-hover" id="dataTables-example" width="100%">
        <thead>
            <tr>
                <th>reservation ID</th>
                <th>book image</th>
                <th>Book Name</th>
                <th>category</th>
                <th>status</th>
                <td>days</td>
                <th>approve date</th>
                <th>return date</th>
                <th>action</th>
                

               
        </thead>
        <tbody>
            @foreach ($data as $data)
            <tr>
                <td>{{ $data->reservation->id }}</td>
                <td><img class="img_book" src="{{ asset('book/' . $data->book->book_img) }}" alt=""></td>
                <td>{{ $data->book->titre }}</td>
                <td>{{ $data->book->category->titre }}</td>
                <td>{{$data->reservation->status}}</td>
                <td>{{$data->reservation->NbreJour}}</td>
                <td>{{ $data->reservation->dateSortie }}</td>
                <td>{{$data->dateRetour}}</td>
                <td>  @if ($data->reservation->status == 'pending')
                    <a href="{{ url('cancel_req', $data->reservation->id) }}" class="btn btn-warning">Cancel</a>
                    
                        
                    @else   
                     <strong>NOT Allowed</strong>
                        
                    @endif
                </td>
            </tr>
        @endforeach
        
</div>

  </body>
</html>