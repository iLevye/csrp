<?
Class Clan extends CI_Model{
	public $id;
	public $name;
	public $founder_id; // User.id ile ilişkili
	public $country_id; // Country.id ile ilişkili
	public $deleted; // silinmiş için 1

	/*
		function create()
		clan oluşturmaya yarar. 
		deleted ve id dışındaki tüm özellikler set edilmelidir.
		inserted id döner
	*/

	public function create(){
		$this->deleted = 0;
		if(!empty($this->id) || empty($this->name) || empty($this->founder_id) || empty($this->country_id)){
			return false;
		}
		$this->db->insert("Clan", $this);
		return $this->db->insert_id();
	}

	/*
		function delete()
		clan silmeye yarar.
		yalnızca clan id gönderilmelidir.
		1 ya da 0 döner
	*/
	public function delete(){
		$update['deleted'] = 1;
		if(empty($this->id)){
			return false;
		}
		$this->db->where("id", $this->id);
		$this->db->update("Clan", $update);
		return $this->db->affected_rows();
	}


	/*
		function get_founder($username)
		clan id set edilmelidir.
		kurucusunun id sini döndürür.
		$username = true için founder ismini de döndürür.
	*/
	public function get_founder($username = false){
		if($this->username){
			$this->db->select("founder_id, User.name");
			$this->db->join("User", "User.id = Clan.founder_id", "left");
		}else{
			$this->db->select("founder_id");
		}

		$this->db->where("Clan.id", $this->id);
		$this->db->where("Clan.deleted", 0);
		$this->db->get("Clan");
	}


	/*
		function get_clan_detail()
		clan id set edilmelidir.
		klanın tüm bilgilerini döndürür
	*/
	public function get_clan_detail(){
		$this->db->where("Clan.id", $this->id);
		$this->db->where("Clan.deleted", 0);
		$this->db->select("Clan.*, User.name as founder_name, Country.name");
		$this->db->join("User", "User.id = Clan.founder_id", "left");
		$this->db->join("Country", "Country.id = Clan.country_id", "left");
		$sql = $this->db->get("Clan");
		$row = $sql->result_array();
		return $row[0];
	}


	/*
		function get_list($limit1 = 0, $limit2 = 10)
		clan listesini verir. 
	*/
	public function get_list($limit1 = 0, $limit2 = 10){
		$this->db->where("deleted", 0);
		$this->db->select("Clan.id, Clan.name, Clan.country_id, Country.name as country_name");
		$this->db->join("Country", "Country.id = Clan.country_id", "left");
		$this->db->limit($limit2, $limit1); // codeigniter da ters yazılıyor limitler.
		$sql = $this->db->get("Clan");
		return $sql->result_array();
	}
}
?>