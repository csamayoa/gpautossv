<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 29/07/2017
 * Time: 12:22 PM
 */
$this->layout('public/public_master', [
    'header_banners' => $header_banners,
    'predios' => $predios,
    'tipos' => $tipos,
    'ubicaciones' => $ubicaciones,
    'marca' => $marca,
    'linea' => $linea,
    'transmisiones' => $transmisiones,
    'combustibles' => $combustibles,
]);
?>
<?php $this->start('title') ?>
    <title>Solicitud de franquicia</title>
<?php $this->stop() ?>
<?php $this->start('css_p') ?>
<?php $this->stop() ?>

<?php $this->start('banner') ?>
    <div class="camera_wrap camera_azure_skin" id="seguros_banners">
        <div data-thumb="<?php echo base_url() ?>ui/public/images/banner/traslado.jpg"
             data-src="<?php echo base_url() ?>ui/public/images/banner/traslado.jpg">
        </div>
        <div data-thumb="<?php echo base_url() ?>ui/public/images/banner/seguros/1.jpg"
             data-src="<?php echo base_url() ?>ui/public/images/banner/seguros/1.jpg">
            <!--<div class="camera_caption fadeFromBottom">
                Texto
            </div>-->
        </div>
        <div data-thumb="<?php echo base_url() ?>ui/public/images/banner/seguros/2.jpg"
             data-src="<?php echo base_url() ?>ui/public/images/banner/seguros/2.jpg">
        </div>
        <div data-thumb="<?php echo base_url() ?>ui/public/images/banner/seguros/3.jpg"
             data-src="<?php echo base_url() ?>ui/public/images/banner/seguros/3.jpg">
        </div>
    </div><!-- #camera_wrap_1 -->
<?php $this->stop() ?>

<?php $this->start('page_content') ?>
    <div id="contacto_wrap">
        <div class="container">
            <div class="row">
                <div class="col m8">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <form class="col s12" method="post" action="<?php echo base_url().'formularios/guardar_formulario_franquicias'?>">
                                    <div class="row">
                                        <h2>Solicitud para aplicar a una franquicia</h2>
                                        <?php if($mensaje){?>
                                            <div class="row">
                                                <div class="col s12 m6">
                                                    <div class="card blue-grey darken-1">
                                                        <div class="card-content white-text">
                                                            <p><?php echo $mensaje; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }?>

                                        <div class="input-field col s6">
                                            <input placeholder="Nombre" id="nombre" name="nombre" type="text" class="validate">
                                            <label for="first_name">Nombre</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input id="telefono" name="telefono" type="text" class="validate">
                                            <label for="last_name">Telefono</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="correo" name="correo" type="email" class="validate">
                                            <label for="email">Correo</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="ocupacion" name="ocupacion" type="text" class="validate">
                                            <label for="ocupacion">Ocupación</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button class="btn waves-effect waves-light" type="submit" name="action">
                                                Enviar
                                                <i class="material-icons right">send</i>
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $this->stop() ?>
<?php $this->start('js_p') ?>
    <script>

        $('select').material_select();
        $('.modal').modal();
        $(document).ready(function () {
            $('.parallax').parallax();
        });

        //BANNER
        jQuery('#seguros_banners').camera({
            thumbnails: false,
            height: '46%',
            pagination: false
        });
    </script>
<?php $this->stop() ?>