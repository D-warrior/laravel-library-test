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
                        <li data-filter="*" class="active">Latest</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row grid">
                    @foreach($data as $item)
                    <div class="col-lg-6 currently-market-item all msc">
                        <div class="item">
                            <div class="left-image">
                                <img src="book/{{$item->book_img}}" alt="" style="border-radius: 20px; min-width: 195px;">
                            </div>
                            <div class="right-content">
                                <h4>{{$item->titre}}</h4>
                                <div class="line-dec"></div>
                                <span class="bid">
                                    Current Available<br><strong>{{$item->NbreExemplaire}}</strong><br>
                                </span><br>
                                <span class="bid">
                                    Edition Date:<br><strong>{{$item->dateEdition}}</strong><br>
                                </span>
                                <div class="text-button">
                                    <a class="btn btn-primary" href="{{url('book_details', $item->id)}}">Reserver</a>
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
