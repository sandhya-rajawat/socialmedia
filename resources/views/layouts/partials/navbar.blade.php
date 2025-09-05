<header class="bg-white shadow px-6 py-3 flex justify-between items-center">
  <!-- Left: Logo -->
  <div class="flex items-center space-x-3">
    <a href="#" class="text-3xl font-bold text-white rounded py-1 px-3"><img src="{{url('assets/images/logo-32x32.png')}}" class="w-50"></a>

  </div>

  <!-- Center: Search Bar -->
  <div class="flex items-center w-full max-w-md mr-100">
    <input
      type="text"
      placeholder="Search for people, companies, events and more..."
      class="w-full border border-gray-300 rounded-full py-2 px-4 pr-10 focus:outline-none focus:ring-2 focus:ring-blue-400">
    <button class="absolute left-160 text-gray-500 border-l border-gray-300">
      🔍
    </button>
  </div>

  <!-- Right: Icons + Profile -->
  <div class="flex items-center space-x-9 gap-22 ">
    <!-- Post Icon -->
    <a href="#" class="text-gray-600 hover:text-blue-600"><img src="{{url('assets/images/icons/navbar/create.png')}}" class="w-100"></a>

    <!-- Messages -->
    <a href="#" class="relative text-gray-600 hover:text-blue-600">
      💬
      <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full px-1">1</span>
    </a>

    <!-- Notifications -->
    <a href="#" class="relative text-gray-600 hover:text-blue-600">
      🔔
      <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full px-1">3</span>
    </a>

    <!-- Profile Picture -->
    <a href="#">
      <img src="https://via.placeholder.com/35" alt="Profile" class="w-9 h-9 rounded-full">
    </a>

    <!-- Settings / Dropdown -->
    <button class="text-gray-600 hover:text-blue-600">⚙️</button>
  </div>
</header>