@include('layouts.header')
@include('admin.includes.nav')

<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.All_Courses')</h1>
    </div>

    <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
        <div>
            <div class="flex justify-between px-[20px] mb-3">
                <h3 class="text-[20px] text-black">@lang('lang.Course_List')</h3>
                <div class="flex items-center gap-4">
                    <button data-modal-target="addcoursemodal" data-modal-toggle="addcoursemodal"
                        class="bg-secondary text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">+
                        @lang('lang.Add_Course')
                    </button>
                    <button class="bg-secondary  text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">+
                        @lang('lang.Import_Excel')
                    </button>
                    <button>
                        <svg width="27" height="27" viewBox="0 0 22 22" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.5"
                                d="M11 21C16.5228 21 21 16.5228 21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21Z"
                                stroke="#EDBD58" stroke-width="2" />
                            <path d="M11 16V10" stroke="#EDBD58" stroke-width="2" stroke-linecap="round" />
                            <path
                                d="M11 6C11.5523 6 12 6.44772 12 7C12 7.55228 11.5523 8 11 8C10.4477 8 10 7.55228 10 7C10 6.44772 10.4477 6 11 6Z"
                                fill="#EDBD58" />
                        </svg>

                    </button>
                </div>
            </div>
            <table id="datatable" class="overflow-scroll">
                <thead class="py-6 bg-primary text-white">
                    <tr>
                        <th>@lang('lang.Course_ID')</th>
                        <th>@lang('lang.Course_Name')</th>
                        <th>@lang('lang.Level')</th>
                        <th>@lang('lang.Lesson')</th>
                        <th>@lang('lang.Language')</th>

                        <th>@lang('lang.Action')</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="pt-4">
                        <td>001</td>
                        <td>jon</td>
                        <td>1</td>
                        <td>1</td>
                        <td>English</td>

                        <td class="flex gap-5">
                            <a class="cursor-pointer" href="#"><img width="38px"
                                    src="{{ asset('images/icons/delete.svg') }}" alt="delete"></a>
                            <a class="cursor-pointer" href="#"><img width="38px"
                                    src="{{ asset('images/icons/update.svg') }}" alt="update"></a>
                            <a class="cursor-pointer" data-modal-target="coursedetails"
                                data-modal-toggle="coursedetails"><img width="38px"
                                    src="{{ asset('images/icons/view.svg') }}" alt="View"></a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>


