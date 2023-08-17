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
                                <a class="btn light btn-primary" href="{{route('rpjmd_c_tujuans', ['id' => $rpjmd_misis->id])}}">Tambah Tujuan RPJMD</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tujuan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rpjmd_tujuans as $key => $rpjmd_tujuan)
                                            <tr>
                                                <td><a href="{{ route('rpjmd_i_sasarans',$rpjmd_tujuan->id) }}">{{ ++$i }}</a></td>
                                                <td><a href="{{ route('rpjmd_i_sasarans',$rpjmd_tujuan->id) }}">{{ $rpjmd_tujuan->nama_tujuan_rpjmd }}</a></td>
                                                <td>{{ $rpjmd_tujuan->status_tujuan_rpjmd }}</td>
                                                @if($rpjmd_tujuan->status_tujuan_rpjmd == 0)
                                                <td>
													<div class="d-flex">
														<a href="{{ route('rpjmd_tujuans.edit',$rpjmd_tujuan->id) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                        <form action="{{ route('rpjmd_tujuans.destroy',$rpjmd_tujuan->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
														<button type="submit" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Apakah yakin ingin menghapus rpjmd?');"><i class="fa fa-trash"></i></a>
                                                        </form>
													</div>												
												</td>
                                                @else
                                                <td></td>
                                                @endif
                                                <td></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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