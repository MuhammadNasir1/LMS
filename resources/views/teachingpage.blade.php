@include('layouts.header')
@if (session('user_det')['role'] == 'parent')
    @include('parent.includes.nav')
@elseif (session('user_det')['role'] == 'teacher')
    @include('teacher.includes.nav')
@else
    @include('admin.includes.nav')
@endif

<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.Teaching_Page')</h1>
    </div>
    {{-- <form action="../filterwords" method="POST"> --}}
    <form id="teachingAdd" method="POST">
        {{-- <form action="../addteaching" method="POST"> --}}
        @csrf
        <input type="hidden" id="studentId" name="studentid">
        <div class="grid grid-cols-3 mt-8  gap-5">
            <div class="relative">
                <label for="Student" class="text-[#808191] text-md ml-1 font-semibold ">@lang('lang.Student') <span
                        class="text-sm text-primary"></span> </label>

                <input type="text"
                    class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                    name="student_name" required id="student" placeholder=" @lang('lang.select_student_from_table')" readonly>
            </div>
            <div>
                <label for="lessonDate" class="text-[#808191] text-md ml-1 font-semibold ">@lang('lang.Lesson_date')</label>
                <input type="date"
                    class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                    name="lesson_date" id="lessonDate" required>
            </div>
            <div>
                <label for="course" class="text-[#808191] text-md ml-1 font-semibold ">@lang('lang.Course')</label>
                <select
                    class="w-full border-3  font-bold mt-2 rounded-[10px] focus:border-primary   h-[40px] text-[14px]"
                    name="course" id="course" required>
                    <option value="" selected disabled>@lang('lang.Select_course')</option>
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
                    <option value="" selected disabled>@lang('lang.level_select')</option>
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
                    <option value="" disabled selected>@lang('lang.Select_lesson')</option>
                    @foreach ($words as $lesson)
                        <option value="{{ $lesson->lesson }}" word_id="{{ $lesson->id }}">
                            {{ $lesson->lesson }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- <div>
                <label for="word" class="text-[#808191] text-md ml-1 font-semibold ">@lang('lang.select_word')</label>
                <select
                    class="w-full border-3  font-bold mt-2 rounded-[10px] focus:border-primary   h-[40px] text-[14px]"
                    id="wordselect_word')</option>
                    @foreach ($words as $word)
                        <option value="{{ $word->word }}" word_id="{{ $word->id }}">{{ $word->word }}
                        </option>
                    @endforeach
                </select>
            </div> --}}
            <div>
                <label for="customDropdown"
                    class="text-[#808191] text-md ml-1 font-semibold ">@lang('lang.select_word')</label>
                <div id="customDropdown"
                    class="w-full border-3 font-bold rounded-[10px] h-[40px] text-[14px] custom-dropdown mt-0">
                    <button type="button" class="dropdown-btn">@lang('lang.select_word')</button>
                    <div class="dropdown-content">
                        @foreach ($words as $word)
                            <label>
                                <input type="checkbox" value="{{ $word->word }}" word_id="{{ $word->id }}"
                                    class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded ">
                                {{ $word->word }}
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div id="worksContainer"></div>
        </div>
        <div class=" flex justify-between  my-2">
            <div>
                <button id="extraWordAddBtn" type="button" data-modal-target="addwordmodal"
                    data-modal-toggle="addwordmodal"
                    class="px-3 bg-secondary rounded-md h-12 text-white font-semibold text-lg">@lang('lang.add_more_word')</button>
            </div>
            <button type="submit" id="submitbutton"
                class="bg-secondary cursor-pointer text-white h-12 w-[160px] px-5 rounded-[6px]  shadow-sm font-semibold">
                <div class=" text-center hidden" id="spinner">
                    <svg aria-hidden="true" class="w-5 h-5 mx-auto text-center text-gray-200 animate-spin fill-primary"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="currentColor" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentFill" />
                    </svg>
                </div>
                <div class="text-white  font-semibold" id="text">
                    @lang('lang.Start_Teaching')
            </button>
        </div>
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
    </form>

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
    <div class="fixed inset-0 transition-opacity">
        <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
    </div>
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


