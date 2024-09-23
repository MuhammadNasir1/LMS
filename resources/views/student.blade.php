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
        <h1 class=" font-semibold   text-2xl ">@lang('lang.All_Student')</h1>
    </div>

    <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
        <div>
            <div class="flex justify-between px-[20px] mb-3">
                <h3 class="text-[20px] text-black">@lang('lang.Students_List')</h3>
                <div class="flex">
                    @if ($permissions['insert'])
                        <button data-modal-target="studentmodal" data-modal-toggle="studentmodal"
                            class="bg-secondary cursor-pointer text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">+
                            @lang('lang.Add_Student')</button>
                        <div class="ml-4 flex flex-col">
                            <button class="bg-primary   text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold "
                                data-modal-target="addExcelSheetmodal" data-modal-toggle="addExcelSheetmodal">+
                                @lang('lang.Import_From_Excel')
                            </button>
                            <a href="{{ asset('assets/students.xlsx') }}" class="float-end ml-1 font-semibold"
                                download="Students">@lang('lang.Download_Example')</a>
                        </div>
                    @endif
                </div>

            </div>
            <table id="datatable" class="overflow-scroll">
                <thead class="py-6 bg-primary text-white">
                    <tr>
                        <th>@lang('lang.STN')</th>
                        <th>@lang('lang.Student_Name')</th>
                        <th>@lang('lang.Chinese_Name')</th>
                        <th>@lang('lang.Parent_Name')</th>
                        <th>@lang('lang.gender')</th>
                        <th>@lang('lang.Date_of_Birth')</th>
                        <th>@lang('lang.Grade')</th>
                        <th>@lang('lang.Phone_no')</th>
                        <th>@lang('lang.Address')</th>
                        <th>@lang('lang.Verification')</th>
                        <th>@lang('lang.Action')</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach (session('user_det')['role'] == 'parent' ? $ParentStudents : $students as $i => $student)
                        <tr class="pt-4">
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->full_name }}</td>
                            <td>{{ $student->chinese_name }}</td>
                            <td>{{ $student->em_person }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>{{ $student->dob }}</td>
                            <td>{{ $student->grade }}</td>
                            <td>{{ $student->phone_no }}</td>
                            <td>{{ $student->adress }}</td>
                            <td><button
                                    class="{{ session('user_det')['role'] == 'admin' || session('user_det')['role'] == 'superAdmin' ? 'verBtn' : '' }}  {{ $student->verification == 'Pending' ? 'text-red-700' : 'text-green-500' }} font-semibold"
                                    stdId="{{ $student->id }}" id="status">{{ $student->verification }}</button>
                            </td>

                            <td class="flex gap-5">
                                @if ($permissions['delete'])
                                    <button data-modal-target="deleteData" data-modal-toggle="deleteData"
                                        class="delButton" delId="{{ $student->id }}">
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
                                    <a href="../editStudent/{{ $student->id }}"> <button
                                            class="cursor-pointer updateBtn" href="#"> <svg width="36"
                                                height="36" viewBox="0 0 36 36" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle opacity="0.1" cx="18" cy="18" r="18"
                                                    fill="#233A85" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M16.1637 23.6197L22.3141 15.666C22.6484 15.2371 22.7673 14.7412 22.6558 14.2363C22.5593 13.7773 22.277 13.3408 21.8536 13.0097L20.8211 12.1895C19.9223 11.4747 18.8081 11.5499 18.1693 12.3701L17.4784 13.2663C17.3893 13.3785 17.4116 13.544 17.523 13.6343C17.523 13.6343 19.2686 15.0339 19.3058 15.064C19.4246 15.1769 19.5137 15.3274 19.536 15.508C19.5732 15.8616 19.328 16.1927 18.9641 16.2379C18.7932 16.2605 18.6298 16.2078 18.511 16.11L16.6762 14.6502C16.5871 14.5832 16.4534 14.5975 16.3791 14.6878L12.0188 20.3314C11.7365 20.6851 11.64 21.1441 11.7365 21.588L12.2936 24.0035C12.3233 24.1314 12.4348 24.2217 12.5685 24.2217L15.0197 24.1916C15.4654 24.1841 15.8814 23.9809 16.1637 23.6197ZM19.5957 22.8676H23.5928C23.9828 22.8676 24.2999 23.1889 24.2999 23.5839C24.2999 23.9797 23.9828 24.3003 23.5928 24.3003H19.5957C19.2058 24.3003 18.8886 23.9797 18.8886 23.5839C18.8886 23.1889 19.2058 22.8676 19.5957 22.8676Z"
                                                    fill="#233A85" />
                                            </svg></button></a>
                                @endif
                                <button class="cursor-pointer viewBtn" studentId="{{ $student->id }}"
                                    data-modal-target="studenDetailsModal" data-modal-toggle="studenDetailsModal"><svg
                                        width="36" height="36" viewBox="0 0 36 36" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="18" cy="18" r="18" fill="#109CF1"
                                            fill-opacity="0.06" />
                                        <path
                                            d="M17.75 15.3977C16.9724 15.3977 16.2267 15.7066 15.6769 16.2564C15.1271 16.8063 14.8182 17.552 14.8182 18.3295C14.8182 19.1071 15.1271 19.8528 15.6769 20.4027C16.2267 20.9525 16.9724 21.2614 17.75 21.2614C18.5276 21.2614 19.2733 20.9525 19.8231 20.4027C20.3729 19.8528 20.6818 19.1071 20.6818 18.3295C20.6818 17.552 20.3729 16.8063 19.8231 16.2564C19.2733 15.7066 18.5276 15.3977 17.75 15.3977ZM17.75 23.2159C16.4541 23.2159 15.2112 22.7011 14.2948 21.7847C13.3784 20.8684 12.8636 19.6255 12.8636 18.3295C12.8636 17.0336 13.3784 15.7907 14.2948 14.8744C15.2112 13.958 16.4541 13.4432 17.75 13.4432C19.0459 13.4432 20.2888 13.958 21.2052 14.8744C22.1216 15.7907 22.6364 17.0336 22.6364 18.3295C22.6364 19.6255 22.1216 20.8684 21.2052 21.7847C20.2888 22.7011 19.0459 23.2159 17.75 23.2159ZM17.75 11C12.8636 11 8.69068 14.0393 7 18.3295C8.69068 22.6198 12.8636 25.6591 17.75 25.6591C22.6364 25.6591 26.8093 22.6198 28.5 18.3295C26.8093 14.0393 22.6364 11 17.75 11Z"
                                            fill="#339B96" />
                                    </svg></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

<!--  studen  Details  modal -->
<div id="studenDetailsModal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
    <div class="fixed inset-0 transition-opacity">
        <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
    </div>
    <div class="relative p-4 w-full max-w-7xl max-h-full ">
        <form action="#" method="post">
            @csrf
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                <div
                    class="flex items-center   justify-endjustify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white text-center">
                        @lang('lang.Student_Details')
                    </h3>
                    <button type="button"
                        class="cursor-pointer absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="studenDetailsModal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-col gap-5  items-center mt-4  pb-4">
                    <h2 class="text-pink text-[32px] font-semibold "><span class=" py-1">@lang('lang.About') </span>
                        @lang('lang.Student')
                    </h2>
                    <div class="flex items-center justify-end  mt-5">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.English_Name') :</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]" id="englishName"></p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end  mt-5">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Chinese_Name'):</h3>
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
                            <p class="text-[14px] text-[#323C47]" id="gender"></p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Date_of_Birth') :</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]" id="dob"></p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Phone_no') :</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]" id="PhoneNo"></p>
                        </div>
                    </div>

                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Address') :</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]" id="addess"></p>
                        </div>
                    </div>

                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Emergency') <br>
                                @lang('lang.Contact_Person') :</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]" id="emPerson"></p>
                        </div>
                    </div>

                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Emergency') <br>
                                @lang('lang.Person_Relation') :</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]" id="emRelation"></p>
                        </div>
                    </div>

                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Emergency_No') :</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]" id="emergencyNo"></p>
                        </div>
                    </div>

                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Campus') :</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]" id="campus"></p>
                        </div>
                    </div>

                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.School_Attending') :</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]" id="schAttending"></p>
                        </div>
                    </div>

                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Student_No') :</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]" id="studentNo"></p>
                        </div>
                    </div>

                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Grade') :</h3>
                        </div>
                        <div class="w-[150px]  ">
                            <p class="text-[14px] text-[#323C47]" id="grade"></p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div>

        </div>

    </div>
