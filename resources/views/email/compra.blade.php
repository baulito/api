<div style="background: #1e2b47; padding: 40px; text-align: center;">
    <div style="color:#666;background: #FFF; padding: 20px; text-align: center; border-radius:0.5em; display: inline-block; width: 800px">
        <h2 style="color:#00CCFF">Gracias por su compra</h2>
        <div>
            <div style="font-weight:900; color:#0cf; font-size:20px;">Comprobante de compra No. <?php echo  $data['detallecarro']->negocio_compra_id; ?>   </div>
			<div style="color:#FFF; font-size:16px; margin-top:10px;"> Fecha de compra <?php echo  $data['detallecarro']->negocio_compra_fecha; ?></div>
            <h3>Información de Envio</h3>
            <table width="100%;" style="font-size: 14px;">
                <tr>
                    <td>
                        <strong>Nombre:</strong> <?php echo  $data['detallecarro']->negocio_compra_nombre; ?>
                    </td>
                    <td>
                        <strong>Correo:</strong> <?php echo  $data['detallecarro']->negocio_compra_correo; ?>
                    </td>
                    <td>
                        <strong>Telefono:</strong> <?php echo  $data['detallecarro']->negocio_compra_telefono; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Celular:</strong> <?php echo  $data['detallecarro']->negocio_compra_celular; ?>
                    </td>
                    <td colspan="2">
                        <strong>Direccion:</strong> <?php echo  $data['detallecarro']->negocio_compra_direccion; ?>, <?php echo  $data['detallecarro']->negocio_compra_ciudad; ?>,<?php echo  $data['detallecarro']->negocio_compra_pais; ?>
                    </td>
                </tr>
            </table>
            <H3>Información de compra</H3>
            <div>
                <table cellpadding="3"  cellspacing="0" border="1" bordercolor="#021930" width="100%" style="font-size: 12px;">
                    <tr style="color: #FFFFFF; background: #021930;">
                        <td></td>
                        <td name="producto" >Producto</td>
                        <td align="center">Cantidad</td>
                        <td align="center">Vlr. Unit</td>
                        <td align="center">Vlr. Total</td>
                    </tr>
                    <?php $valortotal = 0; ?>
                    <?php foreach ($data['itemscarrito'] as $key => $item): ?>
                        <tr >
                            <td>
                                <div align="center">
                                    <img src="https://togroow.com/images/<?php echo $item->negocio_compra_item_imagen; ?>" style="max-width: 80px; max-height: 80px;">
                                </div>
                            </td>
                            <td><?php echo $item->negocio_compra_item_nombre; ?></td>
                            <td align="center"><?php echo $item->negocio_compra_item_cantidad; ?></td>
                            <td align="right">$
                                <?php echo number_format($item->negocio_compra_item_valor); ?>
                                <?php $valor = $item->negocio_compra_item_valor * $item->negocio_compra_item_cantidad; ?>
                            </td>
                            <td align="right">$ <?php echo number_format($valor); ?></td>
                        </tr>
                        <?php $valortotal = $valortotal + $valor; ?>
                    <?php endforeach ?>
                    <tr bgcolor="#021930">
                        <td colspan="4" align="right" style="color: #FFFFFF"  >Sub Total</td>
                        <td ><div style="background: #FFFFFF; padding: 5px;" align="right">$<?php echo number_format( $data['detallecarro']->negocio_compra_subtotal); ?></div></td>
                    </tr>
                    <tr bgcolor="#021930">
                        <td colspan="4" align="right" style="color: #FFFFFF"  >Envio</td>
                        <td ><div style="background: #FFFFFF; padding: 5px;" align="right">$<?php echo number_format( $data['detallecarro']->negocio_compra_valor_envio); ?></div></td>
                    </tr>
                    <tr bgcolor="#021930">
                        <td colspan="4" align="right" style="color: #FFFFFF"  >Total</td>
                        <td ><div style="background: #FFFFFF; padding: 5px; " align="right">$<?php echo number_format( $data['detallecarro']->negocio_compra_valor); ?></div></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>