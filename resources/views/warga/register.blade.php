<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pendaftaran Baru</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Pendaftaran</div>
            </a>

            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Form Pendaftar</span>
                </a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <h5 class="m-0 font-weight-bold text-primary">Form Pendaftaran Baru</h5>
                </nav>

                <div class="container-fluid">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Isi Data Pendaftaran</h6>
                        </div>
                        <div class="card-body">

                            {{-- Flash Messages --}}
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if(!empty($errorMessage))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $errorMessage }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            {{-- End Flash Messages --}}

                            <form action="{{ route('warga.store') }}" method="POST" class="user">
                                @csrf

                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                                        class="form-control form-control-user @error('nama') is-invalid @enderror"
                                        placeholder="Nama Lengkap" required>
                                    @error('nama')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" name="nik" id="nik" value="{{ old('nik') }}"
                                        class="form-control form-control-user @error('nik') is-invalid @enderror"
                                        placeholder="Nomor Induk Kependudukan" required>
                                    @error('nik')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="no_hp">Nomor HP</label>
                                    <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}"
                                        class="form-control form-control-user @error('no_hp') is-invalid @enderror"
                                        placeholder="08xxxxxxxxxx" required>
                                    @error('no_hp')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat Lengkap</label>
                                    <textarea name="alamat" id="alamat"
                                        class="form-control @error('alamat') is-invalid @enderror"
                                        placeholder="Tuliskan alamat lengkap" rows="3"
                                        required>{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- 🔽 Tambahan: Pilih tanggal jadwal --}}
                                <div class="form-group">
                                    <label for="jadwal_id">Tanggal Jadwal</label>
                                    <select name="jadwal_id" id="jadwal_id"
                                        class="form-control @error('jadwal_id') is-invalid @enderror" required>
                                        <option value="">-- Pilih Tanggal Jadwal --</option>
                                        @foreach ($jadwals as $j)
                                            <option value="{{ $j->id }}">
                                                {{ \Carbon\Carbon::parse($j->tanggal)->translatedFormat('d F Y') }}
                                                ({{ $j->jam_buka }} - {{ $j->jam_tutup }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('jadwal_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                {{-- 🔼 Akhir tambahan --}}

                                <div class="form-group">
                                    <label for="jenis_pendaftaran">Jenis Pendaftaran</label>
                                    <select name="jenis_pendaftaran" id="jenis_pendaftaran"
                                        class="form-control @error('jenis_pendaftaran') is-invalid @enderror" required>
                                        <option value="">-- Pilih Jenis Pendaftaran --</option>
                                        <option value="dukcapil" {{ old('jenis_pendaftaran') == 'dukcapil' ? 'selected' : '' }}>Dukcapil</option>
                                        <option value="pencatatan_sipil" {{ old('jenis_pendaftaran') == 'pencatatan_sipil' ? 'selected' : '' }}>Pencatatan Sipil</option>
                                    </select>
                                    @error('jenis_pendaftaran')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Simpan Pendaftaran
                                </button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>© {{ date('Y') }} - Sistem Pendaftaran</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>
</html>
