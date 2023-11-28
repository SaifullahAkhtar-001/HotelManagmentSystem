<div class="absolute bottom-0 h-[15vh] w-full bg-stone-800 bg-opacity-70 flex justify-center items-center">
    <form>
        <div class="flex gap-4 mx-auto max-w-fit ">
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg fill="currentColor" class="w-4 h-4 text-gray-700" xmlns="http://www.w3.org/2000/svg"
                         fill-rule="evenodd"
                         clip-rule="evenodd">
                        <path d="M1 22h2v-22h18v22h2v2h-22v-2zm7-3v4h3v-4h-3zm5 0v4h3v-4h-3zm-6-5h-2v2h2v-2zm8 0h-2v2h2v-2zm-4 0h-2v2h2v-2zm8 0h-2v2h2v-2zm-12-4h-2v2h2v-2zm8 0h-2v2h2v-2zm-4 0h-2v2h2v-2zm8 0h-2v2h2v-2zm-12-4h-2v2h2v-2zm8 0h-2v2h2v-2zm-4 0h-2v2h2v-2zm8 0h-2v2h2v-2zm-12-4h-2v2h2v-2zm8 0h-2v2h2v-2zm-4 0h-2v2h2v-2zm8 0h-2v2h2v-2z"/>
                    </svg>
                </div>
                <input name="end" type="text" for="location"
                       class="border border-gray-300 placeholder-gray-700 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 "
                       placeholder="Location">
            </div>

            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg fill="currentColor" class="w-4 h-4 text-gray-700" xmlns="http://www.w3.org/2000/svg"
                         fill-rule="evenodd"
                         clip-rule="evenodd">
                        <path d="M1 22h2v-22h18v22h2v2h-22v-2zm7-3v4h3v-4h-3zm5 0v4h3v-4h-3zm-6-5h-2v2h2v-2zm8 0h-2v2h2v-2zm-4 0h-2v2h2v-2zm8 0h-2v2h2v-2zm-12-4h-2v2h2v-2zm8 0h-2v2h2v-2zm-4 0h-2v2h2v-2zm8 0h-2v2h2v-2zm-12-4h-2v2h2v-2zm8 0h-2v2h2v-2zm-4 0h-2v2h2v-2zm8 0h-2v2h2v-2zm-12-4h-2v2h2v-2zm8 0h-2v2h2v-2zm-4 0h-2v2h2v-2zm8 0h-2v2h2v-2zm-12-4h-2v2h2v-2zm8 0h-2v2h2v-2zm-4 0h-2v2h2v-2zm8 0h-2v2h2v-2z"/>
                    </svg>
                </div>
                <select name="end" for="hotel_name"
                        class="border border-gray-300 placeholder-gray-700 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pr-[6rem] w-full ps-10 p-2.5">
                    <option value="option1">Hotel 1</option>
                    <option value="option2">Hotel 2</option>
                    <option value="option3">Hotel 3</option>
                </select>
            </div>

            <div class="flex items-center">
                    <input name="start" type="date" for="check_in"
                           class="bg-gray-50 placeholder-gray-700 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-4 pe-6 p-2.5">
                    <span class="mx-4">to</span>
                    <input name="end" type="date" for="check_out"
                           class="border border-gray-300 placeholder-gray-700 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-4 pe-6 p-2.5 ">
            </div>
            <div>
                <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-12 py-3  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Search
                </button>
            </div>
        </div>
    </form>

</div>
