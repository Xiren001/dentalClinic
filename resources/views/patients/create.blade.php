<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Patient') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mb-8">
                        <div class="container card mt-5">
                            <div class="card-body">

                                <form action="{{ route('patients.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="flex flex-row space-y-4 gap-2">

                                        <div class="m gap-2">
                                            @error('image')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                            @enderror
                                            <div id="preview3" class="mb-4 w-52 h-52 img-area col-md-4 flex flex-col items-center justify-center border border-dashed border-gray-500 rounded mt-4 p-4 w-1/4">
                                                <i class='bx bxs-cloud-upload icon-UP'></i>
                                                <h3 class="text-center">Upload Image</h3>
                                                <p class="text-center">Image size - less than <span>2MB</span></p>
                                            </div>

                                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="inputImage" accept="image/*" onchange="getImagePreview3(event)">

                                        </div>

                                        <div class="flex flex-col space-y-4">
                                            <div class="flex flex-wrap -mx-3 mb-6">

                                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label for="inputFirstname" class="block uppercase tracking-wide text-gray-700 dark:text-gray-300 text-xs font-bold mb-2"><strong>First Name</strong></label>
                                                    <input type="text" name="firstname" class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('firstname') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="inputFirstname" placeholder="First Name">
                                                    @error('firstname')
                                                    <div class="form-text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label for="inputMiddlename" class="block uppercase tracking-wide text-gray-700 dark:text-gray-300 text-xs font-bold mb-2"><strong>Middle Name</strong></label>
                                                    <input type="text" name="middlename" class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('middlename') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="inputMiddlename" placeholder="Middle Name">
                                                    @error('middlename')
                                                    <div class="form-text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label for="inputLastname" class="block uppercase tracking-wide text-gray-700 dark:text-gray-300 text-xs font-bold mb-2"><strong>Last Name</strong></label>
                                                    <input type="text" name="lastname" class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('lastname') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="inputLastname" placeholder="Last Name">
                                                    @error('lastname')
                                                    <div class="form-text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label for="inputAddress" class="block uppercase tracking-wide text-gray-700 dark:text-gray-300 text-xs font-bold mb-2"><strong>Address</strong></label>
                                                    <input type="text" name="address" class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('address') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="inputAddress" placeholder="Address">
                                                    @error('address')
                                                    <div class="form-text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label for="inputSuffix" class="block uppercase tracking-wide text-gray-700 dark:text-gray-300 text-xs font-bold mb-2"><strong>Suffix</strong></label>
                                                    <div class="relative">
                                                        <select name="suffix" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="inputSuffix">
                                                            <option value="" selected disabled>Select Suffix</option>
                                                            <option value="Jr.">Jr.</option>
                                                            <option value="Sr.">Sr.</option>
                                                            <option value="II">II</option>
                                                            <option value="III">III</option>
                                                            <option value="IV">IV</option>
                                                            <option value="none">none</option>
                                                            <!-- Add more options as needed -->
                                                        </select>
                                                    </div>
                                                    @error('suffix')
                                                    <div class="form-text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label for="inputAge" class="block uppercase tracking-wide text-gray-700 dark:text-gray-300 text-xs font-bold mb-2"><strong>Age</strong></label>
                                                    <input type="number" name="age" class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('age') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="inputAge" placeholder="Age">
                                                    @error('age')
                                                    <div class="form-text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label for="inputGender" class="block uppercase tracking-wide text-gray-700 dark:text-gray-300 text-xs font-bold mb-2"><strong>Gender</strong></label>
                                                    <div class="relative">
                                                        <select name="gender" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="inputGender">
                                                            <option value="">Select Gender</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                    @error('gender')
                                                    <div class="form-text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label for="inputService" class="block uppercase tracking-wide text-gray-700 dark:text-gray-300 text-xs font-bold mb-2"><strong>Service</strong></label>
                                                    <div class="relative">
                                                        <select name="service" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="inputService">
                                                            <option value="">Select Service</option>
                                                            <option value="Check-Up">Check-Up</option>
                                                            <option value="Dental Cleaning">Dental Cleaning</option>
                                                            <option value="Dental Surgery">Dental Surgery</option>
                                                        </select>
                                                    </div>
                                                    @error('service')
                                                    <div class="form-text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label for="inputContactNumber" class="block uppercase tracking-wide text-gray-700 dark:text-gray-300 text-xs font-bold mb-2"><strong>Contact Number</strong></label>
                                                    <input type="number" name="contact_number" class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('contact_number') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="inputContactNumber" placeholder="Contact Number">
                                                    @error('contact_number')
                                                    <div class="form-text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer flex justify-end gap-2">
                                        <a class="custom-button" href="{{ route('patients.index') }}">Cancel</a>
                                        <button type="submit" class="custom-button"></i> Add</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <script>
                        function getImagePreview3(event) {
                            var image = URL.createObjectURL(event.target.files[0]);
                            var imagediv = document.getElementById('preview3');
                            var newimg = document.createElement('img');
                            imagediv.innerHTML = '';
                            newimg.src = image;
                            newimg.classList.add('w-full', 'h-full', 'object-cover', 'rounded');
                            imagediv.appendChild(newimg);
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>

    <style>
        .img-area {
            height: 300px;
            width: 300px;
        }
        .m{
            height: 320px;
            width: 300px;
        }

        .custom-button {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            background-color: #4f46e5;
            /* bg-indigo-600 */
            border: none;
            border-radius: 0.375rem;
            /* rounded-md */
            font-weight: 600;
            /* font-semibold */
            font-size: 0.75rem;
            /* text-xs */
            color: #ffffff;
            /* text-black */
            text-transform: uppercase;
            letter-spacing: 0.05em;
            /* tracking-widest */
            transition: background-color 0.3s ease-in-out;
        }

        .custom-button:hover {
            background-color: #4338ca;
            /* hover:bg-indigo-500 */
        }

        .custom-button:focus {
            outline: none;
            border-color: #3730a3;
            /* focus:border-indigo-700 */
            box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.25);
            /* focus:ring-indigo-200 */
        }

        .custom-button:active {
            background-color: #4f46e5;
            /* active:bg-indigo-600 */
        }
    </style>

</x-app-layout>