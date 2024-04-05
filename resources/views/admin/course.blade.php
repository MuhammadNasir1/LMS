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
                    {{-- ====== word inputs ===  --}}
                    <div id="wordContainer">
                        <div class="px-10 grid grid-cols-3 gap-10">
                            <div class="my-4">
                                <label class="text-[14px] font-semibold mb-1  block"
                                    for="Level">@lang('lang.Level')</label>
                                <input type="text"
                                    class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                    name="level[]" id="Levelinput" placeholder="@lang('lang.Enter_Level_No')">
                            </div>
                            <div class="my-4">
                                <label class="text-[14px] font-semibold mb-1 ml-1 block"
                                    for="Lesson">@lang('lang.Lesson')</label>
                                <input type="text"
                                    class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                    name="lesson[]" id="Lessoninput" placeholder="@lang('lang.Enter_Lesson_No')">
                            </div>
                            <div class="my-4">
                                <label class="text-[14px] font-semibold mb-1 ml-1 block"
                                    for="Word">@lang('lang.Word')</label>
                                <input type="text"
                                    class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                    name="word[]" id="Wordinput" placeholder="@lang('lang.Enter_Word')">
                            </div>
                        </div>
                        <div class="px-10 my-5 mt-3 grid grid-cols-3 gap-10">
                            <div class="recording-set">
                                <label class="text-[14px] font-semibold mb-1 ml-1 block">@lang('lang.Audio_1')</label>
                                <div
                                    class="h-10 w-full border border-[#DEE2E6] rounded-[4px]  gap-2 flex justify-between px-2 items-center">
                                    <button type="button"
                                        class="h-8 w-full max-h-8 max-w-8 bg-[#339b965b] rounded-full flex justify-center items-center ">
                                        <svg width="14" height="16" viewBox="0 0 9 11" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.26713 6.82375L2.36687 10.3073C1.41714 10.868 0.25 10.1381 0.25 8.9835V2.01645C0.25 0.861837 1.41714 0.132013 2.36687 0.692738L8.26713 4.17625C9.24425 4.75325 9.24425 6.24675 8.26713 6.82375Z"
                                                fill="#339B96" />
                                        </svg>

                                    </button>
                                    <div class="w-full  border-2  border-gray">

                                    </div>
                                    <button type="button" class="recordButton">
                                        <svg width="32" height="32" viewBox="0 0 29 29" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M28.667 14.167C28.667 21.8989 22.3989 28.167 14.667 28.167C6.935 28.167 0.666992 21.8989 0.666992 14.167C0.666992 6.435 6.935 0.166992 14.667 0.166992C22.3989 0.166992 28.667 6.435 28.667 14.167ZM16.4353 13.7985C16.4353 15.0217 15.4479 16.0091 14.2249 16.0091C13.0017 16.0091 12.0143 15.0217 12.0143 13.7985V9.37752C12.0143 8.15436 13.0017 7.16699 14.2249 7.16699C15.4479 7.16699 16.4353 8.15436 16.4353 9.37752V13.7985ZM14.2249 8.6407C13.8196 8.6407 13.4881 8.97228 13.4881 9.37755V13.7987C13.4881 14.2038 13.8196 14.5355 14.2249 14.5355C14.6375 14.5355 14.9617 14.2112 14.9617 13.7987V9.37755C14.9617 8.97228 14.63 8.6407 14.2249 8.6407ZM19.3828 13.7985H18.1302C18.1302 16.0091 16.2585 17.5564 14.2249 17.5564C12.1912 17.5564 10.3196 16.0091 10.3196 13.7985H9.06699C9.06699 16.3112 11.0712 18.3891 13.4881 18.7502V21.167H14.9617V18.7502C17.3785 18.3891 19.3828 16.3112 19.3828 13.7985Z"
                                                fill="#EDBD58" />
                                        </svg>
                                    </button>

                                </div>
                                {{-- ==== hidden audio and file ====== --}}
                                <div class="invisible absolute">
                                    <input type="file" name="audio_1[]" class="audioFileInput"
                                        accept="audio/*" />
                                    <div>
                                        <audio class="audioElement" controls></audio>
                                    </div>
                                </div>
                            </div>
                            <div class="recording-set">
                                <label class="text-[14px] font-semibold mb-1 ml-1 block">@lang('lang.Audio_2')</label>
                                <div
                                    class="h-10 w-full border border-[#DEE2E6] rounded-[4px]  gap-2 flex justify-between px-2 items-center">
                                    <button type="button"
                                        class="h-8 w-full max-h-8 max-w-8 bg-[#339b965b] rounded-full flex justify-center items-center ">
                                        <svg width="14" height="16" viewBox="0 0 9 11" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.26713 6.82375L2.36687 10.3073C1.41714 10.868 0.25 10.1381 0.25 8.9835V2.01645C0.25 0.861837 1.41714 0.132013 2.36687 0.692738L8.26713 4.17625C9.24425 4.75325 9.24425 6.24675 8.26713 6.82375Z"
                                                fill="#339B96" />
                                        </svg>

                                    </button>
                                    <div class="w-full  border-2  border-gray">

                                    </div>
                                    <button type="button" class="recordButton">
                                        <svg width="32" height="32" viewBox="0 0 29 29" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M28.667 14.167C28.667 21.8989 22.3989 28.167 14.667 28.167C6.935 28.167 0.666992 21.8989 0.666992 14.167C0.666992 6.435 6.935 0.166992 14.667 0.166992C22.3989 0.166992 28.667 6.435 28.667 14.167ZM16.4353 13.7985C16.4353 15.0217 15.4479 16.0091 14.2249 16.0091C13.0017 16.0091 12.0143 15.0217 12.0143 13.7985V9.37752C12.0143 8.15436 13.0017 7.16699 14.2249 7.16699C15.4479 7.16699 16.4353 8.15436 16.4353 9.37752V13.7985ZM14.2249 8.6407C13.8196 8.6407 13.4881 8.97228 13.4881 9.37755V13.7987C13.4881 14.2038 13.8196 14.5355 14.2249 14.5355C14.6375 14.5355 14.9617 14.2112 14.9617 13.7987V9.37755C14.9617 8.97228 14.63 8.6407 14.2249 8.6407ZM19.3828 13.7985H18.1302C18.1302 16.0091 16.2585 17.5564 14.2249 17.5564C12.1912 17.5564 10.3196 16.0091 10.3196 13.7985H9.06699C9.06699 16.3112 11.0712 18.3891 13.4881 18.7502V21.167H14.9617V18.7502C17.3785 18.3891 19.3828 16.3112 19.3828 13.7985Z"
                                                fill="#EDBD58" />
                                        </svg>
                                    </button>

                                </div>
                                {{-- ==== hidden audio and file ====== --}}
                                <div class="invisible absolute">
                                    <input name="audio_2[]" type="file" class="audioFileInput"
                                        accept="audio/*" />
                                    <div>
                                        <audio class="audioElement" controls></audio>
                                    </div>
                                </div>
                            </div>
                            <div class="recording-set">
                                <label class="text-[14px] font-semibold mb-1 ml-1 block">@lang('lang.Audio_3')</label>
                                <div class="flex gap-2 items-center">
                                    <div
                                        class="h-10 w-full border border-[#DEE2E6] rounded-[4px]  gap-2 flex justify-between px-2 items-center">
                                        <button type="button"
                                            class="h-8 w-full max-h-8 max-w-8 bg-[#339b965b] rounded-full flex justify-center items-center ">
                                            <svg width="14" height="16" viewBox="0 0 9 11" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.26713 6.82375L2.36687 10.3073C1.41714 10.868 0.25 10.1381 0.25 8.9835V2.01645C0.25 0.861837 1.41714 0.132013 2.36687 0.692738L8.26713 4.17625C9.24425 4.75325 9.24425 6.24675 8.26713 6.82375Z"
                                                    fill="#339B96" />
                                            </svg>

                                        </button>
                                        <div class="w-full  border-2  border-gray">

                                        </div>
                                        <button type="button" class="recordButton">
                                            <svg width="32" height="32" viewBox="0 0 29 29" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M28.667 14.167C28.667 21.8989 22.3989 28.167 14.667 28.167C6.935 28.167 0.666992 21.8989 0.666992 14.167C0.666992 6.435 6.935 0.166992 14.667 0.166992C22.3989 0.166992 28.667 6.435 28.667 14.167ZM16.4353 13.7985C16.4353 15.0217 15.4479 16.0091 14.2249 16.0091C13.0017 16.0091 12.0143 15.0217 12.0143 13.7985V9.37752C12.0143 8.15436 13.0017 7.16699 14.2249 7.16699C15.4479 7.16699 16.4353 8.15436 16.4353 9.37752V13.7985ZM14.2249 8.6407C13.8196 8.6407 13.4881 8.97228 13.4881 9.37755V13.7987C13.4881 14.2038 13.8196 14.5355 14.2249 14.5355C14.6375 14.5355 14.9617 14.2112 14.9617 13.7987V9.37755C14.9617 8.97228 14.63 8.6407 14.2249 8.6407ZM19.3828 13.7985H18.1302C18.1302 16.0091 16.2585 17.5564 14.2249 17.5564C12.1912 17.5564 10.3196 16.0091 10.3196 13.7985H9.06699C9.06699 16.3112 11.0712 18.3891 13.4881 18.7502V21.167H14.9617V18.7502C17.3785 18.3891 19.3828 16.3112 19.3828 13.7985Z"
                                                    fill="#EDBD58" />
                                            </svg>
                                        </button>

                                    </div>
                                    {{-- ==== hidden audio and file ====== --}}
                                    <div class="invisible absolute">
                                        <input name="audio_3[]" type="file" class="audioFileInput"
                                            accept="audio/*" />
                                        <div>
                                            <audio class="audioElement" controls></audio>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button"
                                            class="bg-[#EDBD58] flex justify-center items-center toggle-button h-[40px] rounded-[4px] w-[40px] font-bold text-white text-2xl"
                                            style="width: 42px">
                                            <svg width="22" height="26" viewBox="0 0 12 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.4905 2.74327C11.7356 2.74327 11.9396 2.94675 11.9396 3.20568V3.44508C11.9396 3.69771 11.7356 3.90749 11.4905 3.90749H1.04934C0.803641 3.90749 0.599609 3.69771 0.599609 3.44508V3.20568C0.599609 2.94675 0.803641 2.74327 1.04934 2.74327H2.88624C3.25937 2.74327 3.58411 2.47804 3.66805 2.10382L3.76425 1.67417C3.91375 1.0889 4.40575 0.700195 4.96883 0.700195H7.57039C8.12734 0.700195 8.62486 1.0889 8.76885 1.6433L8.87178 2.10319C8.95511 2.47804 9.27984 2.74327 9.65359 2.74327H11.4905ZM10.5573 11.4946C10.7491 9.70727 11.0849 5.46111 11.0849 5.41827C11.0971 5.2885 11.0548 5.16565 10.9709 5.06674C10.8808 4.97413 10.7669 4.91932 10.6412 4.91932H1.90281C1.77659 4.91932 1.6565 4.97413 1.57317 5.06674C1.48862 5.16565 1.44695 5.2885 1.45308 5.41827C1.45421 5.42615 1.46625 5.57571 1.4864 5.82576C1.57588 6.9366 1.8251 10.0305 1.98614 11.4946C2.1001 12.5731 2.80778 13.251 3.83284 13.2756C4.62384 13.2938 5.43875 13.3001 6.27203 13.3001C7.05691 13.3001 7.85404 13.2938 8.66956 13.2756C9.73015 13.2573 10.4372 12.5914 10.5573 11.4946Z"
                                                    fill="#D11A2A" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="wordInput"></div>
                    <div class="mx-10 my-6  flex justify-end">
                        <button id="addwordContainer" type="button"
                            class="bg-secondary text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">
                            @lang('lang.add_more_word')
                        </button>
                    </div>
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
                <div class="recording-set">
                    <button class="recordButton">Start Recording</button>
                    <div>
                        <audio class="audioElement" controls></audio>
                    </div>
                    <input type="file" class="audioFileInput" accept="audio/*" />
                </div>
                <div class="recording-set">
                    <button class="recordButton">Start Recording</button>
                    <div>
                        <audio class="audioElement" controls></audio>
                    </div>
                    <input type="file" class="audioFileInput" accept="audio/*" />
                </div>
                <div class="recording-set">
                    <button class="recordButton">Start Recording</button>
                    <div>
                        <audio class="audioElement" controls></audio>
                    </div>
                    {{-- <input type="file" class="audioFileInput" accept="audio/*" /> --}}
                </div>
                {{-- <div class="mt-8">
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
                </div> --}}

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
    function audiorec() {
        const recordingSets = document.querySelectorAll(".recording-set");
        const fileoutput = document.querySelector("#wordInput");
        recordingSets.forEach((set, index) => {
            const recordButton = set.querySelector(".recordButton");
            const audioElement = set.querySelector(".audioElement");
            const audioFileInput = set.querySelector(".audioFileInput");
            let mediaRecorder;

            recordButton.addEventListener("click", () => toggleRecording(index));

            function toggleRecording(index) {
                if (mediaRecorder && mediaRecorder.state === "recording") {
                    stopRecording();
                } else {
                    startRecording();
                }
            }

            function startRecording() {
                navigator.mediaDevices
                    .getUserMedia({
                        audio: true
                    })
                    .then(function(stream) {
                        mediaRecorder = new MediaRecorder(stream);
                        mediaRecorder.chunks = [];

                        mediaRecorder.ondataavailable = function(event) {
                            mediaRecorder.chunks.push(event.data);
                        };

                        mediaRecorder.onstop = function() {
                            const audioBlob = new Blob(mediaRecorder.chunks, {
                                type: "audio/ogg; codecs=opus",
                            });

                            const audioFile = new File([audioBlob], `recording_${Date.now()}.ogg`, {
                                type: "audio/ogg",
                            });

                            const fileList = new DataTransfer();
                            fileList.items.add(audioFile);
                            audioFileInput.files = fileList.files;

                            const audioUrl = URL.createObjectURL(audioBlob);
                            audioElement.src = audioUrl;
                        };

                        mediaRecorder.start();
                        recordButton.textContent = "Stop Recording";
                    })
                    .catch(function(err) {
                        console.error("Error accessing microphone", err);
                    });
            }

            function stopRecording() {
                mediaRecorder.stop();
                recordButton.textContent = "Start Recording";

                // Stop the microphone stream
                const tracks = mediaRecorder.stream.getTracks();
                tracks.forEach((track) => track.stop());
            }
        });

    }
    audiorec()
    $('#addwordContainer').click(function() {
        var inputsCon = $('#wordContainer').html();
        $('#wordInput').append(inputsCon);
        audiorec()
    });
</script>
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
    {{-- <input type="file" name="audio_1[]" value="${audio_1}">
<input type="file" name="audio_2[]" value="${audio_2}">
<input type="file" name="audio_3[]" value="${audio_3}"> --}}
</div>`
        $('#wordInput').append(inputsCon);

    })
</script>
