<!DOCTYPE html>
<html lang="vi" x-data="app()" :class="{'dark':dark}" class="scroll-smooth">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Nguyễn Hữu Lực — Sinh viên Kỹ thuật Phần mềm & Web Developer (Intern / Fresher). Xem portfolio các dự án Laravel, ASP.NET Core, NCKH Euréka.">
<meta name="keywords" content="Nguyễn Hữu Lực, Kỹ thuật Phần mềm, sinh viên SE, fresher web developer, thực tập sinh web, portfolio, Laravel, ASP.NET, Euréka">
<meta name="author" content="Nguyễn Hữu Lực">
<meta property="og:title" content="Nguyễn Hữu Lực — Web Developer Portfolio">
<meta property="og:description" content="Sinh viên ngành Kỹ thuật Phần mềm đang tìm kiếm cơ hội thực tập/Fresher Web Developer. Khám phá các sản phẩm web tối ưu.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://github.com/huuluc04nhl">
<title>Nguyễn Hữu Lực — Portfolio</title>

<script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500&display=swap" rel="stylesheet">

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
*,*::before,*::after{box-sizing:border-box}
html,body{font-family:'DM Sans',sans-serif}
h1,h2,h3,h4,h5,h6{font-family:'PT Sans',sans-serif}
body{transition:background-color .3s,color .3s}

