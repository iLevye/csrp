<?

class User extends CI_Model {	
	public $user_manager_id;
	public $user_manager_mail;
	public $user_manager_password;
	public $user_manager_name;
	public $user_manager_username;
	public $user_manager_city;
	public $user_manager_country;

	function __construct() {
		parent::__construct();
	}


	public function create() {
		$this->db->insert('user_manager',$this);
		if($this->db->insert_id()) {
			$this->id=$this->db->insert_id();
			return true;
		}
	}

	public function login() {
		$this->db->where('user_manager_mail',$this->user_manager_mail);
		$this->db->where('user_manager_password',$this->user_manager_password);
		$this->db->select("user_manager_id");
		$sql=$this->db->get('user_manager');
		//echo $this->db->last_query();
		$row=$sql->result_array();
		if(intval(@$row[0]['user_manager_id'])) {
			$this->user_id=$row[0]['user_manager_id'];
			return true;
		}else{		
			return false;
		}
	}
	
	public function get_user($basic = true, $by = "user_manager_id") {

		if ($basic) {
		    $this->db->select("user_manager_id, user_manager_mail, user_manager_name, user_manager_city,user_manager_country");
		} else {
		    $this->db->select("user_manager.*, user_manager_name");
		    //$this->db->join('Department', 'user_department_id = department_id', "left");
		}

		if ($by == "user_id") {
		    $this->db->where('user_manager_id', $this->user_manager_id);
		} else {
		    $this->db->where('user_manager_mail', $this->user_manager_mail);
		}

		$sql = $this->db->get('user_manager');
		$row = $sql->result_array();

		//echo $this->db->last_query();
		foreach ($row[0] as $rk => $rv) {
		    $this->$rk = $rv;
		}

		unset($this->user_manager_password);
	    }
}


?>
