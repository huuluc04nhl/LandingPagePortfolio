<!DOCTYPE html>
<html lang="vi" x-data="{ dark: localStorage.getItem('theme')==='dark'||(!localStorage.getItem('theme')&&window.matchMedia('(prefers-color-scheme: dark)').matches), scrolled:false, mobileMenu:false }" :class="{'dark':dark}" x-init="$watch('dark',v=>localStorage.setItem('theme',v?'dark':'light'));window.addEventListener('scroll',()=>scrolled=window.scrollY>20,{passive:true})" class="scroll-smooth">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="Góc truyền thông & Bài viết nghiên cứu khoa học của Nguyễn Hữu Lực — Sinh viên Kỹ thuật Phần mềm."/>
  <meta name="author" content="Nguyễn Hữu Lực"/>
  <meta property="og:title" content="Bài viết & Công nhận — Nguyễn Hữu Lực"/>
  <meta property="og:type" content="website"/>
  <title>Bài viết & Công nhận — Nguyễn Hữu Lực</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500&display=swap" rel="stylesheet"/>
  <script>
    tailwind.config={darkMode:'class',theme:{extend:{fontFamily:{display:['PT Sans','sans-serif'],body:['DM Sans','sans-serif']},colors:{accent:'#2563EB','accent-light':'#3B82F6'}}}}
  </script>
  <style>
    *,*::before,*::after{box-sizing:border-box;}
    html{font-family:'DM Sans',sans-serif;}
    h1,h2,h3,h4,h5,h6{font-family:'PT Sans',sans-serif;}
    .reveal{opacity:0;transform:translateY(24px);transition:opacity .6s cubic-bezier(.4,0,.2,1),transform .6s cubic-bezier(.4,0,.2,1);}
    .reveal.visible{opacity:1;transform:translateY(0);}
    .reveal-delay-1{transition-delay:.08s;}.reveal-delay-2{transition-delay:.16s;}.reveal-delay-3{transition-delay:.24s;}.reveal-delay-4{transition-delay:.32s;}.reveal-delay-5{transition-delay:.4s;}.reveal-delay-6{transition-delay:.48s;}
    .nav-link{position:relative;}
    .nav-link::after{content:'';position:absolute;bottom:-2px;left:0;width:0;height:1.5px;background:currentColor;transition:width .25s cubic-bezier(.4,0,.2,1);}
    .nav-link:hover::after{width:100%;}
    ::-webkit-scrollbar{width:5px;}::-webkit-scrollbar-track{background:transparent;}::-webkit-scrollbar-thumb{background:#2563EB;border-radius:99px;}
    body{transition:background-color .3s,color .3s;}
    body::before{content:'';position:fixed;inset:0;background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");pointer-events:none;z-index:0;opacity:.4;}
    .card{transition:transform .3s cubic-bezier(.4,0,.2,1),border-color .2s;}
    .card:hover{transform:translateY(-3px);}
    .btn-primary{position:relative;overflow:hidden;}
    .btn-primary::after{content:'';position:absolute;top:0;left:-100%;width:60%;height:100%;background:rgba(255,255,255,.18);transform:skewX(-20deg);transition:left .4s cubic-bezier(.4,0,.2,1);}
    .btn-primary:hover::after{left:160%;}
    [x-cloak]{display:none!important;}
    .photo-frame{position:relative;overflow:hidden;background:#e4e4e7;}
    .photo-frame img{width:100%;height:100%;object-fit:cover;display:block;}
  </style>
</head>
<body class="bg-white dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 font-body antialiased">

  <!-- NAV -->
  <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
    :class="scrolled?'bg-white/90 dark:bg-zinc-950/90 backdrop-blur-md shadow-sm shadow-black/5':'bg-transparent'">
    <nav class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between" aria-label="Main navigation">
      <a href="{{ route('home') }}" class="font-display font-bold text-xl tracking-tight z-10" aria-label="Trang chủ">
        <span class="text-zinc-900 dark:text-white">Huu</span><span class="text-accent">Luc</span>
      </a>
      <ul class="hidden md:flex items-center gap-8 text-sm font-medium" role="list">
        <li><a href="{{ route('home') }}#services" class="nav-link text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Dịch vụ</a></li>
        <li><a href="{{ route('projects') }}" class="nav-link text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Dự án</a></li>
        <li><a href="{{ route('home') }}#about" class="nav-link text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Giới thiệu</a></li>
        <li><a href="{{ route('blog') }}" class="nav-link text-accent font-medium" style="--tw-text-opacity:1">Blog</a></li>
        <li><a href="{{ route('home') }}#contact" class="nav-link text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Liên hệ</a></li>
      </ul>
      <div class="flex items-center gap-3">
        <button @click="dark=!dark" class="w-9 h-9 flex items-center justify-center rounded-full border border-zinc-200 dark:border-zinc-800 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors" :aria-label="dark?'Light mode':'Dark mode'">
          <svg x-show="!dark" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/></svg>
          <svg x-show="dark" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707M17.657 17.657l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z"/></svg>
        </button>
        <a href="{{ route('home') }}#contact" class="hidden md:inline-flex items-center gap-2 btn-primary bg-accent text-white text-sm font-medium px-5 py-2 rounded-full hover:bg-accent-light transition-colors">
          Liên hệ ngay <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
        <button @click="mobileMenu=!mobileMenu" class="md:hidden w-9 h-9 flex items-center justify-center rounded-full border border-zinc-200 dark:border-zinc-800" :aria-expanded="mobileMenu" aria-label="Toggle menu">
          <svg x-show="!mobileMenu" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
          <svg x-show="mobileMenu" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>
    </nav>
    <div x-show="mobileMenu" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2" class="md:hidden bg-white dark:bg-zinc-950 border-t border-zinc-100 dark:border-zinc-900">
      <ul class="flex flex-col px-6 py-4 gap-4 text-sm font-medium" role="list">
        <li><a href="{{ route('home') }}#services" @click="mobileMenu=false" class="block text-zinc-700 dark:text-zinc-300">Dịch vụ</a></li>
        <li><a href="{{ route('projects') }}" @click="mobileMenu=false" class="block text-zinc-700 dark:text-zinc-300">Dự án</a></li>
        <li><a href="{{ route('home') }}#about" @click="mobileMenu=false" class="block text-zinc-700 dark:text-zinc-300">Giới thiệu</a></li>
        <li><a href="{{ route('blog') }}" class="block text-accent font-medium">Blog</a></li>
        <li><a href="{{ route('home') }}#contact" @click="mobileMenu=false" class="block text-zinc-700 dark:text-zinc-300">Liên hệ</a></li>
      </ul>
    </div>
  </header>

  <main x-data="{ activeTab: 'all' }">

    <!-- HERO BLOG -->
    <section class="pt-36 pb-16 relative overflow-hidden">
      <div class="absolute top-0 right-0 w-80 h-80 bg-accent/10 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>
      <div class="max-w-6xl mx-auto px-6 relative z-10">
        <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-3">Góc truyền thông</p>
        <h1 class="reveal reveal-delay-1 font-display font-bold text-5xl md:text-6xl text-zinc-900 dark:text-white leading-tight mb-4">Bài viết &amp; Công nhận</h1>
        <p class="reveal reveal-delay-2 text-lg text-zinc-500 dark:text-zinc-400 max-w-2xl leading-relaxed">
          Các bài báo nghiên cứu khoa học chính thức và hồ sơ học thuật được công nhận bởi Trường Đại học Thủ Dầu Một (TDMU) trong hành trình học tập ngành Kỹ thuật Phần mềm.
        </p>

        <!-- Filter tags -->
        <div class="reveal reveal-delay-3 flex flex-wrap gap-2 mt-8">
          <button @click="activeTab='all'" :class="activeTab==='all'?'bg-accent text-white border-accent':'bg-white dark:bg-zinc-900 text-zinc-600 dark:text-zinc-400 border-zinc-200 dark:border-zinc-700 hover:border-accent'" class="text-sm px-4 py-1.5 rounded-full border transition-colors">Tất cả</button>
          <button @click="activeTab='eureka'" :class="activeTab==='eureka'?'bg-accent text-white border-accent':'bg-white dark:bg-zinc-900 text-zinc-600 dark:text-zinc-400 border-zinc-200 dark:border-zinc-700 hover:border-accent'" class="text-sm px-4 py-1.5 rounded-full border transition-colors">Euréka 2025</button>
          <button @click="activeTab='eportfolio'" :class="activeTab==='eportfolio'?'bg-accent text-white border-accent':'bg-white dark:bg-zinc-900 text-zinc-600 dark:text-zinc-400 border-zinc-200 dark:border-zinc-700 hover:border-accent'" class="text-sm px-4 py-1.5 rounded-full border transition-colors">ePortfolio</button>
        </div>
      </div>
    </section>

    <!-- FEATURED ARTICLE -->
    <section class="pb-16" x-show="activeTab === 'all' || activeTab === 'eureka'">
      <div class="max-w-6xl mx-auto px-6">
        <a href="{{ route('blog.article') }}" class="reveal group block rounded-3xl overflow-hidden bg-zinc-50 dark:bg-zinc-900 border border-zinc-100 dark:border-zinc-800 hover:border-accent transition-colors">
          <div class="grid md:grid-cols-2">
            <div class="photo-frame h-64 md:h-auto">
              <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=900&q=80" alt="Đề tài sinh viên TDMU lọt vào Bán kết giải thưởng Euréka 2025" loading="lazy"/>
            </div>
            <div class="p-8 md:p-12 flex flex-col justify-center">
              <div class="flex items-center gap-3 mb-4">
                <span class="text-xs bg-blue-50 dark:bg-zinc-800 text-accent border border-blue-200 dark:border-zinc-700 px-2.5 py-1 rounded-full">Nghiên cứu Khoa học</span>
                <span class="text-xs text-zinc-400">Tháng 11, 2025 · Tin tức trường</span>
              </div>
              <h2 class="font-display font-bold text-2xl md:text-3xl text-zinc-900 dark:text-white mb-4 group-hover:text-accent transition-colors">Đề tài sinh viên TDMU lọt vào Bán kết giải thưởng Euréka 2025</h2>
              <p class="text-zinc-500 dark:text-zinc-400 leading-relaxed mb-6">Bài viết vinh danh các đề tài xuất sắc lọt vào bán kết Giải thưởng Sinh viên Nghiên cứu Khoa học Euréka lần thứ XXVII năm 2025 trên trang tin chính thống của trường Đại học Thủ Dầu Một.</p>
              <span class="inline-flex items-center gap-1.5 text-sm font-medium text-accent nav-link">Xem chi tiết bài viết →</span>
            </div>
          </div>
        </a>
      </div>
    </section>

    <!-- ALL ARTICLES GRID -->
    <section class="pb-24">
      <div class="max-w-6xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-8">

          <!-- Card 1: Euréka 2025 -->
          <article x-show="activeTab === 'all' || activeTab === 'eureka'" class="reveal reveal-delay-1 card group bg-white dark:bg-zinc-900 rounded-2xl overflow-hidden border border-zinc-100 dark:border-zinc-800 hover:border-accent">
            <div class="photo-frame w-full h-56">
              <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=700&q=80" alt="Đề tài Euréka TDMU" loading="lazy"/>
            </div>
            <div class="p-6">
              <div class="flex items-center gap-3 mb-3">
                <span class="text-xs bg-blue-50 dark:bg-zinc-800 text-accent border border-blue-200 dark:border-zinc-700 px-2.5 py-1 rounded-full">Nghiên cứu Khoa học</span>
                <span class="text-xs text-zinc-400">Tháng 11, 2025</span>
              </div>
              <a href="{{ route('blog.article') }}">
                <h3 class="font-display font-bold text-xl text-zinc-900 dark:text-white mb-2 group-hover:text-accent transition-colors">Đề tài sinh viên TDMU lọt vào Bán kết giải thưởng Euréka 2025</h3>
              </a>
              <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed mb-4">Hệ thống nhận diện người và điều khiển thiết bị IoT thông minh xuất sắc vượt qua các vòng thi cấp trường và lọt vào vòng bán kết cấp toàn quốc.</p>
              <a href="{{ route('blog.article') }}" class="inline-flex items-center gap-1.5 text-sm font-medium text-accent nav-link">Xem chi tiết bài viết →</a>
            </div>
          </article>

          <!-- Card 2: ePortfolio -->
          <article x-show="activeTab === 'all' || activeTab === 'eportfolio'" class="reveal reveal-delay-2 card group bg-white dark:bg-zinc-900 rounded-2xl overflow-hidden border border-zinc-100 dark:border-zinc-800 hover:border-accent">
            <div class="photo-frame w-full h-56">
              <img src="https://images.unsplash.com/photo-1488590528505-98d2b5aba04b?w=700&q=80" alt="ePortfolio TDMU" loading="lazy"/>
            </div>
            <div class="p-6">
              <div class="flex items-center gap-3 mb-3">
                <span class="text-xs bg-blue-50 dark:bg-zinc-800 text-accent border border-blue-200 dark:border-zinc-700 px-2.5 py-1 rounded-full">ePortfolio</span>
                <span class="text-xs text-zinc-400">Bài tập lớn & NCKH</span>
              </div>
              <a href="https://eportfolio.tdmu.edu.vn/view/view.php?id=1877" target="_blank" rel="noopener noreferrer">
                <h3 class="font-display font-bold text-xl text-zinc-900 dark:text-white mb-2 group-hover:text-accent transition-colors">Hồ sơ đề tài Nghiên cứu Khoa học nhóm tại TDMU</h3>
              </a>
              <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed mb-4">Hồ sơ năng lực học thuật và các dự án nghiên cứu khoa học nhóm được lưu trữ, đánh giá và công nhận chính thức trên hệ thống ePortfolio của Đại học Thủ Dầu Một.</p>
              <a href="https://eportfolio.tdmu.edu.vn/view/view.php?id=1877" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-sm font-medium text-accent nav-link">Xem trên ePortfolio →</a>
            </div>
          </article>

        </div>
      </div>
    </section>

  </main>

  <footer class="border-t border-zinc-100 dark:border-zinc-900">
    <div class="max-w-6xl mx-auto px-6 py-8 flex flex-col sm:flex-row items-center justify-between gap-4">
      <p class="text-sm text-zinc-400">© <span id="year"></span> Luc. Mọi quyền được bảo lưu. <br>
      Phát triển bởi <a href="https://lbegey78.gumroad.com/" target="_blank" class="font-bold">Laurent Begey</a> • Phân phối bởi <a href="https://themewagon.com/" target="_blank" class="font-bold">ThemeWagon</a>
      <p class="text-xs text-zinc-500">Được xây dựng bằng <a href="https://tailwindcss.com" class="hover:text-accent transition-colors" rel="noopener noreferrer" target="_blank">Tailwind CSS</a> &amp; <a href="https://alpinejs.dev" class="hover:text-accent transition-colors" rel="noopener noreferrer" target="_blank">JavaScript</a></p>
    </div>
  </footer>

  <script>
    document.getElementById('year').textContent = new Date().getFullYear();
    const observer = new IntersectionObserver(entries => {
      entries.forEach(e => { if(e.isIntersecting){e.target.classList.add('visible');observer.unobserve(e.target);} });
    },{threshold:.1,rootMargin:'0px 0px -40px 0px'});
    document.querySelectorAll('.reveal').forEach(el=>observer.observe(el));
  </script>

</body>
</html>
