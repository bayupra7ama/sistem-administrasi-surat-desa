@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">

                        {{-- FORM SEARCH RESPONSIVE --}}
                        <div
                            class="card-header flex-column flex-md-row d-flex justify-content-between align-items-md-center">
                            <form method="GET"
                                action="{{ auth()->user()->role == 'admin' ? route('admin.pengajuan.riwayat') : route('penduduk.riwayat.surat') }}"
                                class="w-100">

                                <div class="search-wrapper d-flex flex-column flex-md-row align-items-md-center">
                                    <input class="form-control mb-2 mb-md-0" type="search" name="search"
                                        placeholder="Cari pengajuan..." value="{{ old('search', $search ?? '') }}"
                                        id="searchInput">

                                    @if (request()->has('search') && request('search') != '')
                                        <a href="{{ auth()->user()->role == 'admin' ? route('admin.pengajuan.riwayat') : route('penduduk.riwayat.surat') }}"
                                            class="btn btn-primary ml-md-2 mt-2 mt-md-0" id="searchBtn">
                                            Reset
                                        </a>
                                    @else
                                        <button class="btn btn-primary ml-md-2 mt-2 mt-md-0" type="submit" id="searchBtn">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    @endif
                                </div>
                            </form>
                        </div>

                        {{-- END FORM SEARCH --}}

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pemohon</th>
                                        <th>Jenis Surat</th>
                                        <th>Kode Surat</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Status</th>
                                        <th class="text-center">
                                            {{ auth()->user()->role == 'admin' ? 'Aksi' : 'Pesan' }}
                                        </th>
                                    </tr>

                                    @forelse ($riwayatSurat as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->jenisSurat->nama_surat }}</td>
                                            <td>{{ $item->jenisSurat->kode }}</td>
                                            <td>{{ $item->created_at->format('d M Y') }}</td>
                                            <td>
                                                @if ($item->status == 'Rejected')
                                                    <div class="badge badge-danger">{{ $item->status }}</div>
                                                @elseif ($item->status == 'Approved')
                                                    <div class="badge badge-success">{{ $item->status }}</div>
                                                @else
                                                    <div class="badge badge-warning">{{ $item->status }}</div>
                                                @endif
                                            </td>

                                            @if (auth()->user()->role == 'admin')
                                                <td class="text-center">
                                                    <a href="{{ route('pengajuan.show', $item->id) }}"
                                                        class="btn btn-info btn-sm mr-1">
                                                        <i class="fas fa-eye"></i> Detail
                                                    </a>
                                                </td>
                                            @else
                                                <td>
                                                    @if ($item->pesan_admin)
                                                        <span>{{ $item->pesan_admin }}</span>
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada pengajuan surat saat ini.</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <div class="d-flex justify-content-center">
            {{ $riwayatSurat->links() }}
        </div>
    </div>
@endsection
