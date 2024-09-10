@include('layouts.header')
@if (session('user_det')['role'] == 'parent')
    @include('parent.includes.nav')
@elseif (session('user_det')['role'] == 'teacher')
    @include('teacher.includes.nav')
@else
    @include('admin.includes.nav')
@endif
@php
    $permissions = session('permissions');
@endphp
<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.All_Recent_Lecturers')</h1>
    </div>

    <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
        <div>
            <div>
                <div class="flex justify-between px-[20px] mb-3 items-center">
                    <h3 class="text-[20px] text-black">@lang('lang.All_Lecturers')</h3>
                    @if (session('user_det')['role'] !== 'parent')


                        <form action="" method="get">

                            <div class="flex gap-5 items-center">
                                <div>
                                    <label class="text-[14px] font-normal" for="fromDate">@lang('lang.From_Date')</label>
                                    <input type="date"
                                        class="w-full border-secondary rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                        name="from" id="fromDate" value="{{ request('from') }}">
                                </div>
                                <div>
                                    <label class="text-[14px] font-normal" for="fromDate">@lang('lang.To_Date')</label>
                                    <input type="date"
                                        class="w-full border-secondary rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                        name="to" id="fromDate" value="{{ request('to') }}">
                                </div>
                                <div>
                                    @if (request('from'))
                                        <a href="../recentLecturers"><button type="button"
                                                class="bg-secondary h-[42px] px-5 font-semibold text-white rounded-md mt-5">@lang('lang.All')</button></a>
                                    @else
                                        <button
                                            class="bg-secondary h-[42px] px-5 font-semibold text-white rounded-md mt-5">@lang('lang.Filter')</button>
                                    @endif

                                </div>
                            </div>
                        </form>
                    @endif
                </div>
                <table id="datatable" class="overflow-scroll">
                    <thead class="py-6 bg-primary text-white">
                        <tr>
                            <th>@lang('lang.Student_Name')</th>
                            <th>@lang('lang.Teacher')</th>
                            <th>@lang('lang.Word')</th>
                            <th>@lang('lang.Date')</th>
                            @if (session('user_det')['role'] == 'admin' || session('user_det')['role'] == 'admin')
                                <th>@lang('lang.Action')</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($words as $data)
                            <tr>
                                <td>{{ $data->student_name }}</td>
                                <td>{{ $data->teacher_name }}</td>
                                <td>
                                    @php
                                        $words = json_decode($data->word, true);
                                    @endphp
                                    {{ implode(',', $words) }}
                                </td>
                                <td>{{ $data->created_at }}</td>
                                @if (session('user_det')['role'] == 'admin' || session('user_det')['role'] == 'admin')
                                    <td>

                                        <a href="../deleteLecturers/{{ $data->id }}">
                                            <button class="cursor-pointer delbtn"><img width="38px"
                                                    src="{{ asset('images/icons/delete.svg') }}"
                                                    alt="delete"></button>
                                        </a>

                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>




    <!-- Add  courses  modal -->
    <div id="addcoursesmodal" data-modal-backdrop="static"
        class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="fixed inset-0 transition-opacity">
            <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
        </div>
        <div class="relative p-4 w-full max-w-7xl max-h-full ">
            <form id="training_data" method="post">
                @csrf
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                    <div class="flex items-center justify-center  p-5  rounded-t dark:border-gray-600 bg-primary">
                        <h3 class="text-xl font-semibold text-white text-center">
                            @lang('lang.Add_Video')
                        </h3>
                        <button type="button"
                            class="cursor-pointer absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                            data-modal-hide="addcoursesmodal">
                            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>

                    <div class="grid grid-cols-2 mt-4 gap-10 px-10">
                        <div>
                            <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                                <label class="text-[14px] font-normal" for="title">@lang('lang.Title')</label>
                                <input type="text"
                                    class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                    name="title" id="title" placeholder=" @lang('lang.Enter_Title')">
                            </div>

                            <div class="grid grid-cols-[100px_minmax(100px,_1fr)]  my-6  ">
                                <label class="text-[14px] font-normal" for="description">@lang('lang.Description')</label>
                                <textarea class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[85px] text-[14px]" name="description"
                                    id="description" placeholder="@lang('lang.Enter_Description')"></textarea>
                            </div>




                        </div>


                        <div>

                            <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                                <label class="text-[14px] font-normal" for="video">@lang('lang.Select_Video')</label>
                                <input type="file"
                                    class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                    name="video" id="video">
                            </div>



                        </div>
                    </div>
                    <div class=" pt-4">
                        <hr class="border-[#DEE2E6] ">
                    </div>
                    <div class="flex justify-end ">
                        <button class="bg-secondary text-white py-2 px-6 my-4 rounded-[4px]  mx-6  font-semibold">
                            <div class=" text-center hidden" id="spinner">
                                <svg aria-hidden="true"
                                    class="w-5 h-5 mx-auto text-center text-gray-200 animate-spin fill-primary"
                                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                        fill="currentColor" />
                                    <path
                                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                        fill="currentFill" />
                                </svg>
                            </div>
                            <div id="text">
                                @lang('lang.Add')
                            </div>

                        </button>
                    </div>
                </div>
            </form>
            <div>

            </div>

        </div>
    </div>





    @include('layouts.footer')
