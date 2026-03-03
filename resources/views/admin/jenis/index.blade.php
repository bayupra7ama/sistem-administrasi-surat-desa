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
                        <div class="card-header">

                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tr>
                                        <th class="">No</th>
                                        <th class="">Jenis Surat</th>
                                        <th class="">Kode</th>
                                        <th class="">Keterangan</th>
                                        <th class="">Aksi</th>
                                    </tr>
                                    <?php $no = 1; ?>
                                    @foreach ($jenisSurat as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->nama_surat }}</td>
                                            <td>{{ $item->kode }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td class="">
                                                <a href="{{ route('jenis-surat.edit', $item->id) }}"
                                                    class="btn btn-icon btn-primary mr-2" data-toggle="tooltip"
                                                    data-placement="top" title="Edit"><i class="far fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
