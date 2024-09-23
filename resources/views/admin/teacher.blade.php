@include('layouts.header')
@include('admin.includes.nav')
@php
    $permissions = session('permissions');
@endphp

<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.All_Teachers')</h1>
    </div>

    <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
        <div>
            <div class="flex justify-between px-[20px] mb-3">
                <h3 class="text-[20px] text-black">@lang('lang.Teachers_List')</h3>
                <div class="flex ">
                    @if ($permissions['insert'])
                        <button id="addmodal" data-modal-target="addteachermodal" data-modal-toggle="addteachermodal"
                            class="bg-secondary text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">+
                            @lang('lang.Add_Teacher')</button>
                        <div class="ml-4 flex flex-col ">

                            <button class="bg-primary  text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold "
                                data-modal-target="addExcelSheetmodal" data-modal-toggle="addExcelSheetmodal">+
                                @lang('lang.Import_Excel')
                            </button>
                            <a href="{{ asset('assets/teacher.xlsx') }}" class="float-end ml-1 font-semibold"
                                download="Teachers">@lang('lang.Download_Example')</a>
                        </div>
                    @endif
                </div>
            </div>
            <table id="datatable" class="overflow-scroll">
                <thead class="py-6 bg-primary text-white">
                    <tr>
                        <th>@lang('lang.Name')</th>
                        <th>@lang('lang.Contact')</th>
                        <th>@lang('lang.email')</th>
                        <th>@lang('lang.Address')</th>
                        <th>@lang('lang.gender')</th>
                        <th>@lang('lang.subject')</th>
                        <th>@lang('lang.Join_Date')</th>
                        <th>@lang('lang.Action')</th>
                    </tr>
                </thead>
                <tbody id="tableBody">

                    @foreach ($teachers as $i => $teacher)
                        <tr class="pt-4">
                            <td>{{ $teacher->first_name }}</td>
                            <td>{{ $teacher->phone_no }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->address }}</td>
                            <td>{{ $teacher->gender }}</td>
                            <td>{{ $teacher->subject }}</td>
                            <td>{{ $teacher->join_date }}</td>

                            <td class="flex gap-5">
                                @if ($permissions['delete'])
                                    <button data-modal-target="deleteData" data-modal-toggle="deleteData"
                                        class="delButton" delId="{{ $teacher->id }}">
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
                                @if ($permissions['update'])
                                    <a href="../editTeacher/{{ $teacher->id }}"> <button delId="{{ $teacher->id }}"
                                            class="cursor-pointer ">
                                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle opacity="0.1" cx="18" cy="18" r="18"
                                                    fill="#233A85" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M16.1637 23.6197L22.3141 15.666C22.6484 15.2371 22.7673 14.7412 22.6558 14.2363C22.5593 13.7773 22.277 13.3408 21.8536 13.0097L20.8211 12.1895C19.9223 11.4747 18.8081 11.5499 18.1693 12.3701L17.4784 13.2663C17.3893 13.3785 17.4116 13.544 17.523 13.6343C17.523 13.6343 19.2686 15.0339 19.3058 15.064C19.4246 15.1769 19.5137 15.3274 19.536 15.508C19.5732 15.8616 19.328 16.1927 18.9641 16.2379C18.7932 16.2605 18.6298 16.2078 18.511 16.11L16.6762 14.6502C16.5871 14.5832 16.4534 14.5975 16.3791 14.6878L12.0188 20.3314C11.7365 20.6851 11.64 21.1441 11.7365 21.588L12.2936 24.0035C12.3233 24.1314 12.4348 24.2217 12.5685 24.2217L15.0197 24.1916C15.4654 24.1841 15.8814 23.9809 16.1637 23.6197ZM19.5957 22.8676H23.5928C23.9828 22.8676 24.2999 23.1889 24.2999 23.5839C24.2999 23.9797 23.9828 24.3003 23.5928 24.3003H19.5957C19.2058 24.3003 18.8886 23.9797 18.8886 23.5839C18.8886 23.1889 19.2058 22.8676 19.5957 22.8676Z"
                                                    fill="#233A85" />
                                            </svg>

                                        </button></a>
                                @endif
                                <button class="cursor-pointer viewBtn" data-modal-target="teacherDetailsModal"
                                    teacherId="{{ $teacher->id }}" data-modal-toggle="teacherDetailsModal"><svg
                                        width="36" height="36" viewBox="0 0 36 36" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="18" cy="18" r="18" fill="#109CF1"
                                            fill-opacity="0.06" />
                                        <path
                                            d="M17.75 15.3977C16.9724 15.3977 16.2267 15.7066 15.6769 16.2564C15.1271 16.8063 14.8182 17.552 14.8182 18.3295C14.8182 19.1071 15.1271 19.8528 15.6769 20.4027C16.2267 20.9525 16.9724 21.2614 17.75 21.2614C18.5276 21.2614 19.2733 20.9525 19.8231 20.4027C20.3729 19.8528 20.6818 19.1071 20.6818 18.3295C20.6818 17.552 20.3729 16.8063 19.8231 16.2564C19.2733 15.7066 18.5276 15.3977 17.75 15.3977ZM17.75 23.2159C16.4541 23.2159 15.2112 22.7011 14.2948 21.7847C13.3784 20.8684 12.8636 19.6255 12.8636 18.3295C12.8636 17.0336 13.3784 15.7907 14.2948 14.8744C15.2112 13.958 16.4541 13.4432 17.75 13.4432C19.0459 13.4432 20.2888 13.958 21.2052 14.8744C22.1216 15.7907 22.6364 17.0336 22.6364 18.3295C22.6364 19.6255 22.1216 20.8684 21.2052 21.7847C20.2888 22.7011 19.0459 23.2159 17.75 23.2159ZM17.75 11C12.8636 11 8.69068 14.0393 7 18.3295C8.69068 22.6198 12.8636 25.6591 17.75 25.6591C22.6364 25.6591 26.8093 22.6198 28.5 18.3295C26.8093 14.0393 22.6364 11 17.75 11Z"
                                            fill="#339B96" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>


