@extends('layouts.frontend.app')

@section('title', 'Pendaftaran Baru')

@push('css')
    
@endpush

@section('content')
<div class="page-wrapper p-t-180 p-b-100 font-robo" style="background:#5897fb">
    <div class="wrapper wrapper--w960">
        <div class="card card-2">
            <div class="card-heading"></div>
            <div class="card-body">
                <h2 class="title">Formulir Registrasi</h2>
                <div class="col-lg-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <form method="POST" action="{{ route('pendaftaran.store') }}">
                    @csrf
                    <div class="input-group">
                        <input class="input--style-2" type="text" placeholder="Nama Kamu" name="nama" required>
                    </div>
                    <div class="input-group">
                        <input class="input--style-2" type="text" placeholder="Tempat Lahir Kamu" name="tempat_lahir" required>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <input class="input--style-2 js-datepicker" type="text" placeholder="Tanggal Lahir Kamu" name="tanggal_lahir" required>
                                <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="jenis_kelamin" required>
                                        <option disabled="disabled" selected="selected" value="">Jenis Kelamin</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <input class="input--style-2" type="text" placeholder="Nomor HP Kamu" name="no_hp" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <input class="input--style-2" type="email" placeholder="Email Kamu" name="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <input class="input--style-2" type="text" placeholder="Alamat Kamu" name="alamat" required>
                    </div>
                    <div class="input-group">
                        <div class="rs-select2 js-select-simple select--no-search">
                            <select name="kategori_pendaftar" id="kategori-pendaftar" name="kategori_pendaftar" required>
                                <option disabled="disabled" selected="selected" value="">Pilih Kategori Pendaftar</option>
                                <option value="m">Mahasiswa</option>
                                <option value="s">Siswa</option>
                            </select>
                            <div class="select-dropdown"></div>
                        </div>
                    </div>
                    <div class="input-group" id="div-institusi" hidden>
                        <div class="rs-select2 js-select-simple select--no-search">
                            <select name="institusi" id="institusi" name="institusi" required>
                                {{-- <option disabled="disabled" selected="selected">Pilih Kategori Pendaftar</option> --}}
                            </select>
                            <div class="select-dropdown"></div>
                        </div>
                    </div>
                    <div class="input-group" id="div-sekolah-baru" hidden>
                        <input class="input--style-2" type="text" name="sekolah_baru" id="sekolah-baru" placeholder="Tulis Asal Sekolah Kamu">
                    </div>
                    <div class="input-group" id="div-universitas-baru" hidden>
                        <input class="input--style-2" type="text" name="universitas_baru" id="universitas-baru" placeholder="Tulis Asal Universitas Kamu">
                    </div>
                    <div class="p-t-30">
                        <button class="btn btn--radius btn--green" type="submit">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $('#kategori-pendaftar').on('change', () => {
        const kategoriPendaftar = $('#kategori-pendaftar').val()

        $('#div-institusi').attr('hidden', false)
        $('#div-universitas-baru').attr('hidden', true)
        $('#div-sekolah-baru').attr('hidden', true)

        if (kategoriPendaftar === 'm') {
            $('#institusi').empty()
            $.get('{{ route("get-data.universitas") }}', function (data) {
                $('#institusi').append('<option value="" disabled="disabled" selected="selected">Pilih Asal Universitas</option>');
                $('#institusi').append('<option value="new-universitas">Tidak Terdapat Pada List</option>');
                $.map(data, data => {
                    $('#institusi').append('<option value='+data.id+'>'+data.nama+'</option>');
                })
            })
        }

        if (kategoriPendaftar === 's') {
            $('#institusi').empty()
            $.get('{{ route("get-data.sekolah") }}', function (data) {
                $('#institusi').append('<option value="" disabled="disabled" selected="selected">Pilih Asal Sekolah</option>');
                $('#institusi').append('<option value="new-sekolah">Tidak Terdapat Pada List</option>');
                $.map(data, data => {
                    $('#institusi').append('<option value='+data.id+'>'+data.nama+'</option>');
                })
            })
        }

        $('#institusi').on('change', () => {
            const institusi = $('#institusi').val()

            if (institusi !== 'new-sekolah' || institusi !== 'new-universitas') {
                $('#div-sekolah-baru').attr('hidden', true)
                $('#div-universitas-baru').attr('hidden', true)
            }

            if (institusi === 'new-universitas') {
                $('#div-universitas-baru').attr('hidden', false)
                $('#div-sekolah-baru').attr('hidden', true)
            }

            if (institusi === 'new-sekolah') {
                $('#div-sekolah-baru').attr('hidden', false)
                $('#div-universitas-baru').attr('hidden', true)
            }

            
        })
    })
</script>
@endpush
