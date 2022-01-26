@extends('layouts.admin')
@section('content')
<section class="page-content container-fluid">
<div class="row">
	<div class="col-md-12">
		<div class="card"><br><a href="{{ url()->previous() }}"><button type="previous" class="btn btn-success">Kembali</button></a>
			<h5 class="card-header"><b>Edit Data Barang Keluar</b></h5>
			<form action="{{ route('barangkeluar.update',$barangkeluar->id) }}" method="post">
				{{ csrf_field() }}
				<div class="card-body">

						<input name="_method" type="hidden" value="PATCH">
							{{ csrf_field() }}
						<input type="hidden" name="id" value="{{ request()->get('id') }}">

						<div class="form-group {{ $errors->has('namabarang') ? ' has-error' : '' }}">
							<label class="control-label">Nama Barang</label>	
							<input type="text" name="namabarang" class="form-control" value="{{ $barangkeluar->namabarang }}"  required>
							@if ($errors->has('namabarang'))
							<span class="help-block">
								<strong>{{ $errors->first('namabarang') }}</strong>
							</span>
						@endif
						</div>

						<div class="form-group {{ $errors->has('tanggal') ? ' has-error' : '' }}">
							<label class="control-label">Tanggal</label>	
							<input type="text" name="tanggal" class="form-control" value="{{ $barangkeluar->tanggal }}"  required>
							@if ($errors->has('tanggal'))
							<span class="help-block">
								<strong>{{ $errors->first('tanggal') }}</strong>
							</span>
						@endif
						</div>

						<div class="form-group {{ $errors->has('jumlah') ? ' has-error' : '' }}">
							<label class="control-label">Jumlah</label>	
							<input type="text" name="jumlah" class="form-control" value="{{ $barangkeluar->jumlah }}"  required>
							@if ($errors->has('jumlah'))
							<span class="help-block">
								<strong>{{ $errors->first('jumlah') }}</strong>
							</span>
						@endif
						</div>


			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Selesai</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
</section>
@endsection