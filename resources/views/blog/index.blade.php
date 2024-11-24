@extends('layout.header')
@section('content')


    <div class="row no-gutters d-flex justify-content-center align-items-center">
      {{-- create post --}}
        @if (session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        @endif


        {{-- search post --}}
        <div class="col-md-8 mt-2">
            <div class="form-group">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" id="searchPost" name="search" class="form-control" placeholder="Search post" aria-label="SearchPost" value="@if(isset($searchValue))
                    {{ $searchValue}} @endif

                    " aria-describedby="addon-wrapping">
                  </div>
            </div>
        </div>


        <div class="col-md-8 mt-2">
            <div class="card">
                <div class="card-body">
                <form action="{{ route('blog.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex justify-start align-items-center">
                        <img src="{{ asset("image/image1.jpg")}}" class="img-rounded"/>
                    <div class="d-flex flex-column creator">
                        <h5 style="font-size: 1rem;">Clara</h5>
                        <span style="font-size: 0.8rem;">5h ago</span>
                    </div>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title" aria-label="Title" aria-describedby="addon-wrapping">
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Slug" aria-label="Slug" aria-describedby="addon-wrapping">
                    </div>
                    <div class="form-group">
                        <label>Keyword</label>
                        <input type="text" name="keyword" class="form-control" placeholder="Slug" aria-label="Slug" aria-describedby="addon-wrapping">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" placeholder="Description" aria-label="Description" aria-describedby="addon-wrapping">
                    </div>
                    <div class="form-group">
                        <label>Cover Image</label>
                        <input type="file" name="cover_image" class="form-control" placeholder="Cover Image" aria-label="Cover Image" aria-describedby="addon-wrapping">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 float-end" name="submit">Post</button>
                </form>
                </div>
            </div>
         </div>
    {{-- start loop articles --}}
   {{--
         [
            {
            "id":1,
            "title":"lorem",
            "description":""
         },
         {
            "id":2,
            "title":"lorem",
            "description":""
         }
         ]
looping
    --}}


   @foreach ($articles as $item)
   <div class="col-md-8 mt-3">
       <div class="card card-custom">
        <div class="card card-header">
            <div class="d-flex justify-content-start">

            <img src="{{ asset("image/image1.jpg")}}" class="img-rounded"/>
            <div class="d-flex flex-column creator">
                <h5 style="font-size: 1rem;">Clara</h5>
                <span style="font-size: 0.8rem;">5h ago</span>
            </div>

            </div>
        </div>
        <div class="card-body ">
            <h5 class="card-title">{{$item->title}}</h5>
            <div class="card-cover-image d-flex justify-content-center">
                <img src="https://picsum.photos/600/300" class="cover-image img-thumbnail w-100 border-none" style="border:none;"/>
            </div>

            <div class="main-description">
               {{$item->description}}
            </div>

        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-center align-items-center">
                <button class="btn btn-like">
                    <i class="fa-regular fa-heart"></i>  10.5k
                </button>
                <button class="btn btn-like">
                    <i class="fa-regular fa-comment"></i>  15k
                </button>
                <button class="btn btn-like">
                    <i class="fa-regular fa-eye"></i>  50k
                </button>
            </div>

        </div>
        <hr class="w-100" style="width:80%;border-top:1px solid #ccc;margin-left:-3px;"/>
        <div class="comment-section">
            <h5 class="ms-3 mb-3">Comments</h5>
            <div class="card-comment-custom">

                <div class="d-flex justify-content-start ms-3">
                    <img src="https://picsum.photos/id/64/100/100" class="img-rounded"/>
                    <div class="d-flex flex-column creator ml-2">
                        <h5 style="font-size: 1rem;">Kellyn</h5>
                        <span style="font-size: 0.8rem;">1m ago</span>
                        <div class="d-block" style="margin-bottom: -20px;">
                            <p> Nice Articles. Love it</p>
                        </div>
                        <div class="d-flex justify-content-start align-items-center" style="margin-left:-10px;">
                            <button class="btn btn-like-comment">
                                <i class="fa-regular fa-heart"></i>  <span class="total-like">0</span>
                            </button>
                            <button class="btn btn-comment">
                                <i class="fa-regular fa-comment"></i>  0
                            </button>
                            <button class="btn btn-like">
                                <i class="fas fa-reply"></i>  Reply
                            </button>
                        </div>
                    </div>

                    </div>



            </div>

        </div>
       </div>
    </div>

   @endforeach
{{-- end looping --}}
    <div class="d-flex justify-content-center align-items-center mt-3">

        {{ $articles->links() }}
    </div>

    </div>
    </div>

@endsection

