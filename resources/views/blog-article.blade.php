<!DOCTYPE html>
<html lang="vi" x-data="{ dark: localStorage.getItem('theme')==='dark'||(!localStorage.getItem('theme')&&window.matchMedia('(prefers-color-scheme: dark)').matches), scrolled:false, mobileMenu:false, progress:0 }" :class="{'dark':dark}" x-init="$watch('dark',v=>localStorage.setItem('theme',v?'dark':'light'));window.addEventListener('scroll',()=>{scrolled=window.scrollY>20;progress=Math.min(100,Math.round((window.scrollY/(document.body.scrollHeight-window.innerHeight))*100));},{passive:true})" class="scroll-smooth">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="Đề tài sinh viên TDMU lọt vào Bán kết giải thưởng Euréka 2025 — Bài viết nghiên cứu khoa học của Nguyễn Hữu Lực"/>
  <meta name="author" content="Nguyễn Hữu Lực"/>
  <meta property="og:title" content="Đề tài sinh viên TDMU lọt vào Bán kết Euréka 2025 — Nguyễn Hữu Lực"/>
  <meta property="og:type" content="article"/>
  <title>Đề tài sinh viên TDMU lọt vào Bán kết Euréka 2025 — Nguyễn Hữu Lực</title>
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

    /* Article typography */
    .prose-article h2{font-family:'PT Sans',sans-serif;font-size:1.6rem;font-weight:700;color:inherit;margin:2.5rem 0 1rem;line-height:1.25;}
    .prose-article h3{font-family:'PT Sans',sans-serif;font-size:1.2rem;font-weight:700;margin:2rem 0 .75rem;line-height:1.3;}
    .prose-article p{margin:0 0 1.4rem;line-height:1.8;color:#52525b;}
    .dark .prose-article p{color:#a1a1aa;}
    .prose-article ul{margin:0 0 1.4rem 1.5rem;list-style:disc;}
    .prose-article li{margin-bottom:.4rem;line-height:1.7;color:#52525b;}
    .dark .prose-article li{color:#a1a1aa;}
    .prose-article pre{background:#18181b;color:#e4e4e7;border-radius:12px;padding:1.25rem 1.5rem;overflow-x:auto;font-size:.85rem;line-height:1.7;margin:0 0 1.6rem;}
    .prose-article code:not(pre code){background:#f4f4f5;color:#2563EB;padding:.15em .4em;border-radius:4px;font-size:.875em;}
    .dark .prose-article code:not(pre code){background:#27272a;}
    .prose-article blockquote{border-left:3px solid #2563EB;padding:.75rem 1.25rem;margin:0 0 1.6rem;background:#f0f7ff;border-radius:0 8px 8px 0;}
    .dark .prose-article blockquote{background:#1e293b;}
    .prose-article blockquote p{color:#52525b;font-style:italic;margin:0;}
    .dark .prose-article blockquote p{color:#cbd5e1;}
    .prose-article a{color:#2563EB;text-decoration:underline;text-underline-offset:3px;}
    .prose-article hr{border:none;border-top:1px solid #e4e4e7;margin:2.5rem 0;}
    .dark .prose-article hr{border-top-color:#27272a;}

    /* Reading progress bar */
    .progress-bar{position:fixed;top:0;left:0;height:3px;background:#2563EB;z-index:100;transition:width .1s;}

    .reveal{opacity:0;transform:translateY(20px);transition:opacity .5s cubic-bezier(.4,0,.2,1),transform .5s cubic-bezier(.4,0,.2,1);}
    .reveal.visible{opacity:1;transform:translateY(0);}
    .card{transition:transform .3s cubic-bezier(.4,0,.2,1),border-color .2s;}
    .card:hover{transform:translateY(-3px);}
  </style>
</head>
<body class="bg-white dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 font-body antialiased">

  <!-- Reading progress bar -->
  <div class="progress-bar" :style="`width:${progress}%`" role="progressbar" :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100" aria-label="Reading progress"></div>

  <!-- NAV -->
  <header class="fixed top-0.5 left-0 right-0 z-50 transition-all duration-300"
    :class="scrolled?'bg-white/90 dark:bg-zinc-950/90 backdrop-blur-md shadow-sm shadow-black/5':'bg-transparent'">
    <nav class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between" aria-label="Main navigation">
      <a href="{{ route('home') }}" class="font-display font-bold text-xl tracking-tight z-10">
        <span class="text-zinc-900 dark:text-white">Huu</span><span class="text-accent">Luc</span>
      </a>
      <ul class="hidden md:flex items-center gap-8 text-sm font-medium" role="list">
        <li><a href="{{ route('home') }}#services" class="nav-link text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Dịch vụ</a></li>
        <li><a href="{{ route('projects') }}" class="nav-link text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Dự án</a></li>
        <li><a href="{{ route('home') }}#about" class="nav-link text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Giới thiệu</a></li>
        <li><a href="{{ route('blog') }}" class="nav-link text-accent font-medium">Blog</a></li>
        <li><a href="{{ route('home') }}#contact" class="nav-link text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Liên hệ</a></li>
      </ul>
      <div class="flex items-center gap-3">
        <button @click="dark=!dark" class="w-9 h-9 flex items-center justify-center rounded-full border border-zinc-200 dark:border-zinc-800 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition-colors" :aria-label="dark?'Light mode':'Dark mode'">
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

  <main>

    <!-- ARTICLE HEADER -->
    <article>
      <header class="pt-32 pb-12 max-w-3xl mx-auto px-6">
        <a href="{{ route('blog') }}" class="inline-flex items-center gap-2 text-sm text-zinc-500 dark:text-zinc-400 hover:text-accent transition-colors mb-8">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
          Quay lại blog
        </a>

        <div class="flex items-center gap-3 mb-5">
          <span class="text-xs bg-blue-50 dark:bg-zinc-800 text-accent border border-blue-200 dark:border-zinc-700 px-2.5 py-1 rounded-full">Nghiên cứu Khoa học</span>
          <span class="text-xs text-zinc-400">Tháng 11, 2025 · Tin tức học đường</span>
        </div>

        <h1 class="font-display font-bold text-4xl md:text-5xl text-zinc-900 dark:text-white leading-tight mb-6">Đề tài sinh viên TDMU lọt vào Bán kết giải thưởng Euréka 2025</h1>

        <p class="text-xl text-zinc-500 dark:text-zinc-400 leading-relaxed mb-8">Hành trình xuất sắc của đề tài "Hệ thống nhận diện người và điều khiển thiết bị IoT thông minh" từ nghiên cứu giảng đường đến sân chơi trí tuệ cấp quốc gia Euréka lần thứ XXVII.</p>

        <!-- Author -->
        <div class="flex items-center gap-4 py-6 border-t border-b border-zinc-100 dark:border-zinc-900">
          <div class="photo-frame w-12 h-12 rounded-full shrink-0">
            <img src="{{ asset('images/avatar.jpg') }}" alt="Nguyễn Hữu Lực" loading="lazy"/>
          </div>
          <div>
            <p class="font-medium text-zinc-900 dark:text-white text-sm">Nguyễn Hữu Lực</p>
            <p class="text-xs text-zinc-500">Sinh viên Kỹ thuật Phần mềm &amp; Web Developer</p>
          </div>
          <div class="ml-auto flex gap-3">
            <a href="mailto:huuluc04@gmail.com" class="w-8 h-8 flex items-center justify-center rounded-full border border-zinc-200 dark:border-zinc-800 text-zinc-500 hover:text-accent hover:border-accent transition-colors" aria-label="Gửi email">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </a>
            <a href="https://github.com/huuluc04nhl" target="_blank" rel="noopener noreferrer" class="w-8 h-8 flex items-center justify-center rounded-full border border-zinc-200 dark:border-zinc-800 text-zinc-500 hover:text-accent hover:border-accent transition-colors" aria-label="GitHub">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
            </a>
          </div>
        </div>
      </header>

      <!-- Hero image -->
      <div class="max-w-4xl mx-auto px-6 mb-12">
        <div class="photo-frame w-full h-72 md:h-96 rounded-2xl">
          <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=1200&q=80" alt="Giải thưởng Euréka 2025" loading="lazy"/>
        </div>
      </div>

      <!-- Article content -->
      <div class="max-w-3xl mx-auto px-6 pb-16 prose-article">

        <h2>Cột mốc đáng tự hào của nghiên cứu khoa học sinh viên TDMU</h2>
        <p>Giải thưởng Sinh viên Nghiên cứu Khoa học Euréka là một trong những sân chơi học thuật uy tín bậc nhất cả nước dành cho sinh viên do Thành Đoàn TP.HCM phối hợp cùng Đại học Quốc gia TP.HCM tổ chức. Năm 2025, cuộc thi thu hút hàng ngàn đề tài chất lượng từ khắp các tỉnh thành đổ về tranh tài.</p>
        <p>Vượt qua nhiều vòng thẩm định nghiêm ngặt cấp trường, đề tài <strong>"Hệ thống nhận diện người và điều khiển thiết bị IoT thông minh"</strong> do nhóm sinh viên ngành Kỹ thuật Phần mềm trường Đại học Thủ Dầu Một thực hiện đã xuất sắc lọt vào vòng Bán kết cấp toàn quốc. Đây là sự công nhận to lớn đối với những nỗ lực sáng tạo không ngừng nghỉ của cả nhóm và sự hỗ trợ nhiệt tình từ các giảng viên hướng dẫn tại khoa.</p>

        <blockquote>
          <p>"Hành trình nghiên cứu khoa học giúp chúng mình bước ra khỏi vùng an toàn lý thuyết, tự tay thiết kế và tối ưu một hệ thống kết hợp phần cứng IoT và trí tuệ nhân tạo (Edge AI) hoạt động thực tế."</p>
        </blockquote>

        <h2>Mục tiêu và giải pháp kỹ thuật của đề tài</h2>
        <p>Đề tài tập trung giải quyết bài toán tự động hóa trong các tòa nhà thông minh (Smart Building) và tối ưu hóa điện năng tiêu thụ dựa trên sự hiện diện của con người. Hệ thống bao gồm hai thành phần cốt lõi:</p>
        <ul>
          <li><strong>Bộ xử lý trung tâm (Gateway):</strong> Sử dụng bo mạch Raspberry Pi kết hợp ngôn ngữ lập trình Python và thư viện xử lý ảnh OpenCV để thu nhận luồng dữ liệu video từ camera IP.</li>
          <li><strong>Mô hình học máy nhúng (Edge AI):</strong> Nhóm đã thiết kế, huấn luyện và tối ưu hóa một mô hình phát hiện người (human detection) cực kỳ gọn nhẹ để chạy thời gian thực trên phần cứng hạn chế hiệu năng mà không cần gửi dữ liệu về đám mây, giúp nâng cao tính bảo mật và giảm độ trễ tối đa.</li>
          <li><strong>Điều khiển thiết bị tự động:</strong> Tích hợp các module rơ-le kết nối qua chân GPIO của Raspberry Pi để tự động ngắt/mở các thiết bị điện như đèn, quạt, điều hòa dựa trên trạng thái có hay không có người hiện diện trong phòng.</li>
        </ul>

        <h2>Những kết quả và số liệu thực nghiệm thực tế</h2>
        <p>Hệ thống đã được nhóm thử nghiệm thực tế tại các phòng thí nghiệm của Đại học Thủ Dầu Một và cho ra những kết quả cực kỳ khả quan:</p>
        <ul>
          <li>Độ chính xác nhận diện người trong điều kiện ánh sáng văn phòng bình thường: <strong>94.2%</strong></li>
          <li>Độ trễ phản hồi từ khi phát hiện có người đến khi kích hoạt thiết bị: <strong>dưới 0.8 giây</strong></li>
          <li>Lượng điện năng tiêu thụ tối ưu được ghi nhận trong điều kiện văn phòng thử nghiệm: <strong>giảm 25 - 30%</strong> so với vận hành thủ công thông thường.</li>
          <li>Hệ thống chạy ổn định liên tục 72 giờ không xảy ra hiện tượng tràn bộ nhớ hay quá nhiệt phần cứng.</li>
        </ul>

        <h2>Ý nghĩa của đề tài đối với bản thân</h2>
        <p>Việc đề tài lọt vào bán kết giải thưởng Euréka 2025 không chỉ mang lại niềm vui lớn mà còn là minh chứng cho tinh thần tự học, tự nghiên cứu làm chủ công nghệ của nhóm sinh viên SE tại trường TDMU. Qua dự án này, mình tích lũy được rất nhiều kinh nghiệm quý báu về lập trình nhúng, xử lý ảnh bằng Python, cách phối hợp làm việc nhóm hiệu quả và đặc biệt là kỹ năng thuyết trình bảo vệ đề tài trước hội đồng khoa học.</p>
        <p>Đây là hành trang cực kỳ vững chắc để mình tự tin ứng tuyển vào các vị trí Web Developer / IoT Developer tại các doanh nghiệp công nghệ trong thời gian tới.</p>

        <hr/>
        <p><em>Xem chi tiết hồ sơ năng lực học thuật đầy đủ được trường công nhận tại hệ thống <a href="https://eportfolio.tdmu.edu.vn/view/view.php?id=1877" target="_blank" rel="noopener noreferrer">ePortfolio Đại học Thủ Dầu Một</a>. 💙</em></p>

      </div>
    </article>

    <!-- RELATED ARTICLES -->
    <section class="bg-zinc-50 dark:bg-zinc-900/50 py-16">
      <div class="max-w-6xl mx-auto px-6">
        <h2 class="font-display font-bold text-2xl text-zinc-900 dark:text-white mb-8">Bài viết liên quan</h2>
        <div class="grid md:grid-cols-2 max-w-3xl gap-6">

          <article class="reveal card group bg-white dark:bg-zinc-900 rounded-2xl overflow-hidden border border-zinc-100 dark:border-zinc-800 hover:border-accent transition-colors">
            <div class="photo-frame w-full h-40">
              <img src="https://images.unsplash.com/photo-1488590528505-98d2b5aba04b?w=700&q=80" alt="ePortfolio TDMU" loading="lazy"/>
            </div>
            <div class="p-5">
              <span class="text-xs text-zinc-400 mb-2 block">ePortfolio học thuật</span>
              <a href="https://eportfolio.tdmu.edu.vn/view/view.php?id=1877" target="_blank" rel="noopener noreferrer">
                <h3 class="font-display font-bold text-base text-zinc-900 dark:text-white mb-2 group-hover:text-accent transition-colors">Hồ sơ đề tài Nghiên cứu Khoa học nhóm tại TDMU</h3>
              </a>
              <a href="https://eportfolio.tdmu.edu.vn/view/view.php?id=1877" target="_blank" rel="noopener noreferrer" class="text-sm font-medium text-accent nav-link">Xem đề tài →</a>
            </div>
          </article>

          <article class="reveal card group bg-white dark:bg-zinc-900 rounded-2xl overflow-hidden border border-zinc-100 dark:border-zinc-800 hover:border-accent transition-colors">
            <div class="photo-frame w-full h-40">
              <img src="https://images.unsplash.com/photo-1515879218367-8466d910aaa4?w=900&q=80" alt="Case study IoT" loading="lazy"/>
            </div>
            <div class="p-5">
              <span class="text-xs text-zinc-400 mb-2 block">Dự án tiêu biểu</span>
              <a href="{{ route('case-study') }}">
                <h3 class="font-display font-bold text-base text-zinc-900 dark:text-white mb-2 group-hover:text-accent transition-colors">Case Study: Hệ thống IoT nhận diện và điều khiển thông minh</h3>
              </a>
              <a href="{{ route('case-study') }}" class="text-sm font-medium text-accent nav-link">Xem Case Study →</a>
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
    </p>
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
