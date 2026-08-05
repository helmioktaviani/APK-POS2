<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - POS System</title>
    <!-- Tetap memakai Bootstrap bawaan Anda agar desain kartu tidak berubah -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>
<body>

<div class="card text-center position-absolute top-50 start-50 translate-middle" style="width: 24rem; padding: 10px; box-shadow: 0 4px 6px rgba(0,0,0,.05);">
    <h5 class="card-header py-3 bg-white fw-bold">Login POS</h5>

    <div class="card-body">
        <form action="{{ route('auth') }}" method="POST">
            @csrf

            <div class="mb-3 text-start">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Masukkan email" required>
                @error('email')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 text-start">
                <label class="form-label fw-semibold">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                @error('password')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2 mt-2">Login</button>
        </form>
    </div>
</div>

</body>
</html>
