<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lupa Password - KursusKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg,#d63384,#c2185b); font-family: 'Poppins',sans-serif; }
        .box { max-width: 420px; margin: 100px auto; background: white; padding: 32px; border-radius: 16px; }
    </style>
</head>
<body>
    <div class="box">
        <h3>Lupa Password</h3>
        <p class="text-muted">Masukkan email Anda untuk menerima link reset password.</p>

        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
                @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100" style="background:#d63384;border:none;">
                Kirim Link Reset
            </button>
        </form>

        <a href="{{ route('login') }}" class="d-block text-center mt-3 text-decoration-none">
            ← Kembali ke Login
        </a>
    </div>
</body>
</html>