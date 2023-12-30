@extends('back.layout.layout')

@section('content')
  <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
    <div class="page-content">
      <div class="transition-all duration-150 container-fluid" id="page_layout">
        <div id="content_layout">
          <!-- END: BreadCrumb -->
          <div class="grid xl:grid-cols-1 grid-cols-1 gap-6">
            <!-- Basic Inputs -->
            <div class="card">
              <div class="card-body flex flex-col p-6">

                @if(Session::has("success"))
                  <div class="py-[18px] mb-2 px-6 font-normal text-sm rounded-md bg-danger-500 bg-opacity-[14%] text-white btn-box">
                    <div class="flex items-center space-x-3 rtl:space-x-reverse">
                        <iconify-icon class="text-2xl flex-0 text-danger-500" icon="system-uicons:target"></iconify-icon>
                        <p class="flex-1 text-danger-500 font-Inter">
                          {{ Session::get('success') }}
                        </p>
                        <div class="flex-0 text-xl cursor-pointer text-danger-500">
                            <iconify-icon class="close_btn" icon="line-md:close"></iconify-icon>
                        </div>
                    </div>
                </div>
                @endif

              
                <form action="{{ route('back.portfolio.update',$portfolio->slug )}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                      <div class="card-title text-slate-900 dark:text-white ">Create Porfolio</div>
                    </div>
                  </header>
                  <div class="card-text h-full space-y-4">
                    <div class="input-area">
                      <label for="image" class="form-label">Image</label>
                      <input id="image" data-default-file="{{ asset($portfolio->image) }}" name="image" type="file" class="form-control dropify" placeholder="Heading">
                      <span class="inline-block pt-2 text-red-500">{{$errors->first("image")}}</span>
                    </div>
                    <div class="input-area">
                      <label for="image_alt" class="form-label">Image_alt</label>
                      <input id="image_alt" value="{{ old('image_alt') ? old('image_alt') : $portfolio->image_alt }}" name="image_alt" type="text" class="form-control" placeholder="Image_alt">
                      <span class="inline-block pt-2 text-red-500">{{$errors->first("image_alt")}}</span>
                    </div>
                    <select name="category_id" id="category_id" class="form-control w-full mt-2">
                      <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Select Category</option>
                      @foreach ($categories as $category)

                      @if ( old('category_id') == $category->id)
                      <option selected value="{{ $category->id }}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{ $category->name }}</option>
                      @else
                      <option {{ !old('category_id') && $portfolio->category_id == $category->id ?  'selected' : '' }}  value="{{ $category->id }}" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">{{ $category->name }}</option>
                      @endif 
                      @endforeach
                  </select>
                    <div class="input-area">
                        <label for="title" class="form-label">Title</label>
                        <input id="title" value="{{ old('title') ? old('title') : $portfolio->title }}" name="title" type="text" class="form-control" placeholder="Title">
                        <span class="inline-block pt-2 text-red-500">{{$errors->first("title")}}</span>
                    </div>
                    <div class="input-area">
                        <label for="subtitle" class="form-label">Subtile</label>
                        <input id="subtitle" value="{{ old('subtitle') ? old('subtitle') : $portfolio->subtitle }}" name="subtitle" type="text" class="form-control" placeholder="Subtile">
                        <span class="inline-block pt-2 text-red-500">{{$errors->first("subtitle")}}</span>
                    </div>
                    <div class="input-area">
                        <label for="details" class="form-label">Details</label>
                        <textarea id="trumbowyg-demo" name="details" rows="5" class="form-control" placeholder="Type Here">{{ old('details') ? old('details') : $portfolio->details }}</textarea>
                        <span class="inline-block pt-2 text-red-500">{{$errors->first("details")}}</span>
                    </div>
                    <div>
                      <button type="submit" text="primary" class=" btn btn-primary">Save</button>
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
@endsection

@section('custom_js')
<script>
$(document).ready(function (){
  $('.dropify').dropify();

  $('#trumbowyg-demo').trumbowyg();

  $('.close_btn').on('click', () => {
    $('.btn-box').fadeOut();
  })

})

</script>
@endsection
