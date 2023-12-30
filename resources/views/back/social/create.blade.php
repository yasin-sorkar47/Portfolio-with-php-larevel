@extends('back.layout.layout')


@section('content')


<div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
    <div class="page-content">
        <div class="transition-all duration-150 container-fluid" id="page_layout">
            <div id="content_layout">
          <!-- END: BreadCrumb -->
          <div class=" flex">
                <div class="grid mr-4 flex-1 gap-6">
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

                        <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                            <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Social</div>
                            </div>
                        </header>
                        <div class="card-text h-full ">
                            <form action="{{ route('back.social.store')}}" method="POST" class="space-y-4">
                                @csrf
                            <div class="input-area relative pl-28">
                                <label for="label" class="inline-inputLabel">Label</label>
                                <input id="label" type="text" name="label" class="form-control" placeholder="Label">
                            </div>
                            <div class="input-area relative pl-28">
                                <label for="element" class="inline-inputLabel">Element</label>
                                <input id="element" name="element" type="text" class="form-control" placeholder="Element">
                            </div>
                            <div class="input-area relative pl-28">
                                <label for="url" class="inline-inputLabel">Url:</label>
                                <input id="url" name="url" type="text" class="form-control" placeholder="Url:">
                            </div>
                            <button type="submit" class="btn inline-flex justify-center btn-dark ml-28">Submit</button>
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

@endsection