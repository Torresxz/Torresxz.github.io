<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."/libraries/FPDF/fpdf.php";
class CI_PDF extends FPDF{

	function __construct(){
		parent::__construct();
	}

	public function header(){

	}
	public function footer(){
		
	}
}
