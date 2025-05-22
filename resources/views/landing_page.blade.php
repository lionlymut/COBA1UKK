<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Laravel</title>
  <!-- Tailwind CSS CDN (untuk demo cepat) -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[url('/uploads/bg_landing.png')] bg-cover bg-center text-white flex flex-col items-center justify-start min-h-screen p-6 lg:p-8 pt-16">

  <!-- Header fixed di atas -->
  <div class="mx-auto max-w-screen-xl w-full flex justify-end px-6 py-4">
    <nav class="flex items-center gap-4">
      <a href="/dashboard" class="inline-block px-5 py-1.5 border border-transparent hover:border-[#b19cd9] rounded-sm text-sm text-white leading-normal">Dashboard</a>
      <a href="/login" class="inline-block px-5 py-1.5 border border-transparent hover:border-[#b19cd9] rounded-sm text-sm text-white leading-normal">Log in</a>
      <a href="/register" class="inline-block px-5 py-1.5 border border-transparent hover:border-[#b19cd9] rounded-sm text-sm text-white leading-normal">Register</a>
    </nav>
  </div>

  <!-- Konten utama -->
  <section class="flex flex-col-reverse lg:flex-row items-center justify-start gap-x-12 w-full max-w-screen-xl mx-auto px-6 mt-20">

    <!-- KIRI: TULISAN -->
    <div class="w-full lg:w-7/12 text-left">
      <h1 class="text-4xl md:text-5xl font-bold leading-tight text-white mb-6">
        Plan, Manage<br />
        and Get Things Done<br />
        All in One Place
      </h1>
      <p class="text-gray-300 mb-6">
        Sistem digital untuk kelancaran PKL bagi pelajar dan pembimbing.
      </p>

      <!-- Tombol -->
      <div class="flex flex-wrap gap-4">
        <!-- Instagram -->
        <a href="https://www.instagram.com/sijaantigedor?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="flex items-center gap-2 bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-md">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M7.75 2h8.5A5.75 5.75 0 0122 7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 012 16.25v-8.5A5.75 5.75 0 017.75 2zm0 1.5A4.25 4.25 0 003.5 7.75v8.5A4.25 4.25 0 007.75 20.5h8.5a4.25 4.25 0 004.25-4.25v-8.5A4.25 4.25 0 0016.25 3.5h-8.5zM12 7a5 5 0 110 10 5 5 0 010-10zm0 1.5a3.5 3.5 0 100 7 3.5 3.5 0 000-7zm5.25-.88a.88.88 0 110 1.75.88.88 0 010-1.75z"/>
          </svg>
          Instagram
        </a>

        <!-- GitHub -->
        <a href="https://github.com/akunmu" target="_blank" class="flex items-center gap-2 bg-gray-800 hover:bg-gray-700 text-white px-4 py-2 rounded-md">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 .5C5.73.5.5 5.73.5 12c0 5.08 3.29 9.38 7.86 10.9.58.1.79-.25.79-.55v-1.93c-3.2.7-3.87-1.54-3.87-1.54-.53-1.33-1.3-1.68-1.3-1.68-1.06-.73.08-.72.08-.72 1.17.08 1.79 1.2 1.79 1.2 1.04 1.78 2.74 1.27 3.41.97.1-.75.4-1.27.72-1.56-2.56-.3-5.26-1.28-5.26-5.68 0-1.25.44-2.27 1.17-3.07-.12-.3-.51-1.52.11-3.17 0 0 .96-.31 3.15 1.18a10.87 10.87 0 015.74 0c2.18-1.5 3.14-1.18 3.14-1.18.62 1.65.24 2.87.12 3.17.73.8 1.16 1.82 1.16 3.07 0 4.41-2.7 5.37-5.28 5.66.42.37.77 1.1.77 2.22v3.29c0 .3.2.66.8.55A10.5 10.5 0 0023.5 12C23.5 5.73 18.27.5 12 .5z"/>
          </svg>
          GitHub
        </a>
      </div>
    </div>

    <!-- KANAN: CAROUSEL GAMBAR -->
   <div x-data="carousel()" class="flex justify-center relative overflow-hidden rounded-xl shadow-lg w-[700px]" style="height: 350px;">
  <template x-for="(img, index) in images" :key="index">
    <img
      :src="img"
      alt="Carousel Image"
      class="w-full h-full rounded-xl absolute transition-opacity duration-700 object-cover"
      :class="{'opacity-100 relative': current === index, 'opacity-0': current !== index}"
    />
  </template>

</div>

<script>
  function carousel() {
    return {
      current: 0,
      images: [
        '/uploads/foto2.jpg',
        '/uploads/foto1.jpg',
        '/uploads/foto3.jpg',
      ],
      next() {
        this.current = (this.current + 1) % this.images.length;
      },
      prev() {
        this.current = (this.current - 1 + this.images.length) % this.images.length;
      },
      init() {
        setInterval(() => {
          this.next();
        }, 4000); // ganti gambar tiap 4 detik
      }
    }
  }
</script>

  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</body>
</html>
