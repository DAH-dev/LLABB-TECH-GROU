<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Dashboard - LLABB TECH GROUP</title>
    <style>
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: #072066;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .login-box {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            width: 100%;
            max-width: 380px;
        }
        .login-box h1 { font-size: 1.3rem; margin: 0 0 4px; }
        .login-box p.subtitle { color: #5c6b84; font-size: 0.9rem; margin: 0 0 28px; }
        .form-group { margin-bottom: 18px; }
        .form-group label { display: block; font-size: 0.85rem; margin-bottom: 6px; font-weight: 600; }
        .form-group input {
            width: 100%; padding: 10px 12px; border: 1px solid #e0e0e0;
            border-radius: 4px; font-size: 0.95rem;
        }
        .form-group input:focus { outline: none; border-color: #1e88e5; }
        .checkbox-row { display: flex; align-items: center; gap: 8px; margin-bottom: 22px; font-size: 0.85rem; }
        .btn-login {
            width: 100%; padding: 12px; background: #1e88e5; color: #fff;
            border: none; border-radius: 4px; font-size: 0.95rem; cursor: pointer;
        }
        .btn-login:hover { opacity: 0.9; }
        .error-msg { color: #c0392b; font-size: 0.82rem; margin-top: 6px; }
        .alert-error {
            background: #fdecec; color: #c0392b; border: 1px solid #f5b7b1;
            padding: 12px 16px; border-radius: 4px; font-size: 0.85rem; margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h1>Dashboard LLABB TECH GROUP</h1>
        <p class="subtitle">Connectez-vous pour gérer le contenu du site.</p>

        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="checkbox-row">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember" style="margin:0; font-weight:400;">Se souvenir de moi</label>
            </div>

            <button type="submit" class="btn-login">Se connecter</button>
        </form>
    </div>
</body>
</html>