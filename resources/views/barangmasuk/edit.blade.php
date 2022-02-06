@extends('layouts.admin')
@section('content')
<section class="page-content container-fluid">
<div class="row">
	<div class="col-md-12">
		<div class="card"><br><a href="{{ url()->previous() }}">&nbsp;&nbsp;&nbsp;git<button type="previous" class="btn btn-success">Kembali</button></a>
			<h5 class="card-header"><b>Edit Data Paser</b></h5>
			<form action="{{ route('barangmasuk.update',$barangmasuk->id) }}" method="post">
				{{ csrf_field() }}
				<div class="card-body">

			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
        			<input type="hidden" name="id" value="{{ request()->get('id') }}">

					<div class="form-group {{ $errors->has('barang_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Barang</label>	
			  			<select type="text" name="barang_id" class="form-control" required>
			  					@foreach($barang as $data)
			  					@if(old('barang_id') == $data->id)
			  				<option value="{{ $data->id }}" selected>{{ $data->namabarang}}</option>
			  					@else
			  					<option value="{{ $data->id }}">{{ $data->namabarang}}</option>
			  					@endif
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
			  			<input type="text" name="tanggal" class="form-control" value="{{ $barangmasuk->tanggal }}"  required>
			  			@if ($errors->has('tanggal'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tanggal') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('jumlah') ? ' has-error' : '' }}">
			  			<label class="control-label">Jumlah</label>	
			  			<input type="text" name="jumlah" class="form-control" value="{{ $barangmasuk->jumlah }}"  required>
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