<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">
    <!-- Navbar -->
    <nav class="bg-purple-700 p-4 w-full fixed top-0 z-20 shadow-lg backdrop-blur-sm bg-opacity-95">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="flex items-center text-white text-3xl font-bold group">
                <img src="../Pics/logo_youdemy.png" alt="Youdemy Logo" class="h-10 w-10 mr-2 transform transition-all duration-300 group-hover:scale-105">
                <span class="tracking-tight hover:text-purple-100 transition-colors duration-300">Youdemy</span>
            </a>
            <div class="flex space-x-5">
                <a href="../home.php" class="text-white px-4 py-2 rounded-lg border border-white/80 hover:bg-white/10 hover:border-white transition-all duration-300 active:scale-95">Home</a>
            </div>
        </div>
    </nav>

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-50 to-purple-100 mt-16">
        <div class="bg-white rounded-xl shadow-xl p-8 w-full max-w-md border border-purple-100">
            <div class="flex justify-center mb-6">
                <div class="bg-purple-100 p-3 rounded-full">
                    <i data-feather="user" class="w-8 h-8 text-purple-700"></i>
                </div>
            </div>

            <h2 class="text-2xl font-bold text-purple-700 text-center mb-8">Login to Your Account</h2>

            <form action="../Handlers/login.php" method="post" class="space-y-6">
                <div class="relative">
                    <label for="email" class="block text-sm font-medium text-purple-700 mb-2">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-feather="mail" class="h-5 w-5 text-purple-400"></i>
                        </div>
                        <input type="email" id="email" name="email" 
                            class=" w-full px-4 py-2 bg-purple-50 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 outline-none"
                            required 
                            placeholder="Enter your email">
                    </div>
                </div>

                <div class="relative">
                    <label for="password" class="block text-sm font-medium text-purple-700 mb-2">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-feather="lock" class="h-5 w-5 text-purple-400"></i>
                        </div>
                        <input type="password" id="password" name="password" 
                            class=" w-full px-4 py-2 bg-purple-50 border border-purple-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 outline-none"
                            required
                            placeholder="Enter your password">
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                    <button type="submit" 
                        class="w-full sm:w-auto bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 active:bg-purple-800 transition duration-150 ease-in-out shadow-md hover:shadow-lg">
                        Login
                    </button>
                    <a href="registerPage.php" 
                        class="text-purple-600 hover:text-purple-800 font-medium transition duration-150 ease-in-out">
                        Create an account
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="relative bg-purple-700 text-white">
        <!-- Curved decoration -->
        <!-- <div class="absolute top-0 left-0 w-full transform -translate-y-full">
            <svg class="w-full h-24" viewBox="0 0 1440 74" preserveAspectRatio="none">
                <path d="M0 24C480 74 960 74 1440 24V74H0V24Z" class="fill-purple-700"/>
            </svg>
        </div> -->

        <div class="max-w-screen-xl px-6 py-16 mx-auto">
            <!-- Navigation Links -->
            <nav class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-8 mb-12 text-center sm:text-left">
                <a href="#" class="text-lg font-medium hover:text-purple-200 transition-colors duration-300 transform hover:translate-x-2">
                    About
                </a>
                <a href="#" class="text-lg font-medium hover:text-purple-200 transition-colors duration-300 transform hover:translate-x-2">
                    Blog
                </a>
                <a href="#" class="text-lg font-medium hover:text-purple-200 transition-colors duration-300 transform hover:translate-x-2">
                    Team
                </a>
                <a href="#" class="text-lg font-medium hover:text-purple-200 transition-colors duration-300 transform hover:translate-x-2">
                    Pricing
                </a>
                <a href="#" class="text-lg font-medium hover:text-purple-200 transition-colors duration-300 transform hover:translate-x-2">
                    Contact
                </a>
                <a href="#" class="text-lg font-medium hover:text-purple-200 transition-colors duration-300 transform hover:translate-x-2">
                    Terms
                </a>
            </nav>

            <!-- Social Media Links -->
            <div class="flex flex-wrap justify-center gap-8 mb-12">
                <a href="#" class="group">
                    <span class="sr-only">Facebook</span>
                    <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center transition-all group-hover:bg-white group-hover:scale-110">
                        <svg class="w-6 h-6 transition-colors group-hover:text-purple-700" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                        </svg>
                    </div>
                </a>

                <a href="#" class="group">
                    <span class="sr-only">Instagram</span>
                    <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center transition-all group-hover:bg-white group-hover:scale-110">
                        <svg class="w-6 h-6 transition-colors group-hover:text-purple-700" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/>
                        </svg>
                    </div>
                </a>

                <a href="#" class="group">
                    <span class="sr-only">Twitter</span>
                    <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center transition-all group-hover:bg-white group-hover:scale-110">
                        <svg class="w-6 h-6 transition-colors group-hover:text-purple-700" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                        </svg>
                    </div>
                </a>

                <a href="#" class="group">
                    <span class="sr-only">GitHub</span>
                    <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center transition-all group-hover:bg-white group-hover:scale-110">
                        <svg class="w-6 h-6 transition-colors group-hover:text-purple-700" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/>
                        </svg>
                    </div>
                </a>

                <a href="#" class="group">
                    <span class="sr-only">Dribbble</span>
                    <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center transition-all group-hover:bg-white group-hover:scale-110">
                        <svg class="w-6 h-6 transition-colors group-hover:text-purple-700" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </a>
            </div>

            <!-- Copyright -->
            <div class="text-center">
                <p class="text-lg text-purple-200">
                    © 2024 YouDemy. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>