<!--  Teacher  Details  modal -->
<div id="teacherDetailsModal" data-modal-backdrop="static"
    class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
    <div class="fixed inset-0 transition-opacity">
        <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
    </div>
    <div class="relative p-4 w-full max-w-7xl max-h-full ">

        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
            <div class="flex items-center   justify-endjustify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                <h3 class="text-xl font-semibold text-white text-center">
                    @lang('lang.Teacher_Details')
                </h3>
                <button type="button"
                    class="cursor-pointer absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                    data-modal-hide="teacherDetailsModal">
                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-col gap-5  items-center mt-4  pb-4">

                <div class="flex flex-col gap-5">
                    <div>
                        <h2 class="text-pink text-[32px] font-semibold "><span class=" py-1">@lang('lang.About_Teacher') </span>
                        </h2>
                    </div>
                    <div class="flex items-center justify-end  mt-2">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.English_Name') :</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]" id="englishName"></p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end  mt-2">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Chinese_Name') :</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]" id="chineseName"></p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.gender') :</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]" id="gender"> </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Date_of_Birth') :</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]" id="dob"> </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Phone_no') :</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]" id="phoneNo"> </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.E-mail') :</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]" id="email"> </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.subject') :</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]" id="subject"> </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Skills') :</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]" id="skill"></p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Join_Date') :</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]" id="joinDate"></p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Address') :</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]" id="address"> </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Teacher_CV') :</h3>
                        </div>
                        <div class="w-[150px]  ">

                            <a href="../" target="_blank" class="text-[14px] text-[#323C47]">CV File here can
                                open</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>

        </div>

    </div>
</div>

