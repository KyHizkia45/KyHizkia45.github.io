<?php defined("BASEPATH") or exit();

class Insert extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("admin/insert_model", "i");
	}

	private function buku($post) {
		$post = $this->corelib->escape($post);
		$post['harga_pokok'] = preg_replace("/\D/", "", $post['harga_pokok']);
		$post['harga_jual'] = preg_replace("/\D/", "", $post['harga_jual']);
		$post['idbuku'] = Corelib::rand_text_generator();
		$post['tahun'] = date("Y-m-d H:i:s");

		return $this->i->buku($post);
	}

	private function penerbit($post) {
		$post = $this->corelib->escape($post);
		$post['id_penerbit'] = Corelib::rand_text_generator();

		return $this->i->penerbit($post);
	}

	private function penjualan($post) {
		$post = $this->corelib->escape($post);
		$post['harga_jual'] = preg_replace("/\D/", "", $post['harga_jual']);

		return $this->i->penjualan($post);
	}

	private function pasok($post) {
		$post = $this->corelib->escape($post);
		$post['harga_pokok'] = preg_replace("/\D/", "", $post['harga_pokok']);
		$post['harga_jual'] = preg_replace("/\D/", "", $post['harga_jual']);

		return $this->i->pasok($post);
	}

	public function touch($func) {
		switch($func) {
			case "buku" :
				echo self::buku($_POST);
				break;
			case "penerbit" :
				echo self::penerbit($_POST);
				break;
			case "penjualan" :
				echo self::penjualan($_POST);
				break;
		}
	}

}

?>