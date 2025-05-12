<div>
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" 
            data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Categories</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" 
            id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    {{-- <a href="#" class="nav-link" data-toggle="dropdown">Dresses <i class="fa fa-angle-down float-right mt-1"></i></a>
                    <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                        <a href="" class="dropdown-item">Men's Dresses</a>
                        <a href="" class="dropdown-item">Women's Dresses</a>
                        <a href="" class="dropdown-item">Baby's Dresses</a>
                    </div> --}}
                    @foreach ($category as $cat)
                      <div class="nav-item dropdown mt-2 " >
                        <a href="{{ route('categoryproducts',$cat->cid) }}"  style="display: inline-block;" class="nav-link text-left" > 
                            {{$cat->cname}}
                        </a>
                        <i class="fa fa-angle-down float-right nav-link mr-0 "data-toggle="dropdown"></i>
                        <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                            @foreach ($cat->subcategory as $subcategory)
                                <a href="{{ route('subcategoryproducts',$subcategory->sid) }}" class="dropdown-item">
                                    {{ $subcategory->sname }}
                                </a>  
                            @endforeach
                            
                        </div>
                      </div>
                    @endforeach
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="height: 410px;">
                        <img class="img-fluid" style="height:100vh;" 
                        @if (Route::is('viewproduct'))
                            src="public/../../uploads/Diabetaid.png"
                        @else
                            src="public/../uploads/Diabetaid.png"
                        @endif
                        alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">get Your First Order</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Cheap Price</h3>
                                <a href="#products" class="btn btn-light py-2 px-3">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 410px;">
                        <img class="img-fluid" 
                        @if (Route::is('viewproduct'))
                            src="public/../../uploads/th.jpg"
                        @else
                            src="public/../uploads/th.jpg"
                        @endif
                        alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">get Your First Order</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                <a href="#products" class="btn btn-light py-2 px-3">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-prev-icon mb-n2"></span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-next-icon mb-n2"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>