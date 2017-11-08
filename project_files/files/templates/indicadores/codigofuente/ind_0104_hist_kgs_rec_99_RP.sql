# Historio de Kilogramos Reportados (99 - RP)
# Line

SELECT CONCAT(MONTHNAME(fecha),', ',YEAR(fecha)) AS Item,SUM(cantidad) AS Cantidad
FROM manifiesto AS man 
	INNER JOIN relgenman USING(idmanifiesto) 
	INNER JOIN generador AS gen USING(idgenerador) 
	INNER JOIN relmanrec USING(idmanifiesto) 
	INNER JOIN recoleccion USING(idrecoleccion)
	INNER JOIN relresrec USING(idrecoleccion) 
	INNER JOIN residuo AS res USING(idresiduo)
__WHR__ 
	AND fecha <= CURDATE()
	AND fecha >= CONCAT(YEAR(ADDDATE(CURDATE(),INTERVAL -6 MONTH)),'-',IF(MONTH(ADDDATE(CURDATE(),INTERVAL -6 MONTH))<10,'0',''),MONTH(ADDDATE(CURDATE(),INTERVAL -6 MONTH)),'-01')
	AND tiporesiduo = 99
GROUP BY CONCAT(MONTHNAME(fecha),', ',YEAR(fecha))
ORDER BY FECHA ASC