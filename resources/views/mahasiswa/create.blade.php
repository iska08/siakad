@extends('mahasiswa.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">Tambah Mahasiswa</div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('mahasiswa.store') }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="Nim">NIM</label>
                        <input type="text" name="Nim" class="form-control" id="Nim" aria-describedby="Nim" >
                    </div>
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" name="Nama" class="form-control" id="Nama" ariadescribedby="Nama" >
                    </div>
                    <div class="form-group">
                        <label for="Kelas">Kelas</label>
                        <input type="text" name="Kelas" class="form-control" id="Kelas" ariadescribedby="Kelas" >
                    </div>
                    <div class="form-group">
                        <label for="Jurusan">Jurusan</label>
                        <input type="text" name="Jurusan" class="form-control" id="Jurusan" ariadescribedby="Jurusan" >
                    </div>
                    <div class="form-group">
                        <label for="Hp">No Handphone</label>
                        <input type="text" name="Hp" class="form-control" id="Hp" aria-describedby="Hp" >
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="text" name="Email" class="form-control" id="Email" ariadescribedby="Email" >
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat</label>
                        <input type="text" name="Alamat" class="form-control" id="Alamat" ariadescribedby="Alamat" >
                    </div>
                    <div class="form-group">
                        <label for="Lahir">Tanggal Lahir</label>
                        <input type="date" name="Lahir" class="form-control" id="Lahir" ariadescribedby="Lahir" >
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection