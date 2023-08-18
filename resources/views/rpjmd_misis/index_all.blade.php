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
						<li class="breadcrumb-item"><a href="javascript:void(0)">Misi</a></li>
					</ol>
                    <div class="breadcrumb">
                    </div>
                </div>
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Misi</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rpjmd_misis as $key => $rpjmd_misi)
                                            <tr>
                                                <td><a href="{{ route('rpjmd_i_tujuans',$rpjmd_misi->id) }}">{{ ++$i }}</a></td>
                                                <td><a href="{{ route('rpjmd_i_tujuans',$rpjmd_misi->id) }}">{{ $rpjmd_misi->nama_misi_rpjmd }}</a></td>
                                                <td>{{ $rpjmd_misi->status_misi_rpjmd }}</td>
                                                @if($rpjmd_misi->status_misi_rpjmd == 0)
                                                <td>
													<div class="d-flex">
														<a href="{{ route('rpjmd_misis.edit',$rpjmd_misi->id) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                        <form action="{{ route('rpjmd_misis.destroy',$rpjmd_misi->id) }}" method="POST">
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