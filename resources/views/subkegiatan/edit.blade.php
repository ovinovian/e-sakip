@extends('layouts.with_sidebar')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('subkegiatan.index') }}">Sub Kegiatan</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
            </ol>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h5 class="card-title">Edit Sub Kegiatan</h5>
                        </div>

                        <div class="card-body">
                            <!-- action form yang mengarah ke route store untuk proses simpan data  -->
                            <form action="#" method="post">
                                @csrf
                                <div class="mb-3 input-success">
                                    <label for="" class="mb-1">Nama Sub Kegiatan</label>
                                    <input type="text" name="nama_subkegiatan" value="Nama Sub Kegiatan" class="form-control @error('nama_subkegiatan') is-invalid @enderror">
                                    @error('nama_subkegiatan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 input-success">
                                    <label for="" class="mb-1">Kode Sub Kegiatan</label>
                                    <input type="text" name="kode_subkegiatan" value="Kode Sub Kegiatan" class="form-control @error('kode_subkegiatan') is-invalid @enderror">
                                    @error('kode_subkegiatan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 input-success">
                                    <label for="id_urusan" class="mb-1">Kegiatan <span class="text-danger">*</span></label>
                                    <select name="id_urusan" class="id_urusan form-control @error('id_urusan') is-invalid @enderror" id="id_urusan">
                                        <option value="">Pilih Kegiatan</option>
                                        <option value="1">1</option>
                                        <option value="1">1</option>
                                        <option value="1">1</option>
                                    </select>
                                    @error('id_urusan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2 mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary">Ubah</button>
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
<script src="{{ asset('assets/vendor/select2/js/select2.full.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.id_urusan').select2({
            placeholder: 'Pilih Data Kategori'
        });
    })
</script>
@endsection