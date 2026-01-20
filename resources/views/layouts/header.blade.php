<header class="header">
      <nav id="navbar" class="fixed top-0 left-0 right-0 bg-green-900/70 backdrop-blur-lg border-b border-cyan-500/30 z-50 transition-all duration-300">
    <div class="container mx-auto px-6 py-3">
      <div class="flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center">
          <div class="relative mr-2 prime_logo">
            <a href="{{ url('/') }}"><img src="{{asset('img/logo_white.png')}}"  alt="Saudi Prime" class="h-6 relative z-10"></a>
          </div>
        </div>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center space-x-1">
          <a href="{{ url('/') }}" class="nav-link text-gray-300 hover:text-cyan-400 px-4 py-2 rounded-md transition-colors duration-200">الرئيسية</a>
          <a href="{{ url('about') }}" class="nav-link text-gray-300 hover:text-cyan-400 px-4 py-2 rounded-md transition-colors duration-200">نبذة عنا</a>
          <a href="{{ route('programs') }}" class="nav-link text-gray-300 hover:text-cyan-400 px-4 py-2 rounded-md transition-colors duration-200">برامجنا</a>
          <a href="{{ url('contact_us') }}" class="nav-link text-gray-300 hover:text-cyan-400 px-4 py-2 rounded-md transition-colors duration-200">تواصل معنا</a>
          <div class="relative ml-4 group">
            <button class="contact-btn play-btn px-4 py-2  rounded-md  text-sm font-medium relative z-10 flex items-center justify-center gap-2 transition-all duration-300">
    تسجيل الدخول
</button>
          </div>
        </div>

        <!-- Mobile Navigation Button -->
        <div class="flex md:hidden">
          <button id="mobile-menu-button" class="relative w-10 h-10 focus:outline-none group" aria-label="Toggle menu">
            <div class="absolute w-5 transform -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">
              <span class="block h-0.5 w-5 bg-cyan-400 mb-1 transform transition duration-300 ease-in-out" id="line1"></span>
              <span class="block h-0.5 w-5 bg-cyan-400 mb-1 transform transition duration-300 ease-in-out" id="line2"></span>
              <span class="block h-0.5 w-5 bg-cyan-400 transform transition duration-300 ease-in-out" id="line3"></span>
            </div>
          </button>
        </div>
      </div>

      <!-- Mobile Menu -->
      <div id="mobile-menu" class="md:hidden h-0 overflow-hidden transition-all duration-300 ease-in-out">
        <div class="pt-2 pb-4 space-y-1">
          <a href="{{ url('/') }}" class="mobile-nav-link block text-gray-300 hover:text-cyan-400 hover:bg-gray-800/50 px-4 py-2 rounded-md transition-colors duration-200">الرئيسية</a>
          <a href="{{ url('about') }}" class="mobile-nav-link block text-gray-300 hover:text-cyan-400 hover:bg-gray-800/50 px-4 py-2 rounded-md transition-colors duration-200">نبذة عنا</a>
          <a href="{{ route('programs') }}" class="mobile-nav-link block text-gray-300 hover:text-cyan-400 hover:bg-gray-800/50 px-4 py-2 rounded-md transition-colors duration-200">برامجنا</a>
          <a href="{{ url('contact_us') }}" class="mobile-nav-link block text-gray-300 hover:text-cyan-400 hover:bg-gray-800/50 px-4 py-2 rounded-md transition-colors duration-200">تواصل معنا</a>
          <div class="px-4 pt-2">
            <button class="contact-btn play-btn px-4 py-2 rounded-lg text-white text-sm font-medium relative z-10 flex items-center justify-center gap-2 transition-all duration-300">
    تسجيل الدخول
</button>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>