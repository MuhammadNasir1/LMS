@include('layouts.header')

<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">All Students</h1>
    </div>

    <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
        <div>
                <div class="flex justify-between px-[20px] mb-Students">
                    <h3  class="text-[20px] text-black">Students List</h3>
                    <x-button color="secondary"> + Add Students </x-button>
                </div>
            <table id="datatable" class="overflow-scroll">
                <thead class="py-6 bg-primary text-white">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Child(ren)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr  class="pt-4">
                        <td >John Smith</td>
                        <td>abc@email.com</td>
                        <td>1234565  54</td>
                        <td>Town, City, Country</td>
                        <td>Male</td>
                        <td>Lorem, ipsum</td>
                        <td class="flex gap-5">
                        <a href="#"><img width="38px" src="{{asset('images/icons/delete.svg')}}" alt="delete"></a>
                        <a href="#"><img width="38px" src="{{asset('images/icons/update.svg')}}" alt="update"></a>
                        <a href="#"><img width="38px" src="{{asset('images/icons/view.svg')}}" alt="View"></a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>


@include('layouts.footer')
