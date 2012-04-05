<?
Class City extends CI_Model{
	public $id;
	public $name;
	public $country_id;

	/*
		function get_list()
		city listesi döner
	*/
	function get_list(){
		$sql = $this->db->get("City");
		return $sql->result_array();
	}
}
?>