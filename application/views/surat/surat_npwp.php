<!DOCTYPE html>
<html>

<head>
	<?= $this->load->view('head'); ?>
</head>
<style>
	.margin-bottom {
		margin-bottom: -30px;
	}

	.select2 {
		margin-bottom: -30px;
	}
</style>

<body class="sidebar-mini wysihtml5-supported <?= $this->config->item('color') ?>">
	<div class="wrapper">
		<?= $this->load->view('nav'); ?>
		<?= $this->load->view('menu_groups'); ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>Surat - NPWP</h1>
			</section>
			<section class="invoice">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<button type="button" class="btn bg-purple btn-default" onClick='Kembali()'><i class="fa  fa-arrow-circle-left"></i> Kembali</button>

								<button class="btn btn-primary pull-right" onclick='ViewData(0)'>
									<i class='fa fa-plus'></i> Add Surat - NPWP
								</button>
								<div class="modal fade" id="addModal" tabindex="" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="Form-add-bu" id="addModalLabel">Form Add Surat - NPWP</h4>
											</div>

											<form action="#" id="form" role="form">
												<div class="modal-body">
													<input type="hidden" id="id_surat_npwp" name="id_surat_npwp" value='' />

													<input type="hidden" id="id_jenis_surat_filter" name="id_jenis_surat_filter" value='<?= $id_jenis_surat_filter; ?>' />

													<input type="hidden" id="id_bu_filter" name="id_bu_filter" value='<?= $id_bu_filter; ?>' />

													<div class="row">
														<div class="col-lg-12">
															<div class="form-group">
																<label>No NPWP</label>
																<input type="text" id="no_npwp" name="no_npwp" class="form-control" placeholder="No NPWP">
															</div>
															<div class="form-group">
																<label>Atas Nama</label>
																<input type="text" id="atas_nama" name="atas_nama" class="form-control" placeholder="Atas Nama">
															</div>
															<div class="form-group">
																<label>Alamat</label>
																<input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat">
															</div>
															<div class="form-group">
																<label>Tanggal Terdaftar</label>
																<input type="text" id="tgl_terdaftar" name="tgl_terdaftar" class="form-control" placeholder="Tanggal Terdaftar">
															</div>
															<div class="form-group">
																<label>Active</label>
																<select class="form-control" id="active" name="active">
																	<option value="1" <?php echo set_select('myselect', '1', TRUE); ?>>Active</option>
																	<option value="0" <?php echo set_select('myselect', '0'); ?>>Not Active</option>
																</select>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12">
															<div class="box box-primary">
																<div class="box-header with-border">
																	<h3 class="box-title">Attachment</h3>
																	<div class="box-tools pull-right">
																		<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
																	</div>
																</div>
																<div class="box-body">
																	<div class="row attachment">
																		<div class="box-body" id="coba1">
																			<div class="form-group col-md-5">
																				<input class="form-control margin-bottom" id="nm_file1" placeholder="Nama Attachment:">
																			</div>
																			<div class="form-group col-md-5">
																				<input type="file" id="file_attachment1" class="form-control">
																				<input type="hidden" id="nm_attachment1" class="form-control">
																			</div>
																			<div id="btnattachment">
																				<input type="button" class="btn btn-success " id="addattachment" value="+" />
																			</div>
																		</div>
																	</div>
																</div>
															</div><!-- /. box -->
														</div><!-- /.col -->
													</div><!-- /.row -->
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													<button type="button" class="btn btn-primary" id='btnSave'>Save</button>
												</div>
											</form>

										</div>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="dataTable_wrapper">
									<table class="table table-striped table-bordered table-hover" id="buTable">
										<thead>
											<tr>
												<th>Options</th>
												<th>#</th>
												<th>No NPWP</th>
												<th>Atas Nama</th>
												<th>Tanggal Terdaftar</th>
												<th>Alamat</th>
												<th>Active</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>


	<div class="modal fade" id="addModalEdit" tabindex="" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="Form-add-bu" id="addModalLabelEdit">Form Edit Surat - npwp</h4>
				</div>

				<form action="#" id="formEdit" role="form">
					<div class="modal-body">
						<input type="hidden" id="id_surat_npwp_" name="id_surat_npwp_" value='' />

						<input type="hidden" id="id_jenis_surat_filter_" name="id_jenis_surat_filter_" value='<?= $id_jenis_surat_filter; ?>' />

						<input type="hidden" id="id_bu_filter_" name="id_bu_filter_" value='<?= $id_bu_filter; ?>' />

						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label>No NPWP</label>
									<input type="text" id="no_npwp_" name="no_npwp_" class="form-control" placeholder="No NPWP">
								</div>
								<div class="form-group">
									<label>Atas Nama</label>
									<input type="text" id="atas_nama_" name="atas_nama_" class="form-control" placeholder="Atas Nama">
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<input type="text" id="alamat_" name="alamat_" class="form-control" placeholder="Alamat">
								</div>
								<div class="form-group">
									<label>Tanggal Terdaftar</label>
									<input type="text" id="tgl_terdaftar_" name="tgl_terdaftar_" class="form-control" placeholder="Tanggal Terdaftar">
								</div>
								<div class="form-group">
									<label>Active</label>
									<select class="form-control" id="active_" name="active_">
										<option value="1" <?php echo set_select('myselect', '1', TRUE); ?>>Active</option>
										<option value="0" <?php echo set_select('myselect', '0'); ?>>Not Active</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-success" id='btnSaveEdit'>Save</button>
					</div>
				</form>

				<div class="row">
					<div class="col-md-12">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Attachment</h3>
								<div class="box-tools pull-right">
									<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
								</div>
							</div>
							<div class="box-body">
								<div class="col-lg-12">

									<div class="row">
										<form id="submit">
											<input type="hidden" id="id_surat_npwp_attachment" name="id_surat_npwp_attachment" value='' />
											<div class="form-group col-lg-3">
												<label>Nama Attachment</label>
												<input type="text" id="nm_Attachment_edit" name="nm_Attachment_edit" class="form-control" placeholder="Nama Attachment">
											</div>
											<div class="form-group col-lg-6">
												<label>Attachment</label>
												<input type="file" name="file" id="attachment_edit" class="form-control" accept=".jpg,.jpeg,.pdf,.docx,.doc,.xlsx,.xls,.pptx,.ppt,.png">
												<p class="help-block">Upload File. Size Max: 2MB </p>
											</div>
											<div class="form-group col-lg-3">
												<label>_</label>
												<button type="submit" class="form-control btn btn-success" id=''>Save</button>
											</div>
										</form>

									</div>

									<div class="dataTable_wrapper">
										<table class="table table-striped table-bordered table-hover" id="attachmentTable">
											<thead>
												<tr>
													<th>Aksi</th>
													<th>#</th>
													<th>Nama Attachment</th>
													<th>Attachment</th>
												</tr>
											</thead>
										</table>
									</div>

								</div>
							</div><!-- /. box -->
						</div><!-- /.col -->
					</div><!-- /.row -->

				</div>
			</div>
		</div>

		<div class="modal fade bs-modal-sm" id="loading" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<center>
						<img src="<?php echo base_url(); ?>assets/loader.gif" />
						<p id="">Sedang Mengupload File</p>
					</center>
				</div>
			</div>
		</div>

		<?= $this->load->view('basic_js'); ?>
		<script type='text/javascript'>
			counteratt = 1;

			$(document).ready(function() {

				$("#prov").on("change", function() {
					var v = $(this).val();
					var baseUrl = "<?= base_url() ?>surat/get_chain_kab/" + v;
					removeOptions(document.getElementById("kab"));
					var kab = ["--Pilih--"];
					$.ajax({
						url: baseUrl,
						dataType: 'json',
						success: function(datas) {
							$.map(datas, function(obj) {
								kab.push({
									'id': obj.id_kab,
									'text': obj.nama
								});
								return kab;

							});
							$("#kab").select2({
								placeholder: "Pilih",
								data: kab
							});

						},
						error: function(xhr, ajaxOptions, thrownError) {
							//alert("Ups Ada sedikit kesalahan.. Segera Hubungi Administrator ");
						}
					});
				});

				$("#kab").on("change", function() {
					var v = $(this).val();
					var baseUrl = "<?= base_url() ?>surat/get_chain_kec/" + v;
					removeOptions(document.getElementById("kec"));
					var kec = ["--Pilih--"];
					$.ajax({
						url: baseUrl,
						dataType: 'json',
						success: function(datas) {
							$.map(datas, function(obj) {
								kec.push({
									'id': obj.id_kec,
									'text': obj.nama
								});
								return kec;

							});
							$("#kec").select2({
								placeholder: "Pilih",
								data: kec
							});

						},
						error: function(xhr, ajaxOptions, thrownError) {}
					});
				});

				$("#kec").on("change", function() {
					var v = $(this).val();
					var baseUrl = "<?= base_url() ?>surat/get_chain_kel/" + v;
					removeOptions(document.getElementById("kel"));
					var kel = ["--Pilih--"];
					$.ajax({
						url: baseUrl,
						dataType: 'json',
						success: function(datas) {
							$.map(datas, function(obj) {
								kel.push({
									'id': obj.id_kel,
									'text': obj.nama
								});
								return kel;

							});
							$("#kel").select2({
								placeholder: "Pilih",
								data: kel
							});

						},
						error: function(xhr, ajaxOptions, thrownError) {
							//alert("Ups Ada sedikit kesalahan.. Segera Hubungi Administrator");
						}
					});
				});




				$("#prov_").on("change", function() {
					var v = $(this).val();
					var baseUrl = "<?= base_url() ?>surat/get_chain_kab/" + v;
					removeOptions(document.getElementById("kab_"));
					var kab = ["--Pilih--"];
					$.ajax({
						url: baseUrl,
						dataType: 'json',
						success: function(datas) {
							$.map(datas, function(obj) {
								kab.push({
									'id': obj.id_kab,
									'text': obj.nama
								});
								return kab;

							});
							$("#kab_").select2({
								placeholder: "Pilih",
								data: kab
							});

						},
						error: function(xhr, ajaxOptions, thrownError) {
							//alert("Ups Ada sedikit kesalahan.. Segera Hubungi Administrator ");
						}
					});
				});

				$("#kab_").on("change", function() {
					var v = $(this).val();
					var baseUrl = "<?= base_url() ?>surat/get_chain_kec/" + v;
					removeOptions(document.getElementById("kec_"));
					var kec = ["--Pilih--"];
					$.ajax({
						url: baseUrl,
						dataType: 'json',
						success: function(datas) {
							$.map(datas, function(obj) {
								kec.push({
									'id': obj.id_kec,
									'text': obj.nama
								});
								return kec;

							});
							$("#kec_").select2({
								placeholder: "Pilih",
								data: kec
							});

						},
						error: function(xhr, ajaxOptions, thrownError) {}
					});
				});

				$("#kec_").on("change", function() {
					var v = $(this).val();
					var baseUrl = "<?= base_url() ?>surat/get_chain_kel/" + v;
					removeOptions(document.getElementById("kel_"));
					var kel = ["--Pilih--"];
					$.ajax({
						url: baseUrl,
						dataType: 'json',
						success: function(datas) {
							$.map(datas, function(obj) {
								kel.push({
									'id': obj.id_kel,
									'text': obj.nama
								});
								return kel;

							});
							$("#kel_").select2({
								placeholder: "Pilih",
								data: kel
							});

						},
						error: function(xhr, ajaxOptions, thrownError) {
							//alert("Ups Ada sedikit kesalahan.. Segera Hubungi Administrator");
						}
					});
				});


				$("#tgl_terdaftar,#tgl_terdaftar_").datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat: "yy-mm-dd"
				});

				$("#tgl_terdaftar,#tgl_terdaftar_").inputmask("yyyy-mm-dd", {
					"placeholder": "yyyy-mm-dd"
				});



				$("#file_attachment" + counteratt).change(function(objEvent) {
					$('#loading').modal({
						backdrop: 'static'
					});
					$('#addattachment').attr('disabled', true);

					if ($('#no_npwp').val() == '') {
						$('#btnSave').attr('disabled', true);
					} else {
						$('#btnSave').attr('disabled', true);
					}

					setTimeout(function() {
						$('#addattachment').attr('disabled', false);
					}, 3000);
					var objFormData = new FormData();
					var objFile = $(this)[0].files[0];
					objFormData.append('file_attachment', objFile);
					$.ajax({
						url: '<?php echo base_url(); ?>surat/ax_upload_surat',
						type: 'POST',
						contentType: false,
						data: objFormData,
						processData: false,
						success: function(data) {
							var data = JSON.parse(data);
							if (data.status == "success") {
								var enkripname = data['data'].attachment
								$("#nm_attachment" + counteratt).val(enkripname);
								$('#addattachment').attr('disabled', false);
								setTimeout(function() {
									$('#btnSave').attr('disabled', false);
								}, 5000);
								setTimeout(function() {
									$('#loading').modal('hide')
								}, 500);
							} else {
								setTimeout(function() {
									$('#loading').modal('hide');
									alert("Gagal upload! Cek Ukuran file dan koneksi internet.");
								}, 5000);
								return false;
							}
						},
						error: function(xhr, ajaxOptions, thrownError) {
							alert("File gagal terupload!");
						}
					});
				});


				$("#addattachment").on("click", function() {
					counteratt++;

					var newRow = $("<div class='box-body' id='coba" + counteratt + "' >");
					var cols = "";
					cols += '';
					cols += "<div class='form-group col-md-5' ><input class='form-control margin-bottom' id='nm_file" + counteratt + "' placeholder='Nama Attachment:'></div><div class='form-group col-md-3' ><input type='file' id='file_attachment" + counteratt + "' class='form-control'><input type='hidden' id='nm_attachment" + counteratt + "' class='form-control'></div><input type='button' class='btndel btn btn-md btn-danger' value='-' />";
					newRow.append(cols);
					$(".attachment").append(newRow);

					$("#file_attachment" + counteratt).change(function(objEvent) {
						$('#loading').modal({
							backdrop: 'static'
						});
						var objFormData = new FormData();
						var objFile = $(this)[0].files[0];
						objFormData.append('file_attachment', objFile);
						$.ajax({
							url: '<?php echo base_url(); ?>surat/ax_upload_surat',
							type: 'POST',
							contentType: false,
							data: objFormData,
							processData: false,
							success: function(data) {
								var data = JSON.parse(data);
								var enkripname = data['data'].attachment;
								$("#nm_attachment" + counteratt).val(enkripname);
								setTimeout(function() {
									$('#loading').modal('hide')
								}, 500);
							},
							error: function(xhr, ajaxOptions, thrownError) {
								alert("File gagal terupload! cek ukuran file atau koneksi internet");
								setTimeout(function() {
									$('#loading').modal('hide')
								}, 500);
							}
						});
					});

					$(".btndel").on("click", function(event) {
						$(this).closest("div").remove();
						counteratt--;
					});
				});


			});

			function removeOptions(selectbox) {
				var i;
				for (i = selectbox.options.length - 1; i >= 0; i--) {
					selectbox.remove(i);
				}
			}


			var buTable = $('#buTable').DataTable({
				"ordering": false,
				"scrollX": true,
				"processing": true,
				"serverSide": true,
				ajax: {
					url: "<?= base_url() ?>surat/ax_data_surat_npwp/",
					type: 'POST',
					data: function(d) {
						return $.extend({}, d, {
							"id_jenis_surat": $("#id_jenis_surat_filter").val(),
							"id_bu": $("#id_bu_filter").val()
						});
					}
				},
				columns: [{
						data: "id_surat_npwp",
						render: function(data, type, full, meta) {
							var str = '';
							str += '<div class="btn-group">';
							str += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>';
							str += '<ul class="dropdown-menu">';
							str += '<li><a onclick="ViewData(' + data + ')"><i class="fa fa-pencil"></i> Edit</a></li>';
							str += '<li><a onClick="DeleteData(' + data + ')"><i class="fa fa-trash"></i> Delete</a></li>';
							str += '</ul>';
							str += '</div>';
							return str;
						}
					},
					{
						data: "id_surat_npwp"
					},
					{
						data: "no_npwp"
					},
					{
						data: "atas_nama"
					},
					{
						data: "tgl_terdaftar"
					},
					{
						data: "alamat"
					},
					{
						data: "active",
						render: function(data, type, full, meta) {
							if (data == 1)
								return "Active";
							else return "Not Active";
						}
					}
				]
			});


			var attachmentTable = $('#attachmentTable').DataTable({
				"ordering": false,
				"scrollX": true,
				"processing": true,
				"serverSide": true,
				ajax: {
					url: "<?= base_url() ?>surat/ax_data_surat_npwp_attachment/",
					type: 'POST',
					data: function(d) {
						return $.extend({}, d, {

							"id_surat_npwp": $("#id_surat_npwp_attachment").val(),

						});
					}
				},
				columns: [{
						data: "id_surat_attachment",
						render: function(data, type, full, meta) {
							var str = '';
							var id1 = "'" + data + "','" + full['attachment'] + "'";

							var str = '<div class="btn-group">';
							str += '<a type="button" class="btn btn-sm btn-danger" title="Delete Data" onClick="Deletenpwp(' + id1 + ')"><i class="fa fa-trash"></i> </a>';
							str += '</div>';

							return str;
						}
					},

					{
						class: 'intro',
						data: "id_surat_attachment"
					},
					{
						data: "nm_attachment"
					},
					{
						data: "attachment",
						render: function(data, type, full, meta) {
							var str = '';
							str += '<div class="btn-group">';
							str += '<a href="<?= base_url() ?>uploads/surat/' + data + '" target="_blank"><i class="fa fa-download"></i> ' + full['nm_attachment'] + '</a>';
							str += '</div>';
							return str;

						}

					},




				],
			});


			$('#btnSave').on('click', function() {

				if ($('#no_npwp').val() == '') {
					alertify.alert("Warning", "No. npwp tidak boleh kosong.");
				} else if ($('#atas_nama').val() == '') {
					alertify.alert("Warning", "Atas Nama tidak boleh kosong.");
				} else if ($('#alamat').val() == '') {
					alertify.alert("Warning", "Alamat tidak boleh kosong.");
				} else if ($('#tgl_terdaftar').val() == '') {
					alertify.alert("Warning", "Tanggal terdaftar tidak boleh kosong.");
				} else {
					var url = '<?= base_url() ?>surat/ax_set_data_surat_npwp';

					var data_save = $('#form').serializeArray();

					totdoc = new Array();
					for (let indexdoc = 1; indexdoc <= counteratt; indexdoc++) {

						var tampdoc = [
							$("#nm_file" + indexdoc).val(),
						]
						totdoc.push(tampdoc);
					}

					totnmdoc = new Array();
					for (let indexdoc = 1; indexdoc <= counteratt; indexdoc++) {

						var tampnmdoc = [
							$("#nm_attachment" + indexdoc).val(),
						]
						totnmdoc.push(tampnmdoc);
					}

					data_save.push({
						name: "jmlfile",
						value: counteratt
					});
					data_save.push({
						name: "nm_file",
						value: totdoc
					});
					data_save.push({
						name: "nm_attach",
						value: totnmdoc
					});

					$.ajax({
						url: url,
						method: 'POST',
						data: data_save
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						if (data['status'] == "success") {
							alertify.success("Data Saved.");
							$('#addModal').modal('hide');
							buTable.ajax.reload();
						}
					});
				}
			});


			$('#btnSaveEdit').on('click', function() {

				if ($('#no_npwp_').val() == '') {
					alertify.alert("Warning", "No. npwp tidak boleh kosong.");
				} else if ($('#atas_nama_').val() == '') {
					alertify.alert("Warning", "Atas Nama tidak boleh kosong.");
				} else if ($('#alamat_').val() == '') {
					alertify.alert("Warning", "Alamat tidak boleh kosong.");
				} else if ($('#tgl_terdaftar_').val() == '') {
					alertify.alert("Warning", "Tanggal terdaftar tidak boleh kosong.");
				} else {
					var url = '<?= base_url() ?>surat/ax_set_data_surat_npwp_edit';

					var data_save = $('#formEdit').serializeArray();

					$.ajax({
						url: url,
						method: 'POST',
						data: data_save
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						if (data['status'] == "success") {
							alertify.success("Data Saved.");
							$('#addModalEdit').modal('hide');
							buTable.ajax.reload();
						}
					});
				}
			});


			function ViewData(id_surat_npwp) {
				if (id_surat_npwp == 0) {

					for (var i = 2; i <= counteratt; i++) {
						$('#coba' + [i] + '').closest("div").remove();
					}

					counteratt = 1;

					$('#addModalLabel').html('Add Surat - NPWP');
					$('#form')[0].reset();
					$('#active').val('1');
					$('#addModal').modal('show');
				} else {
					var url = '<?= base_url() ?>surat/ax_get_data_by_id_surat_npwp';
					var data = {
						id_surat_npwp: id_surat_npwp
					};

					$.ajax({
						url: url,
						method: 'POST',
						data: data
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						$('#addModalLabelEdit').html('Edit Surat - npwp');
						$('#id_surat_npwp_').val(data['id_surat_npwp']);

						$('#id_surat_npwp_attachment').val(data['id_surat_npwp']);
						$('#no_npwp_').val(data['no_npwp']);
						$('#atas_nama_').val(data['atas_nama']);
						$('#tgl_terdaftar_').val(data['tgl_terdaftar']);
						$('#alamat_').val(data['alamat']);
						$('#active_').val(data['active']);
						$('#addModalEdit').modal('show');
						attachmentTable.ajax.reload();
						setTimeout(function() {
							attachmentTable.columns.adjust().draw();
						}, 1000);
					});
				}
			}

			function DeleteData(id_surat_npwp) {
				alertify.confirm(
					'Confirmation',
					'Are you sure you want to delete this data?',
					function() {
						var url = '<?= base_url() ?>surat/ax_unset_data_surat_npwp';
						var data = {
							id_surat_npwp: id_surat_npwp
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
					function() {}
				);
			}

			$('#submit').submit(function(e) {
				e.preventDefault();

				if ($('#nm_Attachment_edit').val() == '') {
					alertify.alert("Warning", "Please fill Nama Attachment.");
				} else if ($('#attachment_edit').val() == '') {
					alertify.alert("Warning", "Please choose Attachment.");
				} else {
					$.ajax({
						url: '<?php echo base_url(); ?>surat/ax_upload_data_attachment_npwp',
						type: "post",
						data: new FormData(this),
						processData: false,
						contentType: false,
						cache: false,
						async: false,
					}).done(function(data, textStatus, jqXHR) {
						var data = JSON.parse(data);
						attachmentTable.ajax.reload();
						$('#nm_Attachment_edit').val('');
						$('#attachment').val('');
						alertify.success('Attachment Uploaded.');
					});
				}
			});

			function Deletenpwp(id_surat_attachment, attachment) {
				alertify.confirm(
					'Confirmation',
					'Are you sure you want to delete this data?',
					function() {
						var url = '<?= base_url() ?>surat/ax_unset_data_surat_npwp_attachment';
						var data = {
							id_surat_attachment: id_surat_attachment,
							attachment: attachment
						};

						$.ajax({
							url: url,
							method: 'POST',
							data: data
						}).done(function(data, textStatus, jqXHR) {
							var data = JSON.parse(data);
							attachmentTable.ajax.reload();
							alertify.error('Data deleted.');
						});
					},
					function() {}
				);
			}

			function Kembali() {
				window.history.back();
			}
		</script>
</body>

</html>