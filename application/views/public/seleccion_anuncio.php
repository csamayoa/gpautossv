<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 25/04/2018
 * Time: 7:12 PM
 */
?>
<?php $this->layout('public/public_master_cliente', [
    'header_banners' => $header_banners,
    'predios' => $predios,
    'tipos' => $tipos,
    'ubicaciones' => $ubicaciones,
    'marca' => $marca,
    'linea' => $linea,
    'transmisiones' => $transmisiones,
    'combustibles' => $combustibles,
]);

//UBICACION
$ubicacion_carro_select = array(
    'name' => 'ubicacion_anuncio',
    'id' => 'ubicacion_anuncio',
    'class' => 'validate browser-default',
    'required' => 'required'
);
$ubicacion_carro_select_options = array(
    "SAN SALVADOR" => "SAN SALVADOR",
    "LA LIBERTAD" => "LA LIBERTAD",
    "SANTA ANA" => "SANTA ANA",
    "SONSONATE" => "SONSONATE",
    "SAN MIGUEL" => "SAN MIGUEL",
    "USULUTÁN" => "USULUTÁN",
    "AHUACHAPÁN" => "AHUACHAPÁN",
    "LA PAZ" => "LA PAZ",
    "LA UNIÓN" => "LA UNIÓN",
    "CUSCATLÁN" => "CUSCATLÁN",
    "CHALATENANGO" => "CHALATENANGO",
    "MORAZÁN" => "MORAZÁN",
    "SAN VICENTE" => "SAN VICENTE",
    "CABAÑAS" => "CABAÑAS",
);

$parametros = $parametros->result();
$precio_vip = $parametros[1];
$precio_individual = $parametros[2];
$precio_feria = $parametros[3];
$precio_facebook = $parametros[4];


?>
<?php $this->start('title') ?>
<title>Paga tu anuncio</title>
<?php $this->stop() ?>
<?php $this->start('css_p') ?>
<!--Wizard pago-->
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>/ui/public/css/wizard.css"/>
<?php $this->stop() ?>

<?php $this->start('banner') ?>

<?php $this->stop() ?>

