<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Explore</title>

            <!-- Fonts -->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

            <!-- Styles -->
            <script src="https://cdn.tailwindcss.com"></script>

            <script>
                tailwind.config = {
                    theme: {
                        extend: {
                            colors: {
                                // vert: '#008037',
                                // oldvert:'#007F5F',
                                // jaune: '#fde047',
                                // orange: '#ffb700'
                                purple: '#251048',
                                // red: '#d2142c',
                                // pink: '#e826a0',
                                // yellow: '#f5e10a',
                                // green:'#19a50e'
                            }
                        }
                    }
                }
            </script>
    </head>
    <body class="antialiased" x-data="{ isOpen : false}">

        <!-- header -->
        <header class="header my-8">
            <!-- container -->
            <div class="container px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto">
                <!-- header wrapper -->
                    <div class="header-wrapper flex items-center justify-between">

                        <!-- header logo -->
                        <div class="header-logo">
                            <p class="text-xl font-semibold"><span class="text-xl font-semibold text-purple-600" style="color:#d2142c">Maroc</span><span class="text-xl font-semibold text-purple-600" style="color:#19a50e"> Explore</span> </a></h1>
                        </div>

                        <!-- mobile toggle -->
                        <div class="toggle md:hidden">
                            <button @click=" isOpen = true" @keydown.escape=" isOpen = false">
                                <svg
                                    class="h-6 w-6 fill-current text-black"
                                    fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Navbar -->
                        <navbar class="navbar hidden md:block">
                            <ul class="flex space-x-8 text-sm font-semibold">
                                <li><a href="#" class="active border-b-2 border-orange-500 pb-2">Reviews</a></li>
                                <li><a href="#" class="hover:text-orange-500">People</a></li>
                                <li><a href="#" class="hover:text-orange-500">Partners</a></li>
                                <li><a href="#" class="hover:text-orange-500">Feedback</a></li>
                                <li><a href="#" class="hover:text-orange-500">Pricing</a></li>
                                <li><a href="#" class="cta bg-orange-500 hover:bg-orange-600 px-3 py-2 rounded text-white font-normal">
                                    Register</a></li>
                            </ul>
                        </navbar>

                    </div>
            </div>

        </header><!-- end header -->

        <!-- hero -->
        <div class="hero bg-gray-100 py-16">
            <!-- container -->
            <div class="container px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto">
                <!-- hero wrapper -->
                <div class="hero-wrapper grid grid-cols-1 md:grid-cols-12 gap-8 items-center">

                    <!-- hero text -->
                    <div class="hero-text col-span-6">
                        <h1 class=" font-bold text-4xl md:text-5xl max-w-xl text-gray-900 leading-tight">Don't listen to what they say, Go See</h1>
                        <hr class=" w-12 h-1 bg-orange-500 rounded-full mt-8">
                        <p class="text-gray-800 text-base leading-relaxed mt-8 font-semibold">Your ultimate travel companion. Carries all the information you need while travelling</p>
                        <div class="get-app flex space-x-5 mt-10 justify-center md:justify-start">
                            <button class="apple bg-white shadow-md px-3 py-2 rounded-lg flex items-center space-x-4">
                                <div class="logo">
                                    <svg
                                        class="w-6 h-6"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="419.955" height="512"
                                        viewBox="0 0 419.955 512">
                                        <g transform="translate(-46.022)">
                                            <path d="M185.255,512c-76.2-.439-139.233-155.991-139.233-235.21,0-129.4,97.075-157.734,134.487-157.734,16.86,0,34.863,6.621,50.742,12.48,11.1,4.087,22.588,8.306,28.975,8.306,3.823,0,12.832-3.589,20.786-6.738,16.963-6.753,38.071-15.146,62.651-15.146h.146c18.354,0,74,4.028,107.461,54.272l7.837,11.777-11.279,8.511c-16.113,12.158-45.513,34.336-45.513,78.267,0,52.031,33.3,72.041,49.292,81.665,7.061,4.248,14.37,8.628,14.37,18.208,0,6.255-49.922,140.566-122.417,140.566-17.739,0-30.278-5.332-41.338-10.034-11.191-4.761-20.845-8.862-36.8-8.862-8.086,0-18.311,3.823-29.136,7.881C221.5,505.73,204.752,512,185.753,512Z"/><path d="M351.343,0c1.888,68.076-46.8,115.3-95.425,112.342C247.9,58.015,304.54,0,351.343,0Z"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="text">
                                    <p class=" text-xs text-gray-600" style="font-size: 0.5rem;">Download on the</p>
                                    <p class=" text-xs font-semibold text-gray-900">Apple Store</p>
                                </div>
                            </button>
                            <button class="google bg-white shadow-md px-3 py-2 rounded-lg flex items-center space-x-4">
                                <div class="image">
                                    <svg
                                        class="w-6 h-6"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="436.057" height="469.847"
                                        viewBox="0 0 436.057 469.847">
                                        <g transform="translate(-16.896)">
                                            <path d="M270.336,234.965,34.39,462.165A40.146,40.146,0,0,1,16.9,428.672V41.258A40.146,40.146,0,0,1,34.39,7.765Z" fill="#2196f3"/><path d="M352.9,155.6l-82.56,79.36L34.39,7.765a31.446,31.446,0,0,1,2.773-1.92A40.363,40.363,0,0,1,77.91,5.2Z" fill="#4caf50"/><path d="M452.95,234.965a40.791,40.791,0,0,1-21.333,36.267L352.9,314.325l-82.56-79.36L352.9,155.6l78.72,43.093A40.791,40.791,0,0,1,452.95,234.965Z" fill="#ffc107"/><path d="M352.9,314.325,77.91,464.725a40.9,40.9,0,0,1-40.747-.64,31.44,31.44,0,0,1-2.773-1.92l235.947-227.2Z" fill="#f44336"/>
                                        </g>
                                    </svg>
                                </div>
                                <div class="text">
                                    <p class="text-xs text-gray-600" style="font-size: 0.5rem;">Download it from</p>
                                    <p class="text-xs font-semibold text-gray-900">Google play</p>
                                </div>
                            </button>
                        </div>
                    </div>

                    <!-- hero image -->
                    <div class="hero-image col-span-6">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300"><title>#102_travelling_twocolour</title><path d="M81.77,83.39c-28.67,17.47-45.66,49.51-43,83C40.18,183.48,46.54,200,63.35,209c44.83,24,240.55,24.45,269.51-18s18.19-102.84-44.8-128C233.46,41.18,155.82,38.3,81.77,83.39Z" fill="#e6e6e6" opacity="0.3"/><path d="M283.69,206V180.64a4.65,4.65,0,0,1,4.64-4.65h18.49a4.65,4.65,0,0,1,4.64,4.65V206" fill="none" stroke="#ffd200" stroke-miterlimit="10" stroke-width="2"/><path d="M283.69,206V180.64a4.65,4.65,0,0,1,4.64-4.65h18.49a4.65,4.65,0,0,1,4.64,4.65V206" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="2" opacity="0.08"/><path d="M159.26,145.74s-18.34,7.36-12.41,28.68,6.48,23.63,19.71,22.32,4.66-22.32,4.66-22.32Z" fill="#ffd200"/><path d="M152.37,79.92s-50.86,11.79-64.24,41.59l45.05,3.4,11.54-7Z" fill="#ed8936"/><path d="M152.37,79.92s-50.86,11.79-64.24,41.59l45.05,3.4,11.54-7Z" fill="#fff" opacity="0.46"/><ellipse cx="200.42" cy="272.36" rx="154.08" ry="11.83" fill="#e6e6e6" opacity="0.45"/><path d="M134.79,246.33s-4.45,3.22-8.54.91-7.67.77-4.87,4.13,14.8,5,14.8,5l4.51-7.28Z" fill="#ed8936"/><path d="M215.08,260.56s1.94,5.15,6.62,5.47,6,4.88,1.79,6.14-15.12-4-15.12-4l.26-8.57Z" fill="#ed8936"/><path d="M79.19,260.08s-10.59-2.9-12.89-12.75c0,0,16.41-3.32,16.87,13.62Z" fill="#ed8936" opacity="0.58"/><path d="M80.49,259s-7.4-11.7-.89-22.64c0,0,12.48,7.93,6.93,22.66Z" fill="#ed8936" opacity="0.73"/><path d="M82.4,259s3.9-12.35,15.72-14.69c0,0,2.21,8-7.65,14.73Z" fill="#ed8936"/><polygon points="74.72 258.75 76.86 273.44 90.38 273.5 92.37 258.83 74.72 258.75" fill="#24285b"/><path d="M156.2,53.77s1.74,6.3,4.27,10a3.28,3.28,0,0,0,4.58.82c1.83-1.3,3.93-3.59,3.41-7.08l-.15-6a5.88,5.88,0,0,0-4.6-5C159.34,45.28,155,50,156.2,53.77Z" fill="#f4a28c"/><polygon points="169.43 54.63 177.9 74.3 166.73 78.19 165.05 62.32 169.43 54.63" fill="#f4a28c"/><path d="M170.86,55.92h0a.62.62,0,0,1-.23.72,4.34,4.34,0,0,1-5.25-.1,5.45,5.45,0,0,1-2.08-5.6,25.94,25.94,0,0,1-5.48,2.52,6,6,0,0,1-2,.32l-3.28-4s-4.23-3.66-1.89-5.67,4.76.61,6.11-2.44,1.54-4.07,4.27-3.72.83,3.12,4.53,1.7,4.36.08,5,1.75a3.1,3.1,0,0,1-.12,1.82A20.1,20.1,0,0,0,170.86,55.92Z" fill="#24285b"/><path d="M164.66,56.6s-.83-2.37,1-2.85,3.06,3,.77,4.16Z" fill="#f4a28c"/><path d="M157.5,57.68l-.83,3A1,1,0,0,0,157.85,62l2.51-.43Z" fill="#f4a28c"/><rect x="289.35" y="173.73" width="16.36" height="5.3" fill="#24285b"/><path d="M165.31,64.43s1.44-.49,3.72-3.33c0,0,1.05,4.15-3.26,8Z" fill="#ce8172" opacity="0.31"/><path d="M162.12,76.62l6.43-1.16a90.83,90.83,0,0,0,8.92-2.08c11-3.14,43.37-10.53,52.58,8.2,11.16,22.69-7.47,96.3-7.47,96.3h-51s-10.41-30.66-25.29-49.62S121,88.21,162.12,76.62Z" fill="#ed8936"/><path d="M152.37,79.92s-2.56,16.32,19.86,4l-5.75-8A58,58,0,0,0,152.37,79.92Z" opacity="0.08"/><path d="M94.92,139.7c-10.16-3.16-11.68-17-2.47-22.37a25.2,25.2,0,0,1,10.9-3.2c17.08-1.26,46.18-2.85,46.18-2.85s17.52,5.7,14.77,14.24-15.08-5.06-15.08-5.06S116.66,146.46,94.92,139.7Z" fill="#f4a28c"/><rect x="144.58" y="110.56" width="6.04" height="12.3" transform="translate(-14.69 21.47) rotate(-7.93)" fill="#24285b"/><rect x="143.84" y="109.5" width="6.04" height="3.82" transform="matrix(0.99, -0.14, 0.14, 0.99, -13.96, 21.32)" fill="#ffd200"/><path d="M166.48,75.84s-7.76,7.14,1.21,8.67,9.78-11.13,9.78-11.13Z" fill="#f4a28c"/><path d="M171.63,177.88l-38.45,68.45,9.93,6.91s21.24-35.45,46.53-53.26a6.38,6.38,0,0,1,9.72,3.27c6.84,21.15,7.42,58,7.42,58H218.5l4.08-83.34Z" fill="#24285b"/><path d="M171.63,177.88s19.15-15,25.92-36.41a6.57,6.57,0,0,1,11.08-2.37l18.2,19.68,3.67-20.57L217.19,96.09,192,79.92l-5,19.51Z" opacity="0.08"/><path d="M163.36,158.94s11.81-11.72,14.11-50.86c1.91-32.56,6.58-38.92,16.33-41.2,15.06-3.54,18.65.94,23.39,7.63,0,0-24.08,1.49-23.24,16.56s-2.51,68.75-22.32,86.81C171.63,177.88,162.44,177.11,163.36,158.94Z" fill="#ffd200"/><path d="M163.36,158.94s11.81-11.72,14.11-50.86c1.91-32.56,6.58-38.92,16.33-41.2,15.06-3.54,18.65.94,23.39,7.63,0,0-24.08,1.49-23.24,16.56s-2.51,68.75-22.32,86.81C171.63,177.88,162.44,177.11,163.36,158.94Z" fill="#fff" opacity="0.46"/><path d="M196.37,93.76c-5-12,8.93-27.14,21-22.46,10.32,4,21.35,12.84,27.34,30.64C258.94,144.25,291,164.7,291,164.7s16.36,2.7,16.36,8.65-19.34,0-19.34,0-50.2-20.83-76.24-54.3C204,109,199.22,100.59,196.37,93.76Z" fill="#f4a28c"/><path d="M226.35,134.56s19.94-6.75,25-16.62c0,0-7.22-38.91-32.87-47.28-8.44-2.75-17.87.34-22.29,8C190.83,88,192,105.22,226.35,134.56Z" fill="#ed8936"/><path d="M226.35,134.56s19.94-6.75,25-16.62c0,0-7.22-38.91-32.87-47.28-8.44-2.75-17.87.34-22.29,8C190.83,88,192,105.22,226.35,134.56Z" fill="#fff" opacity="0.46"/><rect x="271.49" y="198.46" width="52.16" height="67.53" fill="#ffd200"/><rect x="278.47" y="265.99" width="6.37" height="6.37" fill="#24285b"/><rect x="309.43" y="265.99" width="6.37" height="6.37" fill="#24285b"/><rect x="280.14" y="211.01" width="7.25" height="40.35" opacity="0.08"/><rect x="293.95" y="211.01" width="7.25" height="40.35" opacity="0.08"/><rect x="306.92" y="211.01" width="7.25" height="40.35" opacity="0.08"/><circle cx="222.58" cy="34.77" r="21.04" fill="#24285b"/><polygon points="214.44 34.77 196.44 52.7 220.3 43.18 214.44 34.77" fill="#24285b"/><rect x="220.3" y="25.3" width="3.51" height="11.08" fill="#fff"/><rect x="220.3" y="39.43" width="3.51" height="3.51" fill="#fff"/></svg>
                    </div>
                </div>
            </div>
        </div><!-- end hero -->

        <!-- mobile navbar -->
        <div class="mobile-navbar">

            <!-- navbar wrapper -->
            <div class="navbar-wrapper fixed top-0 left-0 h-full bg-white z-30 w-64 shadow-lg p-5"
                x-show="isOpen"
                @click.away=" isOpen = false"
                x-transition:enter="transition duration-300 -ml-64"
                x-transition:enter-start=""
                x-transition:enter-end="transform translate-x-64"
                x-transition:leave="transition duration-300"
                x-transition:enter-start=""
                x-transition:leave-end="transform -translate-x-64">
                <div class="close">
                    <button class="absolute top-0 right-0 mt-4 mr-4" @click=" isOpen = false">
                        <svg
                            class="w-6 h-6"
                            fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    </button>
                </div>
                <ul class="divide-y">
                    <li><a href="#" class="my-4 inline-block active font-bold">Reviews</a></li>
                    <li><a href="#" class="my-4 inline-block hover:text-orange-500">People</a></li>
                    <li><a href="#" class="my-4 inline-block hover:text-orange-500">Partners</a></li>
                    <li><a href="#" class="my-4 inline-block hover:text-orange-500">Feedback</a></li>
                    <li><a href="#" class="my-4 inline-block hover:text-orange-500">Pricing</a></li>
                    <li><a href="#" class="my-8 w-full text-center font-semibold cta inline-block bg-orange-500 hover:bg-orange-600 px-3 py-2 rounded text-white font-normal">Get the App</a></li>
                </ul>

                <!-- follow us -->
                <div class="follow">
                    <p class=" italic font-semibold">follow us:</p>
                    <div class="social flex space-x-5 mt-4 ">
                        <a href="#">
                            <svg
                                aria-hidden="true" focusable="false"
                                data-prefix="fab" data-icon="twitter"
                                class="h-5 w-5 fill-current text-gray-600" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
                            </svg>
                        </a>
                        <a href="#">
                            <svg
                                aria-hidden="true" focusable="false"
                                data-prefix="fab" data-icon="facebook-f"
                                class="h-5 w-5 fill-current text-gray-600" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path>
                            </svg>
                        </a>
                        <a href="#">
                            <svg
                                aria-hidden="true" focusable="false"
                                data-prefix="fab" data-icon="instagram"
                                class="h-5 w-5 fill-current text-gray-600" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                            </svg>
                        </a>
                        <a href="#">
                            <svg
                                aria-hidden="true" focusable="false"
                                data-prefix="fab" data-icon="youtube"
                                class="h-5 w-5 fill-current text-gray-600" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- end mobile navbar -->


    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
    </body>
    </body>
</html>