<!-- Add  course  modal -->
<div id="addcoursemodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-7xl max-h-full ">
        <form action="../addCourse" method="post" enctype="multipart/form-data">
            @csrf
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                <div class="flex items-center justify-center  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white text-center">
                        @lang('lang.Add_Course')
                    </h3>
                    <button type="button"
                        class="cursor-pointer absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="addcoursemodal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <div>
                    <div class=" my-6  flex justify-between mx-10">
                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center">
                            <label class="text-[14px] font-normal" for="courseName">@lang('lang.Course_Name')</label>
                            <input type="text"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="course_name" id="courseName" placeholder=" @lang('lang.Enter_Course_Name')">
                        </div>
                        <div>
                            <button data-modal-target="addwordmodal" data-modal-toggle="addwordmodal" type="button"
                                class="bg-secondary text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">
                                @lang('lang.Add_words')
                            </button>
                        </div>
                    </div>
                    <div id="wordInput"></div>
                </div>
                <div>
                    <table class="overflow-scroll w-full text-center">
                        <thead class="py-6 bg-primary text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    @lang('lang.Course_ID')
                                </th>

                                <th>@lang('lang.Course')</th>
                                <th>@lang('lang.Level')</th>
                                <th>@lang('lang.Lesson')</th>
                                <th>@lang('lang.Word')</th>
                                <th>@lang('lang.Audio_1')</th>
                                <th>@lang('lang.Audio_2')</th>
                                <th>@lang('lang.Audio_3')</th>

                                <th>@lang('lang.Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td class="px-6 py-5">001</td>
                                <td>jon</td>
                                <td>1</td>
                                <td>1</td>

                                <td>English</td>
                                <td>
                                    <div class="flex justify-center">
                                        <svg width="40" height="41" viewBox="0 0 50 51" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect y="0.478516" width="50" height="50" rx="25"
                                                fill="#339B96" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M23.9517 13.6636C24.8353 14.1084 24.9942 15.0742 24.9942 15.6633V36.2947C24.9942 36.8851 24.8339 37.8487 23.9516 38.2931C23.015 38.765 22.1422 38.234 21.6984 37.8354L14.9356 31.7573H12.499C11.1189 31.7573 10 30.6384 10 29.2583L10 22.7763C10 21.3961 11.1189 20.2772 12.499 20.2772H14.9314L21.6984 14.1226C22.1407 13.7252 23.0138 13.1914 23.9517 13.6636ZM22.4952 16.776L16.2553 22.4511C16.0253 22.6603 15.7255 22.7763 15.4146 22.7763H12.499L12.499 29.2583H15.4146C15.723 29.2583 16.0205 29.3723 16.2498 29.5784L22.4952 35.1914V16.776Z"
                                                fill="white" />
                                            <path
                                                d="M29.1 21.0332C28.4388 20.8355 27.7425 21.2112 27.5449 21.8724C27.3472 22.5336 27.7229 23.2298 28.3842 23.4275C29.2046 23.6727 29.9916 24.6305 29.9916 25.9788C29.9916 27.3272 29.2046 28.285 28.3842 28.5302C27.7229 28.7279 27.3472 29.4241 27.5449 30.0854C27.7425 30.7465 28.4388 31.1222 29.1 30.9246C31.1537 30.3105 32.4906 28.2375 32.4906 25.9788C32.4906 23.7202 31.1537 21.6472 29.1 21.0332Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </td>

                                <td>
                                    <div class="flex justify-center">
                                        <svg width="40" height="41" viewBox="0 0 50 51" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect y="0.478516" width="50" height="50" rx="25"
                                                fill="#339B96" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M23.9517 13.6636C24.8353 14.1084 24.9942 15.0742 24.9942 15.6633V36.2947C24.9942 36.8851 24.8339 37.8487 23.9516 38.2931C23.015 38.765 22.1422 38.234 21.6984 37.8354L14.9356 31.7573H12.499C11.1189 31.7573 10 30.6384 10 29.2583L10 22.7763C10 21.3961 11.1189 20.2772 12.499 20.2772H14.9314L21.6984 14.1226C22.1407 13.7252 23.0138 13.1914 23.9517 13.6636ZM22.4952 16.776L16.2553 22.4511C16.0253 22.6603 15.7255 22.7763 15.4146 22.7763H12.499L12.499 29.2583H15.4146C15.723 29.2583 16.0205 29.3723 16.2498 29.5784L22.4952 35.1914V16.776Z"
                                                fill="white" />
                                            <path
                                                d="M29.1 21.0332C28.4388 20.8355 27.7425 21.2112 27.5449 21.8724C27.3472 22.5336 27.7229 23.2298 28.3842 23.4275C29.2046 23.6727 29.9916 24.6305 29.9916 25.9788C29.9916 27.3272 29.2046 28.285 28.3842 28.5302C27.7229 28.7279 27.3472 29.4241 27.5449 30.0854C27.7425 30.7465 28.4388 31.1222 29.1 30.9246C31.1537 30.3105 32.4906 28.2375 32.4906 25.9788C32.4906 23.7202 31.1537 21.6472 29.1 21.0332Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </td>

                                <td>
                                    <div class="flex justify-center">
                                        <svg width="40" height="41" viewBox="0 0 50 51" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect y="0.478516" width="50" height="50" rx="25"
                                                fill="#339B96" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M23.9517 13.6636C24.8353 14.1084 24.9942 15.0742 24.9942 15.6633V36.2947C24.9942 36.8851 24.8339 37.8487 23.9516 38.2931C23.015 38.765 22.1422 38.234 21.6984 37.8354L14.9356 31.7573H12.499C11.1189 31.7573 10 30.6384 10 29.2583L10 22.7763C10 21.3961 11.1189 20.2772 12.499 20.2772H14.9314L21.6984 14.1226C22.1407 13.7252 23.0138 13.1914 23.9517 13.6636ZM22.4952 16.776L16.2553 22.4511C16.0253 22.6603 15.7255 22.7763 15.4146 22.7763H12.499L12.499 29.2583H15.4146C15.723 29.2583 16.0205 29.3723 16.2498 29.5784L22.4952 35.1914V16.776Z"
                                                fill="white" />
                                            <path
                                                d="M29.1 21.0332C28.4388 20.8355 27.7425 21.2112 27.5449 21.8724C27.3472 22.5336 27.7229 23.2298 28.3842 23.4275C29.2046 23.6727 29.9916 24.6305 29.9916 25.9788C29.9916 27.3272 29.2046 28.285 28.3842 28.5302C27.7229 28.7279 27.3472 29.4241 27.5449 30.0854C27.7425 30.7465 28.4388 31.1222 29.1 30.9246C31.1537 30.3105 32.4906 28.2375 32.4906 25.9788C32.4906 23.7202 31.1537 21.6472 29.1 21.0332Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                </td>

                                <td class="">
                                    <div class="flex gap-5 justify-center">
                                        <a class="cursor-pointer" href="#"><img width="38px"
                                                src="{{ asset('images/icons/delete.svg') }}" alt="delete"></a>
                                        {{-- <a class="cursor-pointer" href="#"><img width="38px"
                                                src="{{ asset('images/icons/update.svg') }}" alt="update"></a> --}}

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class=" pt-4">
                    <hr class="border-[#DEE2E6] ">
                </div>
                <div class="flex justify-end ">
                    <button
                        class="bg-secondary text-white py-2 px-6 my-4 rounded-[4px]  mx-6  font-semibold">@lang('lang.Add')</button>
                </div>
            </div>
        </form>
        <div>

        </div>

    </div>
</div>



{{-- add word modal  --}}
<div id="addwordmodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full shadow-2xl">
    <div class="relative p-4 w-full max-w-2xl max-h-full ">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
            <div class="flex items-center   p-5  rounded-t dark:border-gray-600 bg-primary">
                <h3 class="text-xl font-semibold text-white text-center">
                    @lang('lang.Word')
                </h3>
                <button type="button"
                    class="cursor-pointer absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                    data-modal-hide="addwordmodal">
                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>

            <div class="mx-5">
                <div class="mt-5">
                    <label class="text-[14px] font-semibold mb-1  block" for="Level">@lang('lang.Level')</label>
                    <input type="text"
                        class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                        name="Level" id="Levelinput" placeholder="@lang('lang.Enter_Level_No')">
                </div>
                <div class="mt-5">
                    <label class="text-[14px] font-semibold mb-1 ml-1 block" for="Lesson">@lang('lang.Lesson')</label>
                    <input type="text"
                        class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                        name="Lesson" id="Lessoninput" placeholder="@lang('lang.Enter_Lesson_No')">
                </div>
                <div class="mt-5">
                    <label class="text-[14px] font-semibold mb-1 ml-1 block" for="Word">@lang('lang.Word')</label>
                    <input type="text"
                        class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                        name="Word" id="Wordinput" placeholder="@lang('lang.Enter_Word')">
                </div>
                <div class="mt-8">
                    <input type="file"
                        class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                        name="aud-1" id="audio_1">
                </div>
                <div class="mt-8">
                    <input type="file"
                        class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                        name="aud-2" id="audio_2">
                </div>
                <div class="mt-8">
                    <input type="file"
                        class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                        name="aud-3" id="audio_3">
                </div>

            </div>


            <div class=" pt-4">
                <hr class="border-[#DEE2E6] ">
            </div>
            <div class="flex justify-end ">
                <button id="addwordbtn" type="button"
                    class="bg-secondary text-white py-2 px-6 my-4 rounded-[4px]  mx-6  font-semibold">@lang('lang.Update')</button>
            </div>
        </div>
        <div>

        </div>

    </div>
</div>
<!--  course  Details  modal -->
<div id="coursedetails" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-3xl max-h-full ">
        <form action="#" method="post">
            @csrf
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                <div
                    class="flex items-center   justify-endjustify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white text-center">
                        @lang('lang.About_Parent')
                    </h3>
                    <button type="button"
                        class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="coursedetails">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-col gap-5  items-center mt-4  pb-4">
                    <h2 class="text-pink text-[32px] font-semibold pr-16"><span
                            class="border-b-4 border-pink py-1">@lang('lang.About') </span>@lang('lang.Course')
                    </h2>
                    <div class="flex items-center justify-end  mt-5">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Course_Name'):</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]">Emily Davis</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.course_id'):</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]">21</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.no_of_levels'):</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]">4</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.no_of_pages'):</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]">107</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.enter_no_of_words'):</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]">120</p>
                        </div>
                    </div>


                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Version'):</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]">0.15</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Language'):</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]">English</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div>

        </div>

    </div>
</div>

@include('layouts.footer')
<script>
    $('#addwordbtn').click(function() {
        var level = $('#Levelinput').val();
        var lesson = $('#Lessoninput').val();
        var word = $('#Wordinput').val();
        var audio_1 = $('#audio_1').val();
        var audio_2 = $('#audio_2').val();
        var audio_3 = $('#audio_3').val();

        var inputsCon = `<div>
    <input type="text" name="level[]" value="${level}">
    <input type="text" name="lesson[]" value="${lesson}">
    <input type="text" name="word[]" value="${word}">
    <input type="file" name="audio_1[]" value="${audio_1}">
    <input type="file" name="audio_2[]" value="${audio_2}">
    <input type="file" name="audio_3[]" value="${audio_3}">
</div>`
        $('#wordInput').append(inputsCon);

    })
</script>
