@extends('layouts.super')
@section('content')
<!-- <div class="container"> -->
<!-- <div class="row"> -->
	<div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Absensi</h4>
            <div class="pull-right">
				@role('admin')
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah Data</button>
				@endrole
			</div>
                <div class="table-responsive">
                    <table id="data-table" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
								<th>Nama</th>
								<th>Kelas</th>
								<th>Keterangan</th>
								<th>No Hp Ortu</th>
								<th>Tanggal</th>
								@role('admin')
								<th>Action</th>
								@endrole
								@role('user1')
								<th>Action</th>
								@endrole
				            </tr>
                        </thead>
                      	<tbody>
	                      		@php $no=1; @endphp
								@foreach($absensi as $data)
								<tr>
								<td>{{$no++}}</td>
								<td>{{$data->siswa->nama_siswa}}</td>
								<td>{{$data->kelas->nama_kelas}}</td>
								<td>{{$data->keterangan}}</td>
								<td>{{$data->orangtua->no_hp}}</td>
								<td>{{$data->tgl}}</td>
								@role('admin')
								<td>
									<div class="dropdown-demo"> 
                                		<div class="dropdown">
                                    		<button class="btn btn-light" data-toggle="dropdown">Settings</button>
                                    			<div class="dropdown-menu dropdown-menu--icon">
                                    				<center>
                                    				<button class="btn btn-light" data-toggle="modal" data-target="#myEdit{{$data->id}}"><i class="zmdi zmdi-edit"></i> Edit</button>
			                                        <br>
			                                        <form action="{{route('absensi.destroy',$data->id)}}" method="post" class="delete">
                									<input name="_method" type="hidden" value="DELETE">
        											<input name="_token" type="hidden" >
        											{{csrf_field()}}
			                                        <button type="submit"  value="Delete" id="delete-btn" class="btn btn-light"><i class="zmdi zmdi-delete"> Delete </i></button>
			                                    	</form>
			                                    	</center>
			                                    	
                                
                                    			</div>
                                		</div>
                            		</div>
								</td>
								@endrole
								</tr>
								@include('absensi.edit')
							@endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data</h4>
      </div>
      <div class="modal-body">
      <form action="{{ route('absensi.store') }}" method="post">
			{{csrf_field()}}
	        	<div class="form-group">
	        	<label class="control-label">Kelas</label>
	        	<select class="form-control-select2 kelas" name="b" required="" id="kelas">
	        		@foreach($kelas as $aa)
	        		<option value="{{$aa->id}}">{{$aa->nama_kelas}}
	        		</option>
	        		@endforeach
	        	</select>
	        	</div>

	        	<div class="form-group">
	        	<label class="control-label">Nama :</label>
	        	<select class="form-control-select2" name="a" required="" id="ngaran">
	        		<!-- @foreach($siswa as $dd)
	        		<option value="{{$dd->id}}">{{$dd->nama_siswa}}
	        		</option>
	        		@endforeach -->
	        	</select>
	        	</div>

				<div class="form-group">
					<label class="control-label"> Keterangan </label><br>
					<input type="radio" name="c" required="" value="Sakit"> Sakit
					<input type="radio" name="c" required="" value="Ijin"> Ijin
					<input type="radio" name="c" required="" value="Alpa"> Alpa
				</div>

	        	<div class="form-group">
					<label class="control-label"> Tanggal</label>
					<input type="date" name="d" class="form-control" required="">
				</div>
				
			<div class="form-group">
				<button type="submit" class="btn btn-danger">Submit</button>

				<button type="reset" class="btn btn-warning">Reset</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
    </div>

		</div>
	</div>
</div> 

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#kelas').change(function() {
			$('#ngaran').html('');
			$.ajax({
				method : 'GET',
				dataType: 'html',
				url : 'filter/kelas/' + $(this).val(),
				success : function(data){
					$('#ngaran').append(data);
				},
				error : function() {
					$('#ngaran').html('Tidak Ada Hasil');
				}

			});			
		});
		$('#class').change(function() {
			$('#name').html('');
			$.ajax({
				method : 'GET',
				dataType: 'html',
				url : 'filter/kelas/' + $(this).val(),
				success : function(data){
					$('#name').append(data);
				},
				error : function() {
					$('#name').html('Tidak Ada Hasil');
				}

			});			
		})
	});
</script>
@endsection

