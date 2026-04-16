@props(['showOnce' => true])

<div 
    id="intro-screen" 
    class="fixed inset-0 z-[100] flex items-center justify-center bg-gradient-to-br from-indigo-950 via-purple-900 to-slate-900 transition-opacity duration-1000"
    style="{{ $showOnce ? 'display: none;' : '' }}"
    role="presentation"
>
    <div class="absolute inset-0 bg-black/20 mix-blend-overlay"></div>

    <div class="relative z-10 text-center max-w-md mx-auto px-6 flex flex-col items-center">
        <div class="mb-10 transform transition-all duration-1000 scale-90 opacity-0 intro-element" style="transition-delay: 100ms;">
            <div class="relative group">
                <div class="absolute -inset-1 bg-gradient-to-r from-blue-500 to-purple-600 rounded-[2rem] blur-xl opacity-50 animate-pulse"></div>
                
                <div class="relative bg-white/10 backdrop-blur-xl border border-white/20 rounded-[2rem] p-10 shadow-2xl flex flex-col items-center justify-center">
                    <h2 class="text-6xl font-black text-transparent bg-clip-text bg-gradient-to-tr from-white via-blue-100 to-indigo-300 mb-2 tracking-tighter drop-shadow-sm">RK</h2>
                    <div class="w-16 h-1 bg-gradient-to-r from-transparent via-blue-400 to-transparent rounded-full opacity-80"></div>
                </div>
            </div>
        </div>

        <div class="mb-12 transform transition-all duration-1000 translate-y-4 opacity-0 intro-element" style="transition-delay: 400ms;">
            <h1 class="text-4xl font-extrabold text-white mb-2 tracking-tight drop-shadow-md">RinKa Perpus</h1>
            <p class="text-blue-200/80 text-sm font-semibold tracking-widest uppercase">Sistem Perpustakaan Modern</p>
        </div>

        <div class="transition-all duration-1000 opacity-0 intro-element" style="transition-delay: 700ms;">
            <div class="flex justify-center items-center space-x-3 mb-4">
                <div class="w-2.5 h-2.5 bg-blue-400 rounded-full animate-ping" style="animation-duration: 1.5s;"></div>
                <div class="w-2.5 h-2.5 bg-purple-400 rounded-full animate-ping" style="animation-duration: 1.5s; animation-delay: 0.2s;"></div>
                <div class="w-2.5 h-2.5 bg-indigo-400 rounded-full animate-ping" style="animation-duration: 1.5s; animation-delay: 0.4s;"></div>
            </div>
            <p class="text-white/60 text-sm font-medium animate-pulse">Menyiapkan ruang baca Anda...</p>
        </div>
    </div>
</div>

@if($showOnce)
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const introScreen = document.getElementById('intro-screen');
        const loginContent = document.getElementById('login-content');
        const introElements = document.querySelectorAll('.intro-element');

        // Cek localStorage
        const hasSeenIntro = localStorage.getItem('rinka-intro-seen');

        // Cek parameter URL untuk force show intro
        const urlParams = new URLSearchParams(window.location.search);
        const forceShowIntro = urlParams.get('show-intro') === 'true';

        // Cek apakah halaman di-refresh (menggunakan performance API)
        const isPageRefreshed = performance.getEntriesByType('navigation')[0]?.type === 'reload' ||
                              (performance.navigation && performance.navigation.type === 1);

        // Fungsi untuk menampilkan konten utama
        function showMainContent() {
            if (loginContent) {
                // Pastikan elemen login memiliki transisi
                loginContent.style.transition = 'opacity 1s ease-out';
                loginContent.style.opacity = '1';
                loginContent.style.pointerEvents = 'auto';
            }
        }

        // Tampilkan intro jika:
        // 1. Belum pernah melihat intro, ATAU
        // 2. Ada parameter show-intro=true, ATAU
        // 3. Halaman di-refresh
        const shouldShowIntro = !hasSeenIntro || forceShowIntro || isPageRefreshed;

        if (shouldShowIntro) {
            // Tampilkan intro
            if (introScreen) {
                introScreen.style.display = 'flex';

                // Trigger animasi masuk (staggered)
                requestAnimationFrame(() => {
                    setTimeout(() => {
                        introElements.forEach(el => {
                            el.classList.remove('scale-90', 'translate-y-4', 'opacity-0');
                            el.classList.add('scale-100', 'translate-y-0', 'opacity-100');
                        });
                    }, 50); // Jeda singkat agar browser me-render CSS awal terlebih dahulu
                });

                // Proses keluar
                setTimeout(() => {
                    introScreen.classList.add('opacity-0'); // Efek fade out untuk seluruh layar

                    setTimeout(() => {
                        introScreen.remove(); // Hapus dari DOM
                        showMainContent();
                        // Simpan ke localStorage hanya jika bukan force show
                        if (!forceShowIntro) {
                            localStorage.setItem('rinka-intro-seen', 'true');
                        }
                    }, 1000); // Tunggu sampai transisi opacity selesai (1s)

                }, 3500); // Lama intro ditampilkan
            }
        } else {
            // Jika sudah pernah melihat dan tidak ada force show, langsung hapus intro dan tampilkan konten
            if (introScreen) introScreen.remove();
            showMainContent();
        }
    });
</script>
@endif