</div>

{{-- ============================= --}}

<!-- Add  Student  modal -->
<div id="studentmodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
    <div class="fixed inset-0 transition-opacity">
        <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
    </div>
    <div class="relative p-4 w-full max-w-7xl max-h-full ">
        @if (isset($studentData))
            <form id="studentForm" method="post" url="../updatStudent/{{ $studentData->id }}">
            @else
                <form id="studentForm" method="post" url="../addStudent">
        @endif
        @csrf

        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
            <div class="flex items-center  justify-center  p-5  rounded-t dark:border-gray-600 bg-primary">
                <h3 class="text-xl font-semibold text-white text-center">
                    @lang('lang.Add_Student')
                </h3>
                <button type="button"
                    class="cursor-pointer absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                    data-modal-hide="studentmodal">
                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>

            {{-- Student Details --}}

            <div class="mt-4 px-10 font-semibold">
                <h2 class="text-[18px]">@lang('lang.Student_Details')</h2>
            </div>
            <div class="mt-3 px-10">
                @if (session('user_det')['role'] == 'parent')
                    <input type="hidden" name="parent_id" value="{{ session('user_det')['user_id'] }}" readonly>
                @else
                    <div>
                        <label class="text-[14px] font-normal" for="parent_id">@lang('lang.Parent_Name')</label>
                        <select
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="parent_id" id="parent_id" required>
                            <option selected disabled>@lang('lang.Select_Parent')</option>
                            @foreach ($parents as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->first_name }} -
                                    {{ $parent->last_name }}</option>
                            @endforeach

                        </select>
                    </div>
                @endif
            </div>
            <div class="grid grid-cols-2 mt-1 gap-10 px-10">
                <div>
                    <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                        <label class="text-[14px] font-normal" for="firstName">@lang('lang.English_Name')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="full_name" required id="fullName" placeholder=" @lang('lang.Enter_Student_Name')"
                            value="{{ $studentData->full_name ?? '' }}">
                    </div>


                    <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                        <label class="text-[14px] font-normal" for="Gender">@lang('lang.gender')</label>
                        <select
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="gender" id="Gender" required>
                            <option value="" selected disabled>@lang('lang.Select_Gender')</option>
                            <option value="male"
                                {{ isset($studentData->gender) && $studentData->gender == 'male' ? 'selected' : '' }}>
                                @lang('lang.male')</option>
                            <option value="female"
                                {{ isset($studentData->gender) && $studentData->gender == 'female' ? 'selected' : '' }}>
                                @lang('lang.female')</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                        <label class="text-[14px] font-normal" for="phoneNo">@lang('lang.Phone_no')</label>
                        <input type="number"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="phone_no" required id="phoneNo" placeholder="@lang('lang.Enter_Phone')"
                            value="{{ $studentData->phone_no ?? '' }}">
                    </div>


                    {{-- Emergency Contact --}}
                    <div class="mt-2 font-semibold">
                        <h2 class="text-[18px]">@lang('lang.Emergency_Contact'):</h2>
                    </div>

                    <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                        <label class="text-[14px] font-normal" for="personName">@lang('lang.Name')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="em_person" id="personName" placeholder=" @lang('lang.Enter_Person_Name')"
                            value="{{ $studentData->em_person ?? '' }}">
                    </div>

                    <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                        <label class="text-[14px] font-normal" for="emPhone">@lang('lang.Phone_no')</label>
                        <input type="number"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="em_phone" id="emPhone" placeholder="@lang('lang.Enter_Emergency_Person_Phone_Number')"
                            value="{{ $studentData->em_phone ?? '' }}">
                    </div>

                </div>


                <div>
                    {{-- Student Details --}}
                    <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                        <label class="text-[14px] font-normal" for="chName">@lang('lang.Chinese_Name')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="chinese_name" required id="chName" placeholder="@lang('lang.Enter_Chinese_Name')"
                            value="{{ $studentData->chinese_name ?? '' }}">
                    </div>

                    <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                        <label class="text-[14px] font-normal" for="dob">@lang('lang.Date_of_Birth')</label>
                        <input type="date"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="dob" required id="dob" value="{{ $studentData->dob ?? '' }}">
                    </div>
                    <div class="grid grid-cols-[100px_minmax(100px,_1fr)]  my-6  ">
                        <label class="text-[14px] font-normal" for="address">@lang('lang.Address')</label>
                        <textarea type="date" class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[85px] text-[14px]"
                            name="address" required id="address" placeholder="@lang('lang.Enter_Address')"> {{ $studentData->adress ?? '' }}</textarea>
                    </div>

                    {{-- Emergency Contact --}}

                    <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                        <label class="text-[14px] font-normal" for="Relation">@lang('lang.Relation')</label>
                        <input type="text"
                            class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="relation" id="Relation" placeholder=" @lang('lang.Enter_Emergency_Person_Relation')"
                            value="{{ $studentData->em_relation ?? '' }}">
                    </div>

                </div>
            </div>


            {{-- Campus --}}
            <div class="mt-2 px-10 font-semibold">
                <h2 class="text-[18px]">@lang('lang.Campus')</h2>
            </div>
            <div class="grid grid-cols-2  gap-10 px-10 mt-4">
                <div>

                    {{-- Campus --}}
                    <div class="select-container grid grid-cols-[100px_minmax(100px,_1fr)] items-center ">
                        <label class="text-[14px] font-normal" for="Campus">@lang('lang.Campus')</label>
                        <div class="flex gap-4">
                            <div class="select-feild w-full {{ isset($studentData->campus) ? 'hidden' : '' }}">
                                <select
                                    class=" border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                    name="Campus" id="campus">
                                    <option value="">@lang('lang.Select_Campus')</option>
                                </select>
                            </div>
                            <input type="text"
                                class="w-full {{ isset($studentData->campus) ? '' : 'hidden' }} border-[#DEE2E6] rounded-[4px] focus:border-primary input-field   h-[40px] text-[14px]"
                                name="Campus" id="campus" value="{{ $studentData->campus ?? '' }}">
                            <div>
                                <button type="button"
                                    class="bg-secondary toggle-button h-[40px] rounded-[4px] w-[40px] font-bold text-white text-2xl"
                                    style="width: 42px">+</button>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                        <label class="text-[14px] font-normal" for="stud_no">@lang('lang.Student_No')</label>
                        <input type="number"
                            class="w-full required border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                            name="student_no" id="stud_no" placeholder=" @lang('lang.Enter_Roll_no')"
                            value="{{ $studentData->student_no ?? '' }}">
                    </div>

                </div>

                <div>
                    {{-- Campus --}}

                    <div class="grid select-container grid-cols-[100px_minmax(100px,_1fr)] items-center   ">
                        <label class="text-[14px] font-normal" for="School_attending">@lang('lang.School_Attending')</label>

                        <div class="flex gap-4">
                            <div
                                class="select-feild w-full {{ isset($studentData->School_attending) ? 'hidden' : '' }} ">
                                <select
                                    class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                    name="sch_attending" id="sAttending">
                                    <option value="">@lang('lang.Select')</option>
                                </select>
                            </div>
                            <input type="text"
                                class="w-full {{ isset($studentData->School_attending) ? '' : 'hidden' }} border-[#DEE2E6] rounded-[4px] focus:border-primary input-field   h-[40px] text-[14px]"
                                name="sch_attending" id="School_attending"
                                value="{{ $studentData->School_attending ?? '' }}">
                            <div>
                                <button type="button"
                                    class="bg-secondary toggle-button h-[40px] rounded-[4px] w-[40px] font-bold text-white text-2xl"
                                    style="width: 42px">+</button>
                            </div>
                        </div>
                    </div>

                    <div class="grid select-container grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                        <label class="text-[14px] font-normal" for="grade">@lang('lang.Grade')</label>
                        <div class="flex gap-4">
                            <div class="select-feild w-full {{ isset($studentData->grade) ? 'hidden' : '' }}">
                                <select
                                    class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                    name="grade" id="grade" value="{{ $studentData->grade ?? '' }}">
                                    <option value="">@lang('lang.Select')</option>
                                </select>
                            </div>
                            <input type="text"
                                class="w-full {{ isset($studentData->grade) ? '' : 'hidden' }} border-[#DEE2E6] rounded-[4px] focus:border-primary input-field   h-[40px] text-[14px]"
                                name="grade" id="grade" value="{{ $studentData->grade ?? '' }}">
                            <div>
                                <button type="button"
                                    class="bg-secondary toggle-button h-[40px] rounded-[4px] w-[40px] font-bold text-white text-2xl"
                                    style="width: 42px">+</button>
                            </div>
                        </div>
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
                        @lang(!isset($studentData) ? 'lang.Add' : 'lang.Update')
                    </div>

                </button>
            </div>
        </div>
        </form>
        <div>

        </div>

    </div>
