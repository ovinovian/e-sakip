@extends('layouts.with_sidebar')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('urusan.index') }}">Urusan</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Tambah</a></li>
            </ol>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h5 class="card-title">Tambah Urusan</h5>
                        </div>

                        <div class="card-body">
                            <!-- action form yang mengarah ke route store untuk proses simpan data  -->
                            <form action="{{ route('urusan.store') }}" method="post">
                                @csrf
                                <div class="mb-3 input-success">
                                    <label for="" class="mb-1">Nama Urusan<span class="text-danger">*</span></label>
                                    <input type="text" name="nama_urusan" class="form-control @error('nama_urusan') is-invalid @enderror">
                                    @error('nama_urusan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 input-success">
                                    <label for="" class="mb-1">Kode Urusan<span class="text-danger">*</span></label>
                                    <input type="text" name="kode_urusan" class="form-control @error('kode_urusan') is-invalid @enderror">
                                    @error('kode_urusan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2 mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    @if($message = Session::get('error'))
    Swal.fire({
        position: 'center',
        icon: 'warning',
        title: 'Perhatian',
        html: '{{ $message }}',
        timer: 3200
    })
    @endif
</script>
@endsection