@extends ('template')

@section('main')
<div id="anak">
	<h2>Detail anak</h2>

	<table class="table table-striped">
		<tr>
			<th>Kms</th>
			<td>{{ $anak-> kms}}</td>
		</tr>

		<tr>
			<th>Nama</th>
			<td>{{ $anak-> nama_anak}}</td>
		</tr>

		<tr>
			<th>Bidan</th>
			<td> {{ $anak ->bidan->nama_bidan }}</td>
		</tr>

		<tr>
			<th>Tanggal Lahir</th>
			<td>{{ $anak-> tanggal_lahir->format('d-m-Y')}}</td>
		</tr>

		<tr>
			<th>Jenis Kelamin</th>
			<td>{{ $anak-> jenis_kelamin}}</td>
		</tr>

		<tr>
			<th>Telepon</th>
			<td> {{ !empty($anak->telepon->nomor_telepon)? $anak->telepon->nomor_telepon : '-'}}  </td>
		</tr>

		<tr>
			<th>Orang Tua</th>
			<td>{{ $anak-> nama_ibu}}</td>
		</tr>

		 <tr>
                <th>Foto</th>
                <td>
                    @if (isset($anak->foto))
                        <img src="{{ asset('fotoupload/' . $anak->foto) }}">
                    @else
                        @if ($anak->jenis_kelamin == 'L')
                            <img src="{{ asset('fotoupload/dummymale.jpg') }}">
                        @else
                            <img src="{{ asset('fotoupload/dummyfemale.jpg') }}">
                        @endif
                    @endif
                </td>
            </tr>			

		


	</table>
</div>
@stop

@section('footer')
<div id="footer">
	<p>&copy; 2020 laravelapp.dev</p>
</div>
@stop