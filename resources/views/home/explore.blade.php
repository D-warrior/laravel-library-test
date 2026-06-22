<!DOCTYPE html>
<html lang="en">

  <head>
 <base href="/public">
 @include('home.css')
  </head>
<style>
  .description {
    white-space: pre-wrap; /* Ensures that whitespace is respected */
}

.description::after {
    content: "";
    display: block;
    width: 100%;
}

.description {
    word-break: break-all;
}

@media (min-width: 15ch) {
    .description::after {
        display: none;
    }
}

@media (max-width: 15ch) {
    .description {
        white-space: normal;
    }
}

</style>
<body>

@include('home.header')


<div class="currently-market">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2><em>Items</em> Currently In The Market.</h2>
          </div>
        </div>
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
    @endif
        <div class="col-lg-6">
          <div class="filters">
            <ul>
              <li ><a href="{{url('explore')}}"  style="color: white">All Books</a></li>
              @foreach($category as $category)
              <li><a href="{{url('cat_search',$category->id)}}" style="color: white">{{$category->titre}}</a></li>
              
              @endforeach
            </ul>
          </div>
        </div>
        <form action="{{url('search')}}" method="get">
           @csrf

        <div class="row" style="margin: 40px">

            <div class="col-md-8">
              <input class="form-control" type="search" name="search" placeholder="search">
            </div>
              <div class="col-md-4">
                    <input type="submit" class="btn btn-info" value="search">
              </div>
          
        </div></form>
        <div class="col-lg-12">
          <div class="row grid">
                @foreach($data as $data)
            <div class="col-lg-6 currently-market-item all msc">
              <div class="item">
                <div class="left-image">
                  <img src="book/{{$data->book_img}}" alt="" style="border-radius: 20px; min-width: 195px;">
                </div>
                <div class="right-content">
                  <h4>{{$data->titre}}</h4>
                  
                  <div class="line-dec"></div>
                  <span class="bid">
                    Current Available<br><strong>{{$data->NbreExemplaire}}</strong><br> 
                  </span><br>
                  <span class="bid">
                   description<br><p class="description">{{ $data->description }}</p>
                   <br> 
                  </span><br>
                  <span class="bid">
                    Edition Date:<br><strong>{{$data->dateEdition}}</strong><br> 
                  </span>
                 
                  
                  <div class="text-button">
                    <a class="btn btn-primary" href="{{url('book_details',$data->id)}}" style="color: white" >Reserver</a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            

            


          </div>
        </div>
      </div>
    </div>
  </div>


@include('home.footer')
  </body>
</html>