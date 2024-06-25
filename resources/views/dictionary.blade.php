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
        <h1 class=" font-semibold   text-2xl ">Dictionary</h1>
    </div>

    <div id="reloadDiv" class="shadow-dark mt-3 flex justify-center items-center  h-[60vh] rounded-xl pt-8  bg-white">
        <h1 class="text-3xl font-bold">Comming Soon</h1>
    </div>
</div>

<script>
    let fileInput = document.getElementById('user_image');
    let imageView = document.getElementById('img_view');

    fileInput.addEventListener('change', function() {
        const file = this.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            imageView.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    });
</script>

@include('layouts.footer')

<script>
    $(document).ready(function() {
        $("#setting_data").submit(function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "../updateSettings",
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
                        window.location.href = '../setting';
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

        $('#language').change(function() {
            var selectedLanguage = $(this).val();
            var url = "../lang?lang=" + selectedLanguage;
            window.location.href = url;
        });

    });
</script>
