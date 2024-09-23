@include('layouts.header')
@include('admin.includes.nav')

<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.Dashboard')</h1>
    </div>
    <div class="grid grid-cols-3 gap-6  mt-4">
        <div class="card-1 ">
            <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Total_Students')</p>
                        <h2 class="text-2xl font-semibold mt-1">{{ $studentsCount }}</h2>
                    </div>
                    <div>
                        <img width="90px" height="90px" src="{{ asset('images/totall_student.svg') }}" alt="students">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-1 ">
            <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Total_Parents')</p>
                        <h2 class="text-2xl font-semibold mt-1">{{ $parentsCount }}</h2>
                    </div>
                    <div>
                        <img width="90px" height="90px" src="{{ asset('images/total_prent.svg') }}" alt="students">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-1 ">
            <div class="bg-white  border border-secondary rounded-[10px] py-5 px-8">
                <div class="flex gap-1 justify-between items-center">
                    <div>
                        <p class="text-sm text-[#808191]">@lang('lang.Total_Teachers')</p>
                        <h2 class="text-2xl font-semibold mt-1">{{ $teachersCount }}</h2>
                    </div>
                    <div>
                        <img width="90px" height="90px" src="{{ asset('images/total_teacher.svg') }}" alt="teacher">
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


<div class="flex gap-14 mt-16 px-3 ">
    <div class="w-[60%]">

        <div class=" shadow-med p-3 py-5   rounded-xl min-h-[448px]">
            <div class="flex justify-between px-6">
                <h2 class="text-xl  font-semibold ">@lang('lang.Top_Performer')</h2>
            </div>
            <div>


                <div class="text-sm font-medium text-center text-gray-500 border-b border-gray mt-4">
                    <ul class="flex gap-2 ml-3">
                        <li class="me-2">
                            <a href="#"
                                class=" font-semibold inline-block p-2 text-dblue border-b-2 border-dblue rounded-t-lg active">@lang('lang.Monthly')</a>
                        </li>
                        <li class="me-2">
                            <a href="#"
                                class=" font-semibold inline-block p-2 border-b-2 border-transparent rounded-t-lg ">@lang('lang.Weekly')</a>
                        </li>
                        <li class="me-2">
                            <a href="#"
                                class=" font-semibold inline-block p-2 border-b-2 border-transparent rounded-t-lg  ">@lang('lang.Today')</a>
                        </li>

                    </ul>
                </div>


                <div>



                    <div class="relative">
                        <table class="w-full text-sm text-center ">
                            <thead class="text-sm text-gray-900 = text-dblue ">
                                <tr>
                                    <th class="px-6 py-3">
                                        @lang('lang.Photo')
                                    </th>
                                    <th class="px-6 py-3">
                                        @lang('lang.Name')
                                    </th>
                                    <th class="px-6 py-3">
                                        @lang('lang.Standard')
                                    </th>
                                    <th class="px-6 py-3">
                                        @lang('lang.Rank')
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white ">
                                    <td class="px-6 py-3 ">
                                        <div class="flex justify-center">
                                            <img height="40px" width="40px" src="{{ asset('images/teacher.svg') }}"
                                                alt="user">
                                        </div>
                                    </td>
                                    <td class="px-6 py-3">
                                        John Smith
                                    </td>
                                    <td class="px-6 py-3">
                                        7th Class
                                    </td>
                                    <td class="px-6 py-3">
                                        <div class="flex items-center justify-center flex-col">
                                            <div>
                                                <p class="text-dblue flex">95.06%</p>
                                                <div class="bg-green-100 rounded-xl w-36 h-3 relative  mt-1">
                                                    <div class="bg-dblue w-[70%] rounded-xl h-full"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="bg-white ">
                                    <td class="px-6 py-3 ">
                                        <div class="flex justify-center">
                                            <img height="40px" width="40px" src="{{ asset('images/teacher.svg') }}"
                                                alt="user">
                                        </div>
                                    </td>
                                    <td class="px-6 py-3">
                                        John Smith
                                    </td>
                                    <td class="px-6 py-3">
                                        7th Class
                                    </td>
                                    <td class="px-6 py-3">
                                        <div class="flex items-center justify-center flex-col">
                                            <div>
                                                <p class="text-dblue flex">95.06%</p>
                                                <div class="bg-green-100 rounded-xl w-36 h-3 relative  mt-1">
                                                    <div class="bg-dblue w-[70%] rounded-xl h-full"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="w-[40%]">
        <div class=" shadow-med p-3 rounded-xl">
            <h2 class="text-xl  font-semibold ml-6">@lang('lang.Students')</h2>
            <div id="studentChart" class="mt-4" style="height: 370px; width: 100%;"></div>
        </div>
    </div>
</div>
</div>
</div>

<script>
    window.onload = function() {
        CanvasJS.addColorSet("colors",
            [

                "#EDBD58",
                "#339B96",
                "#D95975",

            ]);


        var chart2 = new CanvasJS.Chart("studentChart", {
            colorSet: "colors",
            animationEnabled: true,
            theme: "light1",
            axisY: {
                gridColor: "#00000016",
                suffix: "-"

            },

            data: [{
                type: "column",
                yValueFormatString: "#,##0.0#\"\"",
                dataPoints: [
                    @foreach ($studentsMonthCount as $student)

                        {
                            label: "{{ $student->month_name }}",
                            y: {{ $student->count }}
                        },
                    @endforeach


                ]
            }]
        });


        chart2.render();

    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"
    integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@include('layouts.footer')
