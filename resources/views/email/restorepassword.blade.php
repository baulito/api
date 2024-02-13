<div style="background: #1e2b47; padding: 40px; text-align: center;">
    <div style="color:#666;background: #FFF; padding: 20px; text-align: center; border-radius:0.5em; display: inline-block; width: 500px">
        <h2 style="color:#00CCFF">OLVIDASTE TU CONTRASEÑA</h2>
        <h3 style="color:#00CCFF">Hola, <?php echo $data->user_names." ".$data->user_lasnames; ?></h3>
        <div style="border-top:1px #CCCCCC solid;"></div><br>
        <div>Usted recibi&oacute; este correo debido a que olvido su contrase&ntilde;a .</div>
        <div>el codigo para cambiar la contraseña es: </div><br />
        <div style="color: #1e2b477; font-size:40px; font-weight:bold;"><?php echo $data->user_code ?></div>
    </div>
</div>