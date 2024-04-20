@include('layouts.header')
@include('teacher.includes.nav')


<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.Teaching_Page')</h1>
    </div>
    {{-- <form action="../filterwords" method="POST"> --}}
    <form action="../addteaching" method="POST">
        @csrf
        <input type="hidden" id="studentId" name="studentid">
        <div class="grid grid-cols-3 mt-8  gap-5">
            <div class="relative">
                <label for="Student" class="text-[#808191] text-md ml-1 font-semibold ">@lang('lang.Student') <span
                        class="text-sm text-primary">(@lang('lang.read_only'))</span> </label>

                <input type="text"
                    class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                    name="student_name" id="student" placeholder=" @lang('lang.select_student_from_table')" readonly>
            </div>
            <div>
                <label for="lessonDate" class="text-[#808191] text-md ml-1 font-semibold ">@lang('lang.Lesson_date')</label>
                <input type="date"
                    class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                    name="lesson_date" id="lessonDate">
            </div>
            <div>
                <label for="course" class="text-[#808191] text-md ml-1 font-semibold ">@lang('lang.Course')</label>
                <select
                    class="w-full border-3  font-bold mt-2 rounded-[10px] focus:border-primary   h-[40px] text-[14px]"
                    name="course" id="course">
                    <option value="" selected>@lang('lang.Select_course')</option>
                    @foreach ($courses as $i => $course)
                        <option value="{{ $course->course_name }}" course_id="{{ $course->id }}">
                            {{ $course->course_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="level" class="text-[#808191] text-md ml-1 font-semibold ">@lang('lang.Level')</label>
                <select
                    class="w-full border-3  font-bold mt-2 rounded-[10px] focus:border-primary   h-[40px] text-[14px]"
                    name="level" id="level">
                    <option value="" selected>@lang('lang.level_select')</option>
                    @foreach ($words as $level)
                        <option value="{{ $level->level }}" level_id="{{ $level->id }}">
                            {{ $level->level }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="lesson" class="text-[#808191] text-md ml-1 font-semibold ">@lang('lang.Lesson')</label>
                <select
                    class="w-full border-3  font-bold mt-2 rounded-[10px] focus:border-primary   h-[40px] text-[14px]"
                    name="lesson" id="lesson">
                    <option value="" selected>@lang('lang.Select_lesson')</option>
                    @foreach ($words as $lesson)
                        <option value="{{ $lesson->lesson }}" word_id="{{ $lesson->id }}">
                            {{ $lesson->lesson }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="word" class="text-[#808191] text-md ml-1 font-semibold ">@lang('lang.select_word')</label>
                <select
                    class="w-full border-3  font-bold mt-2 rounded-[10px] focus:border-primary   h-[40px] text-[14px]"
                    id="word">
                    <option value="">@lang('lang.select_word')</option>
                    @foreach ($words as $word)
                        <option value="{{ $word->word }}" word_id="{{ $word->id }}">{{ $word->word }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div id="worksContainer"></div>
        </div>
        <div class=" flex justify-end  my-2">
            <button class="bg-secondary cursor-pointer text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">
                @lang('lang.Start_Teaching')</button>
        </div>
    </form>
    <div class="shadow-dark mt-3  rounded-xl mb-6   bg-white hidden" id="wordsContainer">
        <div>
            <div>
                <table class="overflow-scroll w-full text-center">
                    <thead class="py-6 bg-primary text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3">@lang('lang.Course_ID')</th>
                            <th>@lang('lang.Word')</th>
                            <th>@lang('lang.Audio_1')</th>
                            <th>@lang('lang.Audio_2')</th>
                            <th>@lang('lang.Audio_3')</th>

                            <th>@lang('lang.Action')</th>
                        </tr>
                    </thead>
                    <tbody id="wordsbody">

                    </tbody>
                </table>
            </div>
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
                    @foreach ($students as $x => $students)
                        <tr class="pt-4">
                            <td>{{ $x + 1 }}</td>
                            <td>{{ $students->full_name }}</td>
                            <td>{{ $students->chinese_name }}</td>
                            <td>james</td>
                            <td>{{ $students->gender }}</td>
                            <td>1</td>
                            <td>{{ $students->grade }}</td>
                            <td>{{ $students->phone_no }}</td>
                            <td>{{ $students->adress }}</td>

                            <td>
                                <div class="flex gap-5 items-center">

                                    <button student_id="{{ $students->id }}" student_name="{{ $students->full_name }}"
                                        class="bg-secondary cursor-pointer text-white h-10 px-5 rounded-[6px]  shadow-sm font-semibold std_select_btn">
                                        @lang('lang.Select')</button>
                                    <div class=" cursor-pointer right-3 top-[42px]" data-modal-target="addstudentmodal"
                                        data-modal-toggle="addstudentmodal">
                                        <svg width="35" height="35" viewBox="0 0 17 17" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.98016 15.9997C1.87899 15.9997 1 15.1207 1 11.0195"
                                                stroke="#EDBD58" stroke-linecap="round" />
                                            <path d="M16.0007 11.0195C16.0007 15.1207 15.1216 15.9997 11.0205 15.9997"
                                                stroke="#EDBD58" stroke-linecap="round" />
                                            <path d="M11.0205 1C15.1216 1 16.0007 1.87899 16.0007 5.98016"
                                                stroke="#EDBD58" stroke-linecap="round" />
                                            <path d="M1 5.98016C1 1.87899 1.87899 1 5.98016 1" stroke="#EDBD58"
                                                stroke-linecap="round" />
                                            <path
                                                d="M8.27359 8.39875C9.76442 8.39875 10.973 7.1902 10.973 5.69937C10.973 4.20855 9.76442 3 8.27359 3C6.78277 3 5.57422 4.20855 5.57422 5.69937C5.57422 7.1902 6.78277 8.39875 8.27359 8.39875Z"
                                                fill="#EDBD58" />
                                            <path
                                                d="M12.5475 13.6381C12.5006 11.0594 10.6069 8.98438 8.27375 8.98438C5.94063 8.98438 4.04625 11.06 4 13.6381H12.5475Z"
                                                fill="#EDBD58" />
                                        </svg>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
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
                    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <div class="py-8 flex justify-center">

                <div class="relative">
                    <div style="transform: translate(-51%); left: 50%;top: 15%;" class="absolute h-[128px] w-[128px]"
                        id="qrcode">

                    </div>
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
<script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>
<script>
    const qrcode = new QRCode(document.getElementById('qrcode'), {
        text: 'muhammadnasir.dev@gmail.com',
        width: 128,
        height: 128,
        colorDark: '#000',
        colorLight: '#fff',
        correctLevel: QRCode.CorrectLevel.H
    });

    $(document).ready(function() {
        $('.std_select_btn').click(function() {
            var student_id = $(this).attr('student_id');
            var student_name = $(this).attr('student_name');
            $('#student').val(student_name)
            $('#studentId').val(student_id)
        })

        // $('#course').change(function() {
        //     var selectedOption = $(this).find(':selected');
        //     var courseId = selectedOption.attr('course_id');

        //     console.log(courseId);
        // });

        $('#word').change(function() {
            var selectedOption = $(this).find(':selected');
            var wordId = selectedOption.attr('word_id');
            var url = "../getWords/" + wordId;
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    $('#wordsContainer').css('display', 'block');

                    var wordsInputs = `<input type="hidden" name="course_id[]" value="${response.words.course_id}">
                        <input type="hidden" name="word_id[]" value="${response.words.id}">
                        <input type="hidden" name="word[]" value="${response.words.word}">
                        <input type="hidden" name="audio1[]" value="${response.words.audio_1}">
                        <input type="hidden" name="audio2[]" value="${response.words.audio_2}">
                        <input type="hidden" name="audio3[]" value="${response.words.audio_3}">`;
                    var wordsOutput = `<tr >
                            <td class="px-6 py-5" >
                                ${response.words.course_id}</td>
                            <td>${response.words.word}</td>
                            <td>s
                                <div class="flex justify-center">
        <div>
            ${response.words.audio_1 ? `
            <audio class="audio-player" src="../${response.words.audio_1}"></audio>
            <button class="play-button">
                <img height="40px" width="40px" src="{{ asset('images/icons/audio-1.svg') }}" alt="audio-1">
            </button>` : ''}
        </div>
    </div>
                            </td>

                            <td>
    <div class="flex justify-center">
        <div>
            ${response.words.audio_2 ? `
            <audio class="audio-player" src="../${response.words.audio_2}"></audio>
            <button class="play-button">
                <img height="40px" width="40px" src="{{ asset('images/icons/audio-1.svg') }}" alt="audio-1">
            </button>` : ''}
        </div>
    </div>
</td>
<td>
    <div class="flex justify-center">
        <div>
            ${response.words.audio_3 ? `
            <audio class="audio-player" src="../${response.words.audio_3}"></audio>
            <button class="play-button">
                <img height="40px" width="40px" src="{{ asset('images/icons/audio-1.svg') }}" alt="audio-1">
            </button>` : ''}
        </div>
    </div>
</td>
            <td class="">
                  <div class="flex gap-5 justify-center">
                              <a class="cursor-pointer" href="#"><img width="38px" src="{{ asset('images/icons/delete.svg') }}" alt="delete"></a>
                     </div>
                            </td>
                </tr>`
                    $('#worksContainer').append(wordsInputs);
                    $('#wordsbody').append(wordsOutput);

                    audioPlayer();
                },
                error: function(jqXHR) {
                    let response = JSON.parse(jqXHR.responseText);
                    console.log("error");
                    Swal.fire(
                        'Warning!',
                        response.message,
                        'warning'
                    );
                }

            });

        });

    })

    function audioPlayer() {
        var playButtons = document.querySelectorAll('.play-button');
        console.log("run  audio  fnction");
        playButtons.forEach(function(button) {
            button.addEventListener('click', function() {

                console.log("run  audio  fnction");
                var audio = button.parentElement.querySelector('.audio-player');
                if (audio) {
                    audio.play();
                }
            });
        });
    }
    audioPlayer();
</script>


<script>
    $(document).ready(function() {
        $('#course').change(function() {
            var selectedOption = $(this).find(':selected');
            var courseId = selectedOption.attr('course_id');

            console.log(courseId);
            // AJAX request to get levels
            $.ajax({
                url: '../filter-options',
                type: 'GET',
                data: {
                    course_id: courseId
                },
                success: function(response) {
                    var levels = response.levels;
                    var options = '<option value="" selected>Select Level</option>';
                    for (var i = 0; i < levels.length; i++) {
                        options += '<option value="' + levels[i].id + '" level_id="' +
                            levels[i].id +
                            '">' + levels[i]
                            .level + '</option>';
                    }
                    $('#level').html(options);
                    $('#lesson').html('<option value="" selected>Select Lesson</option>');

                    var lessons = response.lessons;
                    var options = '<option value="" selected>Select Lesson</option>';
                    for (var i = 0; i < lessons.length; i++) {
                        options += '<option value="' + lessons[i].lesson + '">' + lessons[i]
                            .lesson + '</option>';
                    }
                    $('#lesson').html(options);

                    var words = response.words;
                    console.log(response.words);
                    var options = '<option value="" selected>Select Word</option>';
                    for (var i = 0; i < lessons.length; i++) {
                        options += '<option word_id="' + words[i].id + '" value="' + words[
                                i].word + '">' + words[i]
                            .word + '</option>';
                    }
                    $('#word').html(options);
                }
            });
        });

        $('#level').change(function() {
            // var levelId = $(this).val();
            var selectedOption = $(this).find(':selected');
            // var levelId = selectedOption.attr('level_id');
            var levelId = selectedOption.html();
            console.log(levelId);
            // AJAX request to get lessons
            $.ajax({
                url: '/filter-options',
                type: 'GET',
                data: {
                    level_id: levelId
                },
                success: function(response) {
                    var lessons = response.lessons;
                    var options = '<option value="" selected>Select Lesson</option>';
                    for (var i = 0; i < lessons.length; i++) {
                        options += '<option value="' + lessons[i].lesson + '">' + lessons[i]
                            .lesson + '</option>';
                    }
                    $('#lesson').html(options);

                    var words = response.words;
                    console.log(response.words);
                    var options = '<option value="" selected>Select Word</option>';
                    for (var i = 0; i < lessons.length; i++) {
                        options += '<option word_id="' + words[i].id + '" value="' + words[
                                i].word + '">' + words[i]
                            .word + '</option>';
                    }
                    $('#word').html(options);
                }
            });
        });
    });
</script>
