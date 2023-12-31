@extends('layouts.with_sidebar')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('opd.index') }}">Organisasi Perangkat Daerah</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
            </ol>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h5 class="card-title">Edit OPD</h5>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('opd.update',$id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 input-success">
                                    <label for="id_urusan" class="mb-1">Urusan <span class="text-danger">*</span></label>
                                    <select name="id_urusan" class="id_urusan form-control @error('id_urusan') is-invalid @enderror" id="id_urusan">
                                    <option value="{{$current_urusan->id}}" selected>{{$current_urusan->nama_urusan}}</option>
                                        @foreach ($urusans as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_urusan }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_urusan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 input-success">
                                    <label for="id_bidang" class="mb-1">Program <span class="text-danger">*</span></label>
                                    <select name="id_bidang" class="id_bidang form-control @error('id_bidang') is-invalid @enderror" id="id_bidang">
                                    <option value="{{$current_bidang->id}}" selected>{{$current_bidang->nama_bidang}}</option>
                                        @foreach ($bidangs as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_bidang }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_bidang')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 input-success">
                                    <label for="" class="mb-1">Nama OPD<span class="text-danger">*</span></label>
                                    <input type="text" name="nama_opd" value="{{$opds->nama_opd}}" class="form-control @error('nama_opd') is-invalid @enderror">
                                    @error('nama_opd')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 input-success">
                                    <label for="" class="mb-1">Kode OPD<span class="text-danger">*</span></label>
                                    <input type="text" name="kode_opd" value="{{$opds->kode_opd}}" class="form-control @error('kode_opd') is-invalid @enderror">
                                    @error('kode_opd')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 input-success">
                                    <label for="" class="mb-1">Nama Sub OPD<span class="text-danger">*</span></label>
                                    <input type="text" name="nama_sub_opd" value="{{$opds->nama_sub_opd}}" class="form-control @error('nama_sub_opd') is-invalid @enderror">
                                    @error('nama_sub_opd')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 input-success">
                                    <label for="" class="mb-1">Kode Sub OPD<span class="text-danger">*</span></label>
                                    <input type="text" name="kode_sub_opd" value="{{$opds->kode_sub_opd}}" class="form-control @error('kode_sub_opd') is-invalid @enderror">
                                    @error('kode_sub_opd')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 input-success">
                                    <label for="" class="mb-1">Status OPD<span class="text-danger">*</span></label>
                                    <select name="status_opd" class="default-select form-control wide mb-3">
                                        <option value="{{$opds->status_opd}}" selected>
                                        @if ($opds->status_opd == 1)
                                            Status 1
                                        @elseif ($opds->status_opd == 2)
                                            Status 2
                                        @else
                                            Status 3
                                        @endif
                                        </option>
										<option value="1">Status 1</option>
										<option value="2">Status 2</option>
										<option value="3">Status 3</option>
								    </select>
                                    @error('status_opd')
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
            placeholder: 'Pilih Data Urusan'
        });
        $('.id_bidang').select2({
            placeholder: 'Pilih Data Bidang'
        });
    })
</script>
<script>
    @if($message = Session::get('error'))
    Swal.fire({
        position: 'center',
        icon: 'warning',
        title: 'perhatian..!',
        html: '{{ $message }}',
        timer: 5000
    })
    @endif
</script>
@endsection