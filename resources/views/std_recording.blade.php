@include('layouts.header')
@if (session('user_det')['role'] == 'parent')
    @include('parent.includes.nav')
@elseif (session('user_det')['role'] == 'teacher')
    @include('teacher.includes.nav')
@else
    @include('admin.includes.nav')
@endif


<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.All_Recordings')</h1>
    </div>

    <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
        <div>
            <div class="flex justify-between px-[20px] mb-3">
                <h3 class="text-[20px] text-black">@lang('lang.Student_Recordings_List')</h3>
            </div>
            <table id="datatable" class="overflow-scroll">
                <thead class="py-6 bg-primary text-white">
                    <tr>
                        <th>@lang('lang.STN')</th>
                        <th>@lang('lang.Videos')</th>
                        <th>@lang('lang.Student')</th>
                        <th>@lang('lang.Teacher')</th>
                        <th>@lang('lang.Comment')</th>
                        <th>@lang('lang.Lesson_Date')</th>
                        <th>@lang('lang.Action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recordingData as $x => $data)
                        <tr class="pt-4">
                            <td>{{ $x + 1 }}</td>
                            <td class="w-[220px]">
                                <video class=" rounded-[4px] w-full" controls width="200px"
                                    src="../{{ $data->video }}"></video>
                            </td>
                            <td>{{ $data->student_name }}</td>
                            <td>{{ $data->teacher_name }}</td>
                            <td>{{ $adata->teacher_comment }}</td>
                            <td>{{ $data->lesson_date }}</td>
                            <td>
                                <div class="flex gap-5 items-center justify-center">
                                    @if (session('user_det')['role'] == 'admin')
                                        <button class="delbtn" delId="{{ $data->id }}"><img width="38px"
                                                src="{{ asset('images/icons/delete.svg') }}" alt="delete"></button>
                                    @endif
                                    <a class="cursor-pointer" data-modal-target="videodetails{{ $x }}"
                                        data-modal-toggle="videodetails{{ $x }}"><img width="38px"
                                            src="{{ asset('images/icons/view.svg') }}" alt="View"></a>
                                </div>
                            </td>
                        </tr>

                        <div id="videodetails{{ $x }}" data-modal-backdrop="static"
                            class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full   max-w-4xl max-h-full ">
                                <form action="registerdata" method="post">
                                    @csrf
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                                        <div
                                            class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                                            <h3 class="text-xl font-semibold text-white ">
                                                @lang('lang.Video_Details')
                                            </h3>
                                            <button type="button"
                                                class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                                                data-modal-hide="videodetails{{ $x }}">
                                                <svg class="w-4 h-4 text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex justify-around gap-10">
                                            <div class="my-4 pl-6">
                                                <video class=" rounded-[4px] w-full" controls width="320px"
                                                    src="../{{ $data->video }}"></video>
                                            </div>
                                            <div class="flex flex-col gap-5  mt-4  pb-4">
                                                <h2 class="text-pink text-[32px] font-semibold text-left "><span
                                                        class="border-b-4 border-pink py-1 pr-4">@lang('lang.Class')
                                                    </span>@lang('lang.Video')
                                                </h2>

                                                <div class="flex items-center justify-end  mt-2">
                                                    <div class="w-[200px]">
                                                        <h3 class="text-[18px] font-normal">@lang('lang.Student_No'):</h3>
                                                    </div>
                                                    <div class="w-[200px]  ">
                                                        <p class="text-[14px] text-[#323C47]">{{ $data->student_id }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-end  mt-2">
                                                    <div class="w-[200px]">
                                                        <h3 class="text-[18px] font-normal">@lang('lang.Duration'):</h3>
                                                    </div>
                                                    <div class="w-[200px]  ">
                                                        <p class="text-[14px] text-[#323C47]">00:00</p>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-end  mt-2">
                                                    <div class="w-[200px]">
                                                        <h3 class="text-[18px] font-normal">@lang('lang.Lesson_Date'):</h3>
                                                    </div>
                                                    <div class="w-[200px]  ">
                                                        <p class="text-[14px] text-[#323C47]">{{ $data->lesson_date }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-end  mt-2">
                                                    <div class="w-[200px]">
                                                        <h3 class="text-[18px] font-normal">@lang('lang.Teacher'):</h3>
                                                    </div>
                                                    <div class="w-[200px]  ">
                                                        <p class="text-[14px] text-[#323C47]">{{ $data->teacher_name }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-end  mt-2">
                                                    <div class="w-[200px]">
                                                        <h3 class="text-[18px] font-normal">@lang('lang.Teachers')
                                                            @lang('lang.Comment')</h3>
                                                    </div>
                                                    <div class="w-[200px]  ">
                                                        <p class="text-[14px] text-[#323C47]">
                                                            {{ $data->teacher_comment }} </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div>

                                </div>

                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>




<!--  video  Details  modal -->
<div id="videodetails" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full   max-w-4xl max-h-full ">
        <form action="registerdata" method="post">
            @csrf
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                <div class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white ">
                        @lang('lang.Video_Details')
                    </h3>
                    <button type="button"
                        class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="videodetails">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <div class="flex justify-around gap-10">
                    <div class="my-4 pl-6">
                        <video class=" rounded-[4px] w-full" controls width="320px"
                            src="{{ asset('videos/demo.mp4') }}"></video>
                    </div>
                    <div class="flex flex-col gap-5  mt-4  pb-4">
                        <h2 class="text-pink text-[32px] font-semibold text-left "><span
                                class="border-b-4 border-pink py-1 pr-4">@lang('lang.Class') </span>@lang('lang.Video')
                        </h2>
                        <div class="flex items-center justify-end  mt-2">
                            <div class="w-[200px]">
                                <h3 class="text-[18px] font-normal">@lang('lang.Campus'):</h3>
                            </div>
                            <div class="w-[200px]  ">
                                <p class="text-[14px] text-[#323C47]">campus Name</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-end  mt-2">
                            <div class="w-[200px]">
                                <h3 class="text-[18px] font-normal">@lang('lang.Student_No'):</h3>
                            </div>
                            <div class="w-[200px]  ">
                                <p class="text-[14px] text-[#323C47]">105</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-end  mt-2">
                            <div class="w-[200px]">
                                <h3 class="text-[18px] font-normal">@lang('lang.Duration'):</h3>
                            </div>
                            <div class="w-[200px]  ">
                                <p class="text-[14px] text-[#323C47]">5:00</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-end  mt-2">
                            <div class="w-[200px]">
                                <h3 class="text-[18px] font-normal">@lang('lang.Lesson_Date'):</h3>
                            </div>
                            <div class="w-[200px]  ">
                                <p class="text-[14px] text-[#323C47]">Dec 21, 2023</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-end  mt-2">
                            <div class="w-[200px]">
                                <h3 class="text-[18px] font-normal">@lang('lang.Teacher'):</h3>
                            </div>
                            <div class="w-[200px]  ">
                                <p class="text-[14px] text-[#323C47]">Teacher Name</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-end  mt-2">
                            <div class="w-[200px]">
                                <h3 class="text-[18px] font-normal">@lang('lang.Teachers') @lang('lang.Comment')</h3>
                            </div>
                            <div class="w-[200px]  ">
                                <p class="text-[14px] text-[#323C47]">Lorem Ipsum is simply dummy text
                                    of t
                                    of the printing and typesetting ... </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
        <div>

        </div>

    </div>
</div>


<script>
    $(document).ready(function() {
        // delete training video
        $('.delbtn').click(function() {
            var delId = $(this).attr('delId');
            console.log(delId);
            var url = "../delTraining/" + delId;
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(response) {
                    if (response.success == true) {
                        window.location.href = '../training';
                    } else if (response.success == false) {
                        Swal.fire(
                            'Warning!',
                            response.message,
                            'warning'
                        );
                    }
                },
                error: function(jqXHR) {
                    let response = JSON.parse(jqXHR.responseText);
                    console.log("error");
                    Swal.fire(
                        'Warning!',
                        'Training Not Found',
                        'warning'
                    );
                }

            });
        });
    });
</script>
@include('layouts.footer')
