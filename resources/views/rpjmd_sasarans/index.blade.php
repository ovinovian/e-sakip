@extends('layouts.with_sidebar')

@section('style')

<!-- Datatable -->
<link href="{{ asset('assets//vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

@endsection

@section('content')
		
<div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles">
                    <ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">RPJMD</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Sasaran</a></li>
					</ol>
                    <div class="breadcrumb">
                            <a class="text-info divide-solid" href="{{route('rpjmd_i_tujuans', $rpjmd_tujuans->id_misi_rpjmd)}}">Tujuan : {{ $rpjmd_tujuans->nama_tujuan_rpjmd }}</a>
                    </div>
                </div>
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="btn btn-rounded btn-primary" href="{{route('rpjmd_c_sasarans', ['id' => $rpjmd_tujuans->id])}}"><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i></span>Tambah Sasaran RPJMD</a>
                            </div>
                            <div class="card-body">
                                <div class="accordion accordion-danger-solid" id="accordion-two">
                                @foreach ($rpjmd_sasarans as $key => $rpjmd_sasaran)
								    <div class="accordion-item">
                                        <div class="accordion-header rounded-lg" id="accord-2{{ ++$i }}" data-bs-toggle="collapse" data-bs-target="#collapse2{{ $i }}" aria-controls="collapse2{{ $i }}" aria-expanded="true" role="button">
                                            <span class="accordion-header-text">{{ $rpjmd_sasaran->nama_sasaran_rpjmd }}</span>
                                            <span class="accordion-header-indicator"></span>
                                        </div>
                                        <div id="collapse2{{ $i }}" class="collapse accordion__body show" aria-labelledby="accord-2{{ $i }}" data-bs-parent="#accordion-two">
                                            <div class="accordion-body-text">
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <a href="{{ route('rpjmd_i_strategis',$rpjmd_sasaran->id) }}" class="badge badge-rounded badge-secondary"><i class="fa fa-plus color-info"></i> Input Strategi</a>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-2">Status</div>
                                                    <div class="col-3">{{ $rpjmd_sasaran->status_sasaran_rpjmd }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-2">Aksi</div>
                                                    <div class="col-3">
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                                                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{ route('rpjmd_sasarans.edit',$rpjmd_sasaran->id) }}">Edit</a>
                                                                <form action="{{ route('rpjmd_sasarans.destroy',$rpjmd_sasaran->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Apakah yakin ingin menghapus Sasaran RPJMD?');">Delete</a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
								    </div>
                                    @endforeach							    
								</div>
                            </div>
                        </div>
                    </div>
				</div>
            </div>
        </div>
		
@endsection

@section('script')

<!-- Apex Chart -->
<script src="{{ asset('assets//vendor/apexchart/apexchart.js') }}"></script>
	
<!-- Datatable -->
<script src="{{ asset('assets//vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}"></script>

@endsection

@push('after-scripts')
  
@endpush