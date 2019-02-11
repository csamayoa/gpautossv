<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 1/06/2017
 * Time: 4:09 PM
 */
if ($banner_data)
{
	$banner = $banner_data->row();
}
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
<link rel="stylesheet" href="<?php echo base_url() ?>ui/admin/css/datepicker.css"/>
<?php $this->stop() ?>


<?php $this->start('page_content') ?>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"></div>
    </div>
    <div class="container-fluid">
		<?php if ($banner_data) { ?>
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Datos del banner</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="<?php echo base_url().'index.php/admin/actualizar_banner'?>" method="post" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">ID :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" value="<?php echo $banner->id_banner ?>"
                                               id="id" name="id" readonly/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Fecha:</label>
                                    <div class="controls">
                                        <input type="text" class="span11" value="<?php echo $banner->fecha ?>" id="fecha" name="fecha"
                                               readonly />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Titulo</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Titulo"
                                               value="<?php echo $banner->titulo ?>" id="titulo" name="titulo"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Link :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Link"
                                               value="<?php echo $banner->link ?>" id="link" name="link"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Imagen :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" value="<?php echo $banner->imagen ?>" id="imagen" name="imagen"/>
                                        <span class="help-block"><img src="<?php echo base_url() . $banner->imagen; ?>"></span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Area</label>
                                    <div class="controls">
                                        <select id="area" name="area">
                                            <option>Todo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Vencimiento</label>
                                    <div class="controls">
                                        <input type="text" data-date="<?php echo $banner->vencimiento ?>"
                                               data-date-format="yyyy-mm-dd" value="<?php echo $banner->vencimiento ?>"
                                               class="datepicker span11" id="vencimiento" name="vencimiento">
                                        <span class="help-block">Formato de fecha  (aaaa-mm-dd)</span></div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Estado</label>
                                    <div class="controls">
                                        <select id="estado" name="estado">
                                            <option value="activo">Activo</option>
                                            <option value="inactivo">inactivo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
		<?php } ?>
    </div>
</div>
</div>
<?php $this->stop() ?>


<?php $this->start('js_p') ?>
<script src="<?php echo base_url() ?>ui/admin/js/select2.min.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/bootstrap-colorpicker.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/jquery.toggle.buttons.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/masked.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/matrix.js"></script>
<script src="<?php echo base_url() ?>ui/admin/js/matrix.form_common.js"></script>



<?php $this->stop() ?>
