	@if(isset($anak))
		{!! Form::hidden('id', $anak->id) !!}
	@endif


	@if($errors->any())
		<div class="form-group {{ $errors->has('kms') ? 
		'has-error' : 'has-success' }}">
	@else
		<div class="form-group">
	@endif
	{!! Form::label('kms', 'KMS :', ['class' => 'control-label']) !!}
	{!! Form::text('kms', null, ['class' => 'form-control', 'placeholder' => 'KMS']) !!}

	@if ($errors->has('kms'))
		<span class="help-block">{{ $errors->first('kms') }}</span>
	@endif	
	</div>

	@if($errors->any())
		<div class="form-group {{ $errors->has('nama_anak') ? 'has-error' : 'has-success' }}">
	@else
		<div class="form-group">
	@endif
	{!! Form::label('nama_anak', 'Nama Anak :', ['class' => 'control-label']) !!}
	{!! Form::text('nama_anak', null, ['class' => 'form-control']) !!}

	@if ($errors->has('nama_anak'))
		<span class="help-block">{{ $errors->first('nama_anak') }}</span>
	@endif	
	</div>

	@if($errors->any())
		<div class="form-group {{ $errors->has('tanggal_lahir') ? 'has-error' : 'has-success' }}">
	@else
		<div class="form-group">
	@endif
	{!! Form::label('tanggal_lahir', 'Tanggal Lahir :', ['class' => 'control-label']) !!}
	{!! Form::date('tanggal_lahir', !empty($anak) ?
	$anak-> tanggal_lahir -> format('d-m-Y'): null,
	['class' => 'form-control', 'id' => 'tanggal_lahir']) !!}

	@if ($errors->has('tanggal_lahir'))
		<span class="help-block">{{ $errors->first('tanggal_lahir') }}</span>
	@endif
	</div>

	@if ($errors->any())
		<div class="form-group {{ $errors->has('id_bidan') ? 'has-error' : 'has-success' }}">
	@else
		<div class="form-group">
 	@endif  
  		{!! Form::label('id_bidan', 'Bidan:', ['class' => 'control-label']) !!}
        @if(count($list_bidan) > 0)
         	{!! Form::select('id_bidan', $list_bidan, null, ['class' => 'form-control', 'id' => 'id_bidan', 'placeholder' => 'Pilih Bidan']) !!}
         @else
         	<p>Tidak ada pilihan bidan, buat dulu ya..!</p>
         @endif
         @if ($errors->has('id_bidan'))
     <span class="help-block">{{ $errors->first('id_bidan') }}</span>
         @endif
     </div>

	@if($errors->any())
		<div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : 'has-success' }}">
	@else
		<div class="form-group">
	@endif
	{!! Form::label('jenis_kelamin', 'Jenis Kelamin :', ['class' => 'control-label']) !!}
	<div class="radio">
		<label>{!! Form::radio('jenis_kelamin','L') !!} Laki-Laki </label>
		<label>{!! Form::radio('jenis_kelamin','P') !!} Perempuan </label>
	</div>

	@if ($errors->has('jenis_kelamin'))
		<span class="help-block">{{ $errors->first('jenis_kelamin') }}</span>
	@endif
	</div>

	@if($errors->any())
		<div class="form-group {{ $errors->has('nama_ibu') ? 'has-error' : 'has-success' }}">
	@else
		<div class="form-group">
	@endif
	{!! Form::label('nama_ibu', 'Nama Ibu :', ['class' => 'control-label']) !!}
	{!! Form::text('nama_ibu', null, ['class' => 'form-control']) !!}

	@if ($errors->has('nama_ibu'))
		<span class="help-block">{{ $errors->first('nama_anak') }}</span>
	@endif	
	</div>

	@if($errors->any())
		<div class="form-group {{ $errors->has('nomor_telepon') ? 'has-error' : 'has-success' }}">
	@else
		<div class="form-group">
	@endif
	{!! Form::label('nomor_telepon', 'Telepon :', ['class' => 'control-label']) !!}
	{!! Form::text('nomor_telepon', null, ['class' => 'form-control']) !!}

	@if ($errors->has('nomor_telepon'))
		<span class="help-block">{{ $errors->first('nomor_telepon') }}</span>
	@endif	
	</div>


	<!-- FOTO -->
	@if ($errors->any())
	<div class="form-group {{ $errors->has('foto') ? 'has-error' : 'has-success' }}">
	@else
	<div class="form-group">
	@endif
	    {!! Form::label('foto', 'Foto:') !!}
	    {!! Form::file('foto') !!}
	    @if ($errors->has('foto'))
	        <span class="help-block">{{ $errors->first('foto') }}</span>
	    @endif

	    <!-- MENAMPILKAN FOTO -->
	    @if (isset($anak))
	        @if (isset($anak->foto))
	            <img src="{{ asset('fotoupload/' . $anak->foto) }}">
	        @else
	            @if ($anak->jenis_kelamin == 'L')
	                <img src="{{ asset('anak/dummymale.jpg') }}">
	            @else
	                <img src="{{ asset('fotoupload/dummyfemale.jpg') }}">
	            @endif
	        @endif
	    @endif
	</div>


		<div class="form-group">
			{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
		</div>