<!-- Add  Teacher  modal -->
<div id="addteachermodal" data-modal-backdrop="static"
    class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
    <div class="fixed inset-0 transition-opacity">
        <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
    </div>
    <div class="relative p-4 w-full max-w-7xl max-h-full ">
        @if (isset($teacherData))
            <form id="teacher_form" enctype="multipart/form-data" method="post"
                url="../updateTeacher/{{ $teacherData->id }}">
            @else
                <form id="teacher_form" enctype="multipart/form-data" method="post" url="../addteacher">
        @endif
        @csrf
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
            <div class="flex items-center  justify-center  p-5  rounded-t dark:border-gray-600 bg-primary">
                <h3 class="text-xl font-semibold text-white text-center">
                    @lang('lang.Add_Teacher')
                </h3>
                <button type="button"
                    class="cursor-pointer absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                    data-modal-hide="addteachermodal">
                    @if (isset($teacherData))
                        <a href="../admin/teacher">
                            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </a>
                    @else
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    @endif
                </button>
            </div>

            <div class="grid grid-cols-2 mt-4 gap-10 px-10">
                <div>
                    <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                        <label class="text-[14px] font-normal" for="english_Name">@lang('lang.English_Name')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="first_name" id="english_Name" placeholder=" @lang('lang.Enter_English_Name')" required
                            value="{{ $teacherData->first_name ?? '' }}">
                    </div>
                    <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                        <label class="text-[14px] font-normal" for="dob">@lang('lang.Date_of_Birth')</label>
                        <input type="date"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="dob" id="dob" required value="{{ $teacherData->dob ?? '' }}">
                    </div>

                    <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                        <label class="text-[14px] font-normal" for="phoneNo">@lang('lang.Phone_no')</label>
                        <input type="number"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="phone_no" id="phoneNo" placeholder="@lang('lang.Enter_Phone')" required
                            value="{{ $teacherData->phone_no ?? '' }}">
                    </div>

                    <div class="grid select-container grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                        <label class="text-[14px] font-normal" for="subject">@lang('lang.subject')</label>
                        <div class="flex gap-4">
                            <div class="select-feild w-full {{ isset($teacherData->subject) ? 'hidden' : '' }}">
                                <select
                                    class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                    name="subject" id="subjects">
                                    <option value="" disabled selected>@lang('lang.subject')</option>
                                </select>
                            </div>
                            <input type="text"
                                class="w-full {{ isset($teacherData->subject) ? '' : 'hidden' }} border-[#DEE2E6] rounded-[4px] focus:border-primary input-field   h-[40px] text-[14px]"
                                name="subject" id="subject" value="{{ $teacherData->subject ?? '' }}">
                            <div>
                                <button type="button"
                                    class="bg-secondary toggle-button h-[40px] rounded-[4px] w-[40px] font-bold text-white text-2xl"
                                    style="width: 42px">+</button>
                            </div>
                        </div>
                    </div>


                    <div class="grid select-container grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                        <label class="text-[14px] font-normal" for="skills">@lang('lang.Skills')</label>
                        <div class="flex gap-4">
                            <div class="select-feild w-full {{ isset($teacherData->skill) ? 'hidden' : '' }}">
                                <select
                                    class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                    name="skill" id="skills">
                                    <option value="" selected disabled>@lang('lang.add_Skills')</option>
                                </select>
                            </div>
                            <input type="text"
                                class="w-full {{ isset($teacherData->skill) ? '' : 'hidden' }} border-[#DEE2E6] rounded-[4px] focus:border-primary input-field   h-[40px] text-[14px]"
                                name="skill" id="skill" value="{{ $teacherData->skill ?? '' }}">
                            <div>
                                <button type="button"
                                    class="bg-secondary toggle-button h-[40px] rounded-[4px] w-[40px] font-bold text-white text-2xl"
                                    style="width: 42px">+</button>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                        <label class="text-[14px] font-normal" for="teacherCv">@lang('lang.Teacher_CV')</label>
                        <input type="file"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="teacher_cv" id="teacherCv" placeholder="@lang('lang.Enter_Phone')">
                    </div>


                </div>


                <div>
                    <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                        <label class="text-[14px] font-normal" for="chinese_Name">@lang('lang.Chinese_Name')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="last_name" id="chinese_Name" placeholder="@lang('lang.Enter_Chinese_Name')" required
                            value="{{ $teacherData->last_name ?? '' }}">
                    </div>
                    <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                        <label class="text-[14px] font-normal" for="gender">@lang('lang.gender')</label>
                        <select
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="gender" id="gender" required>
                            <option value="" selected disabled>@lang('lang.Select_Gender')</option>
                            <option value="male"
                                {{ isset($teacherData->gender) && $teacherData->gender == 'male' ? 'selected' : '' }}>
                                @lang('lang.male')</option>
                            <option value="female"
                                {{ isset($teacherData->gender) && $teacherData->gender == 'female' ? 'selected' : '' }}>
                                @lang('lang.female')</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                        <label class="text-[14px] font-normal" for="email">@lang('lang.email')</label>
                        <input type="email"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="email" id="email" placeholder="@lang('lang.Enter_Email')" required
                            value="{{ $teacherData->email ?? '' }}">
                    </div>

                    <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                        <label class="text-[14px] font-normal" for="joindate">@lang('lang.Join_Date')</label>
                        <input type="date"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="join_date" id="joindate" required value="{{ $teacherData->join_date ?? '' }}">
                    </div>

                    <div class="grid grid-cols-[100px_minmax(100px,_1fr)]  my-6  ">
                        <label class="text-[14px] font-normal" for="address">@lang('lang.Address')</label>
                        <textarea type="date" class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[85px] text-[14px]"
                            name="address" id="address" placeholder="@lang('lang.Enter_Address')" required>{{ $teacherData->address ?? '' }}</textarea>
                    </div>

                </div>
            </div>
            <div class=" pt-4">
                <hr class="border-[#DEE2E6] ">
            </div>
            <div class="flex justify-end " id="addBtn">
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
                        @lang(!isset($teacherData) ? 'lang.Add' : 'lang.Update')
                    </div>

                </button>

            </div>
        </div>
        </form>
        <div>

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


