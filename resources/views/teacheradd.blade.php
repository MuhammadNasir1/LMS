@include('layouts.header')

<div class="mx-4 mt-12">
    <div>
        <h1 class=" font-semibold   text-2xl ">All Teachers</h1>
    </div>

    <div class="shadow-dark mt-3  rounded-xl pt-8  bg-white">
        <div>
                <div class="flex justify-between px-[20px] mb-3">
                    <h3  class="text-[20px] text-black">Teachers List</h3>
                    <button data-modal-target="addteachermodal" data-modal-toggle="addteachermodal" class="bg-primary text-white h-12 px-5 rounded-[6px]  shadow-sm font-semibold " >+ Add Teacher</button>
                </div>
            <table id="datatable" class="overflow-scroll">
                <thead class="py-6 bg-primary text-white">
                    <tr>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Subject</th>
                        <th>Joining Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr  class="pt-4">
                        <td >John Smith</td>
                        <td>1234565  54</td>
                        <td>abc@email.com</td>
                        <td>Town, City, Country</td>
                        <td>Male</td>
                        <td>Math</td>
                        <td>12/30 2010</td>

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


  <!-- Add  Teacher  modal -->
  <div id="addteachermodal" data-modal-backdrop="static" class="hidden overflow-y-auto overflow-x-hidden fixed  left-0 z-50 justify-center  w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-7xl max-h-full ">
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 ">
              <div class="flex items-center justify-center  p-5  rounded-t dark:border-gray-600 bg-primary">
                  <h3 class="text-xl font-semibold text-white text-center">
                    Add Teacher
                  </h3>
                  <button type="button" class=" absolute right-2 text-white bg-transparent rounded-lg text-sm w-8 h-8 ms-auto " data-modal-hide="addteachermodal">
                      <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>

          </div>
         <div>

         </div>

      </div>
  </div>




@include('layouts.footer')
