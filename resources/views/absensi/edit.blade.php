<!-- Modal EDIT-->
<div id="myEdit{{$data->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit</h4>
      </div>
      <div class="modal-body">
        <form action="{{ route('absensi.update',$data->id) }}" method="post">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				
				<div class="form-group">
	        	<label class="control-label">Kelas</label>
	        	<select class="form-control-select2 kelas" name="b" required="" id="class">
	        		@foreach($kelas as $aa)
	        		<option value="{{$aa->id}}">{{$aa->nama_kelas}}
	        		</option>
	        		@endforeach
	        	</select>
	        	</div>
	        <div class="form-group">
	        	<label class="control-label">Nama :</label>
	        	<select class="form-control-select2" name="a" required="" id="name">
	        		<!-- @foreach($siswa as $dd)
	        		<option value="{{$dd->id}}">{{$dd->nama_siswa}}
	        		</option>
	        		@endforeach -->
	        	</select>
	        	</div>
				<div class="form-group">
					<label class="control-label"> Keterangan </label><br>
					<input type="radio" name="c" required="" value="Sakit" <?php if($data->keterangan == "Sakit") {echo "checked";} ?>> Sakit
					<input type="radio" name="c" required="" value="Ijin" <?php if($data->keterangan == "Ijin") {echo "checked";} ?>> Ijin
					<input type="radio" name="c" required="" value="Alpa" <?php if($data->keterangan == "Alpa") {echo "checked";} ?>> Alpa 
				</div>
	        	<div class="form-group">
					<label class="control-label"> Tanggal</label>
					<input type="date" name="d" value="{{$data->tgl}}" class="form-control" required="">
				</div>
	
				<div class="form-group">
					<button type="submit" class="btn btn-success">Simpan</button>
					<button type="reset" class="btn btn-danger">Reset</button>
				</div>
      			<div class="modal-footer">
        			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		</div>
			</form>
      	</div>
      </div>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		// $(document).on('change','.kelas', function(){
		// 	console.log("Hm its change");

		// 	var id_kelas=$(this).val();
		// 	console.log(id_kelas);
		// });
		$('#kelas').change(function function_name() {
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
		})

	});
</script>
