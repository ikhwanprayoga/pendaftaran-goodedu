@extends('layouts.frontend.app')

@section('title', 'Pendaftaran Baru')

@push('css')
<style>
    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }
    .alert {
        position: relative;
        padding: .75rem 1.25rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: .25rem;
    }
</style>
@endpush

@section('content')
<div class="page-wrapper p-t-180 p-b-100 font-robo" style="background:#5897fb">
    <div class="wrapper wrapper--w960">
        <div class="card card-2">
            <div class="card-heading"></div>
            <div class="card-body">
                <h2 class="title">Data Registrasi</h2>
                <div class="col-lg-12">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                </div>
                <form action="">
                    <div class="input-group">
                        <input class="input--style-2" type="text" value="{{ $data->nama }}" disabled>
                    </div>
                    <div class="input-group">
                        <input class="input--style-2" type="text" value="{{ $data->tempat_lahir }}">
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <input class="input--style-2 js-datepicker" type="text" placeholder="Tanggal Lahir Kamu" value="{{ tanggalLahir($data->tanggal_lahir) }}" disabled>
                                <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="jenis_kelamin" disabled>
                                        <option value="L" {{ $data->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ $data->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <input class="input--style-2" type="text" value="{{ $data->no_hp }}" disabled>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <input class="input--style-2" type="email" value="{{ $data->email }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <input class="input--style-2" type="text" value="{{ $data->alamat }}" disabled>
                    </div>
                    <div class="input-group">
                        <div class="rs-select2 js-select-simple select--no-search">
                            <select name="kategori_pendaftar" disabled>
                                <option value="m" {{ $data->kategori_pendaftar_id == 2 ? 'selected' : '' }}>Mahasiswa</option>
                                <option value="s" {{ $data->kategori_pendaftar_id == 1 ? 'selected' : '' }}>Siswa</option>
                            </select>
                            <div class="select-dropdown"></div>
                        </div>
                    </div>
                    <div class="col-2">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" value="{{ $data->institusi->nama }}" disabled>
                        </div>
                    <div class="p-t-30">
                        <a href="{{ route('pendaftaran.index') }}">
                                <button class="btn btn--radius btn--green" type="button">Daftar Baru</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    
</script>
@endpush
