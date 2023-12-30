@extends('back.layout.layout')

@section('content')

<div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
    <div class="page-content">
        <div class="transition-all duration-150 container-fluid" id="page_layout">
            <div id="content_layout">
                <div class="grid xl:grid-cols-1 grid-cols-1 gap-6">
                    <div class="card">
                        <header class="card-header noborder">
                            <h4 class="card-title">All Users</h4>
                        </header>
                        <div class="card-body px-6 pb-6">
                            <div class="overflow-x-auto -mx-6">
                                <div class="inline-block min-w-full align-middle">
                                    <div class="overflow-hidden">
                                        <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                            <thead class="bg-slate-200 dark:bg-slate-700">
                                                <tr>
                                                    <th scope="col" class="table-th">Sl</th>
                                                    <th scope="col" class="table-th">Image</th>
                                                    <th scope="col" class="table-th">Name</th>
                                                    <th scope="col" class="table-th">Emaiil</th>
                                                    <th scope="col" class="table-th">Created At</th>
                                                    <th scope="col" class="table-th">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                                @forelse ($users as $user)
                                                <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                                    <td class="table-td">{{ $loop->iteration }}</td>
                                                    <td class="table-td">Ya</td>
                                                    <td class="table-td">{{ $user->name }}</td>
                                                    <td class="table-td">{{ $user->email }}</td>
                                                    <td class="table-td">{{ $user->created_at->format("d M Y") }}</td>
                                                    <td class="table-td">
                                                        <div class=" flex">
                                                            <div class="flex-2 mr-3">
                                                                <div text="primary" class="btn btn-primary w-8 flex justify-center align-content-center">
                                                                    <a href="{{ route('back.user.edit', $user->id)}}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1.5em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2v-5m-1.414-9.414a2 2 0 1 1 2.828 2.828L11.828 15H9v-2.828z"></path></svg>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="flex-2">
                                                                <div data-bs-toggle="modal" data-bs-target="#dangerModal" text="primary"  class=" btn btn-danger w-8 flex justify-center align-content-center">
                                                                    <a href="javascript:void(0)">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1.5em" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 7l-.867 12.142A2 2 0 0 1 16.138 21H7.862a2 2 0 0 1-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v3M4 7h16"></path></svg>  
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <form id="form_submit" class="hidden" action="{{ route('back.user.delete')}}" method="POST">
                                                            @csrf
                                                            <input type="text" name="id" value="{{ $user->id }}">
                                                        </form>
                                                    </td>
                                                </tr>       
                                                @empty
                                                <tr>
                                                    <td colspan="7">
                                                        <p class=" text-red-500 text-center p-5 pb-0 font-extrabold text-xl">No Data Found 😥😥</p>
                                                    </td>
                                                </tr>     
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="dangerModal" tabindex="-1" aria-labelledby="dangerModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog relative w-auto pointer-events-none">
        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-danger-500">
                    <h3 class="text-base font-medium text-white dark:text-white capitalize">
                        Delete Modal
                    </h3>
                    <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                                                11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-4">
                    <h6 class="text-base text-slate-900 dark:text-white leading-6">
                        Are you sure?
                    </h6>
                    <p class="text-base text-slate-600 dark:text-slate-400 leading-6">
                        For deleting this item.
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                    <button data-bs-dismiss="modal" onclick="formSubmit()" class="btn inline-flex justify-center text-white bg-danger-500">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    function formSubmit () {
        let form = document.getElementById('form_submit');
        form.submit();
    }
</script>

