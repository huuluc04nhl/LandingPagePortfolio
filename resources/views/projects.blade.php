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
              <article class="project-card group h-full rounded-2xl overflow-hidden bg-white dark:bg-zinc-900 border border-zinc-100 dark:border-zinc-800 hover:border-accent transition-colors">
                <a :href="p.url" class="block photo-frame w-full h-52">
                  <img :src="p.img" :alt="p.title" loading="lazy"/>
                </a>
                <div class="p-6">
                  <div class="flex flex-wrap gap-2 mb-3">
                    <template x-for="tag in p.tags" :key="tag">
                      <span class="text-xs px-2.5 py-1 rounded-full"
                        :class="tag === p.categoryLabel ? 'bg-blue-50 dark:bg-zinc-800 text-accent border border-blue-200 dark:border-zinc-700' : 'bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400'"
                        x-text="tag"></span>
                    </template>
                  </div>
                  <a :href="p.url">
                    <h3 class="font-display font-bold text-lg text-zinc-900 dark:text-white mb-2 group-hover:text-accent transition-colors" x-text="p.title"></h3>
                  </a>
                  <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed mb-4" x-text="p.desc"></p>
                  <div class="flex items-center justify-between">
                    <a :href="p.url" class="inline-flex items-center gap-1.5 text-sm font-medium text-zinc-900 dark:text-white nav-link">Xem chi tiết &rarr;</a>
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
        <div class="bg-zinc-900 dark:bg-zinc-800 rounded-3xl p-10 md:p-14 text-center relative overflow-hidden">
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

        filterOptions: [
          { value: 'all',         label: 'Tất cả (5)' },
          { value: 'laravel-php', label: 'Laravel / PHP' },
          { value: 'csharp-asp',  label: 'C# / ASP.NET' },
          { value: 'python-iot',  label: 'Python / IoT' },
        ],

        allProjects: [
          { id:1,  title:'Nhận diện người & Điều khiển thiết bị',  category:'python-iot',  categoryLabel:'Python / IoT',  tags:['Python','Raspberry Pi','IoT','AI'],      year:'2025', desc:'Hệ thống IoT tích hợp AI nhận dạng con người thông qua camera và tự động điều khiển thiết bị ngoại vi thông minh. Dự án lọt vào Bán kết NCKH sinh viên Euréka lần thứ XXVII.', img:'https://images.unsplash.com/photo-1515879218367-8466d910aaa4?w=700&q=80',  url:'{{ route("case-study") }}' },
          { id:2,  title:'Skyline Cinema — Hệ thống rạp phim',      category:'laravel-php', categoryLabel:'Laravel / PHP', tags:['Laravel','PHP','MySQL','Đặt vé'],        year:'2025', desc:'Hệ thống quản lý rạp chiếu phim và đặt vé trực tuyến với chọn ghế thời gian thực, quản lý lịch chiếu và báo cáo doanh thu trực quan.',                                   img:'https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?w=700&q=80', url:'#' },
          { id:3,  title:'CPL Hotel — Quản lý khách sạn',          category:'csharp-asp',  categoryLabel:'C# / ASP.NET',  tags:['ASP.NET Core','C#','SQL Server'],        year:'2024', desc:'Website quản lý khách sạn thông minh hỗ trợ đặt phòng trực tuyến, tích hợp hóa đơn dịch vụ tự động và giao diện quản trị trực quan.',                                 img:'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=700&q=80', url:'#' },
          { id:4,  title:'LeoWanVN — Laptop & Linh kiện',         category:'csharp-asp',  categoryLabel:'C# / ASP.NET',  tags:['ASP.NET MVC','C#','SQL Server'],         year:'2024', desc:'Website thương mại điện tử chuyên cung cấp laptop và linh kiện máy tính, hỗ trợ giỏ hàng, bộ lọc chi tiết và quy trình thanh toán.',                                img:'https://images.unsplash.com/photo-1588702547919-26089e690ecc?w=700&q=80', url:'#' },
          { id:5,  title:'LuxeLaptop — Laptop Store',              category:'laravel-php', categoryLabel:'Laravel / PHP', tags:['PHP Thuần','MySQL','Fullstack'],        year:'2023', desc:'Website bán hàng laptop cao cấp tối giản, viết bằng PHP thuần để hiểu sâu về kiến trúc cơ sở dữ liệu và quản lý phiên làm việc cơ bản.',                             img:'https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=700&q=80',  url:'#' },
        ],

        get visibleCount() {
          if (this.filter === 'all') return this.allProjects.length;
          return this.allProjects.filter(p => p.category === this.filter).length;
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
