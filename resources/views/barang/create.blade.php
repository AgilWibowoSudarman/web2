@extends('layouts.admin')
@section('content')

<br><br>
<section class="page-content container-fluid">
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h5 class="card-header"><b>Tambah Data barang</b></h5>
			<form action="{{ route('barang.store') }}" method="post">
				{{ csrf_field() }}
				<div class="card-body">

					<div class="form-group {{ $errors->has('namabarang') ? ' has-error' : '' }}">
						<label>Nama Barang</label>
						<input type="text" class="form-control" name="namabarang" required>
						@if ($errors->has('namabarang'))
							<span class="help-block">
                                <strong>{{ $errors->first('namabarang') }}</strong>
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
	  		
			  		<div class="form-group {{ $errors->has('jenisbarang') ? ' has-error' : '' }}">
			  			<label class="control-label">Jenis Barang</label>	
			  			<input type="text" name="jenisbarang" class="form-control"  required>
			  			@if ($errors->has('jenisbarang'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jenisbarang') }}</strong>
                            </span>
                        @endif
			  		</div>

					<div class="form-group {{ $errors->has('stok') ? ' has-error' : '' }}">
			  			<label class="control-label">Stok</label>	
			  			<input type="number" name="stok" class="form-control"  required>
			  			@if ($errors->has('stok'))
                            <span class="help-block">
                                <strong>{{ $errors->first('stok') }}</strong>
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