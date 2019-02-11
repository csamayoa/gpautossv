<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 10/05/2018
 * Time: 12:31 PM
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

                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                            <h5>Listado de carros Pendientes</h5>
                        </div>
                        <ul class="nav nav-tabs">
                            <li role="presentation" class="active"><a href="<?php echo base_url()?>admin/pendientes"><span class="badge badge-important"><?php echo $carros_pendientes; ?></span> Pendientes publico</a></li>
                            <li role="presentation" class=""><a href="<?php echo base_url()?>admin/pendientes_predio"><span class="badge badge-important"><?php echo $carros_pendientes_predio; ?></span> Pendientes Predio</a></li>
                            <li role="presentation" class=""><a href="<?php echo base_url()?>admin/pendientes_pv9"><span class="badge badge-important"><?php echo $carros_pendientes_predio_9; ?></span> Pendientes pv9</a></li>
                            <li role="presentation" class=""><a href="<?php echo base_url()?>admin/pendientes_fotos"><span class="badge badge-important"><?php echo $carros_pendientes_fotos; ?></span> Cambio de fotos</a></li>
                        </ul>
                        <div class="widget-content nopadding">
                            <?php if (isset($mensaje)) { ?>
                                <div class="alert alert-success alert-block"><a class="close" data-dismiss="alert"
                                                                                href="#">×</a>
                                    <h4 class="alert-heading">Acción exitosa!</h4>
                                    <?php echo $mensaje; ?>
                                </div>
                            <?php } ?>
                            <?php if ($carros) { ?>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="tabla_carros" >
                                    <thead>
                                    <tr>
                                        <th>Acciones</th>
                                        <th>ID</th>
                                        <th>APROBACIÓN</th>
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
                                        <th>ID</th>
                                        <th>APROBACIÓN</th>
                                        <th>Tipo</th>
                                        <th>Marca</th>
                                        <th>Linea</th>
                                        <th>Modelo</th>
                                        <th>User</th>
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
                                                        <a class="btn btn-success btn-xs" href="<?php echo base_url().'index.php/admin/revisar_carro/'. $carro->id_carro?>"><i class="icon-ok-sign"></i> Revisar</a>
                                                        <a id="baja_btn" class="btn btn-danger btn-xs" href="<?php echo base_url().'index.php/admin/dar_de_baja_btn/'. $carro->id_carro?>" target="_blank"><i class="icon-remove"></i> Dar de baja</a>
                                                    </div>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url() . 'index.php/admin/editarCarro/' . $carro->id_carro ?>">
                                                    <?php echo $carro->id_carro ?>
                                                </a>
                                            </td>
                                            <td><?php echo $carro->fecha_aprobacion ?></td>
                                            <td>

                                                <?php echo $carro->id_tipo_carro ?>

                                            </td>
                                            <td><?php echo $carro->id_marca ?></td>
                                            <td><?php echo $carro->id_linea ?></td>
                                            <td><?php echo $carro->crr_modelo ?></td>
                                            <td><?php echo $carro->user_id ?></td>
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
                    echo 'Aún no hay pendientes';
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
    $("#baja_btn").click(function () {
        location.reload();
    });

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
