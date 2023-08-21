@extends('layouts.with_sidebar')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
            </ol>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h5 class="card-title">Edit Admin</h5>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.update',$id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 input-success">
                                    <label for="" class="mb-1">Nama<span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ $admin->name }}" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 input-success">
                                    <label for="" class="mb-1">Email<span class="text-danger">*</span></label>
                                    <input type="text" name="email" value="{{ $admin->email }}" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 input-success">
                                    <label for="" class="mb-1">Password<span class="text-danger">*</span></label>
                                    <input type="text" name="password" class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 input-success">
                                    <label for="id_opd" class="mb-1">Instansi<span class="text-danger">*</span></label>
                                    <select name="id_opd" class="id_opd form-control @error('id_opd') is-invalid @enderror" id="id_opd">
                                        <option value="{{$current_opd->id}}" selected>{{$current_opd->nama_opd}}</option>
                                        @foreach ($opds as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_opd }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_opd')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 input-success">
                                    <label for="id_role" class="mb-1">Role<span class="text-danger">*</span></label>
                                    <select name="id_role" class="id_role form-control @error('id_role') is-invalid @enderror" id="id_role">
                                        <option value="{{$current_role->id}}" selected>{{$current_role->name}}</option>
                                        @foreach ($roles as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_role')
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
        $('.id_program').select2({
            placeholder: 'Pilih Data Program'
        });
    })
</script>
<script>
    @if($message = Session::get('error'))
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'error..',
        html: '{{ $message }}',
        timer: 4000
    })
    @endif
</script>
@endsection