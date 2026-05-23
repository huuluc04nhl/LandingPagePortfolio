<!DOCTYPE html>
<html lang="vi" x-data="{
  dark: localStorage.getItem('theme')==='dark'||(!localStorage.getItem('theme')&&window.matchMedia('(prefers-color-scheme: dark)').matches),
  scrolled: false,
  mobileMenu: false,
  progress: 0
}" :class="{'dark':dark}" x-init="
  $watch('dark', v => localStorage.setItem('theme', v ? 'dark' : 'light'));
  window.addEventListener('scroll', () => {
    scrolled = window.scrollY > 20;
    progress = Math.min(100, Math.round((window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100));
  }, { passive: true });
" class="scroll-smooth">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="Case Study: Hệ thống nhận diện người và điều khiển thiết bị thông minh — Đề tài Nghiên cứu Khoa học Euréka 2025 bởi Nguyễn Hữu Lực."/>
  <meta name="author" content="Nguyễn Hữu Lực"/>
  <meta property="og:title" content="Hệ thống nhận diện người & điều khiển thiết bị IoT — Case Study bởi Nguyễn Hữu Lực"/>
  <meta property="og:type" content="article"/>
  <title>Case Study: Hệ thống nhận diện người &amp; điều khiển thiết bị IoT — Nguyễn Hữu Lực</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
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
    ::-webkit-scrollbar{width:5px;}::-webkit-scrollbar-track{background:transparent;}::-webkit-scrollbar-thumb{background:#2563EB;border-radius:99px;}
    body{transition:background-color .3s,color .3s;}
    body::before{content:'';position:fixed;inset:0;background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");pointer-events:none;z-index:0;opacity:.4;}
    .nav-link{position:relative;}
    .nav-link::after{content:'';position:absolute;bottom:-2px;left:0;width:0;height:1.5px;background:currentColor;transition:width .25s cubic-bezier(.4,0,.2,1);}
    .nav-link:hover::after{width:100%;}
    .btn-primary{position:relative;overflow:hidden;}
    .btn-primary::after{content:'';position:absolute;top:0;left:-100%;width:60%;height:100%;background:rgba(255,255,255,.18);transform:skewX(-20deg);transition:left .4s cubic-bezier(.4,0,.2,1);}
    .btn-primary:hover::after{left:160%;}
    [x-cloak]{display:none!important;}
    .photo-frame{position:relative;overflow:hidden;background:#e4e4e7;}
    .photo-frame img{width:100%;height:100%;object-fit:cover;display:block;}

    /* Reading progress */
    .progress-bar{position:fixed;top:0;left:0;height:3px;background:#2563EB;z-index:100;transition:width .1s linear;}

    /* Reveal */
    .reveal{opacity:0;transform:translateY(22px);transition:opacity .55s cubic-bezier(.4,0,.2,1),transform .55s cubic-bezier(.4,0,.2,1);}
    .reveal.visible{opacity:1;transform:translateY(0);}
    .d1{transition-delay:.07s}.d2{transition-delay:.14s}.d3{transition-delay:.21s}.d4{transition-delay:.28s}

    /* Case study prose */
    .prose-cs h2{font-family:'PT Sans',sans-serif;font-size:1.55rem;font-weight:700;margin:2.75rem 0 1rem;line-height:1.25;}
    .prose-cs h3{font-family:'PT Sans',sans-serif;font-size:1.15rem;font-weight:700;margin:2rem 0 .6rem;line-height:1.3;color:#2563EB;}
    .prose-cs p{margin:0 0 1.4rem;line-height:1.82;color:#52525b;}
    .dark .prose-cs p{color:#a1a1aa;}
    .prose-cs ul{margin:0 0 1.4rem 1.5rem;list-style:disc;}
    .prose-cs li{margin-bottom:.45rem;line-height:1.7;color:#52525b;}
    .dark .prose-cs li{color:#a1a1aa;}
    .prose-cs blockquote{border-left:3px solid #2563EB;padding:.75rem 1.25rem;margin:0 0 1.8rem;background:#f0f7ff;border-radius:0 8px 8px 0;}
    .dark .prose-cs blockquote{background:#1e293b;}
    .prose-cs blockquote p{color:#52525b;font-style:italic;margin:0;}
    .dark .prose-cs blockquote p{color:#cbd5e1;}
    .prose-cs hr{border:none;border-top:1px solid #e4e4e7;margin:2.5rem 0;}
    .dark .prose-cs hr{border-top-color:#27272a;}
    .prose-cs a{color:#2563EB;text-decoration:underline;text-underline-offset:3px;}

    /* Stat card */
    .stat-card{border-left:3px solid #2563EB;}

    /* Image caption */
    .img-caption{font-size:.8rem;color:#a1a1aa;text-align:center;margin-top:.6rem;}

    /* Step badge */
    .step-badge{width:2rem;height:2rem;min-width:2rem;border-radius:50%;background:#2563EB;color:#fff;font-family:'PT Sans',sans-serif;font-weight:700;font-size:.85rem;display:flex;align-items:center;justify-content:center;}

    /* card hover */
    .card-h{transition:transform .28s cubic-bezier(.4,0,.2,1),border-color .18s;}
    .card-h:hover{transform:translateY(-4px);}
  </style>
</head>
<body class="bg-white dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 font-body antialiased">

  <!-- Reading progress bar -->
  <div class="progress-bar" :style="`width:${progress}%`" role="progressbar" :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100" aria-label="Reading progress"></div>

  <!-- ═══ NAV ═══ -->
  <header class="fixed top-0.5 left-0 right-0 z-50 transition-all duration-300"
    :class="scrolled ? 'bg-white/90 dark:bg-zinc-950/90 backdrop-blur-md shadow-sm shadow-black/5' : 'bg-transparent'">
    <nav class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between" aria-label="Main navigation">
      <a href="{{ route('home') }}" class="font-display font-bold text-xl tracking-tight z-10">
        <span class="text-zinc-900 dark:text-white">Huu</span><span class="text-accent">Luc</span>
      </a>
      <ul class="hidden md:flex items-center gap-8 text-sm font-medium" role="list">
        <li><a href="{{ route('home') }}#services" class="nav-link text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Dịch vụ</a></li>
        <li><a href="{{ route('projects') }}" class="nav-link text-accent font-medium">Dự án</a></li>
        <li><a href="{{ route('home') }}#about" class="nav-link text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Giới thiệu</a></li>
        <li><a href="{{ route('blog') }}" class="nav-link text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Blog</a></li>
        <li><a href="{{ route('home') }}#contact" class="nav-link text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Liên hệ</a></li>
      </ul>
      <div class="flex items-center gap-3">
        <button @click="dark=!dark"
          class="w-9 h-9 flex items-center justify-center rounded-full border border-zinc-200 dark:border-zinc-800 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors"
          :aria-label="dark ? 'Light mode' : 'Dark mode'">
          <svg x-show="!dark" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/></svg>
          <svg x-show="dark" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707M17.657 17.657l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z"/></svg>
        </button>
        <a href="{{ route('home') }}#contact" class="hidden md:inline-flex items-center gap-2 btn-primary bg-accent text-white text-sm font-medium px-5 py-2 rounded-full hover:bg-accent-light transition-colors">Liên hệ ngay →</a>
        <button @click="mobileMenu=!mobileMenu" class="md:hidden w-9 h-9 flex items-center justify-center rounded-full border border-zinc-200 dark:border-zinc-800" aria-label="Toggle menu">
          <svg x-show="!mobileMenu" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
          <svg x-show="mobileMenu" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>
    </nav>
    <div x-show="mobileMenu" x-cloak
      x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
      x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
      class="md:hidden bg-white dark:bg-zinc-950 border-t border-zinc-100 dark:border-zinc-900">
      <ul class="flex flex-col px-6 py-4 gap-4 text-sm font-medium" role="list">
        <li><a href="{{ route('home') }}#services" @click="mobileMenu=false" class="block text-zinc-700 dark:text-zinc-300">Dịch vụ</a></li>
        <li><a href="{{ route('projects') }}" @click="mobileMenu=false" class="block text-accent font-medium">Dự án</a></li>
        <li><a href="{{ route('home') }}#about" @click="mobileMenu=false" class="block text-zinc-700 dark:text-zinc-300">Giới thiệu</a></li>
        <li><a href="{{ route('blog') }}" @click="mobileMenu=false" class="block text-zinc-700 dark:text-zinc-300">Blog</a></li>
        <li><a href="{{ route('home') }}#contact" @click="mobileMenu=false" class="block text-zinc-700 dark:text-zinc-300">Liên hệ</a></li>
      </ul>
    </div>
  </header>

  <main>

    <!-- ═══ CASE STUDY HEADER ═══ -->
    <article>
      <header class="pt-32 pb-10 max-w-4xl mx-auto px-6">

        <!-- Back link -->
        <a href="{{ route('projects') }}" class="inline-flex items-center gap-2 text-sm text-zinc-500 dark:text-zinc-400 hover:text-accent transition-colors mb-8">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
          Quay lại danh sách dự án
        </a>

        <!-- Tags + date -->
        <div class="flex flex-wrap items-center gap-3 mb-6">
          <span class="text-xs bg-blue-50 dark:bg-zinc-800 text-accent border border-blue-200 dark:border-zinc-700 px-2.5 py-1 rounded-full">Nghiên cứu Khoa học</span>
          <span class="text-xs bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 px-2.5 py-1 rounded-full">Python</span>
          <span class="text-xs bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 px-2.5 py-1 rounded-full">Raspberry Pi</span>
          <span class="text-xs text-zinc-400 ml-1">2025 · Bán kết Euréka</span>
        </div>

        <h1 class="reveal font-display font-bold text-4xl md:text-5xl lg:text-6xl text-zinc-900 dark:text-white leading-tight mb-6">
          Hệ thống nhận diện người và điều khiển thiết bị thông minh
        </h1>

        <p class="reveal d1 text-xl text-zinc-500 dark:text-zinc-400 leading-relaxed mb-10 max-w-3xl">
          Đề tài nghiên cứu khoa học tích hợp Trí tuệ Nhân tạo (Edge AI) xử lý ảnh thời gian thực và vi điều khiển nhúng nhầm tối ưu hóa điện năng tiêu thụ dựa trên sự hiện diện thực tế của con người.
        </p>

        <!-- Meta row -->
        <div class="reveal d2 grid grid-cols-2 md:grid-cols-4 gap-4 py-8 border-t border-b border-zinc-100 dark:border-zinc-900">
          <div>
            <p class="text-xs text-zinc-400 uppercase tracking-widest mb-1">Cơ quan chủ quản</p>
            <p class="font-medium text-zinc-900 dark:text-white text-sm">Đại học Thủ Dầu Một</p>
          </div>
          <div>
            <p class="text-xs text-zinc-400 uppercase tracking-widest mb-1">Vai trò</p>
            <p class="font-medium text-zinc-900 dark:text-white text-sm">Lập trình viên chính (IoT / AI)</p>
          </div>
          <div>
            <p class="text-xs text-zinc-400 uppercase tracking-widest mb-1">Thời gian</p>
            <p class="font-medium text-zinc-900 dark:text-white text-sm">Tháng 8 - 11, 2025</p>
          </div>
          <div>
            <p class="text-xs text-zinc-400 uppercase tracking-widest mb-1">Thành tựu</p>
            <p class="font-medium text-zinc-900 dark:text-white text-sm">Bán kết Euréka 2025</p>
          </div>
        </div>
      </header>

      <!-- ═══ HERO IMAGE ═══ -->
      <div class="max-w-6xl mx-auto px-6 mb-16">
        <div class="reveal photo-frame w-full h-72 md:h-[480px] rounded-3xl">
          <img src="https://images.unsplash.com/photo-1515879218367-8466d910aaa4?w=1400&q=80" alt="Hệ thống nhận diện người và điều khiển thiết bị" loading="eager"/>
        </div>
      </div>

      <!-- ═══ RESULTS BANNER ═══ -->
      <div class="max-w-4xl mx-auto px-6 mb-16">
        <div class="reveal grid grid-cols-2 md:grid-cols-4 gap-4">
          <div class="stat-card bg-zinc-50 dark:bg-zinc-900 rounded-2xl p-5 pl-6">
            <p class="font-display font-bold text-3xl text-zinc-900 dark:text-white">94.2%</p>
            <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1 leading-snug">Độ chính xác nhận diện người</p>
          </div>
          <div class="stat-card bg-zinc-50 dark:bg-zinc-900 rounded-2xl p-5 pl-6">
            <p class="font-display font-bold text-3xl text-accent">&lt; 0.8s</p>
            <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1 leading-snug">Tốc độ kích hoạt thiết bị</p>
          </div>
          <div class="stat-card bg-zinc-50 dark:bg-zinc-900 rounded-2xl p-5 pl-6">
            <p class="font-display font-bold text-3xl text-zinc-900 dark:text-white">−30%</p>
            <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1 leading-snug">Tiết kiệm điện năng hao phí</p>
          </div>
          <div class="stat-card bg-zinc-50 dark:bg-zinc-900 rounded-2xl p-5 pl-6">
            <p class="font-display font-bold text-3xl text-zinc-900 dark:text-white">Bán kết</p>
            <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1 leading-snug">Giải thưởng Euréka 2025</p>
          </div>
        </div>
      </div>

      <!-- ═══ ARTICLE BODY ═══ -->
      <div class="max-w-3xl mx-auto px-6 pb-4 prose-cs">

        <h2>Bối cảnh đề tài</h2>
        <p>Lãng phí điện năng tại các phòng học, phòng thí nghiệm công cộng và văn phòng công sở là một vấn đề nhức nhối hiện nay. Người sử dụng thường xuyên quên tắt đèn, quạt hoặc máy lạnh khi ra về, gây thất thoát tài sản lớn cho nhà trường và cơ quan.</p>
        <p>Các giải pháp tự động hóa truyền thống thường lắp đặt cảm biến hồng ngoại thụ động (PIR). Tuy nhiên, cảm biến PIR có điểm yếu chí mạng là chỉ phát hiện được sự chuyển động. Khi sinh viên ngồi yên làm bài tập, đọc sách hoặc kiểm tra code trong thời gian dài, cảm biến không nhận được chuyển động hồng ngoại và tự động tắt điện, gây phiền toái cực kỳ lớn.</p>
        <p>Nhóm chúng mình đã đề xuất một phương án tiếp cận hoàn toàn mới: <strong>sử dụng camera giám sát thông thường kết hợp trí tuệ nhân tạo (Edge AI) để nhận diện chính xác sự hiện diện của con người</strong>, từ đó tự động hóa hệ thống bật/tắt thiết bị điện thông qua mạch nhúng Raspberry Pi.</p>

        <blockquote>
          <p>"Mục tiêu cốt lõi của đề tài là xây dựng một hệ thống nhận diện cực kỳ gọn nhẹ, chính xác cao, xử lý trực tiếp tại biên (Edge) để đảm bảo độ trễ thấp và bảo mật dữ liệu tối đa cho phòng học."</p>
        </blockquote>

        <h2>Nghiên cứu & Thử nghiệm mô hình</h2>
        <h3>Thử nghiệm mô hình AI nhúng</h3>
        <p>Thử thách lớn nhất của dự án là chạy mô hình học máy nhận diện người (human detection) thời gian thực trên bo mạch Raspberry Pi 4 có tài nguyên CPU/RAM cực kỳ hạn chế. Nhóm đã tiến hành thử nghiệm và so sánh 3 kiến trúc mô hình phổ biến:</p>
        <ul>
          <li><strong>Haar Cascades (OpenCV):</strong> Chạy siêu nhẹ và mượt mà (~25 FPS), nhưng độ chính xác nhận diện cực thấp (~72%), thường xuyên nhận diện sai các đồ vật tĩnh thành người hoặc bỏ sót người khi đứng quay lưng.</li>
          <li><strong>YOLOv8-nano (Ultralytics):</strong> Độ chính xác xuất sắc (~96%), nhưng thuật toán quá nặng cho phần cứng nhúng. Khi chạy trực tiếp chỉ đạt 2 - 3 FPS, làm nóng bo mạch rất nhanh và gây hiện tượng giật lag nghiêm trọng, không thể phản hồi kịp thời.</li>
          <li><strong>MobileNet-SSD (Trained Custom):</strong> Kiến trúc MobileNet kết hợp bộ phát hiện Single Shot Multibox Detector. Sau khi tinh chỉnh và tối ưu hóa luồng camera đầu vào bằng kỹ thuật <code>Multi-threading</code> trong Python, hệ thống đạt tốc độ xử lý ổn định <strong>15 - 18 FPS</strong> trên Raspberry Pi 4 với độ chính xác đạt <strong>94.2%</strong>. Đây là sự cân bằng lý tưởng nhất được nhóm chọn làm giải pháp chính thức.</li>
        </ul>

      </div>

      <!-- Full-width image -->
      <div class="max-w-5xl mx-auto px-6 mb-4">
        <div class="reveal photo-frame w-full h-56 md:h-80 rounded-2xl">
          <img src="https://images.unsplash.com/photo-1581472723648-909f4851d4ae?w=1200&q=80" alt="Mô phỏng sơ đồ kết nối phần cứng và mạch nhúng" loading="lazy"/>
        </div>
        <p class="img-caption">Sơ đồ kết nối phần cứng nhúng giữa Camera, Raspberry Pi và các module Rơ-le điều khiển nguồn thiết bị.</p>
      </div>

      <div class="max-w-3xl mx-auto px-6 pb-4 prose-cs">

        <h2>Nguyên lý hoạt động & Kiến trúc hệ thống</h2>
        <p>Hệ thống hoạt động dựa trên quy trình tự động khép kín bao gồm các bước sau:</p>

      </div>

      <!-- 3-column principles -->
      <div class="max-w-5xl mx-auto px-6 mb-12">
        <div class="reveal grid md:grid-cols-3 gap-5">
          <div class="bg-zinc-50 dark:bg-zinc-900 rounded-2xl p-7 border border-zinc-100 dark:border-zinc-800">
            <div class="w-10 h-10 bg-blue-50 dark:bg-zinc-800 rounded-xl flex items-center justify-center mb-4">
              <svg class="w-5 h-5 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
            </div>
            <h3 class="font-display font-bold text-zinc-900 dark:text-white mb-2" style="font-size:1rem;margin:0 0 .5rem;color:inherit;">Thu nhận luồng video</h3>
            <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed" style="margin:0;color:inherit;">Camera IP gửi luồng hình ảnh về Raspberry Pi qua giao thức RTSP. Luồng được xử lý bất đồng bộ tránh nghẽn luồng đọc.</p>
          </div>
          <div class="bg-zinc-50 dark:bg-zinc-900 rounded-2xl p-7 border border-zinc-100 dark:border-zinc-800">
            <div class="w-10 h-10 bg-blue-50 dark:bg-zinc-800 rounded-xl flex items-center justify-center mb-4">
              <svg class="w-5 h-5 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364.364l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
            </div>
            <h3 class="font-display font-bold text-zinc-900 dark:text-white mb-2" style="font-size:1rem;margin:0 0 .5rem;color:inherit;">Nhận diện Edge AI</h3>
            <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed" style="margin:0;color:inherit;">Mô hình MobileNet-SSD được tối ưu hóa quét hình ảnh mỗi 0.5 giây để kiểm tra và định vị sự hiện diện của con người.</p>
          </div>
          <div class="bg-zinc-50 dark:bg-zinc-900 rounded-2xl p-7 border border-zinc-100 dark:border-zinc-800">
            <div class="w-10 h-10 bg-blue-50 dark:bg-zinc-800 rounded-xl flex items-center justify-center mb-4">
              <svg class="w-5 h-5 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
            <h3 class="font-display font-bold text-zinc-900 dark:text-white mb-2" style="font-size:1rem;margin:0 0 .5rem;color:inherit;">Điều khiển Rơ-le</h3>
            <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed" style="margin:0;color:inherit;">Nếu phát hiện có người, chân GPIO kích hoạt Rơ-le giữ nguồn điện. Nếu không có người liên tục trong 5 phút, rơ-le tự động ngắt điện.</p>
          </div>
        </div>
      </div>

      <div class="max-w-3xl mx-auto px-6 pb-4 prose-cs">

        <h2>Quy trình triển khai chi tiết</h2>
        <p>Dự án được thực hiện nghiêm túc xuyên suốt 4 tháng học kỳ với quy trình chuẩn chỉ:</p>

      </div>

      <!-- Process steps -->
      <div class="max-w-4xl mx-auto px-6 mb-12">
        <div class="reveal space-y-4">
          <!-- Step -->
          <div class="flex gap-5 bg-zinc-50 dark:bg-zinc-900 rounded-2xl p-6 border border-zinc-100 dark:border-zinc-800">
            <div class="step-badge shrink-0 mt-0.5">1</div>
            <div>
              <p class="font-display font-bold text-zinc-900 dark:text-white mb-1">Khảo sát &amp; Thu thập dữ liệu</p>
              <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed">Thu thập tập dữ liệu gồm hơn 1500 hình ảnh thực tế tại các phòng học Đại học Thủ Dầu Một ở nhiều góc camera, điều kiện ánh sáng khác nhau nhằm huấn luyện tăng cường độ chính xác cho mô hình AI.</p>
            </div>
          </div>
          <div class="flex gap-5 bg-zinc-50 dark:bg-zinc-900 rounded-2xl p-6 border border-zinc-100 dark:border-zinc-800">
            <div class="step-badge shrink-0 mt-0.5">2</div>
            <div>
              <p class="font-display font-bold text-zinc-900 dark:text-white mb-1">Lập trình thuật toán &amp; Tối ưu đa luồng</p>
              <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed">Sử dụng Python đa luồng (Multi-threading). Một luồng liên tục đọc camera lưu vào bộ nhớ đệm, một luồng khác chạy mô hình AI phân tích ảnh và luồng thứ ba gửi tín hiệu điều khiển phần cứng nhúng.</p>
            </div>
          </div>
          <div class="flex gap-5 bg-zinc-50 dark:bg-zinc-900 rounded-2xl p-6 border border-zinc-100 dark:border-zinc-800">
            <div class="step-badge shrink-0 mt-0.5">3</div>
            <div>
              <p class="font-display font-bold text-zinc-900 dark:text-white mb-1">Thiết kế phần cứng &amp; Lắp ráp mô hình</p>
              <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed">Đấu nối Raspberry Pi với module relay kích hoạt các đường tải điện xoay chiều 220V cấp cho bóng đèn và quạt gió. Thiết kế vỏ hộp bảo vệ mica tản nhiệt tốt cho chip nhúng.</p>
            </div>
          </div>
          <div class="flex gap-5 bg-zinc-50 dark:bg-zinc-900 rounded-2xl p-6 border border-zinc-100 dark:border-zinc-800">
            <div class="step-badge shrink-0 mt-0.5">4</div>
            <div>
              <p class="font-display font-bold text-zinc-900 dark:text-white mb-1">Thử nghiệm thực tế &amp; Ghi nhận số liệu</p>
              <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed">Vận hành thử nghiệm liên tục 15 ngày tại văn phòng Đoàn trường TDMU. Lắp công tơ điện tử để so sánh chỉ số tiêu thụ điện năng trước và sau khi kích hoạt hệ thống tự động.</p>
            </div>
          </div>
          <div class="flex gap-5 bg-zinc-50 dark:bg-zinc-900 rounded-2xl p-6 border border-zinc-100 dark:border-zinc-800">
            <div class="step-badge shrink-0 mt-0.5">5</div>
            <div>
              <p class="font-display font-bold text-zinc-900 dark:text-white mb-1">Tham gia giải thưởng Euréka 2025</p>
              <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed">Hoàn thiện báo cáo khoa học dài 45 trang, biên tập video demo hoạt động thực tế và xuất sắc lọt vào vòng Bán kết cấp quốc gia Giải thưởng Nghiên cứu Khoa học Sinh viên Euréka 2025.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Second full-width image -->
      <div class="max-w-5xl mx-auto px-6 mb-4">
        <div class="reveal photo-frame w-full h-56 md:h-80 rounded-2xl">
          <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1200&q=80" alt="Biểu đồ tối ưu hóa năng lượng tiêu thụ" loading="lazy"/>
        </div>
        <p class="img-caption">Biểu đồ so sánh lượng điện năng lãng phí tiêu thụ thực tế hàng ngày giảm rõ rệt sau khi có sự tham gia của hệ thống thông minh.</p>
      </div>

      <div class="max-w-3xl mx-auto px-6 pb-16 prose-cs">

        <h2>Kết quả đạt được</h2>
        <p>Hệ thống nhận diện người và điều khiển thiết bị thông minh nhúng AI của nhóm đã gặt hái được những thành công vượt xa mong đợi ban đầu:</p>
        <ul>
          <li><strong>Độ chính xác nhận diện:</strong> Đạt <strong>94.2%</strong> trên tập dữ liệu kiểm thử, hầu như không còn hiện tượng tắt điện sai khi sinh viên ngồi làm việc tĩnh lặng như cảm biến hồng ngoại thông thường.</li>
          <li><strong>Hiệu quả tối ưu năng lượng:</strong> Giúp tiết kiệm lượng điện năng hao phí vô ích trung bình hàng tháng khoảng <strong>28.4%</strong> tại phòng thí nghiệm Đoàn trường.</li>
          <li><strong>Độ ổn định:</strong> Phần cứng nhúng chạy bền bỉ, mượt mà dưới tốc độ 15-18 FPS mà không bị quá nhiệt nhờ thuật toán đa luồng giải phóng bộ nhớ đệm camera liên tục.</li>
          <li><strong>Sự công nhận học thuật:</strong> Đề tài xuất sắc lọt vào vòng Bán kết cấp quốc gia tại Giải thưởng Sinh viên Nghiên cứu Khoa học Euréka lần thứ XXVII năm 2025.</li>
        </ul>

        <blockquote>
          <p>"Hệ thống hoạt động rất thông minh và thực tế. Đây là đề tài có tính ứng dụng thực tiễn cực kỳ cao vào việc xây dựng Smart Campus tại Đại học Thủ Dầu Một." — Nhận xét từ Hội đồng giám khảo cấp trường.</p>
        </blockquote>

        <h2>Bài học & Định hướng phát triển</h2>
        <p>Dự án này đã cho mình những bài học thực tế vô giá. Mình nhận ra lập trình không chỉ là viết các dòng code chạy đúng, mà còn là bài toán cân bằng tối ưu hóa giữa thuật toán phần mềm và khả năng chịu tải của phần cứng. Việc tự thiết kế một hệ thống đa luồng bằng Python để xử lý video thời gian thực đã giúp tư duy lập trình bất đồng bộ của mình tiến bộ vượt bậc.</p>
        <p>Trong tương lai, nhóm có kế hoạch mở rộng đề tài bằng cách tích hợp thêm cảm biến đo cường độ ánh sáng tự nhiên để điều chỉnh độ sáng đèn (Dimming) thay vì chỉ bật/tắt đơn thuần, và xây dựng một trang Dashboard Web bằng Laravel để ban quản trị nhà trường có thể giám sát trực quan lượng điện năng tiêu thụ của từng phòng học theo thời gian thực.</p>

        <hr/>
        <p><em>Xem chi tiết hồ sơ năng lực học thuật đầy đủ được trường công nhận tại hệ thống <a href="https://eportfolio.tdmu.edu.vn/view/view.php?id=1877" target="_blank" rel="noopener noreferrer">ePortfolio Đại học Thủ Dầu Một</a>. 💙</em></p>

      </div>
    </article>

    <!-- ═══ MORE PROJECTS ═══ -->
    <section class="bg-zinc-50 dark:bg-zinc-900/50 py-16">
      <div class="max-w-6xl mx-auto px-6">
        <div class="flex items-center justify-between mb-8">
          <h2 class="font-display font-bold text-2xl text-zinc-900 dark:text-white">Các dự án khác</h2>
          <a href="{{ route('projects') }}" class="text-sm font-medium text-accent nav-link hidden md:block">Xem tất cả →</a>
        </div>
        <div class="grid md:grid-cols-3 gap-6">

          <article class="reveal card-h group bg-white dark:bg-zinc-900 rounded-2xl overflow-hidden border border-zinc-100 dark:border-zinc-800 hover:border-accent transition-colors">
            <div class="photo-frame w-full h-44">
              <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=700&q=80" alt="Skyline Cinema" loading="lazy"/>
            </div>
            <div class="p-5">
              <div class="flex gap-2 mb-2">
                <span class="text-xs bg-blue-50 dark:bg-zinc-800 text-accent border border-blue-200 dark:border-zinc-700 px-2.5 py-1 rounded-full">Laravel / PHP</span>
              </div>
              <a href="{{ route('projects') }}?filter=laravel-php">
                <h3 class="font-display font-bold text-base text-zinc-900 dark:text-white mb-2 group-hover:text-accent transition-colors">Skyline Cinema</h3>
              </a>
              <a href="{{ route('projects') }}?filter=laravel-php" class="text-sm font-medium text-accent nav-link">Xem dự án →</a>
            </div>
          </article>

          <article class="reveal card-h group bg-white dark:bg-zinc-900 rounded-2xl overflow-hidden border border-zinc-100 dark:border-zinc-800 hover:border-accent transition-colors">
            <div class="photo-frame w-full h-44">
              <img src="https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?w=700&q=80" alt="Bộ Quản lý File ASP.NET" loading="lazy"/>
            </div>
            <div class="p-5">
              <div class="flex gap-2 mb-2">
                <span class="text-xs bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 px-2.5 py-1 rounded-full">C# / ASP.NET</span>
              </div>
              <a href="{{ route('projects') }}?filter=csharp-asp">
                <h3 class="font-display font-bold text-base text-zinc-900 dark:text-white mb-2 group-hover:text-accent transition-colors">Bộ Quản lý File Web</h3>
              </a>
              <a href="{{ route('projects') }}?filter=csharp-asp" class="text-sm font-medium text-accent nav-link">Xem dự án →</a>
            </div>
          </article>

          <article class="reveal card-h group bg-white dark:bg-zinc-900 rounded-2xl overflow-hidden border border-zinc-100 dark:border-zinc-800 hover:border-accent transition-colors">
            <div class="photo-frame w-full h-44">
              <img src="https://images.unsplash.com/photo-1556228578-0d85b1a4d571?w=700&q=80" alt="LuxeLaptop Store" loading="lazy"/>
            </div>
            <div class="p-5">
              <div class="flex gap-2 mb-2">
                <span class="text-xs bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 px-2.5 py-1 rounded-full">PHP / MySQL</span>
              </div>
              <a href="{{ route('projects') }}?filter=laravel-php">
                <h3 class="font-display font-bold text-base text-zinc-900 dark:text-white mb-2 group-hover:text-accent transition-colors">LuxeLaptop Store</h3>
              </a>
              <a href="{{ route('projects') }}?filter=laravel-php" class="text-sm font-medium text-accent nav-link">Xem dự án →</a>
            </div>
          </article>

        </div>
        <div class="text-center mt-8 md:hidden">
          <a href="{{ route('projects') }}" class="text-sm font-medium text-accent">Xem tất cả dự án →</a>
        </div>
      </div>
    </section>

    <!-- ═══ CTA ═══ -->
    <section class="py-24">
      <div class="max-w-6xl mx-auto px-6">
        <div class="bg-zinc-900 dark:bg-zinc-800 rounded-3xl p-6 sm:p-10 md:p-14 text-center relative overflow-hidden">
          <div class="absolute top-0 right-0 w-64 h-64 bg-accent/20 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>
          <div class="absolute bottom-0 left-0 w-40 h-40 bg-accent/10 rounded-full blur-2xl pointer-events-none" aria-hidden="true"></div>
          <div class="relative z-10">
            <p class="text-xs font-medium text-accent tracking-widest uppercase mb-4">Bạn có cơ hội thực tập?</p>
            <h2 class="font-display font-bold text-3xl md:text-4xl text-white mb-4">Bạn đang tìm kiếm Web Developer Intern?</h2>
            <p class="text-zinc-400 max-w-lg mx-auto mb-8">Mình hiện là sinh viên ngành Kỹ thuật Phần mềm chuẩn bị thực tập. Liên hệ ngay nếu bạn thấy hồ sơ của mình phù hợp với doanh nghiệp nhé!</p>
            <a href="{{ route('home') }}#contact" class="inline-flex items-center gap-2 btn-primary bg-accent text-white font-medium px-8 py-3.5 rounded-full hover:bg-accent-light transition-colors">
              Liên hệ với mình →
            </a>
          </div>
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

    // Reveal on scroll
    const obs = new IntersectionObserver(entries => {
      entries.forEach(e => {
        if (e.isIntersecting) { e.target.classList.add('visible'); obs.unobserve(e.target); }
      });
    }, { threshold: .08, rootMargin: '0px 0px -40px 0px' });
    document.querySelectorAll('.reveal').forEach(el => obs.observe(el));
  </script>

</body>
</html>
