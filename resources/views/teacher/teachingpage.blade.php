@include('layouts.header')
@include('teacher.includes.nav')


<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.Teaching_Page')</h1>
    </div>
    <div class="grid grid-cols-3 my-8  gap-5">
        <div>
            <label for="campus" class="text-[#808191] text-md ml-1 font-semibold ">@lang('lang.Campus')</label>
            <select
                class="w-full border-3 text-secondary font-bold border-secondary mt-2 rounded-[10px] focus:border-primary   h-[40px] text-[14px]"
                name="Campus" id="Campus">
                <option value="">@lang('lang.Select_Campus')</option>
            </select>
        </div>
        <div class="relative">
            <label for="Student" class="text-[#808191] text-md ml-1 font-semibold ">@lang('lang.Student')</label>

            <input type="text"
                class="w-full  border-3 mt-2  border-secondary rounded-[10px] focus:border-primary   h-[40px] text-[14px] placeholder:text-secondary  placeholder:fon-sm"
                name="Student" id="Student" placeholder=" @lang('lang.Select_Student')">

        </div>
        <div>
            <label for="lessonDate" class="text-[#808191] text-md ml-1 font-semibold ">@lang('lang.Lesson_date')</label>
            <input type="date"
                class="w-full  border-3 mt-2  border-secondary rounded-[10px] focus:border-primary   h-[40px] text-[14px] placeholder:text-secondary  placeholder:fon-sm"
                name="lesson_date" id="lessonDate">
        </div>
        <div>
            <label for="lessonDate" class="text-[#808191] text-md ml-1 font-semibold ">@lang('lang.Add_words')</label>
            <input type="text"
                class="w-full  border-3 mt-2  border-secondary rounded-[10px] focus:border-primary   h-[40px] text-[14px] placeholder:text-secondary  placeholder:fon-sm"
                name="word" id="word" placeholder="@lang('lang.Enter_Word')">
        </div>
        <div></div>
        <div class="2 flex justify-end  mt-8">
            <button class="bg-secondary cursor-pointer text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">
                @lang('lang.Start_Teaching')</button>
        </div>
    </div>
    <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
        <div>
            <div class="flex justify-between px-[20px] mb-3">
                <h3 class="text-[20px] text-black">@lang('lang.Students_List')</h3>

            </div>
            <table id="datatable" class="overflow-scroll">
                <thead class="py-6 bg-primary text-white">
                    <tr>
                        <th>@lang('lang.STN')</th>
                        <th>@lang('lang.Student_Name')</th>
                        <th>@lang('lang.Chinese_Name')</th>
                        <th>@lang('lang.Parent_Name')</th>
                        <th>@lang('lang.gender')</th>
                        <th>@lang('lang.age')</th>
                        <th>@lang('lang.Grade')</th>
                        <th>@lang('lang.Phone_no')</th>
                        <th>@lang('lang.Address')</th>

                        <th>@lang('lang.Select')</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="pt-4">
                        <td>1</td>
                        <td>John Smith</td>
                        <td>1约翰·史密斯</td>
                        <td>james</td>
                        <td>Male</td>
                        <td>1</td>
                        <td>-</td>
                        <td>134 548 878</td>
                        <td>Town, City, Country</td>

                        <td>
                            <div class="flex gap-5 items-center">

                                <button
                                    class="bg-secondary cursor-pointer text-white h-10 px-5 rounded-[6px]  shadow-sm font-semibold ">
                                    @lang('lang.Select')</button>
                                <div class=" cursor-pointer right-3 top-[42px]" data-modal-target="addstudentmodal"
                                    data-modal-toggle="addstudentmodal">
                                    <svg width="35" height="35" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.98016 15.9997C1.87899 15.9997 1 15.1207 1 11.0195" stroke="#EDBD58" stroke-linecap="round"/>
                                        <path d="M16.0007 11.0195C16.0007 15.1207 15.1216 15.9997 11.0205 15.9997" stroke="#EDBD58" stroke-linecap="round"/>
                                        <path d="M11.0205 1C15.1216 1 16.0007 1.87899 16.0007 5.98016" stroke="#EDBD58" stroke-linecap="round"/>
                                        <path d="M1 5.98016C1 1.87899 1.87899 1 5.98016 1" stroke="#EDBD58" stroke-linecap="round"/>
                                        <path d="M8.27359 8.39875C9.76442 8.39875 10.973 7.1902 10.973 5.69937C10.973 4.20855 9.76442 3 8.27359 3C6.78277 3 5.57422 4.20855 5.57422 5.69937C5.57422 7.1902 6.78277 8.39875 8.27359 8.39875Z" fill="#EDBD58"/>
                                        <path d="M12.5475 13.6381C12.5006 11.0594 10.6069 8.98438 8.27375 8.98438C5.94063 8.98438 4.04625 11.06 4 13.6381H12.5475Z" fill="#EDBD58"/>
                                        </svg>

                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>


<!-- Add  Student  modal -->
<div id="addstudentmodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4  w-[400px]  max-h-full ">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
            <div class="flex items-center w0  justify-between  px-5 py-3  rounded-t dark:border-gray-600 bg-primary">
                <h3 class="text-xl font-semibold text-white text-center">
                    @lang('lang.Add_Student')
                </h3>
                <button type="button"
                    class="cursor-pointer absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                    data-modal-hide="addstudentmodal">
                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <div class="py-8 flex justify-center">

                <div>
                    <svg width="180" height="180" viewBox="0 0 80 80" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.66667 6.66667V20H0V6.66667C0 4.89856 0.702379 3.20286 1.95262 1.95262C3.20286 0.702379 4.89856 0 6.66667 0L20 0V6.66667H6.66667ZM73.3333 0C75.1014 0 76.7971 0.702379 78.0474 1.95262C79.2976 3.20286 80 4.89856 80 6.66667V20H73.3333V6.66667H60V0H73.3333ZM6.66667 60V73.3333H20V80H6.66667C4.89856 80 3.20286 79.2976 1.95262 78.0474C0.702379 76.7971 0 75.1014 0 73.3333V60H6.66667ZM73.3333 73.3333V60H80V73.3333C80 75.1014 79.2976 76.7971 78.0474 78.0474C76.7971 79.2976 75.1014 80 73.3333 80H60V73.3333H73.3333Z"
                            fill="#EDBD58" fill-opacity="0.6" />
                    </svg>

                </div>

            </div>

        </div>

    </div>
</div>

@include('layouts.footer')
