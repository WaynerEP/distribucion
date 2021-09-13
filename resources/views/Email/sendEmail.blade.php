<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/email.css" rel="stylesheet" type="text/css">
</head>

<body>
    <center>
        <td class="esd-stripe" align="center">
            <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" align="center">
                <tbody>
                    <tr>
                        <td class="esd-structure es-p20t es-p20b es-p10r es-p10l" style="background-color: #191919;"
                            esd-general-paddings-checked="false" bgcolor="#191919" align="left">
                            <table width="100%" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td class="esd-container-frame" width="580" valign="top" align="center">
                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td class="esd-block-image" align="center" style="font-size:0"><a
                                                                target="_blank" href="https://viewstripo.email/"><img
                                                                    class="adapt-img"
                                                                    src="https://tlr.stripocdn.email/content/guids/CABINET_fb4f0a16f1a866906d2478dd087a5ccb/images/69401502088531077.png"
                                                                    alt width="105"></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="esd-structure es-p20t es-p20b es-p20r es-p20l" esd-general-paddings-checked="false"
                            style="background-color: #facb00;" bgcolor="#FACB00" align="left">
                            <table width="100%" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td class="esd-container-frame" width="560" valign="top" align="center">
                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td class="esd-block-text es-p15t es-p15b" align="center">
                                                            <div class="esd-text">
                                                                <h2 style="color: #242424; font-size: 30px;"><b>
                                                                        <font style="vertical-align: inherit;">
                                                                            <font style="vertical-align: inherit;">Tu
                                                                                pedido
                                                                                ha sido confirmado!</font>
                                                                        </font>
                                                                    </b></h2>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="esd-block-text es-p10l" align="center"
                                                            style="padding-left:10px;padding-right:6px">
                                                            <p>
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">Hola
                                                                        {{ $info[0]->nombre }}, hemos
                                                                        recibido el pedido №
                                                                        0000{{ $info[0]->idPedido }}
                                                                        y estamos trabajando
                                                                        en él ahora. </font>
                                                                    <font style="vertical-align: inherit;">Le enviaremos
                                                                        una
                                                                        actualización por correo electrónico cuando la
                                                                        enviemos.</font>
                                                                </font>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="esd-structure es-p15t es-p10b es-p10r es-p10l"
                            style="background-color: #f8f8f8; padding-left:10px;padding-right:6px"
                            esd-general-paddings-checked="false" bgcolor="#f8f8f8" align="left">
                            <table width="100%" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td class="esd-container-frame" width="580" valign="top" align="center">
                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td class="esd-block-text" align="left">
                                                            <h2 style="color: #191919;">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">Productos
                                                                        Solicitados</font>
                                                                </font>
                                                            </h2>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        @php
                            $total = 0;
                            $discount = 0;
                        @endphp
                        <td class="esd-structure es-p25t es-p5b es-p20r es-p20l" esd-general-paddings-checked="false"
                            style="background-color: #f8f8f8;" bgcolor="#f8f8f8" align="left">
                            @foreach ($details as $index => $d)
                                <!--[if mso]><table width="560" cellpadding="0" cellspacing="0"><tr><td width="270" valign="top"><![endif]-->
                                <table class="es-left" cellspacing="0" cellpadding="0" align="left">
                                    <tbody>
                                        <tr>
                                            <td class="es-m-p20b esd-container-frame" width="270" align="left">
                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="esd-block-image" align="center"
                                                                style="font-size:0">
                                                                <a target="_blank" href="https://viewstripo.email/">
                                                                    {{--  @if ($d->image)
                                                                        <img class="adapt-img"
                                                                            src="{{ asset('storage/products/' . $d->image) }}">
                                                                    @else  --}}
                                                                        <img class="adapt-img"
                                                                            src="https://fotoaltacalidad.com/wp-content/uploads/2018/12/box.png" width="50%" style="margin-top:8px">
                                                                    {{--  @endif  --}}
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--[if mso]></td><td width="20"></td><td width="270" valign="top"><![endif]-->
                                <table class="es-right" cellspacing="0" cellpadding="0" align="right">
                                    <tbody>
                                        <tr>
                                            <td class="esd-container-frame" width="270" align="left">
                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="esd-block-text" align="left">
                                                                <p style="font-size: 16px;"><strong
                                                                        style="line-height: 150%;">
                                                                        <font style="vertical-align: inherit;">
                                                                            <font style="vertical-align: inherit;">
                                                                                {{ $d->nombre }}
                                                                            </font>
                                                                        </font>
                                                                    </strong></p>
                                                                <p><strong>Precio del artículo:</strong>&nbsp; S/.
                                                                    {{ number_format($d->precio, 2) }}</p>
                                                                <p><strong>Cantidad:</strong>&nbsp;
                                                                    {{ $d->cantidadPedida }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php $total += $d->cantidadPedida * $d->precio;
                                $discount += $d->descuento;
                                ?>
                                <!--[if mso]></td></tr></table><![endif]-->
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td class="esd-structure es-p10t es-p10b es-p10r es-p10l" style="background-color: #f8f8f8;"
                            esd-general-paddings-checked="false" bgcolor="#f8f8f8" align="left">
                            <table width="100%" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td class="esd-container-frame" width="580" valign="top" align="center">
                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td class="esd-block-spacer es-p20t es-p20b es-p10r es-p10l"
                                                            bgcolor="#f8f8f8" align="center" style="font-size:0">
                                                            <table width="100%" height="100%" cellspacing="0"
                                                                cellpadding="0" border="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style="border-bottom: 1px solid #191919; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; height: 1px; width: 100%; margin: 0px;">
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="esd-block-text es-p15b" align="center">
                                                            <table class="cke_show_border" width="240" height="101"
                                                                cellspacing="1" cellpadding="1" border="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td><strong>
                                                                                <font style="vertical-align: inherit;">
                                                                                    <font
                                                                                        style="vertical-align: inherit;">
                                                                                        Total parcial:</font>
                                                                                </font>
                                                                            </strong></td>
                                                                        <td style="text-align: right;">
                                                                            <font style="vertical-align: inherit;">
                                                                                <font style="vertical-align: inherit;">
                                                                                    S/.
                                                                                    {{ number_format($total, 2) }}
                                                                                </font>
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>
                                                                                <font style="vertical-align: inherit;">
                                                                                    <font
                                                                                        style="vertical-align: inherit;">
                                                                                        Descuentos:</font>
                                                                                </font>
                                                                            </strong></td>
                                                                        <td style="text-align: right;">
                                                                            <font style="vertical-align: inherit;">
                                                                                <font style="vertical-align: inherit;">
                                                                                    S/.
                                                                                    {{ number_format($discount, 2) }}
                                                                                </font>
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>
                                                                                <font style="vertical-align: inherit;">
                                                                                    <font
                                                                                        style="vertical-align: inherit;">
                                                                                        Impuesto de venta(18%):</font>
                                                                                </font>
                                                                            </strong></td>
                                                                        <td style="text-align: right;">
                                                                            <font style="vertical-align: inherit;">
                                                                                <font style="vertical-align: inherit;">
                                                                                    {{ number_format($total * 0.18, 2) }}
                                                                                </font>
                                                                            </font>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><span
                                                                                style="font-size: 18px; line-height: 200%;"><strong>
                                                                                    <font
                                                                                        style="vertical-align: inherit;">
                                                                                        <font
                                                                                            style="vertical-align: inherit;">
                                                                                            Total del pedido:</font>
                                                                                    </font>
                                                                                </strong></span></td>
                                                                        <td style="text-align: right;"><span
                                                                                style="font-size: 18px; line-height: 200%;"><strong>
                                                                                    <font
                                                                                        style="vertical-align: inherit;">
                                                                                        <font
                                                                                            style="vertical-align: inherit;">
                                                                                            {{ number_format($total + $total * 0.18, 2) }}
                                                                                        </font>
                                                                                    </font>
                                                                                </strong></span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="esd-structure es-p15t es-p10b es-p10r es-p10l" style="background-color: #eeeeee;"
                            esd-general-paddings-checked="false" bgcolor="#eeeeee" align="left">
                            <table width="100%" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td class="esd-container-frame" width="580" valign="top" align="center">
                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td class="esd-block-text" align="center">
                                                            <h2>Información de pedido y envío</h2>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="esd-structure es-p10t es-p30b es-p20r es-p20l" esd-general-paddings-checked="false"
                            style="background-color: #eeeeee;" bgcolor="#eeeeee" align="left">
                            <!--[if mso]><table width="560" cellpadding="0" cellspacing="0"><tr><td width="270" valign="top"><![endif]-->
                            <table class="es-left" cellspacing="0" cellpadding="0" align="left">
                                <tbody>
                                    <tr>
                                        <td class="es-m-p20b esd-container-frame" width="270" align="left">
                                            <table width="100%" cellspacing="0" cellpadding="0"
                                                style="padding-left:10px;padding-right:6px">
                                                <tbody>
                                                    <tr>
                                                        <td class="esd-block-text es-p10t es-p10b" align="left">
                                                            <h3 style="color: #242424;">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">Detalles del
                                                                        pedido</font>
                                                                </font>
                                                            </h3>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="esd-block-text" align="left">
                                                            <p><strong>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">Pedido №:
                                                                        </font>
                                                                    </font>
                                                                </strong>
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">
                                                                        {{ $info[0]->idPedido }}</font>
                                                                </font><br>
                                                            </p>
                                                            <p><strong>
                                                                    <font style="vertical-align: inherit;">
                                                                        <font style="vertical-align: inherit;">Fecha de
                                                                            pedido:</font>
                                                                    </font>
                                                                </strong>
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">
                                                                        {{ $info[0]->fecha }}
                                                                    </font>
                                                                </font>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--[if mso]></td><td width="20"></td><td width="270" valign="top"><![endif]-->
                            <table class="es-right" cellspacing="0" cellpadding="0" align="right">
                                <tbody>
                                    <tr>
                                        <td class="esd-container-frame" width="270" align="left">
                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td class="esd-block-text es-p10t es-p10b" align="left">
                                                            <h3 style="color: #242424;">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">Dirección de
                                                                        Envío</font>
                                                                </font>
                                                            </h3>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="esd-block-text" align="left">
                                                            <p>
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">
                                                                        {{ $info[0]->cliente }}
                                                                    </font>
                                                                </font><strong></strong>
                                                            </p>
                                                            <p>
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">
                                                                        {{ $info[0]->dni }}
                                                                    </font>
                                                                </font>
                                                            </p>
                                                            <p>
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">
                                                                        {{ $info[0]->direccion }}</font>
                                                                </font><br>
                                                            </p>
                                                            <p>
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">
                                                                        {{ $info[0]->email }}</font>
                                                                </font><br>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--[if mso]></td></tr></table><![endif]-->
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </center>

</body>

</html>
