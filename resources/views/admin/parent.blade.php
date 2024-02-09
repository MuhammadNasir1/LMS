@include('layouts.header')
@include('admin.includes.nav')

<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.All_Parents')</h1>
    </div>

    <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
        <div>
            <div class="flex justify-between px-[20px] mb-3">
                <h3 class="text-[20px] text-black">@lang('lang.Parents_List')</h3>
                <button data-modal-target="addparentmodal" data-modal-toggle="addparentmodal"
                    class="bg-secondary text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">+ @lang('lang.Add_parents')  </button>
            </div>
            <table id="datatable" class="overflow-scroll">
                <thead class="py-6 bg-primary text-white">
                    <tr>
                        <th>@lang('lang.Name')</th>
                        <th>@lang('lang.email')</th>
                        <th>@lang('lang.Phone_no')</th>
                        <th>@lang('lang.Address')</th>
                        <th>@lang('lang.gender')</th>
                        <th>@lang('lang.Child')</th>
                        <th>@lang('lang.Join_Date')</th>
                        <th>@lang('lang.Action')</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="pt-4">
                        <td>John Smith</td>
                        <td>abc@email.com</td>
                        <td>1234565 54</td>
                        <td>Town, City, Country</td>
                        <td>Male</td>
                        <td>Math</td>
                        <td>12/30 2010</td>

                        <td class="flex gap-5">
                            <a class="cursor-pointer" href="#"><img width="38px" src="{{ asset('images/icons/delete.svg') }}"
                                    alt="delete"></a>
                            <a class="cursor-pointer" href="#"><img width="38px" src="{{ asset('images/icons/update.svg') }}"
                                    alt="update"></a>
                            <a class="cursor-pointer" data-modal-target="parentdetails" data-modal-toggle="parentdetails"><img width="38px"
                                    src="{{ asset('images/icons/view.svg') }}" alt="View"></a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>


<!-- Add  parent  modal -->
<div id="addparentmodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-7xl max-h-full ">
        <form action="#" method="post">
            @csrf
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                <div class="flex items-center justify-center  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white text-center">
                        @lang('lang.Add_parents')
                    </h3>
                    <button type="button"
                          class="cursor-pointer absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="addparentmodal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>

                <div class="grid grid-cols-2 mt-4 gap-10 px-10">
                    <div>
                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="firstName">@lang('lang.First_Name')</label>
                            <input type="text"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="first_name" id="firstName" placeholder=" @lang('lang.Enter_First_Name')">
                        </div>
                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="gender">@lang('lang.gender')</label>
                            <select
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="gender" id="gender">
                                <option value="">@lang('lang.Select_Gender')</option>
                                <option value="male">@lang('lang.male')</option>
                                <option value="female">@lang('lang.female')</option>
                                <option value="other">@lang('lang.other')</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="phoneNo">@lang('lang.Phone_no')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="phone_no" id="phoneNo" placeholder="@lang('lang.Enter_Phone')">
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)]  my-6  ">
                            <label class="text-[14px] font-normal" for="address">@lang('lang.Address')</label>
                            <textarea type="date" class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[85px] text-[14px]"
                                name="address" id="address" placeholder="@lang('lang.Enter_Address')"></textarea>
                        </div>




                    </div>


                    <div>
                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="lastName">@lang('lang.Last_Name')</label>
                            <input type="text"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="last_name" id="lastName" placeholder="@lang('lang.Enter_First_Name')">
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="email">@lang('lang.email')</label>
                            <input type="email"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="email" id="email" placeholder="@lang('lang.Enter_Email')">
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="contact">@lang('lang.Contact')</label>
                            <input type="number"
                                class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                name="contact" id="contact" placeholder="@lang('lang.Enter_Emergency_Phone')">
                        </div>

                        <div class="grid grid-cols-[100px_minmax(100px,_1fr)] items-center my-6  ">
                            <label class="text-[14px] font-normal" for="child">@lang('lang.Child')</label>
                            <div class="flex gap-4">
                                <select
                                    class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                                    name="child_ren" id="child">
                                    <option value="">@lang('lang.sel_Child')</option>
                                </select>
                                <div>
                                    <button type="button"
                                        class="bg-secondary h-[40px] rounded-[4px] w-[40px] font-bold text-white text-2xl"
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
                    <button
                        class="bg-secondary text-white py-2 px-6 my-4 rounded-[4px]  mx-6  font-semibold">@lang('lang.Add')</button>
                </div>
            </div>
        </form>
        <div>

        </div>

    </div>
</div>



<!--  parent  Details  modal -->
<div id="parentdetails" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-7xl max-h-full ">
        <form action="#" method="post">
            @csrf
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                <div class="flex items-center   justify-endjustify-start  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white text-center">
                        @lang('lang.About_Parent')
                    </h3>
                    <button type="button"
                          class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="parentdetails">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-col gap-5  items-center mt-4  pb-4">
                    <h2 class="text-pink text-[32px] font-semibold "><span class="border-b-4 border-pink py-1">@lang('lang.About') </span>@lang('lang.Parent')
                    </h2>
                    <div class="flex items-center justify-end  mt-5">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Name'):</h3>
                        </div>
                        <div class="w-[150px]  ">
                                <p  class="text-[14px] text-[#323C47]">Emily Davis</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.gender'):</h3>
                        </div>
                        <div class="w-[150px]  ">
                                <p  class="text-[14px] text-[#323C47]">Male</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Phone_no'):</h3>
                        </div>
                        <div class="w-[150px]  ">
                                <p  class="text-[14px] text-[#323C47]">123 456 789</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Emergency') <br> @lang('lang.Contact_No') :</h3>
                        </div>
                        <div class="w-[150px]  ">
                                <p  class="text-[14px] text-[#323C47]">12 5454 575</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.E-mail'):</h3>
                        </div>
                        <div class="w-[150px]  ">
                                <p  class="text-[14px] text-[#323C47]">xyz@email.com</p>
                        </div>
                    </div>


                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Address'):</h3>
                        </div>
                        <div class="w-[150px]  ">
                                <p  class="text-[14px] text-[#323C47]">Town, City, Country</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-end ">
                        <div class="w-[200px]">
                            <h3 class="text-[18px] font-normal">@lang('lang.Child'):</h3>
                        </div>
                        <div class="w-[150px]  ">
                                <p  class="text-[14px] text-[#323C47]">lorem ipsum</p>
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
const inputGroups = document.querySelectorAll('.input-group');

inputGroups.forEach((inputGroup, index) => {
  inputGroup.addEventListener('keydown', (e) => {
    if (e.key === 'Tab') {
      e.preventDefault();
      const inputs = inputGroup.querySelectorAll('.input');
      const currentIndex = Array.from(inputs).findIndex(input => document.activeElement === input);
      const nextIndex = (currentIndex + 1) % inputs.length;
      inputs[nextIndex].focus();
    }
  });
});

</script>
@include('layouts.footer')
