<?
Class Country extends CI_Model{
	public $id;
	public $name;

	/*
		ülke listesini verir
	*/
	function get_list(){
		$sql = $this->db->get("Country");
		return $sql->result_array();
	}
}
?>