{{-- ============ add  Excel modal  =========== --}}
<div id="addExcelSheetmodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
    <div class="fixed inset-0 transition-opacity">
        <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
    </div>
    <div class="relative p-4 w-full   max-w-2xl max-h-full ">
        <form action="{{ url('teacher/import') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
                <div class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white ">
                        @lang('lang.Add_Course')
                    </h3>
                    <button type="button"
                        class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="addExcelSheetmodal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <div class="mx-6 my-6">
                    <div class="  ">
                        <label class="text-[14px] font-normal" for="excelFile">@lang('lang.Excel_File')</label>
                        <input type="file"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary border   h-[40px] text-[14px]"
                            name="excel_file" id="excelFile" required>
                    </div>




                </div>

                <div class="flex justify-end ">
                    <button class="bg-primary text-white py-2 px-6 my-4 rounded-[4px]  mx-6 uaddBtn  font-semibold "
                        id="addBtn">
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
{{-- ================================================================= --}}
<script>
    var selectContainers = document.querySelectorAll('.select-container');

    selectContainers.forEach(function(container) {
        var select = container.querySelector('.select-feild');
        var inputField = container.querySelector('.input-field');
        var toggleButton = container.querySelector('.toggle-button');

        toggleButton.addEventListener('click', function() {
            if (select.style.display !== 'none') {
                select.style.display = 'none';
                inputField.style.display = 'block';
            } else {
                select.style.display = 'block';
                inputField.style.display = 'none';
            }
        });
    });
</script>
@include('layouts.footer')
@if (isset($teacherData))
    <script>
        $(document).ready(function() {
            $('#addteachermodal').removeClass("hidden");

        });
    </script>
@endif
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

        $('#delLink').click(function() {
            var updateId = $(this).attr('deleteid');
            var url = "../api/delTeacher/" + updateId;

            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                success: function(response) {
                    if (response.success == true) {
                        window.location.href = '../admin/teacher';
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
                        'Teacher Not Found',
                        'warning'
                    );
                }

            });
        })
        // insert  teacher data
        $("#teacher_form").submit(function(event) {
            let url = $('#teacher_form').attr('url');
            console.log(url);
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#spinner').removeClass('hidden');
                    $('#text').addClass('hidden');
                    $('#addBtn').attr('disabled', true);
                },
                success: function(response) {
                    if (response.success == true) {
                        window.location.href = '../admin/teacher';
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
                        response.message,
                        'warning'
                    );

                    $('#text').removeClass('hidden');
                    $('#spinner').addClass('hidden');
                    $('#addBtn').attr('disabled', false);
                }
            });
        });

        function viewDataFun() {

            $('.viewBtn').click(function() {
                $('#teacherDetailsModal').removeClass('hidden');
                $('#teacherDetailsModal').addClass('flex');
                let dataId = $(this).attr('teacherId');
                let url = "../teacherViewData/" + dataId;
                $.ajax({
                    type: "get",
                    url: url,
                    success: function(response) {
                        let data = response.teacher;
                        console.log(data);
                        $('#englishName').text(data.first_name);
                        $('#chineseName').text(data.last_name);
                        $('#gender').text(data.gender);
                        $('#dob').text(data.dob);
                        $('#phoneNo').text(data.phone_no);
                        $('#email').text(data.email);
                        $('#subject').text(data.subject);
                        $('#skill').text(data.skill);
                        $('#joinDate').text(data.join_date);
                        $('#address').text(data.address);

                    }
                });
            });
        }
        viewDataFun()

        function deleteDataFun() {
            $(".deleteBtn").click(function() {
                $('#deleteModal').removeClass('hidden');
                $('#deleteModal').addClass('flex');
                let delId = $(this).attr('delId');
                let url = "../deleteTeacher/" + delId;
                $('#delDataBtn').attr("url", url);


            });
        }
        $("#delDataBtn").click(function() {
            let url = $(this).attr('url');
            $.ajax({
                type: "get",
                url: url,
                success: function(response) {
                    $("#tableBody").load(" #tableBody > *");
                    $('#deleteModal').addClass('hidden');
                    deleteDataFun();

                }



            });

        })
        deleteDataFun();
        table.on('draw', function() {
            viewDataFun();
            deleteDataFun();
        });
    });
</script>
