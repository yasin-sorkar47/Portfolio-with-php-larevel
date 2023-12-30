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

              
                <form action="{{ route('back.category.update', $categories->slug)}}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                      <div class="card-title text-slate-900 dark:text-white ">Create Category</div>
                    </div>
                  </header>
                  <div class="card-text h-full space-y-4">
                    <div class="input-area">
                      <label for="name" class="form-label">Category Name</label>
                      <input id="name" value="{{old('name') ? old('name') : $categories->name}}" name="name" type="text" class="form-control" placeholder="Category Name">
                      <span class="inline-block pt-2 text-red-500">{{$errors->first("name")}}</span>
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

  $('.close_btn').on('click', () => {
    $('.btn-box').fadeOut();
  })
})

</script>
@endsection