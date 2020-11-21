@extends('layouts.admin-base')

@section('content')
<div class="content-body">

    {{-- <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div> --}}
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Pendaftar</h4>
                        <div class="table-responsive">
                            <table class="table header-border">
                                <thead>
                                        <tr>
                                                <th>NO</th>
                                                <th>Nama</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>No HP</th>
                                                <th>Email</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat</th>
                                                <th>Asal</th>
                                                <th>Kategori Pendaftar</th>
                                                <th>Tanggal Mendaftar</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->tempat_lahir }}</td>
                                        <td>{{ date('d-m-Y', strtotime($data->tanggal_lahir)) }}</td>
                                        <td>{{ $data->no_hp }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->jenis_kelamin }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->institusi->nama }}</td>
                                        <td>{{ $data->kategori_pendaftar->nama }}</td>
                                        <td>{{ date('d-m-Y', strtotime($data->created_at)) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
@endsection

@push('js')

@endpush