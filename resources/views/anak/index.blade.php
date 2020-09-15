@extends('template')

@section('main')
<div id="anak">
	<h2>anak</h2>

	@if (!empty($anak_list))
	<table class="table">
		<thead>
			<tr>
				<th> KMS </th>
				<th> Nama </th>
				<th> Tgl Lahir </th>
				<th> Bidan </th>
				<th> JK </th>
				<th> Telepon </th>
				<th> Orang Tua</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($anak_list as $anak)
			<tr>
				<td> {{ $anak -> kms }}</td>
				<td> {{ $anak -> nama_anak }}</td>
				<td> {{ $anak -> tanggal_lahir ->format('d-m-Y')}}</td>
				<td> {{ $anak -> bidan ->nama_bidan }}</td>
				<td> {{ $anak -> jenis_kelamin }}</td>
				<td> {{ !empty($anak->telepon->nomor_telepon)? $anak->telepon->nomor_telepon : '-'}}  </td>
				<td> {{ $anak -> nama_ibu }}</td>
				<td><a href="anak/{{$anak->id}}" class ="btn btn-success btn-sm">Detail</a>
					<a href="anak/{{$anak->id}}/edit" class ="btn btn-warning btn-sm">Edit</a>
					
					<div class="box-button">
						{!! Form::open(['method' => 'delete', 'action' => ['AnakController@destroy', $anak->id]]) !!}
						{!! Form::submit('delete',['class' => 'btn btn-danger btn-sm']) !!}
						{!! Form::close() !!}
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>

	</table>
	@else
	<p> Tidak Ada Data anak </p>
	@endif

		<div class ="table-nav">
		    <div class="jumlah-data">
		        <strong>Jumlah Data anak: {{$jumlah_anak}}</strong>
		    </div>
			   	<div class="paging">
			    		{{$anak_list->links()}}
			    </div>
	    </div>
	<div class="tombol-nav">
		<a href="{{url('anak/create')}}" class="btn btn-primary">Tambah anak</a>
	</div>
</div>


@stop

@section('footer')
<div id="footer">
	<p>&copy; 2020 laravelapp.dev</p>
</div>
@stop

