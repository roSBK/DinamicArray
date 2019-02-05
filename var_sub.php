<?php
/*==============================================
 * @Autor: Romulo de Sousa Mangueira
 * @GitHub: https://github.com/roSBK
 * @Descriзгo: Criaзгo de Array Dinвmicos em PHP
 *----------------------------------------------*/
 
// @set_sub
//	Setar uma array dinвmico com mъtiplos Нndices
//
// Sintaxe:
//	set_sub(&var, 'index', 'value');
//
// Exemplo:
//	$var = array();
//	set_sub($var, 'personal name', 'Joгo');
//	set_sub($var, 'personal lastname', 'da Silva');
//	set_sub($var, 'personal birthdate', '03-07-1989');
//	set_sub($var, 'personal age', 30);
//	print_r($var);
//
function set_sub(&$var, $index, $value)
{
	// Empty Index or Array
	if( empty($index) )
		return false;
	
	$start = $end = "";
	$offset = explode(" ", $index);
	for( $i=0; $i < count($offset); $i++ )
	{
		$offset[$i] = preg_replace("/[^0-9-a-zA-Z_]/", "", $offset[$i]);
		$start .= "{\"{$offset[$i]}\":";
		$end .= "}";
	}
	
	$value = utf8_encode($value);
	if( is_array($value) )
		$value = json_encode($value);
		
	$arr = json_decode($start. "\"" . $value . "\"" . $end,true);
	
	self::utf8_decode_deep($arr);
	$var = self::array_merge_recursive_distinct($var,$arr);
	return true;
}

// @get_sub
//	Obter uma valor dinвmico com mъltiplos Нndices
//
// Sintaxe:
//	get_sub(var, 'index', 'default value');
//
// Exemplo:
//	$var = array();
//	set_sub($var, 'personal name', 'Joгo');
//	set_sub($var, 'personal lastname', 'da Silva');
//	set_sub($var, 'personal gender', 'Masculino');
//	set_sub($var, 'personal birthdate', '03-07-1989');
//	set_sub($var, 'personal age', 30);
//
//	$all = get_sub($var, 'personal', '');
//	$name = get_sub($var, 'personal name', '');
//	$lastname = get_sub($var, 'personal lastname', '');
//	$gender = get_sub($var, 'personal gender', '');
//	$birthdate = get_sub($var, 'personal birthdate', '');
//	$age = get_sub($var, 'personal age', '');
//
//	print_r($all);
//	echo sprintf("Value: %s, %s, %s, %s, %s", $name, $lastname, $gender, $birthdate, $age);
//
function get_sub($var, $index, $default = null)
{
	// Empty Index
	if( empty($index) )
		return $default;
	
	$offset = explode(" ", $index);
	$value = $var;
	for( $i=0; $i < count($offset); $i++ )
		$value = @$value{$offset[$i]};
	
	if( !is_array($value) && strlen($value) > 0 )
		return $value;
	else if( is_array($value) )
		return $value;
	
	return $default;
}
 ?>