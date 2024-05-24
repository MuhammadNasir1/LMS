@include('layouts.header')
@include('admin.includes.nav')

<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.All_Users')</h1>
    </div>

    <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
        <div>
            <div class="flex justify-between px-[20px] mb-3">
                <h3 class="text-[20px] text-black">@lang('lang.Users_List')</h3>
            </div>
            <table id="datatable" class="overflow-scroll">
                <thead class="py-6 bg-primary text-white">
                    <tr>
                        <th>#</th>
                        <th>@lang('lang.Name')</th>
                        <th>@lang('lang.email')</th>
                        <th>@lang('lang.Phone_no')</th>
                        <th>@lang('lang.Role')</th>
                        <th>@lang('lang.Permission')</th>
                        <th>@lang('lang.Action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th>1</th>
                            <td>Peter</td>
                            <td>peter@email.com</td>
                            <td>12357678</td>
                            <td>{{ $user['role'] }}</td>
                            <td>Create / Update / Delete</td>
                            <td>
                                <button d="addmodal" data-modal-target="addteachermodal"
                                    data-modal-toggle="addteachermodal"
                                    class="bg-secondary py-2 px-4  font-bold text-white rounded-md ">Change
                                    Permission</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>
</div>


<!-- Add  Teacher  modal -->
<div id="addteachermodal" data-modal-backdrop="static"
    class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full ">
        <form id="teacher_data" enctype="multipart/form-data" method="post">
            @csrf
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  ">
                <div class="flex items-center  justify-center  p-5  rounded-t dark:border-gray-600 bg-primary">
                    <h3 class="text-xl font-semibold text-white text-center">
                        @lang('lang.Change_Permission')
                    </h3>
                    <button type="button"
                        class="cursor-pointer absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto "
                        data-modal-hide="addteachermodal">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
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
                            @lang('lang.Change_Permission')
                        </div>

                    </button>

                </div>
            </div>
        </form>
        <div>

        </div>

    </div>
</div>



@include('layouts.footer')

<script>
    // get selected update  data
    $('.updateBtn').click(function() {
        var updateId = $(this).attr('updateId');
        var url = "../teacherUpdataData/" + updateId;

        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function(response) {
                var teacher = response.teacher;
                $('#update_id').val(teacher.id);
                $('#englishName').val(teacher.first_name);
                $('#chineseName').val(teacher.last_name);
                $('#udob').val(teacher.dob);
                $('#ugender').val(teacher.gender);
                $('#uphoneNo').val(teacher.phone_no);
                $('#uemail').val(teacher.email);
                $('#usubject').val(teacher.subject);
                $('#uaddress').val(teacher.address);
                $('#uskill').val(teacher.skill);
                $('#ujoindate').val(teacher.join_date);
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
    // update teacher data
    $(document).ready(function() {
        $("#teacherupdatedata").submit(function(event) {
            var updateId = $('#update_id').val();
            var url = "../teacherUpdataData/" + updateId;
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
                    $('#uspinner').removeClass('hidden');
                    $('#utext').addClass('hidden');
                    $('#uaddBtn').attr('disabled', true);
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

                    $('#utext').removeClass('hidden');
                    $('#uspinner').addClass('hidden');
                    $('#uaddBtn').attr('disabled', false);
                }
            });
        });
    });
    // insert  teacher data
    $(document).ready(function() {
        $("#teacher_data").submit(function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "../addteacher",
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
    });
</script>
