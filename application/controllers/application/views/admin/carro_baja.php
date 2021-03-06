<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 4:09 PM
 */
?>
<?php $this->layout('admin/admin_master', [
	'title'    => $title,
	'nombre'   => $nombre,
	'user_id'  => $user_id,
	'username' => $username,
	'rol'      => $rol,
]); ?>
<?php $this->start('css_p') ?>
<!--cargamos css personalizado-->
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/select2.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-style.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/matrix-media.css"/>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
<?php $this->stop() ?>


<?php $this->start('page_content') ?>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
				<?php if ($carros) { ?>
                    <div class="widget-box">
                        <div>
                            <ul class="nav nav-tabs">
                                <li role="presentation" class=""><a href="<?php echo base_url()?>admin/vehiculos"><i class="icon-ok"></i> Carros activos</a></li>
                                <li role="presentation" class="active"><a href="<?php echo base_url()?>/admin/carros_de_baja"><i class="icon-remove"></i> Carros Inactivos</a></li>
                                <li role="presentation" class="active"><a href="<?php echo base_url()?>/admin/renovaciones_carros"><i class="icon-remove"></i> Renovaciones</a></li>
                            </ul>
                        </div>
                        <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                            <h5>Listado de carros activos</h5>
                        </div>
                        <div class="widget-content nopadding">
	                        <?php if (isset($mensaje)) { ?>
                                <div class="alert alert-success alert-block"><a class="close" data-dismiss="alert"
                                                                                href="#">×</a>
                                    <h4 class="alert-heading">Acción exitosa!</h4>
			                        <?php echo $mensaje; ?>
                                </div>
	                        <?php } ?>

                            <a class="btn btn-success btn-mini"
                               href="<?php echo base_url() ?>index.php/admin/crearCarro"><i class="icon-plus-sign"></i> Nuevo</a>



                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="tabla_carros" >
                                    <thead>
                                    <tr>
                                        <th>Acciones</th>
                                        <th>Codigo</th>
                                        <th>Tipo</th>
                                        <th>Marca</th>
                                        <th>Linea</th>
                                        <th>Modelo</th>
                                        <th>Inicio</th>
                                        <th>Vencimiento</th>

                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>Acciones</th>
                                        <th>Codigo</th>
                                        <th>Tipo</th>
                                        <th>Marca</th>
                                        <th>Linea</th>
                                        <th>Modelo</th>
                                        <th>Inicio</th>
                                        <th>Vencimiento</th>

                                    </tr>
                                    </tfoot>
                                    <tbody>
									<?php

									foreach ($carros->result() as $carro)
									{
										?>
                                        <tr class="gradeX">
                                            <td>
                                                <div class="btn-group" role="group" aria-label="...">
                                                    <a class="btn btn-success btn-xs" href="<?php echo base_url().'index.php/admin/reactivar_carro/'. $carro->crr_codigo?>"><i class="icon-calendar"></i> Renovar</a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url() . 'index.php/admin/editarCarro/' . $carro->id_carro ?>">
													<?php echo $carro->crr_codigo ?>
                                                </a>
                                            </td>

                                            <td>

												<?php echo $carro->id_tipo_carro ?>

                                            </td>
                                            <td><?php echo $carro->id_marca ?></td>
                                            <td><?php echo $carro->id_linea ?></td>
                                            <td><?php echo $carro->crr_modelo ?></td>
                                            <td> <?php echo $carro->crr_fecha ?></td>
                                            <td> <?php echo $carro->crr_vencimiento ?></td>

                                        </tr>
									<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
					<?php
				}
				else
				{
					echo 'Aun no hay prospectos';
				} ?>
            </div>
        </div>
    </div>
</div>
<?php $this->stop() ?>


<?php $this->start('js_p') ?>
<script src="<?php echo base_url() ?>ui/admin/js/select2.min.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/matrix.js"></script>
<!--<script src="<?php echo base_url() ?>/ui/admin/js/matrix.tables.js"></script>-->


<script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#tabla_carros tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });

        // DataTable
        var table = $('#tabla_carros').DataTable(
            {
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            });

        // Apply the search
        table.columns().every(function () {
            var that = this;
            $('input', this.footer()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
    });


</script>
<?php $this->stop() ?>
