@extends('back.layout.layout')


@section('content')
  <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
    <div class="page-content">
      <div class="transition-all duration-150 container-fluid" id="page_layout">
        <div id="content_layout">
          <!-- END: BreadCrumb -->
          <div class="grid xl:grid-cols-1 grid-cols-1 gap-6">
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

            
              <form action="{{ route('back.appearance.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                  <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                      <div class="card-title text-slate-900 dark:text-white ">SEO</div>
                    </div>
                  </header>
                  <div class="card-text h-full space-y-4">
                    <div class="input-area">
                      <label for="title" class="form-label">Title</label>
                      <input id="title" value="{{old('title') ? old('title') : ""}}" name="title" type="text" class="form-control" placeholder="title">
                      <span class="inline-block pt-2 text-red-500">{{$errors->first("title")}}</span>
                    </div>

                    <div class="input-area">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" rows="5" class="form-control" placeholder="Type Here">{{old('description') ? old('description') : ""}}</textarea>
                        <span class="inline-block pt-2 text-red-500">{{$errors->first("description")}}</span>
                    </div>

                    <div class="input-area">
                        <label for="keyword" class="form-label">Keyword</label>
                        <textarea id="keyword" name="keyword" rows="5" class="form-control" placeholder="Type Here">{{old('keyword') ? old('keyword') : ""}}</textarea>
                        <span class="inline-block pt-2 text-red-500">{{$errors->first("keyword")}}</span>
                    </div>
                    
                    <div class="input-area">
                        <label for="head_script" class="form-label">Head script</label>
                        <textarea id="head_script" name="head_script" rows="5" class="form-control" placeholder="Type Here">{{old('head_script') ? old('head_script') : ""}}</textarea>
                        <span class="inline-block pt-2 text-red-500">{{$errors->first("head_script")}}</span>
                    </div>

                    <div class="input-area">
                        <label for="body_script" class="form-label">Body Script</label>
                        <textarea id="body_script" name="body_script" rows="5" class="form-control" placeholder="Type Here">{{old('body_script') ? old('body_script') : ""}}</textarea>
                        <span class="inline-block pt-2 text-red-500">{{$errors->first("body_script")}}</span>
                    </div>

                    <div class="input-area">
                        <label for="main_logo" class="form-label">Main Logo</label>
                        <input id="main_logo" name="main_logo" type="file" class="form-control dropify" placeholder="Heading">
                        <span class="inline-block pt-2 text-red-500">{{$errors->first("main_logo")}}</span>
                    </div>

                    <div class="input-area">
                        <label for="footer_logo" class="form-label">Footer Logo</label>
                        <input id="footer_logo" name="footer_logo" type="file" class="form-control dropify" placeholder="Heading">
                        <span class="inline-block pt-2 text-red-500">{{$errors->first("footer_logo")}}</span>
                    </div>

                    <div class="input-area">
                        <label for="favicon" class="form-label">Favicon</label>
                        <input id="favicon" name="favicon" type="file" class="form-control dropify" placeholder="Heading">
                        <span class="inline-block pt-2 text-red-500">{{$errors->first("favicon")}}</span>
                    </div>
                    <input type="text" value="1" name="number">

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

  $('.close_btn').on('click', () => {
    $('.btn-box').fadeOut();
  })
})

</script>
@endsection