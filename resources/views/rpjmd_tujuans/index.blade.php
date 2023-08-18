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
						<li class="breadcrumb-item"><a href="javascript:void(0)">Tujuan</a></li>
					</ol>
                    <div class="breadcrumb">
                            <a class="text-info divide-solid" href="{{route('rpjmd_i_misis', $rpjmd_misis->id_visi_rpjmd)}}">Misi : {{ $rpjmd_misis->nama_misi_rpjmd }}</a>
                    </div>
                </div>
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="btn btn-rounded btn-warning" href="{{route('rpjmd_c_tujuans', ['id' => $rpjmd_misis->id])}}"><span class="btn-icon-start text-warning"><i class="fa fa-plus color-info"></i></span>Tambah Tujuan RPJMD</a>
                            </div>
                            <div class="card-body">
                                <div class="accordion accordion-header-shadow accordion-rounded" id="accordion-two">
                                @foreach ($rpjmd_tujuans as $key => $rpjmd_tujuan)
								    <div class="accordion-item">
                                        <div class="accordion-header rounded-lg" id="accord-2{{ ++$i }}" data-bs-toggle="collapse" data-bs-target="#collapse2{{ $i }}" aria-controls="collapse2{{ $i }}" aria-expanded="true" role="button">
                                            <span class="accordion-header-text">{{ $rpjmd_tujuan->nama_tujuan_rpjmd }}</span>
                                            <span class="accordion-header-indicator"></span>
                                        </div>
                                        <div id="collapse2{{ $i }}" class="collapse accordion__body show" aria-labelledby="accord-2{{ $i }}" data-bs-parent="#accordion-two">
                                            <div class="accordion-body-text">
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <a href="{{ route('rpjmd_i_sasarans',$rpjmd_tujuan->id) }}" class="badge badge-outline-secondary"><i class="fa fa-plus color-info"></i> Input Sasaran</a>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <a href="{{ route('rpjmd_c_tujuan_indikators',$rpjmd_tujuan->id) }}" class="badge badge-outline-info"><i class="fa fa-plus color-info"></i> Input Indikator</a>
                                                    </div>
                                                </div>
                                                @php
                                                    $ind =
                                                    \App\Models\Rpjmd4_tujuan_indikator::where('id_tujuan_rpjmd',$rpjmd_tujuan->id)->count();

                                                    $indnya = "";
                                                @endphp

                                                @if($ind == 0)
                                                    <!-- $indnya = ""; -->
                                                <div class="row mb-2">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        Belum Ada Indikator
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                @else
                                                    @php
                                                    $indnya = \App\Models\Rpjmd4_tujuan_indikator::join('satuans','satuans.id','=',rpjmd4_tujuan_indikators.id_satuan)->where('id_tujuan_rpjmd',$rpjmd_tujuan->id)->get();
                                                    
                                                    @endphp
                                                <div class="row mb-2">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <tbody>
                                                    @foreach ($indnya as $indikator)
                                                                <tr>
                                                                    <td>
                                                                        {{ $indikator->nama_tujuan_indikator_rpjmd }} ( {{ $indikator->nama_satuan }} )
                                                                    </td>
                                                                </tr>
                                                    @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="row mb-2">
                                                    <div class="col-2">Status</div>
                                                    <div class="col-3">{{ $rpjmd_tujuan->status_tujuan_rpjmd }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-2">Aksi</div>
                                                    <div class="col-3">
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                                                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{ route('rpjmd_tujuans.edit',$rpjmd_tujuan->id) }}">Edit</a>
                                                                <form action="{{ route('rpjmd_tujuans.destroy',$rpjmd_tujuan->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Apakah yakin ingin menghapus Tujuan RPJMD?');">Delete</a>
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