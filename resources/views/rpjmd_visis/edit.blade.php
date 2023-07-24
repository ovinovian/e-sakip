@extends('layouts.with_sidebar')

@section('content')
		
        <div class="content-body">
            <div class="container-fluid">
            <div class="row page-titles">
                    <ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">RPJMD</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Visi</a></li>
					</ol>
                    <div class="breadcrumb">
                            <a class="text-info divide-solid" href="#">RPJMD {{ $rpjmd->tahun_awal }} - {{ $rpjmd->tahun_akhir }}</a>
                    </div>
                </div>

                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Rubah Visi RPJMD</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('rpjmd_visis.update',$rpjmd_visis[0]['id']) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="input-group">
                                            <textarea class="form-control" rows="10" id="comment" name="nama_visi_rpjmd" placeholder="Isi misi Bupati..." required>{{ $rpjmd_visis[0]['nama_visi_rpjmd'] }}</textarea>
                                        </div>
                                        <div class="row align-items-center mt-3">
                                            <div class="col-auto my-1">
                                                <a href="{{ route('rpjmd_i_visis',['id' => $rpjmd->id]) }}" class="btn btn-warning mx-3">Batal</a>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_rpjmd" value="{{ $rpjmd->id }}">
                                    </form>
                                </div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
@endsection