<?php $this->start('page_content') ?>
<div class="divider"></div>
<pre>
<?php // print_r($datos_usuario->row()); ?>
</pre>
<?php if (true) { ?>
    <section id="pagar_anuncio">
        <div class="container">
            <div class="row">
                <div class="col m12">
                    <h5>Seleccione tipo de anuncio</h5>
                    <div class="card">
                        <div class="card-content">

                            <form method="post" action="<?php echo base_url() ?>cliente/forma_pago"
                                  id="seleccion_anuncio">
                                <div class="row orange darken-3 ">
                                    <div class=" col s12 m12">
                                    <label class="control-label white-text">UBICACIÓN</label>
                                    </div>
                                    <div class="input-field col s12 m12">
                                        <!--UBICACIÓN-->
                                        <?php echo form_dropdown($ubicacion_carro_select, $ubicacion_carro_select_options, 'GUATEMALA'); ?>
                                    </div>
                                    <p>&nbsp;</p>
                                </div>
                                <div id="row">
                                    <table class="striped table-bordes">
                                        <thead>
                                        <tr class="grey darken-2 white-text">
                                            <td>Caracteristicas</td>
                                            <td class="t_individual">Individual</td>
                                            <td class="t_vip">VIP</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <p class="bold">
                                                    Indefinido
                                                </p>
                                                <!--<i class="material-icons tooltipped" data-position="bottom"
                                                   data-delay="50"
                                                   data-tooltip="El anuncio permanecera en la pagina hasta que se venda ">
                                                    help_outline
                                                </i>-->
                                                <small>Anuncio permanecera hasta que se venda.</small>
                                            </td>
                                            <td class="t_individual"><i
                                                        class="material-icons light-green-text accent-4">check</i>
                                            </td>
                                            <td class="t_vip"><i
                                                        class="material-icons light-green-text accent-4">check</i></td>
                                        </tr>
                                        <!--<tr>
                                            <td>
                                                <p class="bold">
                                                    Crédito
                                                </p>
                                                <small>Credito bancario disponible para tus clientes compradores</small>

                                            </td>
                                            <td class="t_individual"><i
                                                        class="material-icons light-green-text accent-4">check</i>
                                            </td>
                                            <td class="t_vip"><i
                                                        class="material-icons light-green-text accent-4">check</i></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="bold">
                                                    Calcomanía
                                                </p>
                                                <small> ingresa tu codigo para recibir gratis tu calcomania</small>
                                            </td>
                                            <td class="t_individual"><i
                                                        class="material-icons light-green-text accent-4">check</i>
                                            </td>
                                            <td class="t_vip"><i
                                                        class="material-icons light-green-text accent-4">check</i></td>
                                        </tr>
                                        -->
                                        <tr>
                                            <td>
                                                <p class="bold">
                                                    Facebook
                                                </p>
                                                <small>Incluye publicidad pagada en fb por 15 dias</small>
                                            </td>
                                            <td class="t_individual"><i
                                                        class="material-icons red-text accent-4">close</i>
                                            </td>
                                            <td class="t_vip"><i
                                                        class="material-icons light-green-text accent-4">check</i></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="bold">
                                                    Comision
                                                </p>
                                                <small>Comision por venta de vehiculo 5%</small>
                                            </td>
                                            <td class="t_individual"><i
                                                        class="material-icons red-text accent-4">close</i>
                                            </td>
                                            <td class="t_vip">5 %</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="bold">
                                                    Tipo de venta
                                                </p>
                                                <small>Directa: el cliente hace la negociación directamente</small><br>
                                                <small>Bajo cita: Demostración en oficina GP Autos</small>
                                            </td>
                                            <td class="t_individual">Directo</td>
                                            <td class="t_vip">Bajo cita</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="bold">
                                                    Mailing
                                                </p>
                                                <small>1 envio de correo masivo a clientes de gpautos </small>
                                            </td>
                                            <td class="t_individual"><i
                                                        class="material-icons red-text accent-4">close</i></td>
                                            <td class="t_vip"><i
                                                        class="material-icons light-green-text accent-4">check</i></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="bold">
                                                    Asesor Personalizado
                                                </p>
                                                <small>Asesor de gpautos  para vender tu carro</small>

                                            </td>
                                            <td class="t_individual"><i
                                                        class="material-icons red-text accent-4">close</i></td>
                                            <td class="t_vip"><i
                                                        class="material-icons light-green-text accent-4">check</i></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="bold">
                                                    Pago GPAUTOS
                                                </p>
                                                <small>Pago garantizado por parte de gpautos.s,a.</small>

                                            </td>
                                            <td class="t_individual"><i
                                                        class="material-icons red-text accent-4">close</i></td>
                                            <td class="t_vip"><i
                                                        class="material-icons light-green-text accent-4">check</i></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="bold">Precio</p>
                                            </td>
                                            <td class="t_individual">
                                                $ <?php echo display_formato_dinero_return($precio_individual->parametro_valor); ?></td>
                                            <td class="t_vip">
                                                $ <?php echo display_formato_dinero_return($precio_vip->parametro_valor); ?></td>
                                        </tr>
                                        <tr class="grey darken-2 white-text">
                                            <td>Seleccione opción</td>
                                            <td class="t_individual">
                                                <small>Seleccione opción</small><br>
                                                <input name="tipo_anuncio" type="radio"
                                                                            id="anuncio_individual" class="validate"
                                                                            value="individual" required/>
                                                <label for="anuncio_individual"
                                                       class="seleccion_anuncio_radio_label va"></label></td>
                                            <td class="t_vip">
                                                <small>Seleccione opción</small><br>
                                                <input name="tipo_anuncio" type="radio" id="anuncio_vip"
                                                                     value="vip" required/>
                                                <label for="anuncio_vip" class="seleccion_anuncio_radio_label"></label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <table class="striped table-bordes">
                                        <thead>
                                        <tr class="grey darken-2 white-text">
                                            <td>Agrégale interés a tu publicación</td>
                                            <td>Total</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                Anuncio: <span id="anuncio_nombre"></span>
                                            </td>
                                            <td class="t_individual" >
                                                <span id="anuncio_precio"></span>
                                            </td>
                                        </tr>
                                        <!--<tr>
                                            <td>
                                                <input type="checkbox" id="feria_check" name="feria_check" value="feria_si" />
                                                <label for="feria_check">Feria</label></td>
                                            <td><span id="anuncio_precio_feria"></span></td>
                                        </tr>-->
                                        <tr>
                                            <td>
                                                <input type="checkbox" id="facebook_check" name="facebook_check" value="facebook_si" />
                                                <label for="facebook_check">Más 15 dias anuncios en facebook pagado</label></td>
                                                </td>
                                            <td class="t_individual"><span id="anuncio_precio_facebook"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Total a pagar:</td>
                                            <td class="t_individual" ><span class="bold" id="total_a_pagar"></span></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="row">
                                    <div class="input-field col s12 m12">
                                        <button type="submit" class="btn btn-success">Forma de pago</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
} else {
    echo 'Aun no hay prospectos';
} ?>
<?php $this->stop() ?>
<!-- JS personalizado -->
<?php $this->start('js_p') ?>
<script>
    var ubicacion;
    var tipo_anuncio;
    var precio_anuncio;
    var precio_individual;
    var precio_vip;
    var feria;
    var precio_feria;
    var facebook;
    var precio_facebook;
    var total_a_pagar;

    precio_individual = <?php echo display_formato_dinero_return($precio_individual->parametro_valor); ?>;
    precio_vip = <?php echo display_formato_dinero_return($precio_vip->parametro_valor); ?>;
    precio_feria = <?php echo display_formato_dinero_return($precio_feria->parametro_valor); ?>;
    precio_facebook = <?php echo display_formato_dinero_return($precio_facebook->parametro_valor); ?>;

    $(".t_vip").hide();
    $("#seleccion_anuncio").on('change', function () {
        //reset total a pagar
        total_a_pagar = 0;
        //reset precios facebook y feria
        $("#anuncio_precio_feria").html('');
        $("#anuncio_precio_facebook").html('');



        // ubicación
        ubicacion = $("#ubicacion_anuncio").val();
        if (ubicacion == 'GUATEMALA') {
            $(".t_vip").show();
        } else {
            $(".t_vip").hide();
        }
        //anuncio seleccionado
        tipo_anuncio = $("input[name='tipo_anuncio']:checked").val();

        if(tipo_anuncio){
            if(tipo_anuncio =='individual'){
                precio_anuncio = precio_individual;
            }
            if(tipo_anuncio == 'vip'){
                precio_anuncio = precio_vip;
            }
            $("#anuncio_precio").html('$ '+ precio_anuncio);
            $("#anuncio_nombre").html(tipo_anuncio);
            total_a_pagar = total_a_pagar + precio_anuncio;
        }
        //feria
        feria = $("#feria_check:checked").val();
        if(feria){
            console.log(feria);
            total_a_pagar = total_a_pagar + precio_feria;
            $("#anuncio_precio_feria").html(precio_feria);
        }
        //facebook
        facebook =$("#facebook_check:checked").val();
        if(facebook){
            console.log(facebook);
            total_a_pagar = total_a_pagar + precio_facebook;
            $("#anuncio_precio_facebook").html('$ '+precio_facebook);
        }

        $("#total_a_pagar").html('$ '+total_a_pagar);



    });

    $(document).ready(function () {
        $('select').material_select();
        //$('.tooltipped').tooltip({delay: 50});
        //$("#ubicacion_anuncio:selected").removeAttr("selected");
    });
</script>
<?php $this->stop() ?>
