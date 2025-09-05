@extends('layouts.app')

@section('content')

<div class="flex space-x-2 bg-gray-100  p-1 gap-5 mb-5">
    <button class="flex items-center space-x-2 px-16 py-3 hover:bg-blue-500 text-gray-500 bg-white ">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 1v22m-7-7h14" />
        </svg>
        <span>Speech</span>
    </button>
    <button class="flex items-center space-x-2  text-gray-500 px-16 py-1 hover:bg-blue-500 border border-transparent bg-white ">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v8m-4-4h8" />
        </svg>
        <span>Listen</span>
    </button>
    <button class="flex items-center space-x-2 px-16 py-1 text-gray-500 border  hover:bg-blue-500 border-transparent  bg-white ">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M14 10l-4 4m0-4l4 4" />
        </svg>
        <span>Watch</span>
    </button>
</div>


{{-- Post box --}}
<div class=" rounded">
    <div class=" p-4   rounded shadow mb-0 bg-gray-300">
        <textarea placeholder="What's on your mind, Arthur?" class="w-full border-0 focus:ring-0 mb-10 p-8 resize-none"></textarea>
        <div class="flex justify-between mt-2">
            <div class="space-x-4 ">
                <button class="text-gray-500">📷 Photo/Video</button>
                <button class="text-gray-500">🏷️ Tag Friends</button>
                <button class="text-gray-500">📍 Check In</button>
            </div>
            <button class="bg-blue-500 text-white text-sm px-1 rounded">Publish</button>
        </div>
    </div>

    {{-- Example Post --}}
    <div class="bg-white p-4 shadow mb-0 ">
        <!-- Top bar with profile image, name, time, etc. -->
        <div class="flex justify-between items-start">
            <div class="flex space-x-4">
                <img src="/path/to/profile.jpg" alt="profile" class="w-10 h-10 rounded-full object-cover" />
                <div>
                    <div class="font-semibold">John Michael</div>
                    <div class="text-sm text-gray-500 flex items-center space-x-1">
                        <span>3 hours ago</span>
                        <span>•</span>
                        <span>🌐</span> <!-- Globe icon -->
                    </div>
                </div>
            </div>
            <div class="text-gray-500">•••</div>
        </div>

        <!-- Post text -->
        <p class="text-gray-800 mt-4">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis voluptatem veritatis harum, tenetur,
            quibusdam voluptatum, incidunt saepe minus maiores ea atque sequi illo veniam sint quaerat corporis
            totam et. Culpa?
        </p>

        <!-- Post image -->
        <div class="mt-4">
            <img src="/path/to/post-image.jpg" alt="post image" class="rounded-lg w-full" />
        </div>

        <!-- Reactions -->
        <div class="flex items-center space-x-6 mt-4 text-gray-500">
            <span class="flex items-center space-x-1"><span>👍</span><span>67</span></span>
            <span class="flex items-center space-x-1"><span>💬</span><span>5</span></span>
            <span class="flex items-center space-x-1"><span>↪️</span><span>Share</span></span>
        </div>



    </div>
    <div class="bg-white p-4 shadow mb-4 ">
        <!-- Top bar with profile image, name, time -->
        <div class="flex justify-between items-start">
            <div class="flex space-x-4">
                <img src="/path/to/profile.jpg" alt="profile" class="w-10 h-10 rounded-full object-cover" />
                <div>
                    <div class="font-semibold">Karen Minas</div>
                    <div class="text-sm text-gray-500 flex items-center space-x-1">
                        <span>3 hours ago</span>
                        <span>•</span>
                        <span>🌐</span>
                    </div>
                </div>
            </div>
            <div class="text-gray-500">•••</div>
        </div>

        <!-- Post text -->
        <p class="text-gray-800 mt-4">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis voluptatem veritatis harum, tenetur,
            quibusdam voluptatum, incidunt saepe minus maiores ea atque sequi illo veniam sint quaerat corporis
            totam et. Culpa?
        </p>

        <!-- Video content -->
        <div class="mt-4">
            <video controls class="w-full rounded-lg">
                <source src="/path/to/video.mp4" type="video/mp4" />
                Your browser does not support the video tag.
            </video>
        </div>

        <!-- Reactions -->
        <div class="flex items-center space-x-6 mt-4 text-gray-500">
            <span class="flex items-center space-x-1"><span>👍</span><span>67</span></span>
            <span class="flex items-center space-x-1"><span>💬</span><span>5</span></span>
            <span class="flex items-center space-x-1"><span>↪️</span><span>Share</span></span>
        </div>
    </div>
    @endsection