</div>


{{-- ============ add  Excel modal  =========== --}}
<div id="addExcelSheetmodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ">
    <div class="fixed inset-0 transition-opacity">
        <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
    </div>
    <div class="relative p-4 w-full   max-w-2xl max-h-full ">
        <form action="{{ url('student/import') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
                <div class="flex items-center   justify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white ">
                        @lang('lang.Add_Student')
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



{{-- change verifiction  status modal  --}}
<button data-modal-target="verifictionModal" data-modal-toggle="verifictionModal">

</button>
<div id="verifictionModal" data-modal-backdrop="static"
    class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden  ">
    <div class="fixed inset-0 transition-opacity">
        <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
    </div>
    <div class="relative p-4 w-full   max-w-lg max-h-full ">
        <div class="relative bg-white shadow-dark rounded-lg  dark:bg-gray-700  ">
            <div class="">

                <button type="button"
                    class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                    data-modal-hide="verifictionModal">
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
                    <h1 class="text-center pt-3 text-2xl">@lang('lang.Change_Status_To') <span id="statusType"
                            class="font-semibold"></span></h1>
                    <div class="flex  justify-center gap-5 mx-auto mt-5 pb-5">
                        <button data-modal-hide="verifictionModal" class="bg-primary px-7 py-3 text-white rounded-md">
                            @lang('lang.No')
                        </button>
                        <form class="" id="ChangeVerBtn" action="" method="POST">
                            @csrf
                            <input type="hidden" name="status" id="changedStatus">
                            <button class=" bg-red-600 px-7 py-3 text-white rounded-md">
                                @lang('lang.Yes')
                            </button>
                        </form>
                    </div>

                </div>

            </div>

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
@if (isset($studentData))
    <script>
        $(document).ready(function() {
            $('#studentmodal').removeClass("hidden");
            $('#studentmodal').addClass("flex");

        });
    </script>
