<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           
        </h2>
    </x-slot>

    <div x-data="{ show: false }">
        <div x-show="show" tabindex="0" id="event" class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
            <div  @click.away="show = false" class="z-50 relative p-3 mx-auto my-0 max-w-full" style="width: 600px;">
                <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden">
                    <button @click={show=false} id="fermer" class="fill-current h-6 w-6 absolute right-0 top-0 m-6 font-3xl font-bold">&times;</button>
                    <div class="px-6 py-3 text-xl border-b font-bold">Title of the modal</div>
                    <div class="p-6 flex-grow">
                       
                        <form  action="" id="FormData" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                          @csrf
                          <div class="mb-4">
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="id" type="hidden" name="id" placeholder="Title">
                          </div>
                            <div class="mb-4">
                              <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Title
                              </label>
                              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" name="title" required placeholder="Title">
                            </div>
                            <div class="mb-6">
                              <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                Description
                              </label>
                              <input class="shadow appearance-none border border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="Desc" name="description" type="Desc" required placeholder="Description">
                             
                            </div>

                            <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                  Start Date
                                </label>
                                <input class="shadow appearance-none border border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="start" id="Start-D" required type="date" >
                              </div>


                              <div class="mb-6">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                  End Date
                                </label>
                                <input class="shadow appearance-none border border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="end" id="end-D" required type="date" >
                              </div>
                          

                    </div>
                    <div class="px-6 py-3 border-t">
                        <div class="flex justify-end">
                            <button @click={show=false} id="close" type="button" class="bg-gray-700 text-gray-100 rounded px-4 py-2 mr-1">Close</Button>
                            <button @click={show=false} id="btnDelete" type="button"  class="bg-red-700 text-gray-100 rounded px-4 py-2 mr-1">Delete</Button>
                            <button @click={show=false} id="btnUpdate" type="button"  class="bg-yellow-500 text-gray-100 rounded px-4 py-2 mr-1">Update</Button>
                            <button @click={show=false} id="btnAdd" type="button"  class="bg-blue-700 text-gray-100 rounded px-4 py-2 mr-1">Add</Button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            <div class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50"></div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <div id="agenda">
                </div>
    
            </div>



        </div>
    </div>


</x-app-layout>
