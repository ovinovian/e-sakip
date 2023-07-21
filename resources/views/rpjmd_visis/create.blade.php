@extends('layouts.with_sidebar')

@section('content')
		
        <div class="content-body">
            <div class="container-fluid">
            <div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Visi RPJMD {{ $rpjmds[0]['tahun_awal'] }} - {{ $rpjmds[0]['tahun_akhir'] }}</a></li>
					</ol>
                </div>
				
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Input Visi</h4>
                            </div>
                            <div class="card-body custom-ekeditor">
                                <form action="{{ route('rpjmd_visis.store') }}" method="POST">
                                    @csrf
								    <input type="text" id="ckeditor" name="visi">
                                    <div class="row align-items-center mt-3">
                                        <div class="col-auto my-1">
                                            <a href="{{ route('rpjmd_i_visis',['id' => $rpjmds[0]['id']]) }}" class="btn btn-warning mx-3">Batal</a>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_rpjmd" value="{{ $rpjmds[0]['id'] }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
@endsection

@section('script')

<script src="{{ asset('assets/vendor/ckeditor/ckeditor.js') }}"></script>

@endsection