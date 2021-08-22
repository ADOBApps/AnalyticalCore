<?php
/*******************************************************************************
* Phpconcept Library - ADOB File Manager                                       *
* This file content the class an it methods for manager file                   *
* DON'T MODIFY THIS FILE                                                       *
* Version: 1.0                                                                 *
* Date:    2021-08-06                                                          *
* Author:   ACXEL DAVID OROZCO BALDOMERO                                       *
*******************************************************************************/

define("Error_111", "TYPE OPERATION UNVALIDATED", true);
define("Error_112", "ERROR FILE COULDN'T CREATE", true);
define("Error_113", "ERROR FILE COULDN'T WRITE", true);
define("Error_114", "ERROR FILE COULDN'T READ", true);
define("Error_115", "ERROR NOT DIR", true);

class ADOB_FM{
	// ----- Filename of the document file
	var $filename = '';

	// ----- File descriptor of the document file
	var $file_fd = 0;


/* {[()]} */
	public function getTypeInfo ($type){
		if (type == "To_dir_final"){
			echo "Function for last-line write; call composed by Tofinal($Dir, $file, $contents)";
		} else if (type == "Tofinal"){
			echo "Function for last-line write; call composed by Tofinal1($fopen_ready, $contents)";
		} else if (type == "NW_dir_file"){
			echo "Function for simple write; call composed by NWfile($Dir, $file, $contents)";
		} else if (type == "NWfile"){
			echo "Function for simple write; call composed by NWfile($fileopen_ready, $contents)";
		} else if (type == "read_dir_eline"){
			echo "Function for last-line read; call composed by read_eline ($Dir, $file)";
		} else if (type == "read_eline"){
			echo "Function for last-line read; call composed by read_eline1($url_step_ready)";
		} else if (type == "write_init"){
			echo "Function must write the beginning of file; call composed by write_init($fname, $data, $flag)... $flag=  LOCK_SH | LOCK_UN | LOCK_EX";
		} else if (type == "write_commin_init"){
			echo "Function must write the beginning of file; call composed by write_init($fname, $data, $flag, $fname_aux)... $flag=  LOCK_SH | LOCK_UN | LOCK_EX";
		} else {
			echo error_111;
		}
	} 
/* {[()]} */


/* {[()]} */
	public function To_dir_final ($Dir, $file, $contents){
		$write = false;
		if($file_user = fopen("$Dir/$file.adob", "w+")){
			if (fputs($file_user, $contents)){
				return true;
				fclose($file_user);
			} else{
				echo Error_113;
			}
		} else{
			echo error_112;
		}
		return $write;
	}
/* {[()]} */

/* {[()]} */
	public function Tofinal ($file_fedit,  $contents){
		$write = false;
		if(fputs($file_fedit, $contents)){
			return true;
			fclose($file_fedit);
		} else{
			echo error_113;
		}
		return $write;
	}
/* {[()]} */

/* {[()]} */
	public function read_dir_eline($ary, $file){
		$linea = "";
		if (is_dir($ary)){
			$ary_ufile = $ary + "/" + $file;
			if (file_exists($ary_ufile) && is_file($ary_ufile) && is_readable($ary_ufile)){
				$fd_file_user = fopen($ary_ufile, "r+");
				while(!feof($fd_file_user)) {
					$linea = fgets($fd_file_user);
					return $linea;
				} 
				fclose($fd_file_user);
			} else {
				echo error_114;
			}
		} else {
			echo error_115;
		}
	}
/* {[()]} */

/* {[()]} */
	public function read_eline($step_ready){
		$linea = "";
		if (file_exists($step_ready) && is_file($step_ready) && is_readable($step_ready)){
			$fd_file_user = fopen($step_ready, "r+");
			while(!feof($fd_file_user)) {
				$linea = fgets($fd_file_user);
				return $linea;
			} 
			fclose($fd_file_user);
		} else {
			echo error_114;
		}
	}
/* {[()]} */


/* {[()]} */
	public function NW_dir_file($Dir, $file, $contents){
		$created = false;
		$fileuser=fopen("$Dir/$file.adob", "w+");
		if(fwrite($fileuser, $contents)){
			return true;
		}
		else{
			return false;
		}
		fclose($fileuser);
		return $created;
	}
/* {[()]} */

/* {[()]} */
	public function NWfile($file_edit, $contents){
		$created = false;
		if(fwrite($file_edit, $contents)){
			return true;
		}
		else{
			return false;
		}
		fclose($fileuser);
		return $created;
	}

/* {[()]} */

/* {[()]} */
public function Rand_name($p_name){
	$_date = date('m-d-Y_h:i:s_a', time());
	if ( $p_name !== null ) {
		return $name = $p_name.$_date.".json";
	} else {
		return $name = $_date;
	}
}
/* {[()]} */


/* {[()]} */
	public function mkJson($_dir, $file_name, $contents, $flag){
		//$flag  FILE_USER_INCLUDE_PATH | FILE_APPEND | LOCK_EX
		$created = false;
		$json_data = json_encode($contents);
		if ( file_put_contents($_dir."/".$file_name, $json_data, $flag) ) {
			return true;
		} else {
			return false;
		}		
		return $created;
	}
/* {[()]} */

/* {[()]} */
	public function adob_write($fname, $data, $flag){
		//$flag  FILE_USER_INCLUDE_PATH | FILE_APPEND | LOCK_EX
		$a_w = false;
		if( (file_put_contents($fname, $data, $flag)) ){
			return true;
		} else{
			return false;
		}
		return $a_w;
	}
/* {[()]} */
	
/* {[()]} */
	public function write_common_init($fname, $fname_aux, $data, $flag){
		//$flag  FILE_USER_INCLUDE_PATH | FILE_APPEND | LOCK_EX
		$a_w = false;

		//$fname_aux = "rsrc/gatox/container/1/footaux.txt";
		$temp = fopen($fname_aux, "w+");
		$tempfile = file_get_contents($fname);
		fwrite($temp, ("") );
		fwrite($temp, ($tempfile) );
		fclose($temp);
		$awb1 = fopen($fname, "w+");

		if ( fwrite($awb1, $data) && ($n1= file_get_contents($fname_aux)) ){
			if( (file_put_contents($fname, ($n1), $flag)) !== false){
				return true;
			} else{
				return false;
			}
		} else{
			return false;
		}

		return $a_w;
	}
/* {[()]} */


/* {(#Is necessary the correct pathdir)} */
	public function delete($pf){
		$bool_vr = false;
		
		if( file_exists($pf) && is_file($pf) ){
			if (unlink($pf)){
				$bool_vr=true;
				return true;
			}
		} else {
			return false;
		}
		return $bool_vr;
	}
/* {()} */

/* {[()]} */
	public function rmdir_full($carpeta){
		$b_rf=false;
		foreach(glob($carpeta . "/*") as $archivos_carpeta){
			if (is_dir($archivos_carpeta)){
				self::rmdir_full($archivos_carpeta);
			} else {
				unlink($archivos_carpeta);
			}
		}
		
		if( rmdir($carpeta) ){
			return true;
		} else {
			return false;
		}
		
		return $b_rf;
	}
/* {[()]} */

/* {[(		//$files = glob('$dir/*.jpg');)]} */
	public function ToEmpty($dir, $ext){
		$b_e=true;
		$files = glob($dir."/*."."$ext");
		foreach($files as $file){
			if(is_file($file)){
				if(unlink($file)){
				} else{
					return false;
				}
			} else {
			}
		}
		return $b_e;
	}
/* {[()]} */

/* <  /> */
}

?>