/* noise overlay */
body::before{content:'';position:fixed;inset:0;pointer-events:none;z-index:0;opacity:.35;
background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 200'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.05'/%3E%3C/svg%3E")}

/* scrollbar */
::-webkit-scrollbar{width:5px}
::-webkit-scrollbar-track{background:transparent}
::-webkit-scrollbar-thumb{background:#2563EB;border-radius:99px}

/* reveal on scroll */
.reveal{opacity:0;transform:translateY(26px);transition:opacity .6s cubic-bezier(.4,0,.2,1),transform .6s cubic-bezier(.4,0,.2,1)}
.reveal.in{opacity:1;transform:none}
.d1{transition-delay:.08s}.d2{transition-delay:.16s}.d3{transition-delay:.24s}.d4{transition-delay:.32s}

/* nav underline animation */
.nl{position:relative}
.nl::after{content:'';position:absolute;bottom:-2px;left:0;width:0;height:1.5px;background:currentColor;transition:width .22s cubic-bezier(.4,0,.2,1)}
.nl:hover::after,.nl.on::after{width:100%}
.nl.on{font-weight:500}

/* shimmer button */
.shimmer{position:relative;overflow:hidden}
.shimmer::after{content:'';position:absolute;top:0;left:-100%;width:60%;height:100%;background:rgba(255,255,255,.18);transform:skewX(-20deg);transition:left .4s cubic-bezier(.4,0,.2,1)}
.shimmer:hover::after{left:160%}

/* photo frames */
.pf{overflow:hidden;background:#d4d4d8}
.pf img{width:100%;height:100%;object-fit:cover;display:block}

/* card hover */
.card-h{transition:transform .28s cubic-bezier(.4,0,.2,1),border-color .18s}
.card-h:hover{transform:translateY(-4px)}

/* skill tag */
.stag{transition:border-color .18s}

[x-cloak]{display:none!important}
</style>
</head>

<body class="bg-white dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 antialiased">

<!-- ═══ NAV ═══ -->
<header class="fixed inset-x-0 top-0 z-50 transition-all duration-300"
  :class="sc?'bg-white/90 dark:bg-zinc-950/90 backdrop-blur-md shadow-sm shadow-black/5':''">
  <nav class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between" aria-label="Main navigation">

    <a href="#hero" class="font-display font-bold text-xl tracking-tight relative z-10">
      <span class="text-zinc-900 dark:text-white">Huu</span><span class="text-accent">Luc</span>
    </a>

    <ul class="hidden md:flex items-center gap-8 text-sm" role="list">
      <li><a href="#services" class="nl text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors" :class="s==='services'?'on !text-zinc-900 dark:!text-white':''">Dịch vụ</a></li>
      <li><a href="#work"     class="nl text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors" :class="s==='work'?'on !text-zinc-900 dark:!text-white':''">Dự án</a></li>
      <li><a href="#about"   class="nl text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors" :class="s==='about'?'on !text-zinc-900 dark:!text-white':''">Giới thiệu</a></li>
      <li><a href="#reviews" class="nl text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors" :class="s==='reviews'?'on !text-zinc-900 dark:!text-white':''">Đánh giá</a></li>
      <li><a href="#blog"    class="nl text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors" :class="s==='blog'?'on !text-zinc-900 dark:!text-white':''">Blog</a></li>
      <li><a href="#contact" class="nl text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors" :class="s==='contact'?'on !text-zinc-900 dark:!text-white':''">Liên hệ</a></li>
    </ul>

    <div class="flex items-center gap-3">
      <!-- dark toggle -->
      <button @click="dark=!dark" class="w-9 h-9 flex items-center justify-center rounded-full border border-zinc-200 dark:border-zinc-800 hover:bg-zinc-100 dark:hover:bg-zinc-900 transition-colors" :aria-label="dark?'Light mode':'Dark mode'">
        <svg x-show="!dark" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/></svg>
        <svg x-show="dark"  class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707M17.657 17.657l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z"/></svg>
      </button>
      <!-- hire me -->
      <a href="#contact" class="hidden md:inline-flex items-center gap-2 shimmer bg-accent text-white text-sm font-medium px-5 py-2 rounded-full hover:bg-accent-light transition-colors">
        Liên hệ ngay <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
      </a>
      <!-- hamburger -->
      <button @click="mm=!mm" class="md:hidden w-9 h-9 flex items-center justify-center rounded-full border border-zinc-200 dark:border-zinc-800" :aria-expanded="mm" aria-label="Toggle menu">
        <svg x-show="!mm" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        <svg x-show="mm"  class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
      </button>
    </div>
  </nav>

  <!-- mobile menu -->
  <div x-show="mm" x-cloak
    x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
    class="md:hidden bg-white dark:bg-zinc-950 border-t border-zinc-100 dark:border-zinc-900">
    <ul class="flex flex-col px-6 py-5 gap-4 text-sm font-medium" role="list">
      <li><a href="#services" @click="mm=false" class="block text-zinc-700 dark:text-zinc-300 hover:text-accent transition-colors">Dịch vụ</a></li>
      <li><a href="#work"     @click="mm=false" class="block text-zinc-700 dark:text-zinc-300 hover:text-accent transition-colors">Dự án</a></li>
      <li><a href="#about"   @click="mm=false" class="block text-zinc-700 dark:text-zinc-300 hover:text-accent transition-colors">Giới thiệu</a></li>
      <li><a href="#reviews" @click="mm=false" class="block text-zinc-700 dark:text-zinc-300 hover:text-accent transition-colors">Đánh giá</a></li>
      <li><a href="#blog"    @click="mm=false" class="block text-zinc-700 dark:text-zinc-300 hover:text-accent transition-colors">Blog</a></li>
      <li><a href="#contact" @click="mm=false" class="block text-zinc-700 dark:text-zinc-300 hover:text-accent transition-colors">Liên hệ</a></li>
      <li class="pt-2 border-t border-zinc-100 dark:border-zinc-900">
        <a href="#contact" @click="mm=false" class="inline-flex shimmer bg-accent text-white font-medium text-sm px-5 py-2.5 rounded-full">Liên hệ ngay →</a>
      </li>
    </ul>
  </div>
</header>

<main>

<!-- ═══ HERO ═══ -->
<section id="hero" class="relative min-h-screen flex items-center pt-16 overflow-hidden">
  <div class="absolute top-1/4 right-0 w-96 h-96 bg-accent/10 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>
  <div class="absolute bottom-1/4 left-0 w-64 h-64 bg-zinc-200/50 dark:bg-zinc-800/30 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>

  <div class="relative z-10 max-w-6xl mx-auto px-6 py-24 w-full">
    <div class="grid md:grid-cols-2 gap-12 items-center">

      <div>
        <p class="reveal text-sm font-medium text-accent tracking-widest uppercase mb-4">Tìm kiếm cơ hội thực tập</p>
        <h1 class="reveal d1 font-display font-bold text-5xl md:text-6xl lg:text-7xl leading-[1.05] tracking-tight text-zinc-900 dark:text-white mb-6">
          Xin chào, mình là <span class="text-accent">Lực</span>
        </h1>
        <p class="reveal d2 text-lg md:text-xl text-zinc-500 dark:text-zinc-400 font-light leading-relaxed max-w-md mb-10">
          Sinh viên ngành Kỹ thuật Phần mềm. Định hướng trở thành một <strong class="font-medium text-zinc-700 dark:text-zinc-300">Web Developer (Intern / Fresher)</strong> nhiệt huyết, ham học hỏi và tối ưu hóa hiệu năng sản phẩm.
        </p>
        <div class="reveal d3 flex flex-wrap gap-4">
          <a href="#work" class="shimmer inline-flex items-center gap-2 bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 font-medium px-7 py-3.5 rounded-full hover:bg-zinc-700 dark:hover:bg-zinc-200 transition-colors text-sm">
            Xem dự án của mình
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
          </a>
          <a href="#contact" class="inline-flex items-center gap-2 border border-zinc-300 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 font-medium px-7 py-3.5 rounded-full hover:bg-zinc-50 dark:hover:bg-zinc-900 transition-colors text-sm">Liên hệ với mình</a>
        </div>
        <div class="reveal d4 flex gap-8 mt-14 pt-8 border-t border-zinc-100 dark:border-zinc-900">
          <div><p class="font-display font-bold text-3xl text-zinc-900 dark:text-white">5+</p><p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1">Dự án tiêu biểu</p></div>
          <div><p class="font-display font-bold text-3xl text-zinc-900 dark:text-white">NCKH</p><p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1">Bán kết Euréka 2025</p></div>
          <div><p class="font-display font-bold text-3xl text-zinc-900 dark:text-white">100%</p><p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1">Đam mê &amp; Tận tâm</p></div>
        </div>
      </div>

      <div class="reveal d2 flex justify-center md:justify-end">
        <div class="relative w-72 h-72 md:w-80 md:h-80 lg:w-96 lg:h-96">
          <div class="pf w-full h-full rounded-3xl">
            <img src="{{ asset('images/avatar.jpg') }}" alt="Nguyễn Hữu Lực — IT Student & Web Developer" loading="eager">
          </div>
          <div class="absolute -bottom-4 -left-4 bg-accent text-white font-display font-bold text-sm px-4 py-2.5 rounded-2xl shadow-lg">Tìm kiếm cơ hội Intern / Fresher</div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ SERVICES ═══ -->
<section id="services" class="py-24 bg-zinc-50 dark:bg-zinc-900/40">
  <div class="max-w-6xl mx-auto px-6">
    <div class="mb-14">
      <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-3">Công việc của mình</p>
      <h2 class="reveal d1 font-display font-bold text-4xl md:text-5xl text-zinc-900 dark:text-white">Dịch vụ cung cấp</h2>
    </div>
    <div class="grid md:grid-cols-3 gap-6">

      <article class="reveal d1 card-h group bg-white dark:bg-zinc-900 rounded-2xl p-8 border border-zinc-100 dark:border-zinc-800 hover:border-accent">
        <div class="w-12 h-12 flex items-center justify-center bg-blue-50 dark:bg-zinc-800 rounded-xl mb-6 group-hover:bg-accent/10 transition-colors">
          <svg class="w-6 h-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17H3a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v10a2 2 0 01-2 2h-2"/></svg>
        </div>
        <h3 class="font-display font-bold text-xl text-zinc-900 dark:text-white mb-3">Thiết kế UI/UX</h3>
        <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed">Từ wireframe đến prototype hoàn chỉnh trên Figma. Giao diện trực quan, thu hút giúp tăng tỷ lệ chuyển đổi và đặt trải nghiệm người dùng lên hàng đầu.</p>
      </article>

      <article class="reveal d2 card-h group bg-zinc-900 dark:bg-zinc-800 rounded-2xl p-8 border border-zinc-800 hover:border-accent">
        <div class="w-12 h-12 flex items-center justify-center bg-zinc-800 dark:bg-zinc-700 rounded-xl mb-6 group-hover:bg-accent/20 transition-colors">
          <svg class="w-6 h-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
        </div>
        <h3 class="font-display font-bold text-xl text-white mb-3">Lập trình Backend &amp; Fullstack</h3>
        <p class="text-sm text-zinc-400 leading-relaxed">Xây dựng hệ thống backend vững chắc, API tối ưu bằng PHP (Laravel), C# (ASP.NET) và Node.js. Đảm bảo hiệu năng, tính mở rộng và bảo mật tốt.</p>
      </article>

      <article class="reveal d3 card-h group bg-white dark:bg-zinc-900 rounded-2xl p-8 border border-zinc-100 dark:border-zinc-800 hover:border-accent">
        <div class="w-12 h-12 flex items-center justify-center bg-blue-50 dark:bg-zinc-800 rounded-xl mb-6 group-hover:bg-accent/10 transition-colors">
          <svg class="w-6 h-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/></svg>
        </div>
        <h3 class="font-display font-bold text-xl text-zinc-900 dark:text-white mb-3">Thiết kế Landing Page</h3>
        <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed">Các trang đích có tỷ lệ chuyển đổi cao cho SaaS, ứng dụng di động và thương hiệu cá nhân. Truyền tải giá trị tức thì và thúc đẩy hành động ngay từ lượt cuộn đầu tiên.</p>
      </article>

    </div>
  </div>
</section>

<!-- ═══ WORK ═══ -->
<section id="work" class="py-24">
  <div class="max-w-6xl mx-auto px-6">
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-14">
      <div>
        <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-3">Hồ sơ năng lực</p>
        <h2 class="reveal d1 font-display font-bold text-4xl md:text-5xl text-zinc-900 dark:text-white">Dự án tiêu biểu</h2>
      </div>
      <a href="{{ route('projects') }}" class="reveal d1 text-sm font-medium text-zinc-500 dark:text-zinc-400 hover:text-accent transition-colors self-start sm:self-auto nl">Tất cả dự án →</a>
    </div>
 
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
 
      <!-- Dự án 1: Nghiên cứu Khoa học Euréka (Feature project: spans 2 cols on lg) -->
      <article class="card-h reveal d1 group rounded-2xl overflow-hidden bg-zinc-100 dark:bg-zinc-900 border border-zinc-100 dark:border-zinc-800 hover:border-accent lg:col-span-2">
        <div class="pf w-full h-64 md:h-80">
          <img src="https://images.unsplash.com/photo-1515879218367-8466d910aaa4?w=900&q=80" alt="Hệ thống nhận diện người và điều khiển thiết bị" loading="lazy">
        </div>
        <div class="p-7">
          <div class="flex flex-wrap gap-2 mb-4">
            <span class="text-xs bg-blue-50 dark:bg-zinc-800 text-accent border border-blue-200 dark:border-zinc-700 px-3 py-1 rounded-full font-medium">Nghiên cứu Khoa học</span>
            <span class="text-xs bg-blue-50 dark:bg-zinc-800 text-accent border border-blue-200 dark:border-zinc-700 px-3 py-1 rounded-full font-medium">Bán kết Euréka 2025</span>
            <span class="text-xs bg-zinc-200 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 px-3 py-1 rounded-full">Python</span>
            <span class="text-xs bg-zinc-200 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 px-3 py-1 rounded-full">Raspberry Pi</span>
          </div>
          <a href="{{ route('case-study') }}">
            <h3 class="font-display font-bold text-2xl text-zinc-900 dark:text-white mb-2">Hệ thống nhận diện người và điều khiển thiết bị</h3>
          </a>
          <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed mb-5">Hệ thống IoT tích hợp trí tuệ nhân tạo (AI) giúp nhận diện con người thông qua camera và tự động điều khiển các thiết bị ngoại vi thông minh. Dự án xuất sắc lọt vào vòng bán kết Giải thưởng Nghiên cứu Khoa học Sinh viên Euréka lần thứ XXVII năm 2025.</p>
          <a href="{{ route('case-study') }}" class="inline-flex items-center gap-1.5 text-sm font-medium text-zinc-900 dark:text-white nl">Xem chi tiết dự án <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg></a>
        </div>
      </article>
 
      <!-- Dự án 2: Skyline Cinema (PHP Laravel) -->
      <article class="card-h reveal d2 group rounded-2xl overflow-hidden bg-zinc-100 dark:bg-zinc-900 border border-zinc-100 dark:border-zinc-800 hover:border-accent">
        <div class="pf w-full h-48">
          <img src="https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?w=800&q=80" alt="Skyline Cinema" loading="lazy">
        </div>
        <div class="p-6">
          <div class="flex flex-wrap gap-2 mb-3">
            <span class="text-xs bg-blue-50 dark:bg-zinc-800 text-accent border border-blue-200 dark:border-zinc-700 px-3 py-1 rounded-full font-medium font-medium">Laravel</span>
            <span class="text-xs bg-zinc-200 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 px-3 py-1 rounded-full font-medium">PHP / MySQL</span>
          </div>
          <a href="{{ route('projects') }}?filter=laravel-php">
            <h3 class="font-display font-bold text-xl text-zinc-900 dark:text-white mb-1.5">Skyline Cinema</h3>
          </a>
          <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed mb-4">Hệ thống quản lý rạp chiếu phim và đặt vé xem phim trực tuyến hiện đại với chọn ghế thời gian thực, quản lý suất chiếu và doanh thu trực quan.</p>
          <a href="{{ route('projects') }}?filter=laravel-php" class="inline-flex items-center gap-1.5 text-sm font-medium text-zinc-900 dark:text-white nl">Xem chi tiết dự án →</a>
        </div>
      </article>
 
      <!-- Dự án 3: CPL Hotel (ASP.NET Core) -->
      <article class="card-h reveal d1 group rounded-2xl overflow-hidden bg-zinc-100 dark:bg-zinc-900 border border-zinc-100 dark:border-zinc-800 hover:border-accent">
        <div class="pf w-full h-48">
          <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800&q=80" alt="CPL Hotel" loading="lazy">
        </div>
        <div class="p-6">
          <div class="flex flex-wrap gap-2 mb-3">
            <span class="text-xs bg-blue-50 dark:bg-zinc-800 text-accent border border-blue-200 dark:border-zinc-700 px-3 py-1 rounded-full font-medium font-medium">ASP.NET Core</span>
            <span class="text-xs bg-zinc-200 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 px-3 py-1 rounded-full font-medium">SQL Server</span>
          </div>
          <a href="{{ route('projects') }}?filter=csharp-asp">
            <h3 class="font-display font-bold text-xl text-zinc-900 dark:text-white mb-1.5">CPL Hotel</h3>
          </a>
          <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed mb-4">Website quản lý khách sạn thông minh tích hợp đặt phòng trực tuyến, quản lý hóa đơn dịch vụ và hỗ trợ chăm sóc khách hàng chuyên nghiệp.</p>
          <a href="{{ route('projects') }}?filter=csharp-asp" class="inline-flex items-center gap-1.5 text-sm font-medium text-zinc-900 dark:text-white nl">Xem chi tiết dự án →</a>
        </div>
      </article>
 
      <!-- Dự án 4: LeoWanVN (ASP.NET MVC) -->
      <article class="card-h reveal d2 group rounded-2xl overflow-hidden bg-zinc-100 dark:bg-zinc-900 border border-zinc-100 dark:border-zinc-800 hover:border-accent">
        <div class="pf w-full h-48">
          <img src="https://images.unsplash.com/photo-1588702547919-26089e690ecc?w=800&q=80" alt="LeoWanVN" loading="lazy">
        </div>
        <div class="p-6">
          <div class="flex flex-wrap gap-2 mb-3">
            <span class="text-xs bg-blue-50 dark:bg-zinc-800 text-accent border border-blue-200 dark:border-zinc-700 px-3 py-1 rounded-full font-medium font-medium">ASP.NET MVC</span>
            <span class="text-xs bg-zinc-200 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 px-3 py-1 rounded-full font-medium">C# / SQL Server</span>
          </div>
          <a href="{{ route('projects') }}?filter=csharp-asp">
            <h3 class="font-display font-bold text-xl text-zinc-900 dark:text-white mb-1.5">LeoWanVN</h3>
          </a>
          <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed mb-4">Website thương mại điện tử bán hàng laptop và linh kiện máy tính, tích hợp giỏ hàng, bộ lọc thông số chi tiết và quy trình thanh toán tối ưu.</p>
          <a href="{{ route('projects') }}?filter=csharp-asp" class="inline-flex items-center gap-1.5 text-sm font-medium text-zinc-900 dark:text-white nl">Xem chi tiết dự án →</a>
        </div>
      </article>
 
      <!-- Dự án 5: LuxeLaptop (PHP Thuần) -->
      <article class="card-h reveal d3 group rounded-2xl overflow-hidden bg-zinc-100 dark:bg-zinc-900 border border-zinc-100 dark:border-zinc-800 hover:border-accent">
        <div class="pf w-full h-48">
          <img src="https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=800&q=80" alt="LuxeLaptop" loading="lazy">
        </div>
        <div class="p-6">
          <div class="flex flex-wrap gap-2 mb-3">
            <span class="text-xs bg-blue-50 dark:bg-zinc-800 text-accent border border-blue-200 dark:border-zinc-700 px-3 py-1 rounded-full font-medium font-medium">PHP Thuần</span>
            <span class="text-xs bg-zinc-200 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 px-3 py-1 rounded-full font-medium">MySQL</span>
          </div>
          <a href="{{ route('projects') }}?filter=laravel-php">
            <h3 class="font-display font-bold text-xl text-zinc-900 dark:text-white mb-1.5">LuxeLaptop</h3>
          </a>
          <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed mb-4">Website bán hàng laptop cao cấp tối giản, viết bằng PHP thuần để hiểu sâu về quản lý cơ sở dữ liệu và cách tối ưu hóa hiệu năng ứng dụng web cơ bản.</p>
          <a href="{{ route('projects') }}?filter=laravel-php" class="inline-flex items-center gap-1.5 text-sm font-medium text-zinc-900 dark:text-white nl">Xem chi tiết dự án →</a>
        </div>
      </article>
 
    </div>
  </div>
</section>

<!-- ═══ ABOUT ═══ -->
<section id="about" class="py-24 bg-zinc-50 dark:bg-zinc-900/40">
  <div class="max-w-6xl mx-auto px-6">
    <div class="grid md:grid-cols-2 gap-16 items-center">

      <div class="reveal order-2 md:order-1">
        <div class="pf w-full aspect-square max-w-sm mx-auto rounded-3xl">
          <img src="{{ asset('images/avatar.jpg') }}" alt="Nguyễn Hữu Lực" loading="lazy">
        </div>
      </div>

      <div class="order-1 md:order-2">
        <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-3">Về bản thân</p>
        <h2 class="reveal d1 font-display font-bold text-4xl md:text-5xl text-zinc-900 dark:text-white leading-tight mb-6">Đôi nét về<br>chặng đường của mình</h2>
        <p class="reveal d2 text-zinc-500 dark:text-zinc-400 leading-relaxed mb-4">
          Mình là Lực (Nguyễn Hữu Lực), hiện là sinh viên ngành Kỹ thuật Phần mềm. Với niềm say mê to lớn dành cho lập trình web, mình đang tích cực chuẩn bị hành trang và tìm kiếm cơ hội thực tập, thử sức tại vị trí **Web Developer (Intern / Fresher)**. Mình thích thiết kế các giao diện đẹp, tối ưu hóa trải nghiệm người dùng và chuyển các ý tưởng sáng tạo thành mã nguồn sạch sẽ, hiệu quả.
        </p>
        <p class="reveal d3 text-zinc-500 dark:text-zinc-400 leading-relaxed mb-8">
          Mặc dù là sinh viên chuẩn bị bước chân vào môi trường doanh nghiệp, mình luôn đặt tính chuyên nghiệp lên hàng đầu thông qua kiến trúc mã nguồn chuẩn chỉnh, các ứng dụng responsive mượt mà và khả năng tự nghiên cứu, làm chủ công nghệ mới tốt. Ngoài giờ học và lập trình, mình thường đọc tin tức công nghệ, phân tích UX/UI của các website nổi tiếng và tham gia nghiên cứu khoa học.
        </p>
        <div class="reveal d4">
          <p class="text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-widest mb-3">Công nghệ &amp; Công cụ</p>
          <div class="flex flex-wrap gap-2" role="list" aria-label="Skills">
            <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">C# / ASP.NET</span>
            <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">Node.js</span>
            <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">Laravel / PHP</span>
            <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">Python</span>
            <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">SQL Server / MySQL</span>
            <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">JavaScript</span>
            <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">Tailwind CSS</span>
            <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">Git / GitHub</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ TESTIMONIALS ═══ -->
<section id="reviews" class="py-24">
  <div class="max-w-6xl mx-auto px-6">
    <div class="mb-14">
      <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-3">Đánh giá từ đối tác</p>
      <h2 class="reveal d1 font-display font-bold text-4xl md:text-5xl text-zinc-900 dark:text-white">Khách hàng nói gì</h2>
    </div>

    <div class="grid md:grid-cols-3 gap-6">

      <blockquote class="reveal d1 bg-zinc-50 dark:bg-zinc-900 rounded-2xl p-7 border border-zinc-100 dark:border-zinc-800">
        <div class="flex gap-0.5 mb-5" aria-label="5 stars">
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
        </div>
        <p class="text-zinc-600 dark:text-zinc-400 text-sm leading-relaxed mb-6 italic">"Lúc đầu thấy Lực báo giá làm game khủng long hơi đắt hơn so với mặt bằng chung nên tụi mình khá đắn đo. Nhưng khi nhận game về chạy rất mượt, logic và hiệu ứng cực tốt ngoài mong đợi. Đúng là tiền nào của nấy!"</p>
        <footer class="flex items-center gap-3">
          <div class="pf w-10 h-10 rounded-full shrink-0"><img src="{{ asset('images/bao.jpg') }}" alt="Nguyễn Gia Bảo" loading="lazy"></div>
          <div>
            <p class="font-medium text-sm text-zinc-900 dark:text-white">Nguyễn Gia Bảo</p>
            <p class="text-xs text-zinc-500">Khách hàng tiềm năng, Dự án Game Khủng Long</p>
          </div>
        </footer>
      </blockquote>

      <blockquote class="reveal d2 bg-zinc-900 dark:bg-zinc-800 rounded-2xl p-7 border border-zinc-800">
        <div class="flex gap-0.5 mb-5" aria-label="5 stars">
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
        </div>
        <p class="text-zinc-400 text-sm leading-relaxed mb-6 italic">"Mình nhờ Lực phát triển hệ thống Skyline Cinema bằng Laravel. Code viết gọn gàng, hệ thống đặt vé chạy mượt và bàn giao đúng hẹn. Lực làm việc rất có trách nhiệm, chủ động cập nhật tiến độ."</p>
        <footer class="flex items-center gap-3">
          <div class="pf w-10 h-10 rounded-full shrink-0"><img src="{{ asset('images/hao.jpg') }}" alt="Nguyễn Xuân Hào" loading="lazy"></div>
          <div>
            <p class="font-medium text-sm text-white">Nguyễn Xuân Hào</p>
            <p class="text-xs text-zinc-500">Đồng sáng lập, Skyline Cinema</p>
          </div>
        </footer>
      </blockquote>

      <blockquote class="reveal d3 bg-zinc-50 dark:bg-zinc-900 rounded-2xl p-7 border border-zinc-100 dark:border-zinc-800">
        <div class="flex gap-0.5 mb-5" aria-label="5 stars">
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
          <svg class="w-4 h-4 text-accent fill-current" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
        </div>
        <p class="text-zinc-600 dark:text-zinc-400 text-sm leading-relaxed mb-6 italic">"Lúc thương lượng chi phí làm web bán sách ban đầu thấy hơi cao hơn ngân sách dự kiến của tụi mình một chút, nhưng chất lượng website nhận lại thực sự rất xứng đáng. Giao diện đẹp, dễ thao tác và Lực hỗ trợ tận tình."</p>
        <footer class="flex items-center gap-3">
          <div class="pf w-10 h-10 rounded-full shrink-0"><img src="{{ asset('images/khoa.jpg') }}" alt="Trần Anh Khoa" loading="lazy"></div>
          <div>
            <p class="font-medium text-sm text-zinc-900 dark:text-white">Trần Anh Khoa</p>
            <p class="text-xs text-zinc-500">Khách hàng tiềm năng, Dự án Web Bán Sách</p>
          </div>
        </footer>
      </blockquote>

    </div>
  </div>
</section>

<!-- ═══ BLOG ═══ -->
<section id="blog" class="py-24 bg-zinc-50 dark:bg-zinc-900/40">
  <div class="max-w-6xl mx-auto px-6">
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-14">
      <div>
        <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-3">Góc truyền thông</p>
        <h2 class="reveal d1 font-display font-bold text-4xl md:text-5xl text-zinc-900 dark:text-white">Bài viết &amp; Công nhận</h2>
      </div>
      <a href="https://eportfolio.tdmu.edu.vn/view/view.php?id=1877" target="_blank" rel="noopener noreferrer" class="reveal d1 text-sm font-medium text-zinc-500 dark:text-zinc-400 hover:text-accent transition-colors self-start sm:self-auto nl">Xem đề tài trên ePortfolio →</a>
    </div>

    <div class="grid md:grid-cols-2 max-w-4xl mx-auto gap-8">

      <article class="reveal d1 card-h group bg-white dark:bg-zinc-900 rounded-2xl overflow-hidden border border-zinc-100 dark:border-zinc-800 hover:border-accent">
        <div class="pf w-full h-48">
          <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=700&q=80" alt="Giải thưởng Euréka TDMU" loading="lazy">
        </div>
        <div class="p-6">
          <div class="flex items-center gap-3 mb-3">
            <span class="text-xs bg-blue-50 dark:bg-zinc-800 text-accent border border-blue-200 dark:border-zinc-700 px-2.5 py-1 rounded-full">Nghiên cứu Khoa học</span>
            <span class="text-xs text-zinc-400">Tháng 11, 2025</span>
          </div>
          <a href="https://the.tdmu.edu.vn/bai-viet/05-de-tai-cua-sinh-vien-truong-dai-hoc-thu-dau-mot-vao-ban-ket-giai-thuong-sinh-vien-nghien-cuu-khoa-hoc-eureka-2025/1a17ceda-25ea-422f-bc39-05c2a1caa577" target="_blank" rel="noopener noreferrer">
            <h3 class="font-display font-bold text-lg text-zinc-900 dark:text-white mb-2 group-hover:text-accent transition-colors">Đề tài sinh viên TDMU lọt vào Bán kết giải thưởng Euréka 2025</h3>
          </a>
          <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed mb-4">Bài viết vinh danh các đề tài xuất sắc lọt vào bán kết Giải thưởng Sinh viên NCKH Euréka lần thứ XXVII năm 2025 trên trang tin chính thức của trường Đại học Thủ Dầu Một.</p>
          <a href="https://the.tdmu.edu.vn/bai-viet/05-de-tai-cua-sinh-vien-truong-dai-hoc-thu-dau-mot-vao-ban-ket-giai-thuong-sinh-vien-nghien-cuu-khoa-hoc-eureka-2025/1a17ceda-25ea-422f-bc39-05c2a1caa577" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-sm font-medium text-zinc-900 dark:text-white nl">Đọc bài viết chính thức →</a>
        </div>
      </article>

      <article class="reveal d2 card-h group bg-white dark:bg-zinc-900 rounded-2xl overflow-hidden border border-zinc-100 dark:border-zinc-800 hover:border-accent">
        <div class="pf w-full h-48">
          <img src="https://images.unsplash.com/photo-1488590528505-98d2b5aba04b?w=700&q=80" alt="ePortfolio TDMU" loading="lazy">
        </div>
        <div class="p-6">
          <div class="flex items-center gap-3 mb-3">
            <span class="text-xs bg-blue-50 dark:bg-zinc-800 text-accent border border-blue-200 dark:border-zinc-700 px-2.5 py-1 rounded-full">Nghiên cứu Khoa học / Dự án nhóm</span>
            <span class="text-xs text-zinc-400">Đề tài phối hợp</span>
          </div>
          <a href="https://eportfolio.tdmu.edu.vn/view/view.php?id=1877" target="_blank" rel="noopener noreferrer">
            <h3 class="font-display font-bold text-lg text-zinc-900 dark:text-white mb-2 group-hover:text-accent transition-colors">Hồ sơ đề tài Nghiên cứu Khoa học nhóm tại TDMU</h3>
          </a>
          <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed mb-4">Đề tài nghiên cứu khoa học nhóm được thực hiện và công nhận chính thức tại trường Đại học Thủ Dầu Một, được lưu trữ, chấm điểm và đánh giá chi tiết trên hệ thống ePortfolio.</p>
          <a href="https://eportfolio.tdmu.edu.vn/view/view.php?id=1877" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-sm font-medium text-zinc-900 dark:text-white nl">Xem chi tiết đề tài trên ePortfolio →</a>
        </div>
      </article>

    </div>
  </div>
</section>

<!-- ═══ CONTACT ═══ -->
<section id="contact" class="py-24">
  <div class="max-w-6xl mx-auto px-6">
    <div class="bg-zinc-900 dark:bg-zinc-800 rounded-3xl p-10 md:p-16 relative overflow-hidden">
      <div class="absolute top-0 right-0 w-64 h-64 bg-accent/20 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>
      <div class="absolute bottom-0 left-0 w-40 h-40 bg-accent/10 rounded-full blur-2xl pointer-events-none" aria-hidden="true"></div>

      <div class="relative z-10 grid md:grid-cols-2 gap-12 items-start">

        <div>
          <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-3">Liên hệ với mình</p>
          <h2 class="reveal d1 font-display font-bold text-4xl md:text-5xl text-white leading-tight mb-5">Hãy cùng nhau<br>tạo nên điều gì đó!</h2>
          <p class="reveal d2 text-zinc-400 leading-relaxed mb-8">Mình đang tìm kiếm cơ hội thực tập hoặc bắt đầu công việc với vị trí Web Developer (Intern / Fresher) tại các doanh nghiệp. Nếu bạn quan tâm và thấy mình phù hợp với đội ngũ của bạn, hãy liên hệ ngay nhé!</p>

          <div class="reveal d3 flex flex-col gap-4">
            <a href="mailto:huuluc04@gmail.com" class="group flex items-center gap-3 text-zinc-400 hover:text-white transition-colors">
              <span class="w-9 h-9 flex items-center justify-center bg-zinc-800 rounded-lg group-hover:bg-accent/20 transition-colors shrink-0">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
              </span>
              <span class="text-sm">huuluc04@gmail.com</span>
            </a>
            <a href="https://github.com/huuluc04nhl" rel="noopener noreferrer" target="_blank" class="group flex items-center gap-3 text-zinc-400 hover:text-white transition-colors">
              <span class="w-9 h-9 flex items-center justify-center bg-zinc-800 rounded-lg group-hover:bg-accent/20 transition-colors shrink-0">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
              </span>
              <span class="text-sm">github.com/huuluc04nhl</span>
            </a>
          </div>
        </div>

        <div class="reveal d2">
          <form action="#" method="POST" novalidate>
            <div class="flex flex-col gap-4">
              <div class="grid sm:grid-cols-2 gap-4">
                <div>
                  <label for="fname" class="block text-xs font-medium text-zinc-400 mb-1.5">Họ và tên <span aria-hidden="true">*</span></label>
                  <input type="text" id="fname" name="name" placeholder="Nguyễn Văn A" required autocomplete="name"
                    class="w-full bg-zinc-800 border border-zinc-700 text-white text-sm rounded-xl px-4 py-3 placeholder-zinc-600 focus:outline-none focus:border-accent transition-colors">
                </div>
                <div>
                  <label for="femail" class="block text-xs font-medium text-zinc-400 mb-1.5">Email <span aria-hidden="true">*</span></label>
                  <input type="email" id="femail" name="email" placeholder="example@domain.com" required autocomplete="email"
                    class="w-full bg-zinc-800 border border-zinc-700 text-white text-sm rounded-xl px-4 py-3 placeholder-zinc-600 focus:outline-none focus:border-accent transition-colors">
                </div>
              </div>
              <div>
                <label for="fsubject" class="block text-xs font-medium text-zinc-400 mb-1.5">Tiêu đề</label>
                <input type="text" id="fsubject" name="subject" placeholder="Cơ hội hợp tác / Dự án"
                  class="w-full bg-zinc-800 border border-zinc-700 text-white text-sm rounded-xl px-4 py-3 placeholder-zinc-600 focus:outline-none focus:border-accent transition-colors">
              </div>
              <div>
                <label for="fmessage" class="block text-xs font-medium text-zinc-400 mb-1.5">Lời nhắn <span aria-hidden="true">*</span></label>
                <textarea id="fmessage" name="message" rows="4" placeholder="Nhập lời nhắn của bạn ở đây..." required
                  class="w-full bg-zinc-800 border border-zinc-700 text-white text-sm rounded-xl px-4 py-3 placeholder-zinc-600 focus:outline-none focus:border-accent transition-colors resize-none"></textarea>
              </div>
              <button type="submit" class="shimmer w-full bg-accent text-white font-display font-bold text-sm py-3.5 rounded-xl hover:bg-accent-light transition-colors">
                Gửi tin nhắn →
              </button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</section>

</main>

<footer class="border-t border-zinc-100 dark:border-zinc-900">
  <div class="max-w-6xl mx-auto px-6 py-8 flex flex-col sm:flex-row items-center justify-between gap-4">
    <p class="text-sm text-zinc-400">© <span id="yr"></span> Luc. Mọi quyền được bảo lưu. <br>
      Phát triển bởi <a href="https://lbegey78.gumroad.com/" target="_blank" class="font-bold">Laurent Begey</a> • Phân phối bởi <a href="https://themewagon.com/" target="_blank" class="font-bold">ThemeWagon</a>
    <p class="text-xs text-zinc-500">Được xây dựng bằng
      <a href="https://tailwindcss.com" rel="noopener noreferrer" target="_blank" class="hover:text-accent transition-colors">Tailwind CSS</a>
      &amp;
      <a href="https://alpinejs.dev" rel="noopener noreferrer" target="_blank" class="hover:text-accent transition-colors">JavaScript</a>
    </p>
  </div>
</footer>

<script>
function app() {
  return {
    dark: false,
    mm: false,
    sc: false,
    s: 'hero',

    init() {
      // dark mode
      this.dark = localStorage.getItem('theme') === 'dark' ||
        (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches);
      this.$watch('dark', v => localStorage.setItem('theme', v ? 'dark' : 'light'));

      // scroll
      window.addEventListener('scroll', () => {
        this.sc = window.scrollY > 20;
        this.updateSection();
      }, { passive: true });

      // reveal
      const io = new IntersectionObserver(entries => {
        entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
      }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
      document.querySelectorAll('.reveal').forEach(el => io.observe(el));

      // year
      document.getElementById('yr').textContent = new Date().getFullYear();
    },

    updateSection() {
      const atBottom = (window.innerHeight + window.scrollY) >= document.body.scrollHeight - 60;
      if (atBottom) { this.s = 'contact'; return; }
      const ids = ['contact','blog','reviews','about','work','services','hero'];
      for (const id of ids) {
        const el = document.getElementById(id);
        if (el && window.scrollY >= el.offsetTop - 130) { this.s = id; return; }
      }
    }
  }
}
</script>

</body>
</html>
