@extends('layout.header')
@section('content')
    <div class="row no-gutters d-flex justify-content-center align-items-center">
        <div class="col-md-8 mt-2">
            <div class="form-group">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Search post" aria-label="SearchPost" aria-describedby="addon-wrapping">
                  </div>
            </div>
        </div>

        <div class="col-md-8 mt-2">
           <div class="card card-custom">
            <div class="card card-header">
                <div class="d-flex justify-content-start">

                <img src="{{ asset("image/image1.jpg")}}" class="img-rounded"/>
                <div class="d-flex flex-column creator">
                    <h5>Clara</h5>
                    <span>5h ago</span>
                </div>

                </div>
            </div>
            <div class="card-body ">
                <div class="main-description">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat qui exercitationem quos ex architecto, totam necessitatibus fugiat rem atque maiores similique ullam voluptas provident quae a eaque consectetur, impedit deleniti.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat qui exercitationem quos ex architecto, totam necessitatibus fugiat rem atque maiores similique ullam voluptas provident quae a eaque consectetur, impedit deleniti.

                </div>

            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-start align-items-center">
                        <button class="btn btn-like mr-2">
                            <i class="fa-regular fa-heart"></i>  10.5k
                        </button>
                        <button class="btn btn-like mr-2">
                            <i class="fa-regular fa-comment"></i>  15k
                        </button>
                        <button class="btn btn-like mr-2">
                            <i class="fa-regular fa-eye"></i>  50k
                        </button>
                    </div>

                </div>

            </div>
           </div>
        </div>
    </div>
    </div>

@endsection

