<!DOCTYPE html>
<html lang="en">

  <head>

 @include('home.css')
  </head>

<body>

@include('home.header')
<div class="item-details-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2>View Details <em>For Item</em> Here.</h2>
          </div>
          @if(session()->has('message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session()->get('message') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
          </div>
      @endif
        </div>
        <div class="col-lg-7">
            <div class="left-image">
              <img src="/book/{{$data->book_img}}" alt="" style="border-radius: 20px; max-width: auto; max-height: 1300px;">
            </div>
          </div>
        <div class="col-lg-5 align-self-center">
          <h4>{{$data->titre}}</h4>
          <div class="author-info">
            <h6>Author:</h6>
            <p>{{$data->auteur}}</p>
            <h6>Editor:</h6>
            <p>{{$data->editeur}}</p>
            <h6>Edition day:</h6>
            <p>{{$data->dateEdition}}</p>
            <h6>Category:</h6>
            <p>{{$data->category->titre}}</p>
            <h6>Price/J:</h6>
            <p>{{$data->price}}</p>
          </div>
          <div class="description">
            <h6>Description:</h6>
            <p>{{$data->description}}</p>
          </div>
          <div class="availability">
            <div class="row">
              <div class="col-6">
                <span class="bid">
                  Available<br><strong>{{$data->NbreExemplaire}}</strong><br>
                </span>
              </div>
              
              <div class="col-6">
                <!-- Button for borrowing -->
                <div class="col-6">
                  <!-- Button for borrowing -->
                  
                  </div>
                  <div class="card-body">   
                    <form method="POST" action="{{ route('borrow.book', $data->id) }}">
                      @csrf
                        <div class="mb-3 row">
                            <label for="NbreJour" class="col-sm-2 col-form-label">Number of days</label>
                            <div class="col-sm-10">
                                <input type="number" name="NbreJour" placeholder="Enter number of days" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary mt-2">Validate</button>
                            </div>
                        </div>
                    </form>
                </div>
                
                       
                    
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  

@include('home.footer')


  </body>
</html>