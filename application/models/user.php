<?

class User extends CI_Model {	
	public $id;
	public $email;
	public $password;
	public $name;
	public $nick;
	public $username;
	public $city_id;
	public $clan_id;
	public $active;

	/*
		function create()
		yeni kullanıcı oluşturur. 
		id dışında tüm özellikler set edilmelidir.
		id yi set eder.
		true ya da false döner
	*/
	public function create() {
		$this->db->insert('User',$this);
		if($this->db->insert_id()) {
			$this->id = $this->db->insert_id();
			return true;
		}else{
			return false;
		}
	}

	/*
		function login()
		email ve md5(password) set edilmelidir. kullanıcı id sini set eder.
		active = 1 olan kullanıcı için çalışır.
		true veya false döner
	*/
	public function login() {
		$this->db->where('email', $this->email);
		$this->db->where('password',$this->password);
		$this->db->where('active', '1');
		$this->db->select("id");
		$sql=$this->db->get('User');
		//echo $this->db->last_query();
		$row=$sql->result_array();
		if(intval(@$row[0]['id'])) {
			$this->id = $row[0]['id'];
			$this->last_login();
			return true;
		}else{		
			return false;
		}
	}


	/*
		function last_login()
		id si set edilen kullanıcının last_login bilgisini şuan yapar.
	*/
	private function last_login(){
		$this->db->query("UPDATE User set last_login = NOW() where id = '" . $this->id . "'");
	}
	
	/*
		function get_user($basic = true, $by = id)
		basic=true için sadece id, eposta, nick döner
		by = id için id set edilmelidir
		by = email için email set edilmelidir.
		active = 1 olanlar döner
	*/
	public function get_user($basic = true, $by = "id") {

		if ($basic) {
		    $this->db->select("id, User.email, User.nick");
		} else {
		    $this->db->select("User.*, City.name as city_name, Country.name as country_name");
		    $this->db->join('City', 'City.id = User.city_id', "left");
		    $this->db->join('Country', 'Country.id = City.country_id', "left");
		    $this->db->join('Clan', 'Clan.id = User.clan_id', "left");
		}

		if ($by == "id") {
		    $this->db->where('id', $this->id);
		} else {
		    $this->db->where('email', $this->email);
		}

		$this->db->where('active', "1");

		$sql = $this->db->get('User');
		$row = $sql->result_array();

		//echo $this->db->last_query();
		foreach ($row[0] as $rk => $rv) {
		    $this->$rk = $rv;
		}

		unset($this->password);
	}

	/*
		function get_list()
		active = 1 olan kullanıcıları listeler
	*/
	public function get_list(){
		$this->db->select("Clan.name as clan_name, User.last_login, User.nick, City.name as city_name, Country.name as country_name");
	    $this->db->join('City', 'City.id = User.city_id', "left");
	    $this->db->join('Country', 'Country.id = City.country_id', "left");
	    $this->db->join('Clan', 'Clan.id = User.clan_id', "left");

		$this->db->where("active", 1);
		$sql = $this->db->get("User");
		return $sql->result_array();
	}
}


?>
