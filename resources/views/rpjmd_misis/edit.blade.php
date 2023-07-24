@extends('layouts.with_sidebar')

@section('content')
		
        <div class="content-body">
            <div class="container-fluid">
				<div class="row page-titles">
                    <ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">RPJMD</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Misi</a></li>
					</ol>
                    <div class="breadcrumb">
                            <a class="text-info divide-solid" href="#">Visi : {{ $rpjmd_visis->nama_visi_rpjmd }}</a>
                    </div>
                </div>

                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Rubah Misi RPJMD</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('rpjmd_misis.update',$rpjmd_misis[0]['id']) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="input-group">
                                            <textarea class="form-control" rows="10" id="comment" name="nama_misi_rpjmd" placeholder="Isi Misi Bupati..." required>{{ $rpjmd_misis[0]['nama_misi_rpjmd'] }}</textarea>
                                        </div>
                                        <div class="row align-items-center mt-3">
                                            <div class="col-auto my-1">
                                                <a href="{{ route('rpjmd_i_misis',['id' => $rpjmd_visis->id]) }}" class="btn btn-warning mx-3">Batal</a>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_visi_rpjmd" value="{{ $rpjmd_visis->id }}">
                                    </form>
                                </div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
@endsection