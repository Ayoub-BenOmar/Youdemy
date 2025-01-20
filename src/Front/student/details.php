<?php
require_once "../../Classes/database.php";
require_once "../../Classes/course.php";

$courseId = isset($_GET['id']) ? intval($_GET['id']) : 0;

$course = Course::getCourseById($courseId);
if (!$course) {
    die("Course not found");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details - Youdemy</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <nav class="bg-purple-700 p-4 w-full fixed top-0 z-20">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="flex items-center text-white text-3xl font-bold">
                <img src="../../Pics/logo_youdemy.png" alt="Youdemy Logo" class="h-10 w-10 mr-2">
                Youdemy
            </a>
            <div class="flex space-x-4">
                <a href="../home.php" class="text-white px-4 py-2 border border-white rounded hover:bg-white hover:text-purple-700 transition">Home</a>
                <a href="allCourses.php" class="text-white px-4 py-2 border border-white rounded hover:bg-white hover:text-purple-700 transition">Courses</a>
                <a href="#" class="text-white px-4 py-2 border border-white rounded hover:bg-white hover:text-purple-700 transition">My Courses</a>
                <a href="../../Handlers/logout.php" class="text-white px-4 py-2 border border-white rounded hover:bg-white hover:text-purple-700 transition">Logout</a>
            </div>
        </div>
    </nav>

 <!-- Course Details Section -->
    <section class="container mx-auto px-6 mt-24">
        <!-- Course Header -->
        <div class="flex flex-wrap md:flex-nowrap mb-12 bg-white rounded-2xl shadow-lg overflow-hidden">
            <!-- Course Image -->
            <div class="w-full md:w-1/3 lg:w-1/4 relative group">
                <img src="../<?= htmlspecialchars($course['image']) ?>" alt="Course Image" class="w-full h-full object-cover min-h-[300px] transition-transform duration-300 hover:scale-105">
                <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <!-- Course Info -->
            <div class="w-full md:w-2/3 lg:w-3/4 p-8">
                <div class="flex items-center gap-4 mb-4">
                    <h1 class="text-4xl font-bold text-gray-900"><?= htmlspecialchars($course['title']) ?></h1>
                    <span class="px-4 py-1 bg-purple-100 text-purple-700 rounded-full text-sm font-semibold">English</span>
                </div>
                <div class="flex items-center mb-6 gap-8">
                    <div class="flex items-center">
                        <span class="text-3xl font-bold text-gray-900 mr-2">4.7</span>
                        <div class="flex">
                            <?php 
                            $rating = 4.7;
                            for ($i = 0; $i < 5; $i++): ?>
                                <?php if ($i < floor($rating)): ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.18c.969 0 1.371 1.24.588 1.81l-3.392 2.456a1 1 0 00-.364 1.118l1.286 3.97c.3.921-.755 1.688-1.54 1.118l-3.392-2.456a1 1 0 00-1.176 0l-3.392 2.456c-.785.57-1.84-.197-1.54-1.118l1.286-3.97a1 1 0 00-.364-1.118L2.633 9.396c-.784-.57-.38-1.81.588-1.81h4.18a1 1 0 00.95-.69l1.286-3.97z" />
                                    </svg>
                                <?php else: ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.18c.969 0 1.371 1.24.588 1.81l-3.392 2.456a1 1 0 00-.364 1.118l1.286 3.97c.3.921-.755 1.688-1.54 1.118l-3.392-2.456a1 1 0 00-1.176 0l-3.392 2.456c-.785.57-1.84-.197-1.54-1.118l1.286-3.97a1 1 0 00-.364-1.118L2.633 9.396c-.784-.57-.38-1.81.588-1.81h4.18a1 1 0 00.95-.69l1.286-3.97z" />
                                    </svg>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <img src="../../Pics/Me.jpg" alt="John Doe" class="w-10 h-10 rounded-full object-cover">
                        <span class="text-gray-700 font-bold">Ing. <?= htmlspecialchars($course['name']) ?></span>
                    </div>
                </div>
                <p class="text-gray-600 text-lg mb-6"><?= htmlspecialchars($course['description']) ?></p>
                <div class="flex gap-4">
                    <button class="px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors duration-300 font-semibold">Enroll Now</button>
                    <button class="px-6 py-3 border-2 border-purple-600 text-purple-600 rounded-lg hover:bg-purple-50 transition-colors duration-300 font-semibold">Preview Course</button>
                </div>
            </div>
        </div>

        <!-- Course Features Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <!-- Feature Cards -->
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Downloads</h3>
                <p class="text-gray-600">Access all course materials offline</p>
            </div>
            
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Certificate</h3>
                <p class="text-gray-600">Earn a completion certificate</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Mobile Access</h3>
                <p class="text-gray-600">Learn on any device</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Lifetime Access</h3>
                <p class="text-gray-600">Learn at your own pace</p>
            </div>
        </div>

        <!-- About the Teacher -->
        <div class="bg-white rounded-xl shadow-lg p-8 mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">About the Teacher</h2>
            <div class="flex flex-col md:flex-row gap-8">
                <div class="md:w-1/4">
                    <img src="../../Pics/Me.jpg" alt="Teacher" class="w-full aspect-square rounded-xl shadow-lg object-cover">
                </div>
                <div class="md:w-3/4">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Ing. <?= htmlspecialchars($course['name']) ?></h3>
                    <p class="text-gray-700 text-lg mb-4">Experienced instructor with over 10 years in the industry.</p>
                    <p class="text-gray-600"><?= htmlspecialchars($course['name']) ?> has taught thousands of students worldwide and is known for his engaging teaching style. His courses combine practical experience with theoretical knowledge to provide a comprehensive learning experience.</p>
                </div>
            </div>
        </div>

        <!-- Reviews Section (Continued) -->
        <div class="bg-white rounded-xl shadow-lg p-8">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Student Reviews</h2>
                <button class="px-6 py-2 border-2 border-purple-600 text-purple-600 rounded-lg hover:bg-purple-50 transition-colors duration-300 font-semibold">View All</button>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8">

                <!-- Review Card 1 (Previous) -->
                <div class="bg-gray-50 rounded-lg p-6 hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 bg-purple-200 rounded-full flex items-center justify-center">
                                <span class="text-purple-700 font-semibold text-lg">AS</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Alice Smith</p>
                                <div class="flex">
                                    <?php 
                                    $reviewRating = 5;
                                    for ($i = 0; $i < 5; $i++): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 <?php echo $i < $reviewRating ? 'text-yellow-400' : 'text-gray-300' ?>" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.18c.969 0 1.371 1.24.588 1.81l-3.392 2.456a1 1 0 00-.364 1.118l1.286 3.97c.3.921-.755 1.688-1.54 1.118l-3.392-2.456a1 1 0 00-1.176 0l-3.392 2.456c-.785.57-1.84-.197-1.54-1.118l1.286-3.97a1 1 0 00-.364-1.118L2.633 9.396c-.784-.57-.38-1.81.588-1.81h4.18a1 1 0 00.95-.69l1.286-3.97z" />
                                        </svg>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <span class="ml-auto text-sm text-gray-500">2 weeks ago</span>
                        </div>
                        <p class="text-gray-700 mb-3">Great course! The instructor explained everything in detail and the practical examples were very helpful. I especially enjoyed the hands-on projects.</p>
                        <div class="flex items-center gap-4 mt-4">
                            <button class="flex items-center gap-2 text-gray-500 hover:text-purple-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                </svg>
                                Helpful
                            </button>
                            <button class="text-gray-500 hover:text-purple-600">Reply</button>
                        </div>
                </div>

                    <!-- Review Card 2 -->
                <div class="bg-gray-50 rounded-lg p-6 hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 bg-blue-200 rounded-full flex items-center justify-center">
                                <span class="text-blue-700 font-semibold text-lg">BJ</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Bob Johnson</p>
                                <div class="flex">
                                    <?php 
                                    $reviewRating = 4;
                                    for ($i = 0; $i < 5; $i++): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 <?php echo $i < $reviewRating ? 'text-yellow-400' : 'text-gray-300' ?>" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.18c.969 0 1.371 1.24.588 1.81l-3.392 2.456a1 1 0 00-.364 1.118l1.286 3.97c.3.921-.755 1.688-1.54 1.118l-3.392-2.456a1 1 0 00-1.176 0l-3.392 2.456c-.785.57-1.84-.197-1.54-1.118l1.286-3.97a1 1 0 00-.364-1.118L2.633 9.396c-.784-.57-.38-1.81.588-1.81h4.18a1 1 0 00.95-.69l1.286-3.97z" />
                                        </svg>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <span class="ml-auto text-sm text-gray-500">1 month ago</span>
                        </div>
                        <p class="text-gray-700 mb-3">Very informative and well-structured course. The content is up-to-date and relevant to current industry standards. Would definitely recommend to others!</p>
                        <div class="flex items-center gap-4 mt-4">
                            <button class="flex items-center gap-2 text-gray-500 hover:text-purple-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                </svg>
                                Helpful
                            </button>
                            <button class="text-gray-500 hover:text-purple-600">Reply</button>
                        </div>
                </div>

                    <!-- Review Card 3 -->
                <div class="bg-gray-50 rounded-lg p-6 hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 bg-green-200 rounded-full flex items-center justify-center">
                                <span class="text-green-700 font-semibold text-lg">MD</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Mike Davis</p>
                                <div class="flex">
                                    <?php 
                                    $reviewRating = 5;
                                    for ($i = 0; $i < 5; $i++): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 <?php echo $i < $reviewRating ? 'text-yellow-400' : 'text-gray-300' ?>" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.18c.969 0 1.371 1.24.588 1.81l-3.392 2.456a1 1 0 00-.364 1.118l1.286 3.97c.3.921-.755 1.688-1.54 1.118l-3.392-2.456a1 1 0 00-1.176 0l-3.392 2.456c-.785.57-1.84-.197-1.54-1.118l1.286-3.97a1 1 0 00-.364-1.118L2.633 9.396c-.784-.57-.38-1.81.588-1.81h4.18a1 1 0 00.95-.69l1.286-3.97z" />
                                        </svg>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <span class="ml-auto text-sm text-gray-500">2 months ago</span>
                        </div>
                        <p class="text-gray-700 mb-3">The instructor's teaching style is excellent! Complex concepts were broken down into easily digestible portions. The bonus materials and resources provided were also very valuable.</p>
                        <div class="flex items-center gap-4 mt-4">
                            <button class="flex items-center gap-2 text-gray-500 hover:text-purple-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                </svg>
                                Helpful
                            </button>
                            <button class="text-gray-500 hover:text-purple-600">Reply</button>
                        </div>
                    </div>

                    <!-- Review Card 4 -->
                    <div class="bg-gray-50 rounded-lg p-6 hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 bg-red-200 rounded-full flex items-center justify-center">
                                <span class="text-red-700 font-semibold text-lg">SW</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Sarah Wilson</p>
                                <div class="flex">
                                    <?php 
                                    $reviewRating = 4;
                                    for ($i = 0; $i < 5; $i++): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 <?php echo $i < $reviewRating ? 'text-yellow-400' : 'text-gray-300' ?>" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.18c.969 0 1.371 1.24.588 1.81l-3.392 2.456a1 1 0 00-.364 1.118l1.286 3.97c.3.921-.755 1.688-1.54 1.118l-3.392-2.456a1 1 0 00-1.176 0l-3.392 2.456c-.785.57-1.84-.197-1.54-1.118l1.286-3.97a1 1 0 00-.364-1.118L2.633 9.396c-.784-.57-.38-1.81.588-1.81h4.18a1 1 0 00.95-.69l1.286-3.97z" />
                                        </svg>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <span class="ml-auto text-sm text-gray-500">3 months ago</span>
                        </div>
                        <p class="text-gray-700 mb-3">A comprehensive course that exceeded my expectations. The practical exercises really helped cement the concepts. The instructor's response to questions was always prompt and helpful.</p>
                        <div class="flex items-center gap-4 mt-4">
                            <button class="flex items-center gap-2 text-gray-500 hover:text-purple-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                </svg>
                                Helpful
                            </button>
                            <button class="text-gray-500 hover:text-purple-600">Reply</button>
                        </div>
                    </div>
                </div>

                <!-- Load More Reviews Button -->
                <div class="text-center mt-8">
                    <button class="px-8 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors duration-300 font-semibold">
                        Load More Reviews
                    </button>
                </div>
        </div>
    </section>

    <footer class="bg-purple-700 p-4 mt-8">
        <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
            <nav class="flex flex-wrap justify-center -mx-5 -my-2">
                <div class="px-5 py-2">
                    <a href="#" class="text-base leading-6 text-white hover:text-gray-400">
                        About
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-base leading-6 text-white hover:text-gray-400">
                        Blog
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-base leading-6 text-white hover:text-gray-400">
                        Team
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-base leading-6 text-white hover:text-gray-400">
                        Pricing
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-base leading-6 text-white hover:text-gray-400">
                        Contact
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-base leading-6 text-white hover:text-gray-400">
                        Terms
                    </a>
                </div>
            </nav>
            <div class="flex justify-center mt-8 space-x-6">
                <a href="#" class="text-white hover:text-gray-500">
                    <span class="sr-only">Facebook</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="#" class="text-white hover:text-gray-500">
                    <span class="sr-only">Instagram</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="#" class="text-white hover:text-gray-500">
                    <span class="sr-only">Twitter</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                    </svg>
                </a>
                <a href="#" class="text-white hover:text-gray-500">
                    <span class="sr-only">GitHub</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="#" class="text-white hover:text-gray-500">
                    <span class="sr-only">Dribbble</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
            <p class="mt-8 text-base leading-6 text-center text-gray-400">
                © 2021 YouDemy, Inc. All rights reserved.
            </p>
        </div>
    </footer>

</body>
</html>