update cliente 
	set 
		cfdi_metodopago = 130, cfdi_formapago = 127, correo = representanteemail, 
        cfdi_impuesto = 128, cfdi_moneda = 131, cfdi_base = 0.16, 
        cfdi_tasaocuota = 134, cfdi_tipofactor = 135, cfdi_usocfdi = 138;
        
update catalogodet set descripcion = '01 - RPBI' where idcatalogodet = 98;
update catalogodet set descripcion = '02 - RP' where idcatalogodet = 99;

ALTER TABLE manifiesto ADD fecha_captura DATETIME NULL , ADD capturista VARCHAR(250) NULL ;
