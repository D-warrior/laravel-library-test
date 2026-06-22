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
                                <div class="card-header">Edit book</div>
                                <div class="card-body">
                                    
                                    <form accept-charset="utf-8" method="POST" action="{{url('update_book',$data->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="titre" class="form-label">title</label>
                                            <input type="text" name="titre"  class="form-control" value="{{$data->titre}}"  required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="auteur" class="form-label">author</label>
                                            <input type="text" name="auteur"  class="form-control" value="{{$data->auteur}}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editeur" class="form-label">editor</label>
                                            <input type="text" name="editeur"  class="form-control" value="{{$data->editeur}}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="dateEdition" class="form-label">edition date</label>
                                            <input type="date" name="dateEdition"  class="form-control" value="{{$data->dateEdition}}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="NbreExemplaire" class="form-label">NbreExemplaire</label>
                                            <input type="number" name="NbreExemplaire"  class="form-control" value="{{$data->NbreExemplaire}}" required>
                                        </div>
                                        <div class="mb-3"> 
                                            <label for="price" class="form-label">price</label>
                                            <input type="number" name="price"  class="form-control" value="{{$data->price}}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="category" class="form-label">category</label>
                                            <select name='category' class="form-control" > 
                                                <option value="{{ $data->categorie_id }}">{{ $data->category->titre }}</option>
                                                @foreach($category as $category)
                                                    <option value="{{ $category->id }}">{{ $category->titre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="description" class="form-label">description</label>
                                            <textarea  name="description"  class="form-control" required>{{$data->description}}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="book_img" class="form-label">image</label>
                                            <img src="/book/{{$data->book_img}}" alt=""> 
                                            <input type="file" name="book_img"  class="form-control" >
                                        </div>
                                        <div class="mb-3">
                                            <input type="submit" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
        </div>
    </div>
   @include('admin.footer')
</body>

</html>
