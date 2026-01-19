<!DOCTYPE html>
<html lang="ar" class="scroll-smooth">
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
      
      <main class="min-h-screen">
        @yield('content')
  </main>

        @include('layouts.header')


        @include('layouts.footer')


        <div class="icon-load"></div>
        

    <!-- BODY EOF   -->
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
    @yield(section: 'scripts')
    </body>
</html>