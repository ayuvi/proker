<!DOCTYPE html>
<html>
<head>
	<?= $this->load->view('head'); ?>
</head>
<body class="sidebar-mini wysihtml5-supported <?= $this->config->item('color')?>">
	<div class="wrapper">
		<?= $this->load->view('nav'); ?>
		<?= $this->load->view('menu_groups'); ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>Kategori Barang</h1>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">

								<div class="modal fade" id="addModal" tabindex="" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="Form-add-bu" id="addModalLabel">Form Add kategori</h4>
											</div>
											<div class="modal-body">
												<input type="hidden" id="id_kategori" name="id_kategori" value='' />
												<div class="form-group">
													<label>Name</label>
													<input type="text" id="nm_kategori" name="nm_kategori" class="form-control" placeholder="Name">
												</div>
												<div class="form-group">
													<label>Jenis Kategori</label>
													<select class="form-control select2" style="width: 100%;" id="jns_kategori" name="jns_kategori">
														<option value="1">Habis Pakai</option>
														<option value="2">Tidak Habis Pakai</option>
													</select>
												</div>
												<div class="form-group">
													<label>Active</label>
													<select class="form-control" id="active" name="active">
														<option value="1" <?php echo set_select('myselect', '1', TRUE); ?> >Active</option>
														<option value="0" <?php echo set_select('myselect', '0'); ?> >Not Active</option>
													</select>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-primary" id='btnSave'>Save</button>
											</div>
										</div>
									</div>
								</div>


								<div class="modal fade" id="addModalDetail"  tabindex="" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="Form-add-bu" id="addModalLabelDetail">Form Add Kategori Detail</h4>
											</div>
											<div class="modal-body">
												<input type="hidden" id="id_kategori_detail" name="id_kategori_detail" value='' />
												<input type="hidden" id="id_kategori_sub" name="id_kategori_sub" value='' />

												<div class="form-group">
													<label>Nama Kategori</label>
													<input type="text" class="form-control" id="nm_kategori_sub" name="nm_kategori_sub" value='' placeholder="Nama Kategori" />
												</div>

												<div class="form-group">
													<label>Active</label>
													<select class="form-control" id="active_detail" name="active_detail">
														<option value="1" <?php echo set_select('myselect', '1', TRUE); ?> >Active</option>
														<option value="0" <?php echo set_select('myselect', '0'); ?> >Not Active</option>
													</select>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-primary" id='btnSaveDetail'>Save</button>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="panel-body">
								<div class="nav-tabs-custom">

									<ul class="nav nav-tabs">
										<li class="active disabled"><a href="#tab_1" class="disabled" data-toggle="tab" aria-expanded="true">Data Kategori</a></li>
										<li class=" disabled"><a href="#tab_2" class="disabled" aria-expanded="false">Data Kategori Detail</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="tab_1">

											<div class="row">
												<div class="col-lg-12">
													<button class="btn btn-primary pull-right" onclick='ViewData(0)'>
														<i class='fa fa-plus'></i> Add Kategori
													</button>
												</div>
											</div>
											<br>

											<div class="dataTable_wrapper">
												<table class="table table-striped table-bordered table-hover" id="buTable">
													<thead>
														<tr>
															<th>Options</th>
															<th>#</th>
															<th>Kategori</th>
															<th>Jenis</th>
															<th>Status</th>
														</tr>
													</thead>
												</table>
											</div>
										</div>


										<div class="tab-pane" id="tab_2">
											<div class="row">
												<div class="col-lg-8">
													<div class="form-group">
														<p id="detail_keterangan_kategori"></p>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group pull-right">
														<p style="height: 13px"></p>
														<button type="button" class="btn bg-purple btn-default" onClick='closeTab()'><i class="fa  fa-arrow-circle-left"></i> Kembali</button>
														<button class="btn btn-primary" onclick='ViewDataDetail(0)'>
															<i class='fa fa-plus'></i> Add Kategori
														</button>
													</div>
												</div>
											</div>

											<div class="dataTable_wrapper">
												<table class="table table-striped table-bordered table-hover" id="detailTable">
													<thead>
														<tr>
															<th>Options</th>
															<th>#</th>
															<th>Nama Kategori</th>
															<th>Active</th>
														</tr>
													</thead>
												</table>
											</div>
										</div>

									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<?= $this->load->view('basic_js'); ?>
	<script type='text/javascript'>
		var buTable = $('#buTable').DataTable({
			"ordering" : false,
			"scrollX": true,
			"processing": true,
			"serverSide": true,
			ajax: 
			{
				url: "<?= base_url()?>kategori/ax_data_kategori/",
				type: 'POST'
			},
			columns: 
			[
			{
				data: "id_kategori", render: function(data, type, full, meta){
					var id1 = "'"+data+"','"+full['nm_kategori']+"'";
					var str = '';
					str += '<div class="btn-group">';
					str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
					str += '<ul class="dropdown-menu">';
					str += '<li><a onclick="DetailData(' + id1 + ')"><i class="fa fa-list"></i> Kategori Detail</a></li>';
					str += '<li><a onclick="ViewData(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
					str += '<li><a onClick="DeleteData(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
					str += '</ul>';
					str += '</div>';
					return str;
				}
			},

			{ data: "id_kategori" },
			{ data: "nm_kategori" },
			{ data: "jns_kategori", render: function(data, type, full, meta){
				if(data == 1){
					return "Habis Pakai";
				}else if(data == 2){
					return "Tidak Habis Pakai";
				}else {
					return "";
				}
			}
		},

		{ data: "active", render: function(data, type, full, meta){
			if(data == 1)
				return "Active";
			else return "Not Active";
		}
	}
	]
});

		var detailTable = $('#detailTable').DataTable({
			"ordering" : false,
			"scrollX": true,
			"processing": true,
			"serverSide": true,

			dom: 'Bfrtip',
			lengthMenu: [
			[ 10, 25, 50, 100, 10000 ],
			[ '10 rows', '25 rows', '50 rows', '100 rows', 'Show all' ]
			],
			buttons: [
					'pageLength', 'copy', 'csv', 'excel', //'pdf', 'print'
					],

					ajax: 
					{
						url: "<?= base_url()?>kategori/ax_data_kategori_detail/",
						type: 'POST',
						data: function ( d ) {
							return $.extend({}, d, { 
								"id_kategori": $("#id_kategori_detail").val(),
							});
						}
					},
					columns: 
					[
					{
						data: "id_kategori_sub", render: function(data, type, full, meta){
							var str = '';
							str += '<div class="btn-group">';
							str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
							str += '<ul class="dropdown-menu">';
							str += '<li><a onclick="ViewDataDetail(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
							str += '<li><a onClick="DeleteDataDetail(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
							str += '</ul>';
							str += '</div>';
							return str;
						}
					},

					{ data: "id_kategori_sub" },
					{ data: "nm_kategori_sub" },
					{ data: "active", render: function(data, type, full, meta){
						if(data == 1)
							return "Active";
						else return "Not Active";
					}}
					]
				});

		$('#btnSave').on('click', function () {
			if($('#nm_kategori').val() == '')
			{
				alertify.alert("Warning", "Please fill kategori Name.");
			}
			else
			{
				var url = '<?=base_url()?>kategori/ax_set_data';
				var data = {
					id_kategori: $('#id_kategori').val(),
					nm_kategori: $('#nm_kategori').val(),
					jns_kategori: $('#jns_kategori').val(),
					active: $('#active').val()
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					if(data['status'] == "success")
					{
						alertify.success("Data Saved.");
						$('#addModal').modal('hide');
						buTable.ajax.reload();
					}
				});
			}
		});

		$('#btnSaveDetail').on('click', function () {
			if($('#nm_kategori_sub').val() == '')
			{
				alertify.alert("Warning", "Please fill Nama Kategori.");
			}else
			{
				var url = '<?=base_url()?>kategori/ax_set_data_detail';
				var data = {
					id_kategori_sub : $('#id_kategori_sub').val(),
					nm_kategori_sub : $('#nm_kategori_sub').val(),
					id_kategori 	: $('#id_kategori_detail').val(),
					active 			: $('#active_detail').val()
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data,
					statusCode: {
						500: function() {
							alertify.alert("Warning","Nama Kategori sama/sudah ada di database sistem.");
						}
					}
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					if(data['status'] == "success")
					{
						alertify.success("Kategori data saved.");
						$('#addModalDetail').modal('hide');
						detailTable.ajax.reload();
					}
				});

			}
		});

		function ViewData(id_kategori)
		{
			if(id_kategori == 0)
			{
				$('#addModalLabel').html('Add kategori');
				$('#id_kategori').val('');
				$('#nm_kategori').val('');
				$('#jns_kategori').val('1').trigger('change');
				$('#active').val('1');
				$('#addModal').modal('show');
			}
			else
			{
				var url = '<?=base_url()?>kategori/ax_get_data_by_id';
				var data = {
					id_kategori: id_kategori
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);
					$('#addModalLabel').html('Edit kategori');
					$('#id_kategori').val(data['id_kategori']);
					$('#nm_kategori').val(data['nm_kategori']);
					$('#jns_kategori').val(data['jns_kategori']).trigger('change');
					$('#active').val(data['active']);
					$('#addModal').modal('show');
				});
			}
		}

		function ViewDataDetail(id_kategori_sub)
		{
			if(id_kategori_sub == 0)
			{
				$('#addModalLabelDetail').html('Add Kategori Detail');
				$('#id_kategori_sub').val('');
				$('#nm_kategori_sub').val('');
				$('#active_detail').val('1');
				$('#addModalDetail').modal('show');
			}
			else
			{
				var url = '<?=base_url()?>kategori/ax_get_data_by_id_detail';
				var data = {
					id_kategori_sub: id_kategori_sub
				};

				$.ajax({
					url: url,
					method: 'POST',
					data: data
				}).done(function(data, textStatus, jqXHR) {
					var data = JSON.parse(data);

					$('#addModalLabelDetail').html('Edit Trayek');
					$('#id_kategori_sub').val(data['id_kategori_sub']);
					$('#nm_kategori_sub').val(data['nm_kategori_sub']);
					$('#active_detail').val(data['active']);
					$('#addModalDetail').modal('show');
				});
			}
		}

		function DeleteData(id_kategori)
		{
			alertify.confirm(
				'Confirmation', 
				'Are you sure you want to delete this data?', 
				function(){
					var url = '<?=base_url()?>kategori/ax_unset_data';
					var data = {
						id_kategori: id_kategori
					};

					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						buTable.ajax.reload();
						alertify.error('Data deleted.');
					});
				},
				function(){ }
				);
		}

		function DeleteDataDetail(id_kategori_sub)
		{
			alertify.confirm(
				'Confirmation', 
				'Are you sure you want to delete this data?', 
				function(){
					var url = '<?=base_url()?>kategori/ax_unset_data_detail';
					var data = {
						id_kategori_sub: id_kategori_sub
					};

					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						detailTable.ajax.reload();
						alertify.error('Kategori data deleted.');
					});
				},
				function(){ }
				);
		}

		function closeTab(){
			$('.nav-tabs a[href="#tab_1"]').tab('show');
			buTable.columns.adjust().draw();
		}

		function DetailData(id_kategori,nm_kategori){
			$('#detail_keterangan_kategori').html('<h2><b><font color="blue">'+nm_kategori+'</font></b></h2>');
			$('#id_kategori_detail').val(id_kategori);
			$('.nav-tabs a[href="#tab_2"]').tab('show');
			detailTable.columns.adjust().draw();
		}

	</script>
</body>
</html>
