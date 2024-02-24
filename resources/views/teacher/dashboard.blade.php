@include('layouts.header')
@include('teacher.includes.nav')

<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.Dashboard')</h1>
    </div>
    <div class="grid grid-cols-3 gap-6  mt-4">
        <div class="card-1 ">
            <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Todays_Lesson')</p>
                        <h2 class="text-2xl font-semibold mt-1">05</h2>
                    </div>
                    <div>
                        <img width="80px" height="80px" src="{{ asset('images/lessonicon.svg') }}" alt="lesson">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-1 ">
            <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Complete_Lessons')</p>
                        <h2 class="text-2xl font-semibold mt-1">80</h2>
                    </div>
                    <div>
                        <img width="80px" height="80px" src="{{ asset('images/lesson_com_icon.svg') }}"
                            alt="students">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-1 ">
            <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Training_Videos')</p>
                        <h2 class="text-2xl font-semibold mt-1">03</h2>
                    </div>
                    <div>
                        <img width="80px" height="80px" src="{{ asset('images/tainingicon.svg') }}"
                            alt="Training Vidwi">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-1 ">
            <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Recorded_Videos')</p>
                        <h2 class="text-2xl font-semibold mt-1">05</h2>
                    </div>
                    <div>
                        <img width="80px" height="80px" src="{{ asset('images/recorded.svg') }}"
                            alt="Recorded Videos">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@include('layouts.footer')
