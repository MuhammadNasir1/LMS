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
            <div class="flex justify-between px-6 pb-2 border-b-secondary border-b">
                <h2 class="text-xl  font-semibold ">@lang('lang.Top_Performer')</h2>
            </div>
            <div>
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
                                        @lang('lang.email')
                                    </th>
                                    <th class="px-6 py-3">
                                        @lang('lang.Rank')
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topTeachers as $teacher)
                                    <tr class="bg-white ">
                                        <td class="px-6 py-3 ">
                                            <div class="flex justify-center">
                                                <img height="40px" width="40px"
                                                    src="{{ asset($teacher->user_image ? $teacher->user_image : 'images/teacher.svg') }}"
                                                    alt="user">
                                            </div>
                                        </td>
                                        <td class="px-6 py-3">
                                            {{ $teacher->name }}
                                        </td>
                                        <td class="px-6 py-3">
                                            {{ $teacher->email }}
                                        </td>
                                        <td class="px-6 py-3">
                                            {{ $loop->iteration }}
                                        </td>
                                    </tr>
                                @endforeach
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
