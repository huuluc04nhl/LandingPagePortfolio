<!DOCTYPE html>
<html lang="vi" x-data="projects()" :class="{'dark':dark}" x-init="init()" class="scroll-smooth">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dự án — Nguyễn Hữu Lực</title>
  <meta name="description" content="Xem tất cả các dự án thiết kế web Laravel, ASP.NET Core, Python IoT tiêu biểu của Nguyễn Hữu Lực."/>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500&display=swap" rel="stylesheet"/>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          fontFamily: { display: ['PT Sans','sans-serif'], body: ['DM Sans','sans-serif'] },
          colors: { accent: '#2563EB', 'accent-light': '#3B82F6' }
        }
      }
    }
  </script>
  <style>
    *,*::before,*::after{box-sizing:border-box;}
    html{font-family:'DM Sans',sans-serif;}
    h1,h2,h3,h4,h5,h6{font-family:'PT Sans',sans-serif;}
    .reveal{opacity:0;transform:translateY(22px);transition:opacity .55s cubic-bezier(.4,0,.2,1),transform .55s cubic-bezier(.4,0,.2,1);}
    .reveal.visible{opacity:1;transform:translateY(0);}
    .nav-link{position:relative;}
    .nav-link::after{content:'';position:absolute;bottom:-2px;left:0;width:0;height:1.5px;background:currentColor;transition:width .25s cubic-bezier(.4,0,.2,1);}
    .nav-link:hover::after{width:100%;}
    ::-webkit-scrollbar{width:5px;}::-webkit-scrollbar-track{background:transparent;}::-webkit-scrollbar-thumb{background:#2563EB;border-radius:99px;}
    body{transition:background-color .3s,color .3s;}
    body::before{content:'';position:fixed;inset:0;background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");pointer-events:none;z-index:0;opacity:.4;}
    .btn-primary{position:relative;overflow:hidden;}
    .btn-primary::after{content:'';position:absolute;top:0;left:-100%;width:60%;height:100%;background:rgba(255,255,255,.18);transform:skewX(-20deg);transition:left .4s cubic-bezier(.4,0,.2,1);}
    .btn-primary:hover::after{left:160%;}
    [x-cloak]{display:none!important;}
    .photo-frame{position:relative;overflow:hidden;background:#e4e4e7;}
    .photo-frame img{width:100%;height:100%;object-fit:cover;display:block;}
    .project-card{transition:transform .3s cubic-bezier(.4,0,.2,1),border-color .2s;}
    .project-card:hover{transform:translateY(-4px);}
  </style>
</head>
<body class="bg-white dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 font-body antialiased">

  <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
    :class="scrolled?'bg-white/90 dark:bg-zinc-950/90 backdrop-blur-md shadow-sm shadow-black/5':'bg-transparent'">
    <nav class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">
      <a href="{{ route('home') }}" class="font-display font-bold text-xl tracking-tight z-10">
        <span class="text-zinc-900 dark:text-white">Huu</span><span class="text-accent">Luc</span>
      </a>
      <ul class="hidden md:flex items-center gap-8 text-sm font-medium">
        <li><a href="{{ route('home') }}#services" class="nav-link text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Dịch vụ</a></li>
        <li><a href="{{ route('projects') }}" class="nav-link text-accent font-medium">Dự án</a></li>
        <li><a href="{{ route('home') }}#about" class="nav-link text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Giới thiệu</a></li>
        <li><a href="{{ route('blog') }}" class="nav-link text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Blog</a></li>
        <li><a href="{{ route('home') }}#contact" class="nav-link text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Liên hệ</a></li>
      </ul>
      <div class="flex items-center gap-3">
        <button @click="dark=!dark;localStorage.setItem('theme',dark?'dark':'light')" class="w-9 h-9 flex items-center justify-center rounded-full border border-zinc-200 dark:border-zinc-800 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors" :aria-label="dark?'Sáng':'Tối'">
          <svg x-show="!dark" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/></svg>
          <svg x-show="dark" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707M17.657 17.657l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z"/></svg>
        </button>
        <a href="{{ route('home') }}#contact" class="hidden md:inline-flex items-center gap-2 btn-primary bg-accent text-white text-sm font-medium px-5 py-2 rounded-full hover:bg-accent-light transition-colors">Liên hệ ngay &rarr;</a>
        <button @click="mobileMenu=!mobileMenu" class="md:hidden w-9 h-9 flex items-center justify-center rounded-full border border-zinc-200 dark:border-zinc-800" aria-label="Menu">
          <svg x-show="!mobileMenu" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
          <svg x-show="mobileMenu" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>
    </nav>
    <div x-show="mobileMenu" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2" class="md:hidden bg-white dark:bg-zinc-950 border-t border-zinc-100 dark:border-zinc-900">
      <ul class="flex flex-col px-6 py-4 gap-4 text-sm font-medium">
        <li><a href="{{ route('home') }}#services" @click="mobileMenu=false" class="block text-zinc-700 dark:text-zinc-300">Dịch vụ</a></li>
        <li><a href="{{ route('projects') }}" class="block text-accent font-medium">Dự án</a></li>
        <li><a href="{{ route('home') }}#about" @click="mobileMenu=false" class="block text-zinc-700 dark:text-zinc-300">Giới thiệu</a></li>
        <li><a href="{{ route('blog') }}" @click="mobileMenu=false" class="block text-zinc-700 dark:text-zinc-300">Blog</a></li>
        <li><a href="{{ route('home') }}#contact" @click="mobileMenu=false" class="block text-zinc-700 dark:text-zinc-300">Liên hệ</a></li>
      </ul>
    </div>
  </header>

  <main>
    <section class="pt-36 pb-12 relative overflow-hidden">
      <div class="absolute top-0 right-0 w-80 h-80 bg-accent/10 rounded-full blur-3xl pointer-events-none"></div>
      <div class="max-w-6xl mx-auto px-6 relative z-10">
        <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-3">Hồ sơ năng lực</p>
        <h1 class="reveal font-display font-bold text-5xl md:text-6xl text-zinc-900 dark:text-white leading-tight mb-4">Tất cả dự án</h1>
        <p class="reveal text-lg text-zinc-500 dark:text-zinc-400 max-w-xl leading-relaxed mb-8">Tổng hợp chi tiết các dự án và công trình lập trình của mình trong lĩnh vực thiết kế web backend, fullstack và IoT.</p>
        <div class="reveal flex flex-wrap gap-2">
          <template x-for="f in filterOptions" :key="f.value">
            <button
              @click="filter = f.value"
              :class="filter === f.value ? 'bg-accent text-white border-accent' : 'bg-white dark:bg-zinc-900 text-zinc-600 dark:text-zinc-400 border-zinc-200 dark:border-zinc-700 hover:border-accent'"
              class="text-sm px-4 py-1.5 rounded-full border transition-colors"
              x-text="f.label">
            </button>
          </template>
        </div>
      </div>
    </section>

    <section class="pb-24">
      <div class="max-w-6xl mx-auto px-6">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
          <template x-for="p in allProjects" :key="p.id">
            <div
              x-show="filter === 'all' || p.category === filter"
              x-transition:enter="transition ease-out duration-300"
              x-transition:enter-start="opacity-0 scale-95 translate-y-2"
              x-transition:enter-end="opacity-100 scale-100 translate-y-0"
              x-transition:leave="transition ease-in duration-200"
              x-transition:leave-start="opacity-100 scale-100"
              x-transition:leave-end="opacity-0 scale-95">
              <article class="project-card group h-full rounded-2xl overflow-hidden bg-white dark:bg-zinc-900 border border-zinc-100 dark:border-zinc-800 hover:border-accent transition-colors cursor-pointer" @click="openProject(p)">
                <div class="block photo-frame w-full h-52">
                  <img :src="p.img" :alt="p.title" loading="lazy"/>
                </div>
                <div class="p-6">
                  <div class="flex flex-wrap gap-2 mb-3">
                    <template x-for="tag in p.tags" :key="tag">
                      <span class="text-xs px-2.5 py-1 rounded-full"
                        :class="tag === p.categoryLabel ? 'bg-blue-50 dark:bg-zinc-800 text-accent border border-blue-200 dark:border-zinc-700' : 'bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400'"
                        x-text="tag"></span>
                    </template>
                  </div>
                  <h3 class="font-display font-bold text-lg text-zinc-900 dark:text-white mb-2 group-hover:text-accent transition-colors" x-text="p.title"></h3>
                  <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed mb-4 line-clamp-3" x-text="p.desc"></p>
                  <div class="flex items-center justify-between">
                    <span class="inline-flex items-center gap-1.5 text-sm font-medium text-zinc-900 dark:text-white nav-link group-hover:text-accent transition-colors">Xem chi tiết &rarr;</span>
                    <span class="text-xs text-zinc-400" x-text="p.year"></span>
                  </div>
                </div>
              </article>
            </div>
          </template>
        </div>
        <div x-show="visibleCount === 0" x-cloak class="text-center py-20">
          <p class="text-zinc-400 text-sm">Chưa có dự án nào trong mục này.</p>
        </div>
      </div>
    </section>

    <section class="pb-24">
      <div class="max-w-6xl mx-auto px-6">
        <div class="bg-zinc-900 dark:bg-zinc-800 rounded-3xl p-6 sm:p-10 md:p-14 text-center relative overflow-hidden">
          <div class="absolute top-0 right-0 w-64 h-64 bg-accent/20 rounded-full blur-3xl pointer-events-none"></div>
          <div class="absolute bottom-0 left-0 w-40 h-40 bg-accent/10 rounded-full blur-2xl pointer-events-none"></div>
          <div class="relative z-10">
            <p class="text-xs font-medium text-accent tracking-widest uppercase mb-4">Hợp tác &amp; Phát triển</p>
            <h2 class="font-display font-bold text-3xl md:text-4xl text-white mb-4">Bạn có ý tưởng dự án mới?</h2>
            <p class="text-zinc-400 max-w-md mx-auto mb-8">Mình luôn sẵn sàng thảo luận và xây dựng các giải pháp web tối ưu cho mục tiêu của bạn.</p>
            <a href="{{ route('home') }}#contact" class="inline-flex items-center gap-2 btn-primary bg-accent text-white font-medium px-8 py-3.5 rounded-full hover:bg-accent-light transition-colors">Bắt đầu ngay &rarr;</a>
          </div>
        </div>
      </div>
    </section>

    <!-- ═══ PREMIUM PROJECT DETAILS MODAL ═══ -->
    <div
      x-show="modalOpen"
      x-cloak
      class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-zinc-950/80 backdrop-blur-sm"
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition ease-in duration-200"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      @keydown.escape.window="closeModal()">
      
      <!-- Modal container card -->
      <div
        x-show="modalOpen"
        @click.away="closeModal()"
        class="bg-white dark:bg-zinc-900 rounded-3xl overflow-hidden max-w-2xl w-full border border-zinc-200 dark:border-zinc-800 shadow-2xl relative flex flex-col max-h-[90vh]"
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 translate-y-8 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-8 scale-95">
        
        <!-- Close button -->
        <button
          @click="closeModal()"
          class="absolute top-4 right-4 z-10 w-9 h-9 flex items-center justify-center rounded-full bg-zinc-950/60 hover:bg-zinc-950/80 text-white backdrop-blur-sm transition-colors cursor-pointer"
          aria-label="Đóng">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>

        <!-- Cover image with shadow overlay -->
        <div class="w-full h-36 sm:h-56 md:h-64 overflow-hidden relative shrink-0 bg-zinc-100 dark:bg-zinc-800">
          <img :src="selectedProject?.img" :alt="selectedProject?.title" class="w-full h-full object-cover" />
          <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/45 to-transparent"></div>
        </div>

        <!-- Scrollable details content -->
        <div class="p-6 md:p-8 overflow-y-auto space-y-6 flex-1">
          <!-- Meta Tags -->
          <div class="flex flex-wrap items-center gap-3">
            <span class="text-xs bg-blue-50 dark:bg-zinc-800 text-accent border border-blue-200 dark:border-zinc-700 px-3 py-1 rounded-full font-medium" x-text="selectedProject?.categoryLabel"></span>
            <span class="text-xs bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-3 py-1 rounded-full font-medium" x-text="selectedProject?.year"></span>
          </div>

          <!-- Title -->
          <h3 class="font-display font-bold text-2xl md:text-3xl text-zinc-900 dark:text-white leading-tight" x-text="selectedProject?.title"></h3>

          <!-- Long description -->
          <p class="text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed" x-text="selectedProject?.longDesc"></p>

          <!-- Key Features list -->
          <div class="space-y-3">
            <h4 class="font-display font-bold text-sm uppercase tracking-wider text-zinc-900 dark:text-white">Tính năng chính:</h4>
            <ul class="space-y-2.5">
              <template x-for="f in selectedProject?.features" :key="f">
                <li class="flex items-start gap-2.5 text-sm text-zinc-600 dark:text-zinc-400">
                  <span class="w-5 h-5 shrink-0 rounded-full bg-emerald-50 dark:bg-emerald-950/40 text-emerald-600 dark:text-emerald-400 flex items-center justify-center mt-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                  </span>
                  <span x-text="f"></span>
                </li>
              </template>
            </ul>
          </div>

          <!-- Technologies tags -->
          <div class="space-y-2.5 pt-2">
            <h4 class="font-display font-bold text-xs uppercase tracking-wider text-zinc-400 dark:text-zinc-500">Công nghệ sử dụng:</h4>
            <div class="flex flex-wrap gap-2">
              <template x-for="tag in selectedProject?.tags" :key="tag">
                <span class="text-xs bg-zinc-50 dark:bg-zinc-800/50 border border-zinc-200 dark:border-zinc-800 text-zinc-600 dark:text-zinc-400 px-3 py-1 rounded-lg" x-text="tag"></span>
              </template>
            </div>
          </div>

          <!-- Action Buttons / Links -->
          <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 pt-6 border-t border-zinc-100 dark:border-zinc-800 shrink-0 w-full">
            <a
              x-show="selectedProject?.githubUrl"
              :href="selectedProject?.githubUrl"
              target="_blank"
              rel="noopener noreferrer"
              class="btn-primary inline-flex items-center justify-center gap-2 bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 font-medium px-6 py-3 rounded-full hover:bg-zinc-700 dark:hover:bg-zinc-200 transition-colors text-sm w-full sm:w-auto">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
              </svg>
              Xem Github
            </a>
            <a
              x-show="selectedProject?.demoUrl"
              :href="selectedProject?.demoUrl"
              target="_blank"
              rel="noopener noreferrer"
              class="inline-flex items-center justify-center gap-2 border border-zinc-200 dark:border-zinc-800 hover:border-accent text-zinc-700 dark:text-zinc-300 font-medium px-6 py-3 rounded-full hover:bg-zinc-50 dark:hover:bg-zinc-900 transition-colors text-sm w-full sm:w-auto">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
              </svg>
              Chạy Demo
            </a>
          </div>
        </div>

      </div>
    </div>
  </main>

  <footer class="border-t border-zinc-100 dark:border-zinc-900">
    <div class="max-w-6xl mx-auto px-6 py-8 flex flex-col sm:flex-row items-center justify-between gap-4">
      <p class="text-sm text-zinc-400">&copy; <span id="year"></span> Nguyễn Hữu Lực. Mọi quyền được bảo lưu.</p>
      <p class="text-xs text-zinc-500">Được xây dựng bằng Tailwind CSS &amp; Alpine.js</p>
    </div>
  </footer>

  <script>
    function projects() {
      return {
        dark: false,
        scrolled: false,
        mobileMenu: false,
        filter: 'all',
        selectedProject: null,
        modalOpen: false,

        filterOptions: [
          { value: 'all',         label: 'Tất cả (5)' },
          { value: 'laravel-php', label: 'Laravel / PHP' },
          { value: 'csharp-asp',  label: 'C# / ASP.NET' },
          { value: 'python-iot',  label: 'Python / IoT' },
        ],

        allProjects: [
          {
            id: 1,
            title: 'Nhận diện người & Điều khiển thiết bị',
            category: 'python-iot',
            categoryLabel: 'Python / IoT',
            tags: ['Python', 'Raspberry Pi', 'IoT', 'AI'],
            year: '2025',
            desc: 'Hệ thống IoT tích hợp AI nhận dạng con người thông qua camera và tự động điều khiển thiết bị ngoại vi thông minh. Dự án lọt vào Bán kết NCKH sinh viên Euréka lần thứ XXVII.',
            img: 'https://images.unsplash.com/photo-1515879218367-8466d910aaa4?w=700&q=80',
            url: '{{ route("case-study") }}',
            githubUrl: 'https://github.com/huuluc04nhl/nckh-eureka-2025',
            demoUrl: '',
            longDesc: 'Hệ thống nhận dạng người và điều khiển thiết bị thông minh bằng AI trên phần cứng nhúng Raspberry Pi, giúp giải quyết triệt để bài toán lãng phí điện năng tại các phòng học, phòng thí nghiệm công cộng.',
            features: [
              'Nhận diện người thời gian thực bằng MobileNet-SSD tối ưu với tốc độ 15-18 FPS trên phần cứng nhúng.',
              'Tự động đóng cắt dòng điện xoay chiều thông qua module Rơ-le kết nối trực tiếp chân GPIO.',
              'Tránh lỗi ngắt điện sai của cảm biến hồng ngoại thông thường nhờ thuật toán kiểm tra sự hiện diện tĩnh lặng.',
              'Lọt vào vòng Bán kết giải thưởng Nghiên cứu Khoa học Sinh viên Euréka cấp Quốc gia năm 2025.'
            ]
          },
          {
            id: 2,
            title: 'Skyline Cinema — Hệ thống rạp phim',
            category: 'laravel-php',
            categoryLabel: 'Laravel / PHP',
            tags: ['Laravel', 'PHP', 'MySQL', 'Đặt vé'],
            year: '2026',
            desc: 'Hệ thống quản lý rạp chiếu phim và đặt vé trực tuyến với chọn ghế thời gian thực, quản lý lịch chiếu và báo cáo doanh thu trực quan.',
            img: 'https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?w=700&q=80',
            url: '#',
            githubUrl: 'https://github.com/huuluc04nhl/SkylineCinema',
            demoUrl: 'https://skyline-cinema.demo',
            longDesc: 'Một ứng dụng web hoàn chỉnh quản lý rạp chiếu phim và đặt vé trực tuyến xây dựng dựa trên framework PHP Laravel. Dự án tích hợp đầy đủ tính năng cho cả khách hàng và ban quản trị.',
            features: [
              'Chọn ghế ngồi rạp chiếu phim thời gian thực (Real-time seat selection) mượt mà và trực quan.',
              'Hệ thống quản lý suất chiếu, phòng chiếu, phim đang chiếu và phim sắp chiếu linh hoạt.',
              'Tích hợp cổng thanh toán trực tuyến và tự động gửi email hóa đơn vé xem phim kèm mã QR.',
              'Dashboard Admin thống kê trực quan doanh thu theo phim, theo ngày/tháng/năm bằng biểu đồ sinh động.'
            ]
          },
          {
            id: 3,
            title: 'CPL Hotel — Quản lý khách sạn',
            category: 'csharp-asp',
            categoryLabel: 'C# / ASP.NET',
            tags: ['ASP.NET Core', 'C#', 'SQL Server'],
            year: '2024',
            desc: 'Website quản lý khách sạn thông minh hỗ trợ đặt phòng trực tuyến, tích hợp hóa đơn dịch vụ tự động và giao diện quản trị trực quan.',
            img: 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=700&q=80',
            url: '#',
            githubUrl: 'https://github.com/huuluc04nhl/CPL-Hotel',
            demoUrl: 'https://cpl-hotel.demo',
            longDesc: 'Hệ thống quản lý khách sạn thông minh viết bằng ASP.NET Core MVC (C#) giúp số hóa quy trình quản lý phòng nghỉ, dịch vụ phòng, doanh thu và tương tác khách hàng.',
            features: [
              'Đặt phòng trực tuyến và kiểm tra phòng trống tự động theo thời gian thực chính xác.',
              'Quản lý dịch vụ phòng đi kèm (giặt ủi, ẩm thực, minibar) và tự động cộng dồn vào hóa đơn thanh toán khi check-out.',
              'Giao diện phân quyền chi tiết giữa quản trị viên (Admin), nhân viên lễ tân (Receptionist) và khách hàng.',
              'Thống kê báo cáo tỷ lệ lấp đầy phòng nghỉ và doanh thu tổng quan hàng tháng.'
            ]
          },
          {
            id: 4,
            title: 'LeoWanVN — Laptop & Linh kiện',
            category: 'csharp-asp',
            categoryLabel: 'C# / ASP.NET',
            tags: ['ASP.NET MVC', 'C#', 'SQL Server'],
            year: '2024',
            desc: 'Website thương mại điện tử chuyên cung cấp laptop và linh kiện máy tính, hỗ trợ giỏ hàng, bộ lọc chi tiết và quy trình thanh toán.',
            img: 'https://images.unsplash.com/photo-1588702547919-26089e690ecc?w=700&q=80',
            url: '#',
            githubUrl: 'https://github.com/huuluc04nhl/LeoWanVN',
            demoUrl: 'https://leowanvn.demo',
            longDesc: 'Trang web thương mại điện tử chuyên kinh doanh thiết bị laptop, linh kiện điện tử cao cấp viết trên nền tảng ASP.NET MVC, tối ưu trải nghiệm mua sắm và quản lý bán hàng.',
            features: [
              'Bộ lọc sản phẩm đa tiêu chí nâng cao (hãng sản xuất, khoảng giá, cấu hình CPU, RAM, ổ cứng).',
              'Quy trình giỏ hàng hiện đại và thanh toán bảo mật với quy trình chuẩn 3 bước.',
              'Trang quản trị cập nhật số lượng tồn kho sản phẩm, nhập kho, quản lý danh mục và duyệt đơn hàng nhanh chóng.',
              'Tính năng đánh giá, bình luận và chấm điểm sản phẩm trực tiếp.'
            ]
          },
          {
            id: 5,
            title: 'LuxeLaptop — Laptop Store',
            category: 'laravel-php',
            categoryLabel: 'Laravel / PHP',
            tags: ['PHP Thuần', 'MySQL', 'Fullstack'],
            year: '2025',
            desc: 'Website bán hàng laptop cao cấp tối giản, viết bằng PHP thuần để hiểu sâu về kiến trúc cơ sở dữ liệu và quản lý phiên làm việc cơ bản.',
            img: 'https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=700&q=80',
            url: '#',
            githubUrl: 'https://github.com/huuluc04nhl/LuxeLaptop',
            demoUrl: 'https://luxelaptop.demo',
            longDesc: 'Dự án website thương mại điện tử tối giản bán laptop cao cấp được viết bằng PHP thuần và cơ sở dữ liệu MySQL, giúp rèn luyện tư duy lập trình cốt lõi và tương tác trực tiếp với cơ sở dữ liệu.',
            features: [
              'Thiết kế giao diện Dark Mode thanh lịch, sang trọng và hiện đại giúp tôn vinh sản phẩm.',
              'Quản lý phiên đăng nhập của người dùng (Session/Cookie) an toàn từ đầu.',
              'Xây dựng các chức năng thêm, sửa, xóa sản phẩm (CRUD) thuần mà không dùng thư viện bổ trợ.',
              'Tương tác cơ sở dữ liệu an toàn thông qua PDO và chuẩn hóa câu truy vấn chống lỗi SQL Injection.'
            ]
          }
        ],

        get visibleCount() {
          if (this.filter === 'all') return this.allProjects.length;
          return this.allProjects.filter(p => p.category === this.filter).length;
        },

        openProject(p) {
          if (p.url && p.url !== '#') {
            window.location.href = p.url;
          } else {
            this.selectedProject = p;
            this.modalOpen = true;
            document.body.style.overflow = 'hidden';
          }
        },

        closeModal() {
          this.modalOpen = false;
          // Keep selectedProject for transition fade out, clear after delay
          setTimeout(() => {
            if (!this.modalOpen) {
              this.selectedProject = null;
            }
          }, 300);
          document.body.style.overflow = '';
        },

        init() {
          this.dark = localStorage.getItem('theme') === 'dark'
            || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches);

          window.addEventListener('scroll', () => {
            this.scrolled = window.scrollY > 20;
          }, { passive: true });

          // Tự động nhận tham số bộ lọc từ URL nếu có
          const urlParams = new URLSearchParams(window.location.search);
          const filterParam = urlParams.get('filter');
          if (filterParam && this.filterOptions.some(f => f.value === filterParam)) {
            this.filter = filterParam;
          }

          // Tự động nhận tham số mở dự án từ URL nếu có
          const projectParam = urlParams.get('project');
          if (projectParam) {
            const proj = this.allProjects.find(p => p.id == projectParam);
            if (proj) {
              this.openProject(proj);
            }
          }

          this.$nextTick(() => {
            const obs = new IntersectionObserver(entries => {
              entries.forEach(e => {
                if (e.isIntersecting) {
                  e.target.classList.add('visible');
                  obs.unobserve(e.target);
                }
              });
            }, { threshold: 0.08, rootMargin: '0px 0px -30px 0px' });
            document.querySelectorAll('.reveal').forEach(el => obs.observe(el));
          });
        }
      }
    }

    document.getElementById('year').textContent = new Date().getFullYear();
  </script>
</body>
</html>
