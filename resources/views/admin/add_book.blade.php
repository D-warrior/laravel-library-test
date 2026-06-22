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
                        @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                        </div>
                        @endif
                         <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Add a book</div>
                                <div class="card-body">
                                    
                                    <form accept-charset="utf-8" action="{{url('store_book')}}" method="Post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="titre">title</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="titre" placeholder="titre " class="form-control">
                                                
                                            </div>
                                        </div>
                                        
                                            <div class="mb-3 row">
                                                <label class="col-sm-2 form-label" for="auteur">author</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="auteur" placeholder="auteur " class="form-control">
                                                    
                                                </div>
                                            </div><div class="mb-3 row">
                                                <label class="col-sm-2 form-label" for="editeur">editor</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="editeur" placeholder="editeur " class="form-control">
                                                </div> 
                                                <div class="mb-3 row">
                                                <label class="col-sm-2 form-label" for="category">category</label>    
                                                <select name='category' class="form-control" > 
                                                    @foreach($data as $data)
                                                        <option value="{{ $data->id }}">{{ $data->titre }}</option>
                                                    @endforeach
                                                </select>
                                                    
                                            </div>
                                            </div><div class="mb-3 row">
                                                <label class="col-sm-2 form-label" for="dateEdition">date Edition</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="dateEdition" placeholder="dateEdition " class="form-control">
                                                    
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-2 form-label" for="NbreExemplaire">NbreExemplaire</label>
                                                <div class="col-sm-10">
                                                    <iNput type="number" Name="NbreExemplaire" placeholder="NbreExemplaire " class="form-control">
                                                    
                                                </div>
                                            </div><div class="mb-3 row">
                                                <label class="col-sm-2 form-label" for="price">price</label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="price" placeholder="price " class="form-control">
                                                    
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-2 form-label" for="book_img">book image</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="book_img"  class="form-control">
                                                    
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-2 form-label" for="description">description</label>
                                                <div class="col-sm-10">
                                                    <textarea  name="description" placeholder="description" class="form-control"></textarea>
                                                    
                                                </div>
                                            
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-10 offset-sm-2">
                                                <input type="submit" class="btn btn-primary">
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
    </div>

    <script src="{{asset('assets/js/form-validator.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
   @include('admin.footer')
</body>

</html>
