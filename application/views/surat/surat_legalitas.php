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

<body class="sidebar-mini wysihtml5-supported <?= $this->config->item('color'); ?>">
    <div class="wrapper">
        <?= $this->load->view('nav'); ?>
        <?= $this->load->view('menu_groups'); ?>
        <div class="">
            <section class="content-header">
                <h1>Surat - NPWP</h1>
            </section>
        <section class="invoice">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <button type="button" class="btn bg-purple btn-default" onclick='kembali()'><i class="fa fa-arrow-circle-left"></i> Kembali
                            </button>

                            <button class="btn btn-primary pull-right" onclick='ViewData(0)'>
                                <i class="fa fa-plus"></i> Add Surat - NPWP
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>
</body>

</div>
</body>

</html>