@endif
<script>
    $(document).ready(function() {
        function changestdstatus() {

            $('.verBtn').click(function() {
                let status = $(this).html()
                console.log(status);
                if (status == "Pending") {
                    status = "Approved";
                } else {
                    status = "Pending";

                }


                let id = $(this).attr('stdId');
                $('#verifictionModal').removeClass("hidden");
                $('#verifictionModal').addClass("flex");
                $('#statusType').text(status);
                $('#changedStatus').val(status);


                $('#ChangeVerBtn').attr('action', '../changeStdStatus/' + id);

            })
        }

        changestdstatus();
        $('#datatable').on('draw.dt', function() {
            changestdstatus();
        });


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
            var url = "../api/delStudent/" + updateId;

            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                success: function(response) {
                    if (response.success == true) {
                        window.location.href = '../student';
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
                        'Student Not Found',
                        'warning'
                    );
                }

            });

        })
        //

        function viewDataFun() {

            $('.viewBtn').click(function() {
                $('#studenDetailsModal').removeClass('hidden');
                $('#studenDetailsModal').addClass('flex');
                let dataId = $(this).attr('studentId');
                let url = "../studentViewData/" + dataId;
                $.ajax({
                    type: "get",
                    url: url,
                    success: function(response) {
                        let data = response.student;
                        console.log(data);
                        $('#englishName').text(data.full_name);
                        $('#chineseName').text(data.chinese_name);
                        $('#gender').text(data.gender);
                        $('#dob').text(data.dob);
                        $('#PhoneNo').text(data.phone_no);
                        $('#addess').text(data.adress);
                        $('#emPerson').text(data.em_person);
                        $('#emRelation').text(data.em_relation);
                        $('#emergencyNo').text(data.em_phone);
                        $('#campus').text(data.campus);
                        $('#schAttending').text(data.School_attending);
                        $('#studentNo').text(data.student_no);
                        $('#grade').text(data.grade);

                    }
                });
            });
        }
        viewDataFun()
        $(document).ready(function() {
            $("#studentForm").submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                var url = $('#studentForm').attr('url');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    dataType: "json",
                    beforeSend: function() {
                        $('#spinner').removeClass('hidden');
                        $('#text').addClass('hidden');
                        $('#addBtn').attr('disabled', true);
                    },
                    success: function(response) {
                        if (response.success == true) {
                            window.location.href = '../student';
                        } else if (response.success == false) {
                            Swal.fire(
                                'Warning!',
                                response.message,
                                'warning'
                            )
                        }
                    },
                    error: function(jqXHR) {

                        let response = JSON.parse(jqXHR.responseText);
                        console.log("eror");
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
        });
    });
</script>
