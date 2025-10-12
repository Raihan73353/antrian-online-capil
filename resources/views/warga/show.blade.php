<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomor Antrian</title>

    <!-- Bootstrap & SB Admin -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #224abe);
            color: #fff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .card {
            background: #fff;
            color: #333;
            border-radius: 1.5rem;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            max-width: 400px;
            width: 100%;
        }

        .nomor-antrian {
            font-size: 5rem;
            font-weight: 800;
            color: #4e73df;
            margin-bottom: 0.5rem;
        }

        .jam-ambil {
            color: #858796;
            font-size: 0.95rem;
            margin-bottom: 0.75rem;
        }

        .footer {
            text-align: center;
            font-size: 0.85rem;
            color: #ddd;
            position: fixed;
            bottom: 10px;
            width: 100%;
        }

        @media (max-width: 576px) {
            .nomor-antrian {
                font-size: 3.5rem;
            }
            .card {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>

    <div class="card text-center p-4">
        <div class="mb-3">
            <i class="fas fa-ticket-alt fa-3x text-primary"></i>
        </div>
        <h4 class="fw-bold mb-3">Nomor Antrian Anda</h4>

        <div class="nomor-antrian">{{ $antrean->nomor }}</div>

        <div class="jam-ambil">
            <i class="fas fa-clock"></i> Jam Ambil: {{ $antrean->jam }}
        </div>

        <p class="text-muted mb-4">Harap tunggu hingga nomor Anda dipanggil.</p>

        <a href="{{ route('warga.index') }}" class="btn btn-primary w-100">
            <i class="fas fa-home"></i> Kembali ke Dashboard
        </a>
    </div>

    <div class="footer">
        © {{ date('Y') }} Sistem Antrean Warga
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
