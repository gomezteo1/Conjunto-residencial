<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
    <thead>
        <tr>
            <td><b>#</b></td>
            <td><b>#Cuenta</b></td>
            <td><b>Nit</b></td>
            <td><b>Usuario</b></td>
            <td><b>Inmueble</b></td>
            <td><b>Mes-valor</b></td>
            <td><b>Fecha</b></td>
            <td><b>Mora</b></td>
            <td><b>Monto por cancelar</b></td>
            <td><b>Estado</b></td>
            <td colspan="2" align="center"><b>Acciones</b></td>
        </tr>
    </thead>
    <?php foreach ($cuenta_cobros as $cuenta_cobro){?>
        <tbody>
            <tr>
            <td><?php echo $cuenta_cobro->codigo_cuenta_cobro; ?></td>
            <td><?php echo $cuenta_cobro->numero_cuenta; ?></td>
            <td><?php echo $cuenta_cobro->nit; ?></td>
            <td><?php echo $cuenta_cobro->nombreUsuario;?></td>
            <td><?php echo $cuenta_cobro->nombreInmueble; ?></td>
            <td><?php echo $cuenta_cobro->nombreMes; ?></td>
            <td><?php echo $cuenta_cobro->fecha; ?></td>
            <td><?php echo $cuenta_cobro->porMora; ?></td>
            <td><?php echo $cuenta_cobro->monto_por_cancelar; ?></td>
            <td><?php echo $cuenta_cobro->estado==1?'Pagado':'Sin Pagar'; ?></td>
                
                <td><a href="?controller=cuenta_cobro&action=formulario_modificar&codigo_cuenta_cobro=<?php echo $cuenta_cobro->codigo_cuenta_cobro?> "class="btn btn-secondary">Actualizar</a></td>
                <td>
                    <input <?php echo $cuenta_cobro->estado==1 ? "checked" : "" ?> onchange="prueba_cc(this)" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" name="status" id="<?php echo $cuenta_cobro->codigo_cuenta_cobro ?>">
                </td>
                <!-- <td><a href="?controller=cuenta_cobro&action=eliminar_cuenta_cobro&codigo_cuenta_cobro=<?php echo $cuenta_cobro->codigo_cuenta_cobro ?>"class="btn btn-danger">Eliminar</a></td> -->
                <td scope="col"><a class="btn btn-success" target="_blank" href="?controller=reportec&action=index&codigo_cuenta_cobro=<?php echo $cuenta_cobro->codigo_cuenta_cobro ?>">Ver</a> </td>
            </tr>
        </tbody>			
        <?php } ?>
</table>