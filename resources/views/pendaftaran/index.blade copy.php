@extends('layouts.frontend.app')

@section('title', 'Pendaftaran Baru')

@push('css')
    
@endpush

@section('content')
<!-- Sign up form -->
<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Formulir Pendaftaran</h2>
                <form method="POST" action="{{ route('pendaftaran.store') }}" class="register-form" id="register-form">
                    @csrf
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="nama" id="nama" placeholder="Nama Kamu"/>
                    </div>
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir Kamu"/>
                    </div>
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-calendar-check material-icons-name"></i></label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir Kamu"/>
                    </div>
                    <div class="input-group">
                        {{-- <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label> --}}
                        <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="type_workshop" required>
                                        <option disabled="disabled" selected="selected" value="">Jenis Workshop</option>
                                        <option value="eduroam">EDUROAM</option>
                                        <option value="ipv6">IPV6</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="number" name="no_hp" id="no_hp" placeholder="Nomor HP Kamu"/>
                    </div>
                    <div class="form-group">
                        <label for="nama"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Email Kamu"/>
                    </div>
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="alamat" id="alamat" placeholder="Alamat Kamu"/>
                    </div>
                    <div class="form-group">
                        {{-- <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label> --}}
                        <select class="form-control" id="kategori-pendaftar" name="kategori_pendaftar">
                            <option value="">Pilih Kategori Pendaftar</option>
                            <option value="m">Mahasiswa</option>
                            <option value="s">Siswa</option>
                        </select>
                    </div>
                    <div class="form-group" id="div-institusi" hidden>
                        {{-- <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label> --}}
                        <select class="form-control" id="institusi" name="institusi">
                            
                        </select>
                    </div>
                    <div class="form-group" id="div-sekolah-baru" hidden>
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="sekolah_baru" id="sekolah-baru" placeholder="Tulis Asal Sekolah Kamu"/>
                    </div>
                    <div class="form-group" id="div-universitas-baru" hidden>
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="universitas_baru" id="universitas-baru" placeholder="Tulis Asal Universitas Kamu"/>
                    </div>
                    {{-- <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                    </div> --}}
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="{{ asset('frontend/images/signup-image.jpg') }}" alt="sing up image"></figure>
                <a href="#" class="signup-image-link">I am already member</a>
            </div>
        </div>
    </div>
</section>
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
                $('#institusi').append('<option value="">Pilih Asal Universitas</option>');
                $('#institusi').append('<option value="new-universitas">Tidak Terdapat Pada List</option>');
                $.map(data, data => {
                    $('#institusi').append('<option value='+data.id+'>'+data.nama+'</option>');
                })
            })
        }

        if (kategoriPendaftar === 's') {
            $('#institusi').empty()
            $.get('{{ route("get-data.sekolah") }}', function (data) {
                $('#institusi').append('<option value="">Pilih Asal Sekolah</option>');
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