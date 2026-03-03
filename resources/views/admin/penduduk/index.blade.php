@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {!! nl2br(e(session('success'))) !!}
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <a href="{{ route('penduduk.create') }}" class="btn btn-primary">Tambah Penduduk</a>

                                <!-- trigger modal -->
                                <button type="button" class="btn btn-success ml-2" data-toggle="modal"
                                    data-target="#modalImport">
                                    <i class="fas fa-file-import"></i> Import Excel
                                </button>
                            </div>

                            <form method="GET" action="{{ route('penduduk.index') }}" class="form-inline ml-auto">
                                <div class="search-element">
                                    <input class="form-control" type="search" name="search" placeholder="Search"
                                        value="{{ old('search', $search ?? '') }}">
                                    @if (request()->has('search') && request('search') != '')
                                        <a href="{{ route('penduduk.index') }}" class="btn btn-primary ml-2">Reset</a>
                                    @else
                                        <button class="btn btn-primary ml-2" type="submit"><i
                                                class="fas fa-search"></i></button>
                                    @endif
                                </div>
                            </form>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        {{-- <th>Email</th> --}}
                                        {{-- <th>Tanggal Lahir</th> --}}
                                        <th>No KK</th>
                                        <th>NIK</th>
                                        <th>Alamat</th>
                                        <th>RT</th>
                                        <th>RW</th>
                                        <th>Dusun</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                    @php $no = 1; @endphp
                                    @foreach ($penduduk as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            {{-- <td>{{ $item->email }}</td> --}}
                                            {{-- <td>{{ $item->date_of_birth }}</td> --}}
                                            <td>{{ $item->kk }}</td>
                                            <td>{{ $item->nik }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->rt ?? "-" }}</td>
                                            <td>{{ $item->rw ??"'"}}</td>
                                            <td>{{ $item->dusun ??"-"}}</td>

                                            <td>
                                                @php
                                                    $isIncomplete =
                                                        empty($item->name) ||
                                                        empty($item->nik) ||
                                                        empty($item->rt) ||
                                                        empty($item->rw);
                                                @endphp
                                                @if ($isIncomplete)
                                                    <span class="badge badge-danger">Belum Lengkap</span>
                                                @else
                                                    <span class="badge badge-success">Lengkap</span>
                                                @endif
                                            </td>
                                            <td class="d-flex">
                                                <a href="{{ route('penduduk.show', $item->id) }}" class="btn btn-info mr-2"
                                                    title="Detail"><i class="fas fa-info-circle"></i></a>
                                                <a href="{{ route('penduduk.edit', $item->id) }}"
                                                    class="btn btn-primary mr-2" title="Edit"><i
                                                        class="far fa-edit"></i></a>
                                                <form action="{{ route('penduduk.destroy', $item->id) }}" method="POST"
                                                    onsubmit="return confirm('Hapus data ini?')"
                                                    style="display:inline-block;">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-danger" title="Hapus"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-3">{{ $penduduk->links() }}</div>
        </section>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="modalImportLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('penduduk.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalImportLabel">Import Data Penduduk (Excel)</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Pilih file Excel</label>
                            <input type="file" name="file" class="form-control" accept=".xlsx,.xls,.csv" required>
                        </div>
                        <small class="text-muted">Format header: NO, No .KK, No Identitas, Nama lengkap, Alamat, Dusun, RT,
                            RW</small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" id="btnImport" class="btn btn-primary">
                            <span id="importText">Import</span>
                            <span id="importLoading" style="display:none;">Mengimport...</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
   
@endsection