<!-- add word modal -->
<div id="addwordmodal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed inset-0 transition-opacity">
        <div id="backdrop" class="absolute inset-0 bg-slate-800 opacity-75"></div>
    </div>
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-dark ">
            <!-- Modal header -->
            <div class="flex items-center justify-between   rounded-t">
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="addwordmodal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <div class=" items-center   ">
                    <label class="text-[14px] font-semibold" for="word">@lang('lang.Add_words')</label>
                    <input type="text"
                        class="w-full border-[#DEE2E6] rounded-[4px] focus:border-primary   h-[40px] text-[14px]"
                        id="extraWord" placeholder=" @lang('lang.Enter_Word')">
                    <div class="flex justify-end mt-2">
                        <button class="w-28   bg-secondary rounded-md h-10 text-white font-semibold text-xl"
                            id="MwordAddBtn">@lang('lang.Add')</button>
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
            $("#teachingAdd").submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                // Send the AJAX request
                $.ajax({
                    type: "POST",
                    url: "../addteaching",
                    data: formData,
                    dataType: "json",
                    beforeSend: function() {
                        $('#spinner').removeClass('hidden');
                        $('#text').addClass('hidden');
                        $('#submitbutton').attr('disabled', true);
                    },
                    success: function(response) {
                        window.location.href = "./video";
                    },
                    error: function(jqXHR) {
                        let response = JSON.parse(jqXHR.responseText);

                        Swal.fire(
                            'Warning!',
                            response.message,
                            'warning'
                        )
                        $('#text').removeClass('hidden');
                        $('#spinner').addClass('hidden');
                        $('#submitbutton').attr('disabled', false);
                    }
                });
            });
            $('#MwordAddBtn').click(function() {
                var word = $('#extraWord').val();
                var wordId = 1;
                console.log(word);
                $('#wordsContainer').css('display', 'block');
                var wordsOutput = `<tr id="word-${wordId}" >
                                                    <td class="px-6 py-5" >
                                                <input type="hidden" name="course_id[]" value="0">
                                                <input type="hidden" name="word_id[]" value="0">
                                                <input type="hidden" name="word[]" value="${word}">
                                                <input type="hidden" name="audio1[]" value="null" >
                                                <input type="hidden" name="audio2[]" value="null" >
                                                <input type="hidden" name="audio3[]" value="null" >
                                                    0
                                                </td>
                                                    <td>${word}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                    <td class="">
                                          <div class="flex gap-5 justify-center">
                                                      <button class="cursor-pointer delete-row" type="button"><img width="38px" src="{{ asset('images/icons/delete.svg') }}" alt="delete"></button>
                                             </div>
                                                    </td>
                                        </tr>`

                $('#wordsbody').append(wordsOutput);
                $('#extraWord').val('');
                $('#extraWordAddBtn').click();
                deleteRow();



            })
            const $checkboxes = $('#customDropdown input[type="checkbox"]');
            $('.std_select_btn').click(function() {
                var student_id = $(this).attr('student_id');
                var student_name = $(this).attr('student_name');
                $('#student').val(student_name)
                $('#studentId').val(student_id)
            })
            $checkboxes.change(function() {

                var selectedOption = $(this).find(':selected');
                var wordId = $(this).attr('word_id');
                var url = "../getWords/" + wordId;
                if ($(this).is(':checked')) {
                    $.ajax({
                        type: "GET",
                        url: url,
                        success: function(response) {

                            $('#wordsContainer').css('display', 'block');
                            var wordsOutput = `<tr id="word-${wordId}" >
                                                    <td class="px-6 py-5" >
                                                <input type="hidden" name="course_id[]" value="${response.words.course_id}">
                                                <input type="hidden" name="word_id[]" value="${response.words.id}">
                                                <input type="hidden" name="word[]" value="${response.words.word}">
                                                <input type="hidden" name="audio1[]" value="${response.words.audio_1}">
                                                <input type="hidden" name="audio2[]" value="${response.words.audio_2}">
                                                <input type="hidden" name="audio3[]" value="${response.words.audio_3}">                                ${response.words.course_id}</td>
                                                    <td>${response.words.word}</td>
                                                    <td>
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
                                                      <button class="cursor-pointer delete-row" type="button"><img width="38px" src="{{ asset('images/icons/delete.svg') }}" alt="delete"></button>
                                             </div>
                                                    </td>
                                        </tr>`





                            $('#wordsbody').append(wordsOutput);

                            audioPlayer();
                            deleteRow();
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

                } else {
                    // Checkbox is unchecked
                    $(`#word-${wordId}`).remove();

                }

            });

        })

        function deleteRow() {
            $('.delete-row').click(function() {
                $(this).closest('tr').remove();
            });

        }
        deleteRow()

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
