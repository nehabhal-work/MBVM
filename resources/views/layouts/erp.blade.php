<!DOCTYPE html>
<html lang="mr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'डॅशबोर्ड') — MBVM ERP</title>
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        :root {
            --erp-brand: #d45d2c;
            --erp-brand-dark: #b94c21;
            --erp-navy: #1d2940;
            --erp-side-bg: #fbeee8;
            --erp-side-text: #4a5468;
            --erp-bg: #f4f5f9;
            --erp-card: #fff;
            --erp-border: #eceff4;
            --erp-side-w: 270px;
            --erp-side-w-mini: 84px;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            background: var(--erp-bg);
            color: var(--erp-navy);
            font-family: 'Mukta', system-ui, sans-serif;
            font-size: 1rem;
        }

        /* ---------- Sidebar ---------- */
        .erp-side {
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 1040;
            display: flex;
            flex-direction: column;
            width: var(--erp-side-w);
            background: var(--erp-side-bg);
            transition: width .2s ease, transform .2s ease;
        }

        .erp-side__brand {
            position: relative;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 26px 24px 22px;
            color: var(--erp-navy);
            text-decoration: none;
        }

        .erp-side__brand img { width: 52px; height: 52px; object-fit: contain; flex-shrink: 0; }

        .erp-side__brand-text { line-height: 1.15; white-space: nowrap; }
        .erp-side__brand-text b { display: block; font-size: 1.55rem; font-weight: 700; letter-spacing: .02em; }
        .erp-side__brand-text small { color: var(--erp-side-text); font-size: .82rem; }

        .erp-side__toggle {
            position: absolute;
            top: 40px;
            right: -17px;
            display: grid;
            width: 34px;
            height: 34px;
            place-items: center;
            padding: 0;
            color: #fff;
            background: var(--erp-brand);
            border: 4px solid var(--erp-bg);
            border-radius: 50%;
            font-size: .75rem;
            cursor: pointer;
        }

        .erp-side__nav { flex: 1; overflow-y: auto; padding: 8px 14px 24px; }

        .erp-side__link {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 4px;
            padding: 12px 16px;
            color: var(--erp-side-text);
            border-radius: 10px;
            font-size: 1.05rem;
            text-decoration: none;
            white-space: nowrap;
            transition: background .15s, color .15s;
        }

        .erp-side__link i { width: 22px; text-align: center; font-size: 1.05rem; flex-shrink: 0; }
        .erp-side__link:hover { color: var(--erp-brand); background: rgba(212, 93, 44, .08); }

        .erp-side__link.is-active {
            color: #fff;
            background: var(--erp-brand);
            box-shadow: 0 6px 16px rgba(212, 93, 44, .3);
        }

        .erp-side__sep {
            margin: 18px 16px 8px;
            color: #8a93a3;
            font-size: .78rem;
            font-weight: 600;
            letter-spacing: .06em;
            text-transform: uppercase;
            white-space: nowrap;
        }

        /* mini (collapsed) sidebar on desktop */
        body.erp-mini .erp-side { width: var(--erp-side-w-mini); }
        body.erp-mini .erp-side__brand { justify-content: center; padding-inline: 10px; }
        body.erp-mini .erp-side__brand-text,
        body.erp-mini .erp-side__link span,
        body.erp-mini .erp-side__sep { display: none; }
        body.erp-mini .erp-side__link { justify-content: center; padding-inline: 0; }
        body.erp-mini .erp-side__toggle i { transform: rotate(180deg); }

        /* ---------- Main ---------- */
        .erp-main {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin-left: var(--erp-side-w);
            padding: 20px 30px 0;
            transition: margin-left .2s ease;
        }

        body.erp-mini .erp-main { margin-left: var(--erp-side-w-mini); }

        .erp-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 14px 24px;
            background: var(--erp-card);
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(29, 41, 64, .04);
        }

        .erp-top__title { display: flex; align-items: center; gap: 14px; margin: 0; font-size: 1.15rem; font-weight: 600; }

        .erp-top__burger {
            display: none;
            padding: 4px 8px;
            color: var(--erp-navy);
            background: none;
            border: 0;
            font-size: 1.3rem;
        }

        .erp-top__right { display: flex; align-items: center; gap: 18px; }

        .erp-top__icon { color: #6b7385; font-size: 1.1rem; text-decoration: none; }
        .erp-top__icon:hover { color: var(--erp-brand); }

        .erp-avatar {
            position: relative;
            display: grid;
            width: 46px;
            height: 46px;
            place-items: center;
            padding: 0;
            color: #fff;
            background: var(--erp-brand);
            border: 0;
            border-radius: 50%;
            font-weight: 700;
            font-size: 1rem;
        }

        .erp-avatar::after {
            content: '';
            position: absolute;
            right: 1px;
            bottom: 1px;
            width: 11px;
            height: 11px;
            background: #3ccf4e;
            border: 2px solid #fff;
            border-radius: 50%;
        }

        .erp-top .dropdown-menu { min-width: 240px; padding: 8px; border: 1px solid var(--erp-border); border-radius: 12px; box-shadow: 0 12px 30px rgba(29, 41, 64, .12); }
        .erp-top .dropdown-item { padding: 9px 12px; border-radius: 8px; }
        .erp-top .dropdown-item i { width: 20px; margin-right: 6px; color: #8a93a3; }

        .erp-content { flex: 1; padding: 26px 0 30px; }

        .erp-footer { padding: 18px 0 22px; color: #6b7385; font-size: .95rem; }

        .erp-backdrop { display: none; }

        /* ---------- Mobile: sidebar becomes a drawer ---------- */
        @media (max-width: 991px) {
            .erp-side { transform: translateX(-100%); width: var(--erp-side-w) !important; }
            .erp-side__toggle { display: none; }
            body.erp-mini .erp-side__brand-text,
            body.erp-mini .erp-side__link span,
            body.erp-mini .erp-side__sep { display: initial; }
            body.erp-mini .erp-side__link { justify-content: flex-start; padding-inline: 16px; }
            body.erp-open .erp-side { transform: none; }
            body.erp-open .erp-backdrop { display: block; position: fixed; inset: 0; z-index: 1030; background: rgba(29, 41, 64, .35); }
            .erp-main, body.erp-mini .erp-main { margin-left: 0; padding: 14px 16px 0; }
            .erp-top { padding: 10px 14px; }
            .erp-top__burger { display: inline-block; }
        }
    </style>
    @stack('styles')
</head>

<body>
    @php
        $erpUser = auth()->user();
        $erpInitials = collect(preg_split('/\s+/', trim($erpUser->name)))
            ->filter()->take(2)->map(fn ($w) => mb_strtoupper(mb_substr($w, 0, 1)))->implode('') ?: 'A';
    @endphp

    <aside class="erp-side" id="erp-side">
        <a href="{{ route('admin.users.index', ['tab' => 'dashboard']) }}" class="erp-side__brand">
            <img src="{{ asset('img/logo-mbvm.png') }}" alt="MBVM">
            <span class="erp-side__brand-text"><b>MBVM</b><small>ERP प्रशासन</small></span>
        </a>
        <button type="button" class="erp-side__toggle" id="erp-side-toggle" aria-label="साइडबार लहान/मोठा करा">
            <i class="fas fa-chevron-left"></i>
        </button>

        <nav class="erp-side__nav">
            @yield('sidebar')
        </nav>
    </aside>
    <div class="erp-backdrop" id="erp-backdrop"></div>

    <div class="erp-main">
        <header class="erp-top">
            <h1 class="erp-top__title">
                <button type="button" class="erp-top__burger" id="erp-burger" aria-label="मेनू"><i class="fas fa-bars"></i></button>
                @yield('title', 'डॅशबोर्ड')
            </h1>

            <div class="erp-top__right">
                <a href="{{ route('home') }}" target="_blank" class="erp-top__icon" title="वेबसाइट पहा">
                    <i class="fas fa-globe"></i>
                </a>
                <div class="dropdown">
                    <button type="button" class="erp-avatar" data-bs-toggle="dropdown" aria-expanded="false"
                        title="{{ $erpUser->name }}">{{ $erpInitials }}</button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="px-3 py-2">
                            <div class="fw-semibold">{{ $erpUser->name }}</div>
                            <small class="text-muted d-block">{{ $erpUser->email }}</small>
                            <small class="text-muted">{{ \App\Models\User::ROLES[$erpUser->role] ?? $erpUser->role }}</small>
                        </div>
                        <hr class="dropdown-divider">
                        <a class="dropdown-item" href="{{ route('home') }}" target="_blank"><i class="fas fa-globe"></i>वेबसाइट पहा</a>
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>लॉगआऊट</button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <main class="erp-content">
            @yield('content')
        </main>

        <footer class="erp-footer">
            © {{ now()->year }}, मराठी बांधकाम व्यावसायिक महासंघ — MBVM ERP
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function () {
            var body = document.body;
            try { if (localStorage.getItem('erp-mini') === '1') body.classList.add('erp-mini'); } catch (e) {}

            document.getElementById('erp-side-toggle').addEventListener('click', function () {
                body.classList.toggle('erp-mini');
                try { localStorage.setItem('erp-mini', body.classList.contains('erp-mini') ? '1' : '0'); } catch (e) {}
            });
            document.getElementById('erp-burger').addEventListener('click', function () { body.classList.add('erp-open'); });
            document.getElementById('erp-backdrop').addEventListener('click', function () { body.classList.remove('erp-open'); });
        })();
    </script>
    @stack('scripts')
</body>

</html>
