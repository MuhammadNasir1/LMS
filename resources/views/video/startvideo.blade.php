@php

    $teachingData = session('teachingData');
@endphp
@include('layouts.header')
@include('video.includes.nav')
<section class="mx-16 mt-10 ">
    <div class="shadow-dark mt-3  rounded-xl   bg-white h-[70vh] ">

        <div class=" w-full h-full z-20">


            <div id="controls-carousel" class="relative w-full h-full  " data-carousel="static">
                <!-- Carousel wrapper -->
                <div class="relative h-full overflow-hidden rounded-lg ">
                    <!-- word 1 -->
                    @foreach ($teachingData as $teachingData)
                        <div class="hidden duration-700 ease-in-out " data-carousel-item="active">
                            <div>
                                <h2
                                    class="absolute  top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-[200px] text-[#EC1C24] font-bold font-mono">
                                    {{ $teachingData->word }}</h2>
                            </div>
                            {{-- audio controlls --}}
                            <div class="">
                                <div class="ml-6 pr-12 absolute top-[85%] w-full">
                                    <div class="mt-4 flex   justify-between">
                                        <div class="flex items-center  gap-5">
                                            <button id="preBtn"
                                                class="w-32 bg-secondary rounded-md h-12 text-white font-semibold text-xl">@lang('lang.Previous')</button>
                                        </div>
                                        <div class="flex gap-4">
                                            <button>
                                                <img src="{{ asset('images/icons/audio-1.svg') }}" alt="audio-1">
                                            </button>
                                            <button>
                                                <img src="{{ asset('images/icons/audio-2.svg') }}" alt="audio-2">

                                            </button>
                                            <button>
                                                <img src="{{ asset('images/icons/audio-3.svg') }}" alt="audio-3">

                                            </button>
                                            <button
                                                class="w-[140px] h-[45px] rounded-full bg-primary flex justify-center gap-2  items-center">
                                                <img src="{{ asset('images/icons/audio.svg') }}" alt="audio-3">
                                                <input class="w-[80px] appearance-none rounded-full bg-white h-1 range"
                                                    type="range" name="" id="">
                                            </button>
                                        </div>
                                        <div>
                                            <button id="nBtn"
                                                class="w-32 bg-secondary rounded-md h-12 text-white font-semibold text-lg">@lang('lang.Next')</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>
                <!-- Slider controls -->
                <button type="button" id="CPrebtn"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer "
                    data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full ">
                        <svg class="w-8 h-8 text-primary " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" id="CNexbtn"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer "
                    data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full">
                        <svg class="w-8 h-8 text-primary " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>

        </div>
    </div>


    <div class="mt-8 mb-8  flex  justify-center">
        <div class="flex items-center  gap-5">
            <button
                class=" bg-secondary px-4 rounded-md h-12 text-white font-semibold text-xl">@lang('lang.Teaching_Page')</button>
            <button
                class=" bg-secondary px-4 rounded-md h-12 text-white font-semibold text-xl">@lang('lang.Games')</button>
            <button id="recordButton"
                class=" bg-secondary px-4 rounded-md h-12 text-white font-semibold text-xl flex gap-2 items-center">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.0056 12.8569C11.5835 12.8569 12.8627 11.5777 12.8627 9.99972C12.8627 8.42176 11.5835 7.14258 10.0056 7.14258C8.42762 7.14258 7.14844 8.42176 7.14844 9.99972C7.14844 11.5777 8.42762 12.8569 10.0056 12.8569Z"
                        fill="#FF0000" />
                    <path
                        d="M10 0C4.5 0 0 4.5 0 10C0 15.5 4.5 20 10 20C15.5 20 20 15.5 20 10C20 4.5 15.5 0 10 0ZM10 14.2857C7.64286 14.2857 5.71429 12.3571 5.71429 10C5.71429 7.64286 7.64286 5.71429 10 5.71429C12.3571 5.71429 14.2857 7.64286 14.2857 10C14.2857 12.3571 12.3571 14.2857 10 14.2857Z"
                        fill="white" />
                </svg>
                @lang('lang.Start_Recording')</button>
            <button
                class=" bg-secondary px-4 rounded-md h-12 text-white font-semibold text-xl">@lang('lang.Restart')</button>
        </div>
    </div>
    <div id="fileInputContainer">

    </div>
    <video id="recordedVideo" controls width="200px"></video>
    <a id="downloadLink" style="display: none">Download Recorded Video</a>
</section>
@include('layouts.footer')
<script src="https://cdn.WebRTC-Experiment.com/RecordRTC.js"></script>
<script>
    let tabStream;
    let audioStream;
    let recorder;
    let isRecording = false;
    const recordButton = document.getElementById("recordButton");
    const recordedVideo = document.getElementById("recordedVideo");
    const downloadLink = document.getElementById("downloadLink");
    const fileInputContainer = document.getElementById("fileInputContainer");

    recordButton.addEventListener("click", toggleRecording);

    async function toggleRecording() {
        if (!isRecording) {
            startRecording();
        } else {
            stopRecording();
        }
    }

    async function startRecording() {
        tabStream = await navigator.mediaDevices.getDisplayMedia({
            video: {
                mediaSource: "tab"
            },
        });
        audioStream = await navigator.mediaDevices.getUserMedia({
            audio: true,
        });

        const combinedStream = new MediaStream([
            ...tabStream.getTracks(),
            ...audioStream.getTracks(),
        ]);

        recorder = RecordRTC(combinedStream, {
            type: "video"
        });
        recorder.startRecording();

        isRecording = true;
        recordButton.innerHTML = "Stop Recording";
    }

    function stopRecording() {
        recorder.stopRecording(() => {
            const blob = recorder.getBlob();
            const url = URL.createObjectURL(blob);
            recordedVideo.src = url;

            downloadLink.href = url;
            downloadLink.download = "recording.webm";
            downloadLink.style.display = "block";

            const file = new File([blob], "recording.webm", {
                type: "video/webm",
            });

            const fileInput = document.createElement("input");
            fileInput.type = "file";
            fileInput.accept = "video/webm";
            fileInput.multiple = false;

            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            fileInput.files = dataTransfer.files;

            fileInputContainer.appendChild(fileInput);

            isRecording = false;
            recordButton.textContent = "Start Recording";
        });

        tabStream.getTracks().forEach((track) => track.stop());
        audioStream.getTracks().forEach((track) => track.stop());
    }
</script>
<script>
    let Cnextbtn = document.getElementById('CNexbtn')
    let Cprebtn = document.getElementById('CPrebtn')
    let prebtn = document.getElementById('preBtn')
    let nbtn = document.getElementById('nBtn')
    prebtn.addEventListener('click', () => {

        Cprebtn.click()
    });
    nbtn.addEventListener('click', () => {

        Cnextbtn.click()
    });
</script>
