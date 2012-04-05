<?

class User extends CI_Model {	
	public $id;
	public $email;
	public $password;
	public $name;
	public $username;
	public $city;
	public $country;

	function __construct() {
		parent::__construct();
	}


	public function create() {
		$this->db->insert('User',$this);
		if($this->db->insert_id()) {
			$this->id=$this->db->insert_id();
			return true;
		}
	}

	public function login() {
		$this->db->where('email', $this->email);
		$this->db->where('password',$this->password);
		$this->db->select("id");
		$sql=$this->db->get('User');
		//echo $this->db->last_query();
		$row=$sql->result_array();
		if(intval(@$row[0]['id'])) {
			$this->id = $row[0]['id'];
			return true;
		}else{		
			return false;
		}
	}
	
	public function get_user($basic = true, $by = "id") {

		if ($basic) {
		    $this->db->select("id, email, name, city, country");
		} else {
		    $this->db->select("User.*");
		    //$this->db->join('Department', 'user_department_id = department_id', "left");
		}

		if ($by == "id") {
		    $this->db->where('id', $this->id);
		} else {
		    $this->db->where('email', $this->email);
		}

		$sql = $this->db->get('User');
		$row = $sql->result_array();

		//echo $this->db->last_query();
		foreach ($row[0] as $rk => $rv) {
		    $this->$rk = $rv;
		}

		unset($this->password);
	    }
}


?>
