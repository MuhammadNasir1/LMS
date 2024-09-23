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
            <div class="flex justify-between px-[20px] mb-3 items-center">
                <h3 class="text-[20px] text-black">@lang('lang.Student_Recordings_List')</h3>
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
                                    <a href="../studentRec"><button type="button"
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
                            <td class="w-[220px]">
                                <video class=" rounded-[4px] w-full" controls width="200px"
                                    src="../{{ $data->video }}"></video>
                            </td>
                            <td>{{ $data->student_id }}</td>
                            <td>{{ $data->student_name }}</td>
                            <td>{{ $data->teacher_name }}</td>
                            <td>{{ $data->teacher_comment }}</td>
                            <td>{{ $data->lesson_date }}</td>
                            <td>
                                <div class="flex gap-5 items-center justify-center">
                                    @if (session('user_det')['role'] !== 'parent')
                                        <button data-modal-target="deleteData" data-modal-toggle="deleteData"
                                            class="delButton" delId="{{ $data->id }}">
                                            <svg class="h-[40px] w-[40px]" viewBox="0 0 36 36" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle opacity="0.1" cx="18" cy="18" r="18"
                                                    fill="#DF6F79" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M23.4905 13.7433C23.7356 13.7433 23.9396 13.9468 23.9396 14.2057V14.4451C23.9396 14.6977 23.7356 14.9075 23.4905 14.9075H13.0493C12.8036 14.9075 12.5996 14.6977 12.5996 14.4451V14.2057C12.5996 13.9468 12.8036 13.7433 13.0493 13.7433H14.8862C15.2594 13.7433 15.5841 13.478 15.6681 13.1038L15.7642 12.6742C15.9137 12.0889 16.4058 11.7002 16.9688 11.7002H19.5704C20.1273 11.7002 20.6249 12.0889 20.7688 12.6433L20.8718 13.1032C20.9551 13.478 21.2798 13.7433 21.6536 13.7433H23.4905ZM22.5573 22.4946C22.7491 20.7073 23.0849 16.4611 23.0849 16.4183C23.0971 16.2885 23.0548 16.1656 22.9709 16.0667C22.8808 15.9741 22.7669 15.9193 22.6412 15.9193H13.9028C13.7766 15.9193 13.6565 15.9741 13.5732 16.0667C13.4886 16.1656 13.447 16.2885 13.4531 16.4183C13.4542 16.4261 13.4663 16.5757 13.4864 16.8258C13.5759 17.9366 13.8251 21.0305 13.9861 22.4946C14.1001 23.5731 14.8078 24.251 15.8328 24.2756C16.6238 24.2938 17.4387 24.3001 18.272 24.3001C19.0569 24.3001 19.854 24.2938 20.6696 24.2756C21.7302 24.2573 22.4372 23.5914 22.5573 22.4946Z"
                                                    fill="#D11A2A" />
                                            </svg>

                                        </button>
                                    @endif
                                    <a class="cursor-pointer" data-modal-target="videodetails{{ $x }}"
                                        data-modal-toggle="videodetails{{ $x }}"><svg width="36"
                                            height="36" viewBox="0 0 36 36" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="18" cy="18" r="18" fill="#109CF1"
                                                fill-opacity="0.06" />
                                            <path
                                                d="M17.75 15.3977C16.9724 15.3977 16.2267 15.7066 15.6769 16.2564C15.1271 16.8063 14.8182 17.552 14.8182 18.3295C14.8182 19.1071 15.1271 19.8528 15.6769 20.4027C16.2267 20.9525 16.9724 21.2614 17.75 21.2614C18.5276 21.2614 19.2733 20.9525 19.8231 20.4027C20.3729 19.8528 20.6818 19.1071 20.6818 18.3295C20.6818 17.552 20.3729 16.8063 19.8231 16.2564C19.2733 15.7066 18.5276 15.3977 17.75 15.3977ZM17.75 23.2159C16.4541 23.2159 15.2112 22.7011 14.2948 21.7847C13.3784 20.8684 12.8636 19.6255 12.8636 18.3295C12.8636 17.0336 13.3784 15.7907 14.2948 14.8744C15.2112 13.958 16.4541 13.4432 17.75 13.4432C19.0459 13.4432 20.2888 13.958 21.2052 14.8744C22.1216 15.7907 22.6364 17.0336 22.6364 18.3295C22.6364 19.6255 22.1216 20.8684 21.2052 21.7847C20.2888 22.7011 19.0459 23.2159 17.75 23.2159ZM17.75 11C12.8636 11 8.69068 14.0393 7 18.3295C8.69068 22.6198 12.8636 25.6591 17.75 25.6591C22.6364 25.6591 26.8093 22.6198 28.5 18.3295C26.8093 14.0393 22.6364 11 17.75 11Z"
                                                fill="#339B96" />
                                        </svg></a>
                                </div>
                            </td>
                        </tr>

                        <div id="videodetails{{ $x }}" data-modal-backdrop="static"
                            class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="fixed inset-0 transition-opacity">
                                <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
                            </div>
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

                                                <div class="flex flex-col gap-5">
                                                    <div>
                                                        <h2 class="text-pink text-[32px] font-semibold text-left "><span
                                                                class=" py-1 pr-4">@lang('lang.Class') @lang('lang.Video')
                                                            </span>
                                                        </h2>
                                                    </div>
                                                    <div class="flex items-center justify-end  mt-2">
                                                        <div class="w-[200px]">
                                                            <h3 class="text-[18px] font-normal">@lang('lang.Student_No') :
                                                            </h3>
                                                        </div>
                                                        <div class="w-[200px]  ">
                                                            <p class="text-[14px] text-[#323C47]">
                                                                {{ $data->student_id }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center justify-end  mt-2">
                                                        <div class="w-[200px]">
                                                            <h3 class="text-[18px] font-normal">@lang('lang.Duration') :
                                                            </h3>
                                                        </div>
                                                        <div class="w-[200px]  ">
                                                            <p class="text-[14px] text-[#323C47]">00:00</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center justify-end  mt-2">
                                                        <div class="w-[200px]">
                                                            <h3 class="text-[18px] font-normal">@lang('lang.Lesson_Date') :
                                                            </h3>
                                                        </div>
                                                        <div class="w-[200px]  ">
                                                            <p class="text-[14px] text-[#323C47]">
                                                                {{ $data->lesson_date }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center justify-end  mt-2">
                                                        <div class="w-[200px]">
                                                            <h3 class="text-[18px] font-normal">@lang('lang.Teacher') :
                                                            </h3>
                                                        </div>
                                                        <div class="w-[200px]  ">
                                                            <p class="text-[14px] text-[#323C47]">
                                                                {{ $data->teacher_name }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center justify-end  mt-2">
                                                        <div class="w-[200px]">
                                                            <h3 class="text-[18px] font-normal">@lang('lang.Teachers')
                                                                @lang('lang.Comment'):</h3>
                                                        </div>
                                                        <div class="w-[200px]  ">
                                                            <p class="text-[14px] text-[#323C47]">
                                                                {{ $data->teacher_comment }} </p>
                                                        </div>
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


{{-- Delete Data Modal --}}
<div id="deleteData" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed inset-0 transition-opacity">
        <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
    </div>
    <div class="relative p-4 w-full   max-w-lg max-h-full ">
        <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
            <div class="">

                <button type="button"
                    class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                    data-modal-hide="deleteData">
                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <div class=" mx-6 my-6 pt-5">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100px" class="mx-auto" viewBox="0 0 512 512">
                        <path
                            d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"
                            fill="red" />
                    </svg>
                    <h1 class="text-center pt-3 text-4xl">@lang('lang.Are_You_Sure')</h1>
                    <div class="flex  justify-center gap-5 mx-auto mt-5 pb-5">
                        <button data-modal-hide="deleteData" class="bg-primary px-7 py-3 text-white rounded-md">
                            @lang('lang.No')
                        </button>

                        <button deleteid="" id="delLink" class=" bg-red-600 px-7 py-3 text-white rounded-md">
                            @lang('lang.Yes')
                        </button>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <div>

    </div>

</div>

@include('layouts.footer')
<script>
    $(document).ready(function() {

        function deleteDatafun() {

            $('.delButton').click(function() {
                $('#deleteData').removeClass("hidden");
                $('#deleteData').addClass("flex");
                var id = $(this).attr('delId');
                $('#delLink').attr('deleteid', id);

            });
        }
        deleteDatafun();
        $('#datatable').on('draw.dt', function() {
            deleteDatafun();
        });
        // delete training video
        $('#delLink').click(function() {
            var delId = $(this).attr('deleteid');
            console.log(delId);
            var url = "../delRecording/" + delId;
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(response) {
                    if (response.success == true) {
                        window.location.href = '../studentRec';
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
                        'Recording Not Found',
                        'warning'
                    );
                }

            });
        });
    });
</script>
