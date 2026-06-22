<div class="categories-collections">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="categories">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <div class="line-dec"></div>
                  <h2>Some Of Book <em>Categories</em> Here.</h2>
                </div>
              </div>
              @foreach($categories as $category)
              <div class="col-lg-2 col-sm-6">
                  <div class="item">
                      <h4>{{ $category->titre }}</h4>
                  </div>
              </div>
          @endforeach
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
