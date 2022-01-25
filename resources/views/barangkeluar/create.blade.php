@extends('layouts.admin')
@section('content')

<br><br>
<section class="page-content container-fluid">
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h5 class="card-header"><b>Tambah Data barang</b></h5>
			<form action="{{ route('barangkeluar.store') }}" method="post">
				{{ csrf_field() }}
				<div class="card-body">

					<div class="form-group {{ $errors->has('barang_id') ? ' has-error' : '' }}">
						<label>Nama Barang</label>
						<select name="barang_id" class="form-control">
						  <option>---</option>
							@foreach($barang as $data)
			  				<option value="{{ $data->id }}">{{ $data->namabarang }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('barang_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('barang_id') }}</strong>
                            </span>
                        @endif
					</div>

			  		<div class="form-group {{ $errors->has('tanggal') ? ' has-error' : '' }}">
			  			<label class="control-label">Tanggal</label>	
			  			<input type="date" name="tanggal" class="form-control"  required>
			  			@if ($errors->has('tanggal'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tanggal') }}</strong>
                            </span>
                        @endif
			  		</div>
	  		
			  		<div class="form-group {{ $errors->has('jumlah') ? ' has-error' : '' }}">
			  			<label class="control-label">Jumlah</label>	
			  			<input type="text" name="jumlah" class="form-control"  required>
			  			@if ($errors->has('jumlah'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jumlah') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		
			  		<div class="form-group">
			  			<button type="button submit" class="btn btn-primary btn-rounded btn-floating">Simpan</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
</section>
@endsection