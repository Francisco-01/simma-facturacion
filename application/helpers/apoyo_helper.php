<?php
function Today()
{
	$fecha=getdate();
	return $fecha["year"]."-".($fecha["mon"]<10?0:"").$fecha["mon"]."-".($fecha["mday"]<10?0:"").$fecha["mday"];
}
function Hoy()
{
	return DateToMx(Today());
}
function DateToMySQL($fecha)
{
	if(strlen($fecha)==10)
		return substr($fecha,6,4)."-".substr($fecha,3,2)."-".substr($fecha,0,2);
	return "";
}
function DateToMx($fecha)
{
	if(strlen($fecha)==10)
		return substr($fecha,8,2)."/".substr($fecha,5,2)."/".substr($fecha,0,4);
	return "";
}
function AddDays($fecha,$dias)
{
	$fecha=date_create($fecha);
	date_add($fecha, date_interval_create_from_date_string($dias.' days'));
	return date_format($fecha, 'Y-m-d');
}
function Refill($dato,$largo,$relleno,$rellenaXIzquierda=true)
{
	while(strlen($dato)<$largo)
	{
		if($rellenaXIzquierda)
			$dato=$relleno.$dato;
		else
			$dato.=$relleno;
	}
	return $dato;
}
function Day($fecha) { return substr($fecha,8,2); }
function Month($fecha) { return substr($fecha,5,2); }
function Year($fecha) { return substr($fecha,0,4); }
function MonthYear($fecha) { return substr($fecha,0,4)."-".substr($fecha,5,2); }
function NextMonthYear($fecha)
{
	if(Month($fecha)=="12")
		return (intval(Year($fecha))+1)."-01";
	return Year($fecha)."-".((intval(Month($fecha))+1)<10?"0":"").(intval(Month($fecha))+1);
}
function ReplaceMonth($cadena)
{
	$currMonth=getdate(date_create()->getTimestamp())["month"];
	$currMonth_1=getdate(date_add(date_create(),date_interval_create_from_date_string("-1 month"))->getTimestamp())["month"];
	$currMonth_2=getdate(date_add(date_create(),date_interval_create_from_date_string("-2 month"))->getTimestamp())["month"];
	$currMonth_3=getdate(date_add(date_create(),date_interval_create_from_date_string("-3 month"))->getTimestamp())["month"];
	$mesesRee=array($currMonth,		$currMonth_1,	$currMonth_2,	$currMonth_3);
	$mesesAnt=array("_CURR_MONTH_",	"_MONTH-1_",	"_MONTH-2_",	"_MONTH-3_");
	$cadena=str_replace($mesesAnt,$mesesRee,$cadena);
	$mes=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	$month=array("January","February","March","April","May","June","July","August","September","October","November","December");
	$cadena=str_replace($month,$mes,$cadena);
	return $cadena;
}
function OrdenaResiduosCaptura( $r1, $r2 ) {
	/**
	* Cada Manifiesto dado por:
	* 
	* array (size=2)
      'residuo' => 
        array (size=11)
          'idresiduo' => string '42' (length=2)
          'nombre' => string 'Porron de Solventes' (length=19)
          'nom052' => string 'RI' (length=2)
          'C' => string '0' (length=1)
          'R' => string '0' (length=1)
          'E' => string '0' (length=1)
          'T' => string '0' (length=1)
          'I' => string '0' (length=1)
          'B' => string '0' (length=1)
          'reportecoa' => string '0' (length=1)
          'tiporesiduo' => string '99' (length=2)
          'idcatalogo' => string '14' (length=2)
          'idopcion' => string '99' (length=2)
          'catalogo' => string 'Tipo de Residuo' (length=15)
          'opcion' => string 'RP' (length=2)
      'recoleccion' => boolean false
	*/
	if( $r1[ 'residuo' ][ 'tiporesiduo' ] == $r2[ 'residuo' ][ 'tiporesiduo' ] ) {
		if( $r1[ 'residuo'][ 'idresiduo' ] == $r2[ 'residuo'][ 'idresiduo' ] ) {
			return 0;
		} else {
			return ( $r1[ 'residuo' ][ 'nombre' ] < $r2[ 'residuo' ][ 'nombre' ] ? -1 : 1 );
		}
	} else {
		return ( $r1[ 'residuo' ][ 'opcion' ] < $r2[ 'residuo' ][ 'opcion' ] ? -1 : 1 );
	}
}
?>