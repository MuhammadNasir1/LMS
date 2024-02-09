@include('layouts.header')
@include('admin.includes.nav')

<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">@lang('lang.All_Courses')</h1>
    </div>

    <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
        <form action="#" method="">
            @csrf
            <div class="p-8">
                <div class="flex items-center flex-col gap-2">
                    <div class="h-[200px] w-[200px] relative  rounded-[50%]">
                        <img id="img_view" height="200px" width="200px"
                            class="h-[200px] w-[200px]   rounded-[50%] cursor-pointer object-cover "
                            src="{{ asset('images/maleuser.png') }}" alt="user">
                        <input class="absolute top-0 hidden    h-[210px] w-[200px] z-50 cursor-pointer " type="file"
                            name="user_image" id="user_image">
                        <div class="absolute bottom-[6px] right-5  z-10">
                            <button type="button">
                                <svg width="42" height="42" viewBox="0 0 36 36" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="18" cy="18" r="18" fill="#EDBD58" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M16.1627 23.6197L22.3132 15.666C22.6474 15.2371 22.7663 14.7412 22.6549 14.2363C22.5583 13.7773 22.276 13.3408 21.8526 13.0097L20.8201 12.1895C19.9213 11.4747 18.8071 11.5499 18.1683 12.3701L17.4775 13.2663C17.3883 13.3785 17.4106 13.544 17.522 13.6343C17.522 13.6343 19.2676 15.0339 19.3048 15.064C19.4236 15.1769 19.5128 15.3274 19.5351 15.508C19.5722 15.8616 19.3271 16.1927 18.9631 16.2379C18.7922 16.2605 18.6288 16.2078 18.51 16.11L16.6752 14.6502C16.5861 14.5832 16.4524 14.5975 16.3781 14.6878L12.0178 20.3314C11.7355 20.6851 11.639 21.1441 11.7355 21.588L12.2927 24.0035C12.3224 24.1314 12.4338 24.2217 12.5675 24.2217L15.0188 24.1916C15.4645 24.1841 15.8804 23.9809 16.1627 23.6197ZM19.5948 22.8676H23.5918C23.9818 22.8676 24.299 23.1889 24.299 23.5839C24.299 23.9797 23.9818 24.3003 23.5918 24.3003H19.5948C19.2048 24.3003 18.8876 23.9797 18.8876 23.5839C18.8876 23.1889 19.2048 22.8676 19.5948 22.8676Z"
                                        fill="white" />
                                </svg>
                            </button>

                        </div>
                    </div>
                    <p class="text-[#ACADAE]  text-[16px]">Lorumipsum@email.com</p>
                </div>
                <div class="flex gap-[30px] mt-3">
                    <div class="w-[50%] mt-4">
                        <label class="text-[16px] font-semibold block  text-[#452C88]"
                            for="username">@lang('lang.full_name')</label>
                        <input type="text"
                            class="w-full mt-2  border-2 border-[#DEE2E6] rounded-[6px] focus:border-primary   h-[46px] text-[14px]"
                            name="username" id="username" placeholder="@lang('lang.Enter_Your_Name')">
                    </div>

                    <div class="w-[50%] mt-4">
                        <label class="text-[16px] font-semibold block  text-[#452C88]"
                            for="phone_no">@lang('lang.Phone_number')</label>
                        <input type="number"
                            class="w-full mt-2  border-2 border-[#DEE2E6] rounded-[6px] focus:border-primary   h-[46px] text-[14px]"
                            name="phone_no" id="phone_no" placeholder="@lang('lang.Enter_Your_Number')">
                    </div>
                </div>

                <div class="flex gap-[30px] mt-4">
                    <div class="w-[50%] mt-4">
                        <label class="text-[16px] font-semibold block  text-[#452C88]"
                            for="city">@lang('lang.city')</label>
                        <input type="text"
                            class="w-full mt-2  border-2 border-[#DEE2E6] rounded-[6px] focus:border-primary   h-[46px] text-[14px]"
                            name="city" id="city" placeholder="@lang('lang.Enter_City')">
                    </div>

                    <div class="w-[50%] mt-4">
                        <label class="text-[16px] font-semibold block  text-[#452C88]"
                            for="country">@lang('lang.Country')</label>
                        <input type="text"
                            class="w-full mt-2  border-2 border-[#DEE2E6] rounded-[6px] focus:border-primary   h-[46px] text-[14px]"
                            name="country" id="country" placeholder="@lang('lang.Enter_country')">
                    </div>
                </div>

                <div class="flex gap-[30px] mt-4">
                    <div class="w-[100%] mt-4">
                        <label class="text-[16px] font-semibold block  text-[#452C88]"
                            for="language">@lang('lang.Change_Language')</label>
                        <select
                            class="w-full mt-2 border-2 border-[#DEE2E6] rounded-[6px] focus:border-primary   h-[46px] text-[14px]"
                            name="language" id="language">
                            <option value="">@lang('lang.Select_Language')</option>
                        </select>
                    </div>

                </div>
                <div class="flex gap-[30px] mt-4">
                    <div class="w-[50%] mt-4">
                        <label class="text-[16px] font-semibold block  text-[#452C88]"
                            for="oldPass">@lang('lang.Old_Password')</label>
                        <input type="password"
                            class="w-full mt-2  border-2 border-[#DEE2E6] rounded-[6px] focus:border-primary   h-[46px] text-[14px]"
                            name="old_pass" id="oldPass" placeholder="@lang('lang.Enter_Old_Password')">
                    </div>
                    <div class="w-[50%] mt-4">
                        <label class="text-[16px] font-semibold block  text-[#452C88]"
                            for="newPass">@lang('lang.New_Password')</label>
                        <input type="password"
                            class="w-full mt-2  border-2 border-[#DEE2E6] rounded-[6px] focus:border-primary   h-[46px] text-[14px]"
                            name="new_pass" id="newPass" placeholder="@lang('lang.Enter_New_Password')">
                    </div>
                    <div class="w-[50%] mt-4">
                        <label class="text-[16px] font-semibold block  text-[#452C88]"
                            for="conPass">@lang('lang.Confirm_Password')</label>
                        <input type="password"
                            class="w-full mt-2  border-2 border-[#DEE2E6] rounded-[6px] focus:border-primary   h-[46px] text-[14px]"
                            name="con_pass" id="conPass" placeholder="@lang('lang.Enter_Confirm_Password')">
                    </div>

                </div>

                <div class="mt-10  flex justify-end">
                    <button class="bg-secondary  text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold ">
                        @lang('lang.Update')
                    </button>
                </div>
            </div>
        </form>
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
