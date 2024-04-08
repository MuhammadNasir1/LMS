@include('layouts.header')
@include('video.includes.nav')
<section class="mx-16 mt-10 ">
    <div class="shadow-dark mt-3  rounded-xl   bg-white h-[70vh] ">

        <div class=" w-full h-full z-20">


            <div id="controls-carousel" class="relative w-full h-full  " data-carousel="static">
                <!-- Carousel wrapper -->
                <div class="relative h-full overflow-hidden rounded-lg ">
                    <!-- word 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                        <div>
                            <h2
                                class="absolute  top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-[200px] text-[#EC1C24] font-bold font-mono">
                                A</h2>
                        </div>
                    </div>
                    <!-- word 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div>
                            <h2
                                class="absolute  top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-[200px] text-[#EC1C24] font-bold font-mono">
                                B</h2>
                        </div>
                    </div>
                    <!-- word 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div>
                            <h2
                                class="absolute  top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-[200px] text-[#EC1C24] font-bold font-mono">
                                C</h2>
                        </div>
                    </div>

                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div>
                            <h2
                                class="absolute  top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-[200px] text-[#EC1C24] font-bold font-mono">
                                D</h2>
                        </div>
                    </div>
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
    <div class="mt-4 flex  justify-between">
        <div class="flex items-center  gap-5">
            <button id="preBtn"
                class="w-32 bg-secondary rounded-md h-12 text-white font-semibold text-xl">@lang('lang.Previous')</button>

        </div>
        <div class="flex gap-4">
            <button class=""> <svg width="50" height="51" viewBox="0 0 50 51" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect y="0.478516" width="50" height="50" rx="25" fill="#339B96" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M23.9517 13.6636C24.8353 14.1084 24.9942 15.0742 24.9942 15.6633V36.2947C24.9942 36.8851 24.8339 37.8487 23.9516 38.2931C23.015 38.765 22.1422 38.234 21.6984 37.8354L14.9356 31.7573H12.499C11.1189 31.7573 10 30.6384 10 29.2583L10 22.7763C10 21.3961 11.1189 20.2772 12.499 20.2772H14.9314L21.6984 14.1226C22.1407 13.7252 23.0138 13.1914 23.9517 13.6636ZM22.4952 16.776L16.2553 22.4511C16.0253 22.6603 15.7255 22.7763 15.4146 22.7763H12.499L12.499 29.2583H15.4146C15.723 29.2583 16.0205 29.3723 16.2498 29.5784L22.4952 35.1914V16.776Z"
                        fill="white" />
                    <path
                        d="M29.1 21.0332C28.4388 20.8355 27.7425 21.2112 27.5449 21.8724C27.3472 22.5336 27.7229 23.2298 28.3842 23.4275C29.2046 23.6727 29.9916 24.6305 29.9916 25.9788C29.9916 27.3272 29.2046 28.285 28.3842 28.5302C27.7229 28.7279 27.3472 29.4241 27.5449 30.0854C27.7425 30.7465 28.4388 31.1222 29.1 30.9246C31.1537 30.3105 32.4906 28.2375 32.4906 25.9788C32.4906 23.7202 31.1537 21.6472 29.1 21.0332Z"
                        fill="white" />
                </svg>
            </button>
            <button>
                <svg width="51" height="50" viewBox="0 0 51 50" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect width="50" height="50" rx="25" fill="#339B96" />
                    <circle cx="41.1304" cy="9.13043" r="9.13043" fill="#EDBD58" />
                    <path
                        d="M38.3465 12.3385C39.7225 11.4425 40.7545 10.6185 41.4425 9.86652C42.1385 9.10652 42.4865 8.39852 42.4865 7.74252C42.4865 7.22252 42.3665 6.83452 42.1265 6.57852C41.8945 6.32252 41.5425 6.19451 41.0705 6.19451C40.7665 6.19451 40.4865 6.28252 40.2305 6.45852C39.9825 6.62652 39.7785 6.85852 39.6185 7.15452C39.4665 7.45052 39.3785 7.78652 39.3545 8.16252C39.0585 8.13052 38.8305 8.03052 38.6705 7.86252C38.5105 7.68652 38.4305 7.46252 38.4305 7.19052C38.4305 6.77452 38.5545 6.40652 38.8025 6.08651C39.0505 5.76652 39.3985 5.51852 39.8465 5.34252C40.3025 5.16652 40.8265 5.07852 41.4185 5.07852C41.9305 5.07852 42.3825 5.17452 42.7745 5.36651C43.1665 5.55051 43.4705 5.81452 43.6865 6.15852C43.9025 6.50252 44.0105 6.89452 44.0105 7.33452C44.0105 7.87852 43.8545 8.42252 43.5425 8.96652C43.2385 9.51052 42.7505 10.0945 42.0785 10.7185C41.4145 11.3425 40.5185 12.0505 39.3905 12.8425L38.3465 12.3385ZM42.7745 13.8385C42.3185 13.8385 41.8585 13.7865 41.3945 13.6825C40.9305 13.5785 40.2985 13.3825 39.4985 13.0945L39.4625 13.0825C39.2305 13.3225 39.0185 13.4905 38.8265 13.5865C38.6425 13.6905 38.4425 13.7425 38.2265 13.7425C38.0105 13.7425 37.8265 13.6705 37.6745 13.5265C37.5305 13.3825 37.4585 13.2065 37.4585 12.9985C37.4585 12.6545 37.5985 12.3745 37.8785 12.1585C38.1585 11.9425 38.5105 11.8345 38.9345 11.8345C39.1425 11.8345 39.3945 11.8705 39.6905 11.9425C39.9865 12.0065 40.3505 12.1025 40.7825 12.2305C41.2945 12.3745 41.6985 12.4825 41.9945 12.5545C42.2905 12.6185 42.5505 12.6505 42.7745 12.6505L44.0945 11.9305C44.2065 12.1065 44.2825 12.2545 44.3225 12.3745C44.3705 12.4945 44.3945 12.6105 44.3945 12.7225C44.3945 12.9305 44.3225 13.1225 44.1785 13.2985C44.0345 13.4665 43.8385 13.5985 43.5905 13.6945C43.3425 13.7905 43.0705 13.8385 42.7745 13.8385Z"
                        fill="white" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M23.9517 13.1851C24.8353 13.6299 24.9942 14.5957 24.9942 15.1848V35.8162C24.9942 36.4066 24.8339 37.3702 23.9516 37.8145C23.015 38.2865 22.1422 37.7554 21.6984 37.3568L14.9356 31.2788H12.499C11.1189 31.2788 10 30.1599 10 28.7798L10 22.2978C10 20.9176 11.1189 19.7987 12.499 19.7987H14.9314L21.6984 13.6441C22.1407 13.2467 23.0138 12.7129 23.9517 13.1851ZM22.4952 16.2974L16.2553 21.9726C16.0253 22.1818 15.7255 22.2978 15.4146 22.2978H12.499L12.499 28.7798H15.4146C15.723 28.7798 16.0205 28.8937 16.2498 29.0999L22.4952 34.7129V16.2974Z"
                        fill="white" />
                    <path
                        d="M29.2701 16.5523L29.2701 16.5523C29.1588 16.951 29.3919 17.3644 29.7905 17.4757L29.2701 16.5523ZM29.2701 16.5523C29.3813 16.1536 29.7947 15.9205 30.1935 16.0318L29.2701 16.5523ZM30.1934 34.9689L30.1935 34.9689C34.1362 33.8687 36.9891 30.0171 36.9891 25.5003C36.9891 20.9836 34.1362 17.132 30.1935 16.0318L30.1934 34.9689ZM30.1934 34.9689C29.7947 35.0802 29.3813 34.8471 29.2701 34.4485C29.1588 34.0496 29.3919 33.6362 29.7905 33.525L29.7905 33.525M30.1934 34.9689L29.7905 33.525M29.7905 33.525C33.0324 32.6204 35.4901 29.4009 35.4901 25.5003M29.7905 33.525L35.4901 25.5003M35.4901 25.5003C35.4901 21.5998 33.0324 18.3803 29.7905 17.4757L35.4901 25.5003Z"
                        stroke="white" />
                    <path
                        d="M29.1 20.5546C28.4388 20.357 27.7425 20.7327 27.5449 21.3939C27.3472 22.055 27.7229 22.7513 28.3842 22.949C29.2046 23.1942 29.9916 24.152 29.9916 25.5003C29.9916 26.8487 29.2046 27.8064 28.3842 28.0517C27.7229 28.2494 27.3472 28.9456 27.5449 29.6069C27.7425 30.268 28.4388 30.6437 29.1 30.446C31.1537 29.832 32.4906 27.759 32.4906 25.5003C32.4906 23.2417 31.1537 21.1687 29.1 20.5546Z"
                        fill="white" />
                </svg>

            </button>
            <button>
                <svg width="51" height="50" viewBox="0 0 51 50" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect width="50" height="50" rx="25" fill="#339B96" />
                    <circle cx="41.1304" cy="9.13043" r="9.13043" fill="#EDBD58" />
                    <path
                        d="M40.4153 14.872C39.7353 14.872 39.2273 14.78 38.8913 14.596C38.5633 14.412 38.3993 14.136 38.3993 13.768C38.3993 13.536 38.4913 13.344 38.6753 13.192C38.8673 13.04 39.0993 12.964 39.3713 12.964C39.6113 12.964 39.8473 13.052 40.0793 13.228C40.3113 13.404 40.5033 13.644 40.6553 13.948C41.1353 13.948 41.5753 13.856 41.9753 13.672C42.3753 13.488 42.6913 13.236 42.9233 12.916C43.1553 12.596 43.2713 12.244 43.2713 11.86C43.2713 11.516 43.1753 11.192 42.9833 10.888C42.7993 10.576 42.5753 10.38 42.3113 10.3C41.7833 10.652 41.3353 10.828 40.9673 10.828C40.7513 10.828 40.5673 10.764 40.4153 10.636C40.2713 10.5 40.1993 10.336 40.1993 10.144C40.1993 9.864 40.3193 9.64 40.5593 9.472C40.8073 9.304 41.1313 9.22 41.5313 9.22C42.1553 9.22 42.7153 9.332 43.2113 9.556C43.7073 9.772 44.0953 10.072 44.3753 10.456C44.6553 10.84 44.7953 11.276 44.7953 11.764C44.7953 12.356 44.6073 12.888 44.2313 13.36C43.8553 13.832 43.3313 14.2 42.6593 14.464C41.9953 14.736 41.2473 14.872 40.4153 14.872ZM41.5553 9.592C42.1233 9.384 42.5793 9.068 42.9233 8.644C43.2673 8.22 43.4393 7.76 43.4393 7.264C43.4393 6.744 43.3233 6.356 43.0913 6.1C42.8593 5.844 42.5073 5.716 42.0353 5.716C41.7153 5.716 41.4193 5.804 41.1473 5.98C40.8833 6.148 40.6633 6.384 40.4873 6.688C40.3193 6.984 40.2233 7.316 40.1993 7.684C39.9113 7.644 39.6833 7.54 39.5153 7.372C39.3553 7.204 39.2753 6.984 39.2753 6.712C39.2753 6.296 39.4033 5.928 39.6593 5.608C39.9153 5.288 40.2793 5.04 40.7513 4.864C41.2233 4.688 41.7673 4.6 42.3833 4.6C42.8793 4.6 43.3233 4.696 43.7153 4.888C44.1073 5.08 44.4113 5.348 44.6273 5.692C44.8513 6.036 44.9633 6.424 44.9633 6.856C44.9633 7.424 44.7713 7.98 44.3873 8.524C44.0113 9.06 43.4673 9.552 42.7553 10L41.5553 9.592Z"
                        fill="white" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M23.9517 13.1851C24.8353 13.6299 24.9942 14.5957 24.9942 15.1848V35.8162C24.9942 36.4066 24.8339 37.3702 23.9516 37.8145C23.015 38.2865 22.1422 37.7554 21.6984 37.3568L14.9356 31.2788H12.499C11.1189 31.2788 10 30.1599 10 28.7798L10 22.2978C10 20.9176 11.1189 19.7987 12.499 19.7987H14.9314L21.6984 13.6441C22.1407 13.2467 23.0138 12.7129 23.9517 13.1851ZM22.4952 16.2974L16.2553 21.9726C16.0253 22.1818 15.7255 22.2978 15.4146 22.2978H12.499L12.499 28.7798H15.4146C15.723 28.7798 16.0205 28.8937 16.2498 29.0999L22.4952 34.7129V16.2974Z"
                        fill="white" />
                    <path
                        d="M28.7885 16.4179C28.9739 15.7532 29.6631 15.3647 30.3279 15.5502C34.5048 16.7157 37.4891 20.7785 37.4891 25.5003C37.4891 30.2223 34.5048 34.285 30.3279 35.4505C29.6631 35.6361 28.9739 35.2475 28.7885 34.5828C28.603 33.9181 28.9915 33.2289 29.6561 33.0434C32.6648 32.2039 34.9901 29.1948 34.9901 25.5003C34.9901 21.8059 32.6648 18.7968 29.6561 17.9573C28.9915 17.7718 28.603 17.0826 28.7885 16.4179Z"
                        fill="white" />
                    <path
                        d="M29.1 20.5546C28.4388 20.357 27.7425 20.7327 27.5449 21.3939C27.3472 22.055 27.7229 22.7513 28.3842 22.949C29.2046 23.1942 29.9916 24.152 29.9916 25.5003C29.9916 26.8487 29.2046 27.8064 28.3842 28.0517C27.7229 28.2494 27.3472 28.9456 27.5449 29.6069C27.7425 30.268 28.4388 30.6437 29.1 30.446C31.1537 29.832 32.4906 27.759 32.4906 25.5003C32.4906 23.2417 31.1537 21.1687 29.1 20.5546Z"
                        fill="white" />
                </svg>

            </button>
            <button class="w-[140px] h-[45px] rounded-full bg-primary flex justify-center gap-2  items-center">
                <svg width="15" height="25" viewBox="0 0 15 25" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M13.9517 0.185109C14.8353 0.629899 14.9942 1.59569 14.9942 2.18479V22.8162C14.9942 23.4066 14.8339 24.3702 13.9516 24.8145C13.015 25.2865 12.1422 24.7554 11.6984 24.3568L4.93561 18.2788H2.49905C1.11887 18.2788 1.25121e-05 17.1599 1.25121e-05 15.7798L0 9.29775C0 7.91757 1.11886 6.79872 2.49903 6.79872H4.93136L11.6984 0.644107C12.1407 0.24671 13.0138 -0.287071 13.9517 0.185109ZM12.4952 3.29744L6.25531 8.97261C6.02529 9.18182 5.72553 9.29775 5.41458 9.29775H2.49903L2.49905 15.7798H5.41458C5.72298 15.7798 6.02046 15.8937 6.24982 16.0999L12.4952 21.7129V3.29744Z"
                        fill="white" />
                </svg>
                <input class="w-[80px] appearance-none rounded-full bg-white h-1 range" type="range" name=""
                    id="">
            </button>
        </div>
        <div>
            <button id="nBtn"
                class="w-32 bg-secondary rounded-md h-12 text-white font-semibold text-lg">@lang('lang.Next')</button>
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
