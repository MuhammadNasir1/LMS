@include('layouts.header')
@include('admin.includes.nav')

<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.Dashboard')</h1>
    </div>
    <div class="grid grid-cols-4 gap-6  mt-4">
        <div class="card-1 ">
            <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Total_Students')</p>
                        <h2 class="text-2xl font-semibold mt-1">5,732</h2>
                    </div>
                    <div>
                        <img width="80px" height="80px" src="{{ asset('images/student1.svg') }}" alt="students">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-1 ">
            <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Total_Parents')</p>
                        <h2 class="text-2xl font-semibold mt-1">8,754</h2>
                    </div>
                    <div>
                        <img width="80px" height="80px" src="{{ asset('images/student1.svg') }}" alt="students">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-1 ">
            <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Total_Teachers')</p>
                        <h2 class="text-2xl font-semibold mt-1">5,732</h2>
                    </div>
                    <div>
                        <img width="80px" height="80px" src="{{ asset('images/teacher.svg') }}" alt="teacher">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-1 ">
            <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Total_Revenue')</p>
                        <h2 class="text-2xl font-semibold mt-1">5,732</h2>
                    </div>
                    <div>
                        <img width="80px" height="80px" src="{{ asset('images/student1.svg') }}" alt="Revenue">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@include('layouts.footer')
