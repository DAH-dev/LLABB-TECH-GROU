<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - LLABB TECH GROUP</title>
    <style>
        :root {
            --admin-primary: #1e88e5;
            --admin-dark: #072066;
            --admin-bg: #f5f7fb;
            --admin-border: #e0e0e0;
            --admin-text: #1b2a42;
            --admin-text-muted: #5c6b84;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: var(--admin-bg);
            color: var(--admin-text);
            display: flex;
            min-height: 100vh;
        }
        a { color: inherit; text-decoration: none; }

        .admin-sidebar {
            width: 240px;
            background: var(--admin-dark);
            color: #fff;
            padding: 24px 0;
            flex-shrink: 0;
        }
        .admin-sidebar .brand {
            padding: 0 24px 24px;
            font-weight: 700;
            font-size: 1.1rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 16px;
        }
        .admin-nav a {
            display: block;
            padding: 12px 24px;
            font-size: 0.92rem;
            color: rgba(255,255,255,0.75);
        }
        .admin-nav a:hover, .admin-nav a.active {
            background: rgba(255,255,255,0.08);
            color: #fff;
        }
        .admin-nav .section-title {
            padding: 20px 24px 8px;
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: rgba(255,255,255,0.4);
        }

        .admin-main { flex: 1; display: flex; flex-direction: column; min-width: 0; }
        .admin-topbar {
            background: #fff;
            border-bottom: 1px solid var(--admin-border);
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .admin-topbar h1 { font-size: 1.2rem; margin: 0; }
        .admin-topbar .user-menu { font-size: 0.9rem; display: flex; align-items: center; gap: 12px; }
        .admin-topbar .user-menu button {
            background: none; border: 1px solid var(--admin-border);
            padding: 6px 14px; font-size: 0.85rem; cursor: pointer; color: var(--admin-text);
        }
        .admin-content { padding: 32px; flex: 1; }

        .admin-card {
            background: #fff;
            border: 1px solid var(--admin-border);
            border-radius: 8px;
            padding: 24px;
        }
        .admin-alert {
            padding: 14px 18px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
        .admin-alert.success { background: #e6f7ee; color: #1e7e4a; border: 1px solid #b7e8cd; }
        .admin-alert.error { background: #fdecec; color: #c0392b; border: 1px solid #f5b7b1; }

        .admin-table { width: 100%; border-collapse: collapse; }
        .admin-table th, .admin-table td { text-align: left; padding: 12px 16px; border-bottom: 1px solid var(--admin-border); font-size: 0.9rem; }
        .admin-table th { color: var(--admin-text-muted); font-weight: 600; font-size: 0.8rem; text-transform: uppercase; }

        .btn-admin {
            display: inline-block;
            padding: 10px 20px;
            background: var(--admin-primary);
            color: #fff;
            border: none;
            font-size: 0.88rem;
            cursor: pointer;
            border-radius: 4px;
        }
        .btn-admin:hover { opacity: 0.9; }
        .btn-admin-outline {
            display: inline-block;
            padding: 9px 18px;
            background: transparent;
            border: 1px solid var(--admin-border);
            color: var(--admin-text);
            font-size: 0.88rem;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
</head>
<body>

    @auth
    <aside class="admin-sidebar">
        <div class="brand">LLABB Dashboard</div>
        <nav class="admin-nav">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Tableau de bord</a>

            <div class="section-title">Contenu</div>
            <a href="{{ route('admin.services.index') }}" class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}">Services</a>
            <a href="{{ route('admin.projects.index') }}" class="{{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">Portfolio</a>
            <a href="{{ route('admin.articles.index') }}" class="{{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">Blog</a>
            <a href="{{ route('admin.nouvelles.index') }}" class="{{ request()->routeIs('admin.nouvelles.*') ? 'active' : '' }}">Nouvelles</a>
            <a href="{{ route('admin.team.index') }}" class="{{ request()->routeIs('admin.team.*') ? 'active' : '' }}">Équipe</a>
            <a href="{{ route('admin.testimonials.index') }}" class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">Témoignages</a>
            <a href="{{ route('admin.pricing.index') }}" class="{{ request()->routeIs('admin.pricing.*') ? 'active' : '' }}">Tarifs</a>
            <a href="{{ route('admin.faq.index') }}" class="{{ request()->routeIs('admin.faq.*') ? 'active' : '' }}">FAQ</a>

            <div class="section-title">Activité</div>
            <a href="{{ route('admin.rapports.index') }}" class="{{ request()->routeIs('admin.rapports.*') ? 'active' : '' }}">{{ in_array(auth()->user()->role, ['super_admin', 'admin']) ? 'Comptes rendus' : 'Mes comptes rendus' }}</a>
            <a href="{{ route('admin.messages.index') }}" class="{{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">Messages de contact</a>
            <a href="{{ route('admin.newsletter.index') }}" class="{{ request()->routeIs('admin.newsletter.*') ? 'active' : '' }}">Abonnés newsletter</a>

            <div class="section-title">Système</div>
            <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">Utilisateurs</a>
            <a href="{{ route('admin.settings.edit') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">Paramètres</a>
        </nav>
    </aside>
    @endauth

    <div class="admin-main">
        @auth
        <header class="admin-topbar">
            <h1>@yield('title', 'Tableau de bord')</h1>
            <div class="user-menu">
                <span>{{ auth()->user()->name }}</span>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit">Déconnexion</button>
                </form>
            </div>
        </header>
        @endauth

        <main class="admin-content">
            @if (session('success'))
                <div class="admin-alert success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
             <div class="admin-alert error">{{ session('error') }}</div>
            @endif
            @if ($errors->any())
                <div class="admin-alert error">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif

            @yield('content')
        </main>
    </div>

</body>
</html>