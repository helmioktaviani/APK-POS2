<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - POS System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            margin: 0;
        }

        .card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
        }

        .card-header {
            border-bottom: 3px solid #89D7B7;
            color: #1f2d27;
        }

        .form-control:focus {
            border-color: #89D7B7;
            box-shadow: 0 0 0 0.2rem rgba(137, 215, 183, 0.35);
        }

        .btn-primary {
            background-color: #89D7B7;
            border-color: #89D7B7;
            color: #1f2d27;
            font-weight: 600;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #6fc7a2;
            border-color: #6fc7a2;
            color: #1f2d27;
        }

        .btn-primary:active {
            background-color: #5ab88f !important;
            border-color: #5ab88f !important;
        }
    </style>
</head>
<body>

<div class="card text-center position-absolute top-50 start-50 translate-middle" style="width: 24rem; padding: 10px; box-shadow: 0 4px 6px rgba(0,0,0,.05);">
    <h5 class="card-header py-3 bg-white fw-bold">POS KOSMETIK</h5>

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