<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 8/06/2017
 * Time: 7:24 PM
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
if ($carro) {
    $data_carro = $carro->row();
}
$link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<?php $this->start('meta') ?>
    <!--Meta description Tags-->
    <title><?php
        if ($carro) {
            echo $data_carro->id_marca . ' ' . $data_carro->id_linea;
        } else {
            echo 'carro no disponible';
        } ?> - GP Autos </title>
<?php
if ($carro) {
    $meta_description = $data_carro->id_tipo_carro;
    $meta_description .= ' - ';
    $meta_description .= $data_carro->id_marca . ' ';
    $meta_description .= $data_carro->id_linea;
    $meta_description .= ', Modelo: ' . $data_carro->crr_modelo;
    if ($data_carro->crr_motor != '') {
        $meta_description .= ', Motor: ' . $data_carro->crr_motor;
    }
} else {
    $meta_description = '';
}


?>

    <!--Open grhap meta-->
    <meta name="description" content="<?php echo $meta_description; ?>"/>
<?php if ($carro) { ?>
    <meta property="fb:app_id" content="302184056577324"/>
    <meta property="og:type" content="product"/>
    <meta property="og:url" content="<?php echo $link; ?>"/>
    <meta property="og:title" content="<?php echo $data_carro->id_marca; ?>"/>
    <meta property="og:description" content="<?php echo $data_carro->id_linea . ' - ' . $data_carro->crr_modelo; ?>"/>
    <meta property="product:price:amount" content="<?php echo $data_carro->crr_precio; ?>"/>

    <?php

    $monedaOG = '';
    if ($data_carro->crr_moneda_precio == '$') {
        $monedaOG = 'USD';
    } else {
        $monedaOG = 'GTQ';
    }
    ?>
    <meta property="product:price:currency" content="<?php echo $monedaOG; ?>"/>
    <meta property="og:image"
          content="<?php echo htmlspecialchars('http://gpautos.net/web/images_cont/' . $data_carro->id_carro . '%20(1).jpg'); ?>"/>
<?php } ?>
<?php $this->stop() ?>

<?php $this->start('banner') ?>
    <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
        <div data-thumb="<?php echo base_url() ?>ui/public/images/banner/banner1.jpg"
             data-src="<?php echo base_url() ?>ui/public/images/banner/banner1.jpg">
            <!--<div class="camera_caption fadeFromBottom">
                Texto
            </div>-->
        </div>
        <div data-thumb="<?php echo base_url() ?>ui/public/images/banner/banner2.jpg"
             data-src="<?php echo base_url() ?>ui/public/images/banner/banner2.jpg">
        </div>
        <div data-thumb="<?php echo base_url() ?>ui/public/images/banner/banner3.jpg"
             data-src="<?php echo base_url() ?>ui/public/images/banner/banner3.jpg">
        </div>
        <div data-thumb="<?php echo base_url() ?>ui/public/images/banner/banner4.jpg"
             data-src="<?php echo base_url() ?>ui/public/images/banner/banner4.jpg">
        </div>
    </div><!-- #camera_wrap_1 -->
