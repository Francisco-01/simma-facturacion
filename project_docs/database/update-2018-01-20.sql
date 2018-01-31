ALTER TABLE `facturacion` ADD `unidad` BIGINT NULL AFTER `kiloexcedido`;

UPDATE facturacion SET unidad = 145 WHERE tipocobro = 27;
UPDATE facturacion SET unidad = 145 WHERE tipocobro = 28;
UPDATE facturacion SET unidad = 146 WHERE tipocobro = 29;
UPDATE facturacion SET unidad = 147 WHERE tipocobro = 30;
UPDATE facturacion SET unidad = 148 WHERE tipocobro = 31;
UPDATE facturacion SET unidad = 145 WHERE tipocobro = 92;
UPDATE facturacion SET unidad = 145 WHERE tipocobro = 93;
