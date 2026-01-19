<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('favicon/manifest.json')}}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('favicon/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
    <title>@yield('title', 'Saudi Prime')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>
        .prime_logo img{
        width: 100px;
        height: 105px;
    }
    .header a:hover{
        color:#fff;
        border-bottom: 2px solid rgba(208, 192, 192, 0.5); 
      text-shadow: 2px 2px 4px rgba(208, 192, 192, 0.5); 
    }
    #mobile-menu{
      text-align: center;
    }
    #mobile-menu button{
      margin: auto;
    }

    </style>
    
</head>

<body dir="rtl">

    {{-- HEADER --}}
    <header class="header">
      <nav id="navbar" class="fixed top-0 left-0 right-0 bg-green-900/70 backdrop-blur-lg border-b border-cyan-500/30 z-50 transition-all duration-300">
    <div class="container mx-auto px-6 py-3">
      <div class="flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center">
          <div class="relative mr-2 prime_logo">
            <a href="{{ url('/') }}">
            <img src="{{asset('img/logo_white.png')}}"  alt="Saudi Prime" class="h-6 relative z-10">
          </a>
          </div>
        </div>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center space-x-1">
          <a href="{{ url('/') }}" class="nav-link text-gray-300 hover:text-cyan-400 px-4 py-2 rounded-md transition-colors duration-200">الرئيسية</a>
          <a href="#about" class="nav-link text-gray-300 hover:text-cyan-400 px-4 py-2 rounded-md transition-colors duration-200">نبذة عنا</a>
          <a href="#services" class="nav-link text-gray-300 hover:text-cyan-400 px-4 py-2 rounded-md transition-colors duration-200">برامجنا</a>
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
          <a href="#about" class="mobile-nav-link block text-gray-300 hover:text-cyan-400 hover:bg-gray-800/50 px-4 py-2 rounded-md transition-colors duration-200">نبذة عنا</a>
          <a href="#services" class="mobile-nav-link block text-gray-300 hover:text-cyan-400 hover:bg-gray-800/50 px-4 py-2 rounded-md transition-colors duration-200">برامجنا</a>
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

    {{-- MAIN snap-y snap-mandatory  overflow-y-scroll no-scrollbar--}}
    <main class="min-h-screen">
        @yield('content')
    </main>
    {{-- FOOTER --}}
    <footer class="bg-forest text-white py-app-md  border-b  z-50 transition-all duration-300">
        <div class="max-w-4xl mx-auto px-app-lg text-small text-center">
            <p class="text-small">&copy; {{ date('Y') }} {{ config('app.name') }}. تم التطوير من قبل شركة ThirtySix {{ __('All rights reserved') }}.</p>
        </div>
    </footer>


</body>
</html>


<script>
  /**
 * FutureNav - Main JavaScript
 * script.js - Interactive functionality for the futuristic navigation experience
 * March 24, 2025
 */

document.addEventListener("DOMContentLoaded", () => {
  // DOM Elements
  const navbar = document.getElementById("navbar");
  const mobileMenuButton = document.getElementById("mobile-menu-button");
  const mobileMenu = document.getElementById("mobile-menu");
  const navLinks = document.querySelectorAll(".nav-link");
  const mobileNavLinks = document.querySelectorAll(".mobile-nav-link");
  const sections = document.querySelectorAll("section");
  const bgElements = document.querySelectorAll(".fixed > div");

  // Mobile Menu Toggle
  mobileMenuButton.addEventListener("click", () => {
    mobileMenuButton.classList.toggle("active");

    if (mobileMenu.classList.contains("open")) {
      mobileMenu.style.height = "0";
      mobileMenu.classList.remove("open");
    } else {
      mobileMenu.classList.add("open");
      mobileMenu.style.height = `${mobileMenu.scrollHeight}px`;
    }
  });

  // Close mobile menu when a link is clicked
  mobileNavLinks.forEach((link) => {
    link.addEventListener("click", () => {
      mobileMenuButton.classList.remove("active");
      mobileMenu.style.height = "0";
      mobileMenu.classList.remove("open");
    });
  });

  // Navbar scroll effect
  window.addEventListener("scroll", () => {
    if (window.scrollY > 50) {
      navbar.classList.add("scrolled");
    } else {
      navbar.classList.remove("scrolled");
    }

    highlightCurrentSection();
  });

  // Smooth scroll for nav links
  navLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      const targetId = link.getAttribute("href");
      const targetSection = document.querySelector(targetId);

      if (targetSection) {
        const offsetTop = targetSection.offsetTop - 70; // Adjust for navbar height
        window.scrollTo({
          top: offsetTop,
          behavior: "smooth"
        });

        // Highlight the section briefly
        targetSection.classList.add("section-highlight");
        setTimeout(() => {
          targetSection.classList.remove("section-highlight");
        }, 1000);
      }
    });
  });

  // Highlight active section in navbar
  function highlightCurrentSection() {
    let current = "";

    sections.forEach((section) => {
      const sectionTop = section.offsetTop - 100;
      const sectionHeight = section.offsetHeight;

      if (
        window.scrollY >= sectionTop &&
        window.scrollY < sectionTop + sectionHeight
      ) {
        current = section.getAttribute("id");
      }
    });

    navLinks.forEach((link) => {
      link.classList.remove("active");
      if (link.getAttribute("href") === `#${current}`) {
        link.classList.add("active");
      }
    });

    mobileNavLinks.forEach((link) => {
      link.classList.remove("active");
      if (link.getAttribute("href") === `#${current}`) {
        link.classList.add("active");
      }
    });
  }

  // Parallax effect for background elements
  /*
  if (window.matchMedia('(prefers-reduced-motion: no-preference)').matches) {
    document.addEventListener('mousemove', (e) => {
      const x = e.clientX / window.innerWidth;
      const y = e.clientY / window.innerHeight;
      
      bgElements.forEach(element => {
        const speed = 20; // Adjust for more or less movement
        const xOffset = (x - 0.5) * speed;
        const yOffset = (y - 0.5) * speed;
        
        element.style.transform = `translate(${xOffset}px, ${yOffset}px)`;
      });
    });
  }
  */

  // Scroll animations for sections
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("section-visible");
        }
      });
    },
    { threshold: 0.1 }
  );

  sections.forEach((section) => {
    section.classList.add("section-hidden");
    observer.observe(section);
  });

  // Initialize active section on page load
  highlightCurrentSection();

  // Make header text visible with animation
  setTimeout(() => {
    const headerText = document.querySelector(".text-6xl");
    if (headerText) {
      headerText.style.opacity = 1;
      headerText.style.transform = "translateY(0)";
    }
  }, 300);
});

</script>