<?php $this->stop() ?>
<?php $this->start('page_content') ?>
    <div class="divider"></div>
    <div class="container">
        <?php
        if ($carro){ ?>
        <div class="section">
            <div class="row">
                <div class="col s12 m7">
                    <h1><?php echo $data_carro->id_marca . ' - ' . $data_carro->id_linea; ?></h1>
                    <?php if ( $data_carro->id_predio_virtual != 0) { ?><p>
                        <a class="waves-effect waves-light btn orange darken-3 z-depth-3"
                           href="<?php echo base_url() . 'predio/ver/' . $data_carro->id_predio_virtual; ?>"><i
                                    class="fa fa-car left"></i>
                            Predio virtual</a>
                        </p><?php } ?>
                    <div id="datos_contacto">
                        <div class="chip">
                            <i class="material-icons">account_circle</i>
                            <?php echo $data_carro->crr_contacto_nombre ?>
                        </div>

                        <div class="chip">
                            <i class="material-icons">contact_phone</i>
                            <?php echo $data_carro->crr_contacto_telefono ?>
                        </div>
                    </div>
                </div>
                <div class="col s12 m5">
                    <h2 class="texto_naranja" id="precio_carro">
                        <?php mostrar_precio_carro($data_carro->crr_precio, $data_carro->crr_moneda_precio); ?>
                    </h2>
                        <?php
                        if(false){
                            echo '<h4>Precio de oferta </h4>';
                            echo'<h2 class="texto_naranja">';
                            mostrar_precio_carro($data_carro->crr_precio_descuento, $data_carro->crr_moneda_precio);
                            echo'</h2>';
                        }
                        ?>

                </div>
            </div>
        </div>
        <div class="divider"></div>
        <div class="section">
            <div class="row">
                <div class="col s12 m12 l6">
                    <!-- banner carro-->
                    <div id="carousel-carro" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php
                            if (file_exists('/home2/gpautos/sv_gpautos/web/images_cont/' . $data_carro->id_carro . ' (1).jpg')) { ?>
                                <div class="item active">
                                    <img src="<?php echo base_url().'web/images_cont/' . $data_carro->id_carro . ' (1).jpg' ?>"
                                         class="responsive-img" >
                                </div>
                            <?php } else {
                            } ?>


                            <?php
                            if (file_exists('/home2/gpautos/sv_gpautos/web/images_cont/' . $data_carro->id_carro . ' (2).jpg')) { ?>
                                <div class="item">
                                    <img src="<?php echo base_url().'web/images_cont/' . $data_carro->id_carro . ' (2).jpg' ?>"
                                         class="img-responsive">

                                </div>
                            <?php } else {
                            } ?>


                            <?php
                            if (file_exists('/home2/gpautos/sv_gpautos/web/images_cont/' . $data_carro->id_carro . ' (3).jpg')) { ?>
                                <div class="item">
                                    <img src="<?php echo base_url().'web/images_cont/' . $data_carro->id_carro . ' (3).jpg' ?>"
                                         class="img-responsive" >
                                </div>
                            <?php } else {
                            } ?>


                            <?php
                            if (file_exists('/home2/gpautos/sv_gpautos/web/images_cont/' . $data_carro->id_carro . ' (4).jpg')) { ?>
                                <div class="item">
                                    <img src="<?php echo base_url().'web/images_cont/' . $data_carro->id_carro . ' (4).jpg' ?>"
                                         class="img-responsive" >
                                </div>
                            <?php } else {
                            } ?>


                            <?php
                            if (file_exists('/home2/gpautos/sv_gpautos/web/images_cont/' . $data_carro->id_carro . ' (5).jpg')) { ?>
                                <div class="item">
                                    <img src="<?php echo base_url().'web/images_cont/' . $data_carro->id_carro . ' (5).jpg' ?>"
                                         class="img-responsive" >
                                </div>
                            <?php } else {
                            } ?>


                            <?php
                            if (file_exists('/home2/gpautos/sv_gpautos/web/images_cont/' . $data_carro->id_carro . ' (6).jpg')) { ?>
                                <div class="item">
                                    <img src="<?php  echo base_url().'web/images_cont/' . $data_carro->id_carro . ' (6).jpg' ?>"
                                         class="img-responsive">
                                </div>
                            <?php } else {
                            } ?>


                            <?php
                            if (file_exists('/home2/gpautos/sv_gpautos/web/images_cont/' . $data_carro->id_carro . ' (7).jpg')) { ?>
                                <div class="item">
                                    <img src="<?php  echo base_url().'web/images_cont/' . $data_carro->id_carro . ' (7).jpg' ?>"
                                         class="img-responsive" >
                                </div>
                            <?php } else {
                            } ?>


                            <?php
                            if (file_exists('/home2/gpautos/sv_gpautos/web/images_cont/' . $data_carro->id_carro . ' (8).jpg')) { ?>
                                <div class="item">
                                    <img src="<?php  echo base_url().'web/images_cont/' . $data_carro->id_carro . ' (8).jpg' ?>"
                                         class="img-responsive" >
                                </div>
                            <?php } else {
                            } ?>


                            <?php
                            if (file_exists('/home2/gpautos/sv_gpautos/web/images_cont/' . $data_carro->id_carro . ' (9).jpg')) { ?>
                                <div class="item">
                                    <img src="<?php  echo base_url().'web/images_cont/' . $data_carro->id_carro . ' (9).jpg' ?>"
                                         class="img-responsive" >
                                </div>
                            <?php } else {
                            } ?>


                            <?php
                            if (file_exists('/home2/gpautos/sv_gpautos/web/images_cont/' . $data_carro->id_carro . ' (10).jpg')) { ?>
                                <div class="item">
                                    <img src="<?php echo base_url().'web/images_cont/' . $data_carro->id_carro . ' (10).jpg' ?>"
                                         class="img-responsive" >
                                </div>
                            <?php } else {
                            } ?>

                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-carro" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-carro" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <div class="row">
                        <div class="col s4">
                            <?php if ($data_carro->crr_certiauto == 'S') { ?>
                                <img src="<?php echo base_url() ?>ui/public/images/sello.jpg" class="responsive-img">
                            <?php } ?>
                        </div>
                        <div class="col s4">

                        </div>
                        <div class="col s4">
                            <?php if ($data_carro->sello_garantia_gp == '1') { ?>
                                <img src="<?php echo base_url() ?>/ui/public/images/sello-garant%eda-gp-compras.png" class="responsive-img">
                            <?php } ?>
                        </div>
                    </div>

                    <div class="section">
                        <!--TODO BOTONES PARA ACCIONES -->
                        <div class="row hide-on-small-only">
                            <div class="col s12 m6">
                                <div class="dr_chat">
                                    <a class="wts_btn waves-effect waves-light btn  z-depth-3" id_carro="<?php echo $data_carro->id_carro ?>" target="_blank"
                                       href="https://api.whatsapp.com/send?phone=503<?php echo $data_carro->crr_contacto_telefono ?>&text=<?php echo urlencode('Vi tu carro en gpautos, quisiera información del codigo: ' . $data_carro->id_carro . ' Marca: ' . $data_carro->id_marca . ' Linea: ' . $data_carro->id_linea . ' Modelo: ' . $data_carro->crr_modelo) ?>">
                                        chat directo con<br> vendedor <img src="<?php echo base_url(); ?>ui/public/images/ws_icon.png"></a>
                                </div>
                            </div>

                            <div class="col s12 m12">
                                <p>
                                    <br>
                                <a class="waves-effect waves-light btn orange darken-3 z-depth-3"
                                   href="#informacion_carro_modal"><i
                                            class="fa fa-info left"></i> pedir información por correo electrónico</a>
                                </p>
                            </div>
                            <!--<div class="col s12 m3">
                                <a class="waves-effect waves-light btn orange darken-3 z-depth-3"><i
                                            class="fa fa-calendar left"></i> Solicitar cita</a>
                            </div>
                            <div class="col s12 m3">
                                <a class="waves-effect waves-light btn orange darken-3 z-depth-3"><i class="fa fa-share left"></i>
                                    Compartir</a>
                            </div>
                            <div class="col s12 m3">
                                <a class="waves-effect waves-light btn orange darken-3 z-depth-3"><i class="fa fa-filter left"></i>
                                    Comparar</a>
                            </div>-->
                        </div>
                        <div class="hide-on-med-and-up">
                            <ul class="collection">
                                <li class="collection-item">
                                    <div class="dr_chat">
                                        <a class="wts_btn waves-effect waves-light btn  z-depth-3" id_carro="<?php echo $data_carro->id_carro ?>" target="_blank"
                                           href="https://api.whatsapp.com/send?phone=503<?php echo $data_carro->crr_contacto_telefono ?>&text=<?php echo urlencode('Vi tu carro en gpautos, quisiera información del codigo: ' . $data_carro->id_carro . ' Marca: ' . $data_carro->id_marca . ' Linea: ' . $data_carro->id_linea . ' Modelo: ' . $data_carro->crr_modelo) ?>">
                                            chat directo con<br> vendedor <img src="<?php echo base_url(); ?>ui/public/images/ws_icon.png"></a>
                                    </div>
                                </li>
                                <li class="collection-item">
                                    <div>
                                        <a class="waves-effect waves-light btn orange darken-3 z-depth-3"
                                           href="#informacion_carro_modal"><i
                                                    class="fa fa-info left"></i> pedir información por correo electrónico</a>

                                    </div>
                                </li>
                                <!--<li class="collection-item">
                                    <div>Solicitar cita
                                        <a href="#!" class="secondary-content">
                                            <i class="fa fa-calendar left"></i>
                                        </a>
                                    </div>
                                </li>
                                <li class="collection-item">
                                    <div>Compartir
                                        <a href="#!" class="secondary-content">
                                            <i class="fa fa-share left"></i>
                                        </a>
                                    </div>
                                </li>
                                <li class="collection-item">
                                    <div>Comparar
                                        <a href="#!" class="secondary-content">
                                            <i class="fa fa-filter left"></i>
                                        </a>
                                    </div>
                                </li>-->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col s12 m12 l6">
                    <ul id="tabs-swipe-demo" class="tabs">
                        <li class="tab col m4 s12"><a class="active" href="#datos_vehiculo"> <i
                                        class="material-icons">info</i>Datos del vehiculo</a></li>
                       <!-- <li class="tab col m4 s12"><a href="#financiamiento"> <i class="material-icons">attach_money</i>Financiamiento</a>
                        </li>-->
                        <?php if ($data_carro->crr_otros != '') { ?>
                            <li class="tab col m4 s12"><a href="#comentario"> <i class="material-icons">attach_money</i>Comentario</a>
                            </li>
                        <?php } ?>
                    </ul>
                    <div id="datos_vehiculo" class="col s12 grey lighten-1">
                        <!--Panel-->
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Datos del vehiculo: Código <?php echo $data_carro->id_carro ?></span>
                                <div class="row">
                                    <div class="col s12 m12 l6">
                                        <ul class="collection">
                                            <?php if ($data_carro->id_tipo_carro != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Tipo</span>
                                                    <?php echo $data_carro->id_tipo_carro ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($data_carro->id_marca != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text white-text">Marca</span>
                                                    <?php echo $data_carro->id_marca ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($data_carro->id_linea != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Línea</span>
                                                    <?php echo $data_carro->id_linea ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($data_carro->crr_modelo != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Modelo</span>
                                                    <?php echo $data_carro->crr_modelo ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($data_carro->crr_origen != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Origen</span>
                                                    <?php echo $data_carro->crr_origen ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($data_carro->crr_motor != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Motor</span>
                                                    <?php echo $data_carro->crr_motor ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($data_carro->crr_transmision != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Transmisión</span>
                                                    <?php echo $data_carro->crr_transmision ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($data_carro->crr_cilindros != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">No. Cilindros</span>
                                                    <?php echo $data_carro->crr_cilindros ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($data_carro->crr_kilometraje != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Kilometraje</span>
                                                    <?php echo $data_carro->crr_kilometraje ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($data_carro->crr_combustible != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Combustible</span>
                                                    <?php echo $data_carro->crr_combustible ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($data_carro->crr_puertas != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Puertas</span>
                                                    <?php echo $data_carro->crr_puertas ?>
                                                </li>
                                            <?php } ?>
                                        </ul>

                                    </div>
                                    <div class="col s12 m12 l6">
                                        <ul class="collection">
                                            <?php if ($data_carro->crr_color != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Color</span>
                                                    <?php echo $data_carro->crr_color ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($data_carro->crr_tapiceria != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Tapiceria</span>
                                                    <?php echo $data_carro->crr_tapiceria ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($data_carro->crr_ac != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text white-text">A/C</span>
                                                    <?php echo $data_carro->crr_ac ?>
                                                </li>
                                            <?php } ?>

                                            <?php if ($data_carro->crr_alarma != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Alarma</span>
                                                    <?php echo $data_carro->crr_alarma ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($data_carro->crr_aros_magnecio != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Aros de Magnesio</span>
                                                    <?php echo $data_carro->crr_aros_magnecio ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($data_carro->crr_bolsas_aire != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Bolsa de aire</span>
                                                    <?php echo $data_carro->crr_bolsas_aire ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($data_carro->crr_cerradura_central != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Cerradura central</span>
                                                    <?php echo $data_carro->crr_cerradura_central ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($data_carro->crr_espejos != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Espejos eléctricos</span>
                                                    <?php echo $data_carro->crr_espejos ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($data_carro->crr_platos == 'si') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Platos</span>
                                                    <?php echo $data_carro->crr_platos ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($data_carro->crr_polarizado != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Polarizado</span>
                                                    <?php echo $data_carro->crr_polarizado ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($data_carro->crr_radio != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Radio</span>
                                                    <?php echo $data_carro->crr_radio ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($data_carro->crr_sunroof != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Sunroof</span>
                                                    <?php echo $data_carro->crr_sunroof ?>
                                                </li>
                                            <?php } ?>

                                            <?php if ($data_carro->crr_timon_hidraulico != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Timon Hidrahulico</span>
                                                    <?php echo $data_carro->crr_timon_hidraulico ?>
                                                </li>
                                            <?php } ?>
                                            <?php if ($data_carro->crr_vidrios_electricos != '') { ?>
                                                <li class="collection-item">
                                                    <span class="detalle_item_titulo badge orange darken-1 white-text">Vidrios eléctricos</span>
                                                    <?php echo $data_carro->crr_vidrios_electricos ?>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.Panel-->
                    </div>
                    <?php if ($data_carro->crr_otros != '') { ?>
                        <div id="comentario">

                        </div>
                    <?php } ?>
                    <!--/.Panel-->
                </div>
                    <?php if ($data_carro->crr_otros != '') { ?>
                        <div id="comentario">
                            <?php echo $data_carro->crr_otros; ?>
                        </div>
                    <?php } ?>
                    <!--/.Panel-->
                </div>

            </div>
        </div>
    </div>
    <div class="divider"></div>


    <div class="divider"></div>
    <div class="section">
        <div class="row">
            <?php
            $ref_volver = '';
            $url_actual = rtrim(base_url(), "/") . $_SERVER['REQUEST_URI'];


            $url_ref = '';
            $url_ref_set = false;
            if (isset($_SERVER['HTTP_REFERER'])) {
                $url_ref = $_SERVER['HTTP_REFERER'];
                $url_ref_set = true;
            }

            if ($url_ref == base_url()) {
                $ref_volver = base_url();
            } elseif ($url_ref == $url_actual) {
                $ref_volver = base_url();

            } else if ($url_ref_set) {
                $ref_volver = $_SERVER['HTTP_REFERER'] . '?card=' . $data_carro->id_carro . '_card#' . $data_carro->id_carro . '_card';
            } else {
                $ref_volver = base_url();
            } ?>
            <a class="waves-effect waves-light btn orange darken-3 z-depth-3 btn-large"
               href="<?php echo $ref_volver ?>"> <i class="material-icons left">skip_previous</i> Volver </a>
            <!--TODO activar gp preios-->
            <!--<a class="waves-effect waves-light btn-large  orange darken-4"
			   href=""><i
						class="material-icons left">more</i>vel más de este predio </a>-->
        </div>
    </div>

    </div>
<img


    <!-- Modal Structure -->
    <div id="informacion_carro_modal" class="modal  ">
        <div class="modal-content">
            <h4><span class="badge orange darken-1 white-text">COD: <?php echo $data_carro->id_carro; ?></span> Pedir
                información sobre el vehículo </h4>
            <div class="row">
                <div class="card-panel  red darken-1 white-text" id="form_contacto_alert">
                    <span class="white-text">
                        Por favor llene todos los campos del formulario
                    </span>
                </div>
                <form class="col s12 m12" id="info_carro_form">
                    <div class="row">
                        <div class="col m6 s12">
                            <input placeholder="Nombre:" id="nombre" type="text" class="validate browser-default"
                                   required>
                        </div>
                        <div class="col m6 s12">
                            <input id="apellido" type="text" placeholder="Apellido:" class="validate browser-default"
                                   required>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col s12">
                            <input id="email" type="email" class="validate browser-default" placeholder="Email:"
                                   required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <input id="telefono" type="tel" class="validate browser-default" placeholder="Teléfono:"
                                   required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <textarea id="comentario" class="browser-default" placeholder="Comentario:"></textarea>
                        </div>
                    </div>

                </form>
            </div>


        </div>
        <div class="modal-footer">
            <a class="waves-effect waves-light btn orange darken-3 z-depth-3" id="solicitar_info">Enviar</a>
        </div>
    </div>

    <!-- Modal Solicitar credito -->
    <div id="credito_carro_modal" class="modal  ">
        <div class="modal-content">
            <h4><span class="badge orange darken-1 white-text">COD: <?php echo $data_carro->id_carro; ?></span>
                Solicitar credito para el vehículo </h4>
            <div class="row">
                <div class="card-panel  red darken-1 white-text" id="form_credito_alert">
                    <span class="white-text">
                        Por favor llene todos los campos del formulario
                    </span>
                </div>
                <div class="row" id="loader_credito">
                    <div class="valign-wrapper ">
                        <div class="preloader-wrapper big active">
                            <div class="spinner-layer spinner-blue">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div>
                                <div class="gap-patch">
                                    <div class="circle"></div>
                                </div>
                                <div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>

                            <div class="spinner-layer spinner-red">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div>
                                <div class="gap-patch">
                                    <div class="circle"></div>
                                </div>
                                <div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>

                            <div class="spinner-layer spinner-yellow">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div>
                                <div class="gap-patch">
                                    <div class="circle"></div>
                                </div>
                                <div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>

                            <div class="spinner-layer spinner-green">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div>
                                <div class="gap-patch">
                                    <div class="circle"></div>
                                </div>
                                <div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="col s12 m12" id="credito_carro_form">

                    <div class="row">
                        <div class="input-field col m6 s12">
                            <input placeholder="Nombre:" id="nombre_credito" type="text" class="validate" required>
                            <label for="nombre">Nombre:</label>
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="apellido_credito" type="text" placeholder="Apellido:" class="validate"
                                   required>
                            <label for="apellido">Apellido:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col col m6 s12">
                            <input id="email_credito" type="email" class="validate" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col col m6 s12">
                            <input id="telefono_credito" type="tel" class="validate" required>
                            <label for="telefono">Telefono</label>
                        </div>
                    </div>
                    <div class="row" style="<?php if($data_carro->crr_precio < '250000'){ echo 'display:none;'; } ?>">
                        <div class="collection ">
                            <a href="#!" class="collection-item "><span class="badge white-text"
                                                                        id="modal_precio"> </span>Valor
                                del vehiculo </a>
                            <a href="#!" class="collection-item "><span class="badge white-text"
                                                                        id="modal_traspaso"> </span>Traspaso</a>
                            <a href="#!" class="collection-item "><span class="badge white-text"
                                                                        id="modal_cmision">Q.1120.00 </span>Comision
                                venta de vehiculo:</a>
                            <a href="#!" class="collection-item "><span class="badge white-text"
                                                                        id="modal_total"> </span>Total</a>
                            <a href="#!" class="collection-item "><span class="badge white-text"
                                                                        id="modal_enganche"> </span>Enganche</a>
                            <a href="#!" class="collection-item"><span class="badge white-text"
                                                                       id="modal_plazo"> </span>Plazos</a>
                            <a href="#!" class="collection-item active"><span class="badge white-text"
                                                                              id="modal_cuota"> </span>Cuota mensual</a>
                        </div>
                    </div>

                </form>
            </div>


        </div>
        <div class="modal-footer">
            <a class="btn btn-flat waves-green" id="solicitar_credito">Enviar</a>
        </div>
    </div>
<?php } else {
    ?>

    <div class="section">
        <div class="row">
            <div class="col s12 m12">
                <div class="card-panel teal">
          <span class="white-text">
              El carro que busca no esta disponible.
          </span>
                </div>

            </div>
        </div>
    </div>

<?php } ?>

<?php $this->stop() ?>

<?php $this->start('js_p') ?>

    <script type="text/javascript">

        $(".wts_btn ").click(function () {
            console.log('click whatsapp');
            id_carro = $(this).attr('id_carro');
            console.log( "click en wspt " + id_carro );

            Carro_data = {
                id_carro: id_carro
            };

            $.ajax({
                type: 'POST',
                url: 'https://gpautos.net/carro/registrar_whatsapp',
                data: Carro_data,

                success: function (data) {
                    console.log(data);
                }
            });
        });

        $(document).ready(function () {
            // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();
            $('ul.tabs').tabs();
            //$('#precio_carro').hide();
            $("#form_contacto_alert").hide();
            $("#form_credito_alert").hide();
            $("#loader_credito").hide();
            $('.tooltipped').tooltip({delay: 50});
        });


        //BANNER

        $("#cerrar_modal_info").click(function () {
            $("#informacion_carro_modal").modal('close');
        });

        $("#solicitar_credito").click(function () {
            //obtener datos
            nombre_credito = $("#nombre_credito").val();
            apellido_credito = $("#apellido_credito").val();
            correo_credito = $("#email_credito").val();
            telefono_credito = $("#telefono_credito").val();
            carro_codigo_credito = '<?php  echo $data_carro->id_carro; ?>';
            precio_carro_credito = $("#modal_precio").text();
            enganche_credito = $("#modal_enganche").text();
            plazo_credito = $("#modal_plazo").text();
            cuota_credito = $("#modal_cuota").text();

            formulario_informacion_data = {
                nombre: nombre_credito,
                apellido: apellido_credito,
                correo: correo_credito,
                telefono: telefono_credito,
                carro_codigo: carro_codigo_credito,
                precio_carro: precio_carro_credito,
                enganche: enganche_credito,
                plazo: plazo_credito,
                cuota: cuota_credito
            };
            console.log(
                nombre_credito + '\n' +
                apellido_credito + '\n' +
                correo_credito + '\n' +
                telefono_credito + '\n' +
                carro_codigo_credito + '\n' +
                precio_carro_credito + '\n' +
                plazo_credito + '\n');

            if ($("#credito_carro_form")[0].checkValidity()) {
                console.log("form credito Submit");
                $("#credito_carro_form").hide();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url()?>Formularios/credito_carro',
                    data: formulario_informacion_data,
                    beforeSend: function () {
                        $("#loader_credito").fadeIn();
                    },
                    success: function (data) {
                        console.log(data);
                        if (data == 'send') {
                            $("#credito_carro_modal").find('.modal-content').html('Correo enviado. pronto nos pondremos en contacto');
                            $("#credito_carro_modal").find('.modal-footer').html('');

                        }
                    }
                });
            } else {
                $("#form_contacto_alert").fadeIn(1000);
            }
        });
        $("#solicitar_info").click(function () {
            //obtener datos
            nombre = $("#nombre").val();
            apellido = $("#apellido").val();
            correo = $("#email").val();
            telefono = $("#telefono").val();
            comentario = $("#comentario").val();
            carro_codigo = '<?php  echo $data_carro->id_carro; ?>';


            formulario_informacion_data = {
                nombre: nombre,
                apellido: apellido,
                correo: correo,
                telefono: telefono,
                comentario: comentario,
                carro_codigo: carro_codigo
            };

            if ($("#info_carro_form")[0].checkValidity()) {
                console.log("form Submit");
                $("#form_contacto_alert").hide();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url()?>Formularios/info_carro',
                    data: formulario_informacion_data,
                    beforeSend: function () {
                        $("#informacion_carro_modal").find('.modal-content').html('<div class="preloader-wrapper big active">\n' +
                            '      <div class="spinner-layer spinner-blue">\n' +
                            '        <div class="circle-clipper left">\n' +
                            '          <div class="circle"></div>\n' +
                            '        </div><div class="gap-patch">\n' +
                            '          <div class="circle"></div>\n' +
                            '        </div><div class="circle-clipper right">\n' +
                            '          <div class="circle"></div>\n' +
                            '        </div>\n' +
                            '      </div>');
                    },
                    success: function (data) {
                        console.log(data);
                        if (data == 'send') {
                            $("#informacion_carro_modal").find('.modal-content').html('Correo enviado. pronto nos pondremos en contacto');
                            $("#informacion_carro_modal").find('.modal-footer').html('');

                        }
                    }
                });
            } else {
                $("#form_contacto_alert").fadeIn(1000);
            }

            /**/
        });

    </script>
    <script type="application/ld+json">
        {
        "@context": "http://schema.org","@type": "Vehicle",
        "name": "<?php echo $data_carro->id_marca . ' - ' . $data_carro->id_linea . ' | ' . $data_carro->crr_modelo; ?>",
        "url" : "<?php echo base_url() . 'Carro/ver/' . $data_carro->id_carro; ?>",
        "image" : "<?php echo 'http://gpautos.net/web/images_cont/' . $data_carro->id_carro . ' (1).jpg'; ?>",
        "brand": "<?php echo $data_carro->id_marca; ?>",
        "fuelType":"<?php echo $data_carro->crr_combustible; ?>",
        "mileageFromOdometer":"<?php echo $data_carro->crr_kilometraje; ?>",
        "vehicleModelDate":"<?php echo $data_carro->crr_modelo; ?>",
        "numberOfDoors":"<?php echo $data_carro->crr_puertas; ?>",
        "vehicleEngine":"<?php echo $data_carro->crr_motor; ?>",
        "vehicleInteriorType":"<?php echo $data_carro->crr_tapiceria; ?>",
        "vehicleTransmission":"<?php echo $data_carro->crr_transmision; ?>",
        "color":"<?php echo $data_carro->crr_color; ?>",
        "itemCondition":"Usado"
        }





    </script>

<?php $this->stop() ?>