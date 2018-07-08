<?php
 require_once("Database.php");
class Client {
   private static $base ;
	/** @var string ID */
	public $idclient=0;
	public $nom="";
	public $prenom="";

	public function __construct($idclient,$nom,$prenom) {
		$this->idclient=$idclient;
		$this->nom=$nom;
		$this->prenom=$prenom;
	}
	
	static function findBykey($key){
		self::$base=new Database();
		$tab=array();
		
	  $tab=self::populate(self::$base->query("select * from `client` WHERE `idclient`=".$key));
	  if($key==0 || count($tab)==0)$tab[]=new Client(0,'','');
	  return $tab[0];
		
	}
	 function findByValue(){
	  self::$base = new Database(); //instantiate this class to open data base
	  $string1 ="select * from `client`";
	  $string="";
	  if($this->idclient!=0)$string =$string." AND `idclient`=".$this->idclient;
	  if($this->nom!="")$string =$string." AND `nom`='".$this->nom."'";
	  if($this->prenom!="")$string =$string." AND `prenom`='".$this->prenom."'";
	  $string1=$string1.preg_replace('/AND/', 'WHERE', $string, 1);
	  return self::populate(self::$base->query($string1));
	}
	static function findAll(){
	  self::$base=new Database();
	  return self::populate(self::$base->query("select * from `client`"));
	}
	static function populate($resutset){
	    $clients=array();
		$i=0;
	  foreach ($resutset as $row) {
				$clients[$i]=new Client($row['IDCLIENT'],$row['NOM'],$row['PRENOM']);		
			$i++;				
        }
		self::$base =null;
		return $clients;
	}
	function creer(){
	self::$base = new Database(); //instantiate this class to open data base
	 $values = array(
	            'idclient' => $this->idclient,
				'nom' => $this->nom,
				'prenom' => $this->prenom);
         self::$base->insert("client", $values);
     self::$base = null;		 
	}
	public function delete(){
	self::$base = new Database(); //instantiate this class to open data base
	self::$base->delete('client', 'idclient', $this->idclient);
	self::$base = null;
	}
	public function update(){
	self::$base = new Database(); //instantiate this class to open data base
	 $values = array(
	            'idclient' => $this->idclient,
				'nom' => $this->nom,
				'prenom' => $this->prenom);
		self::$base->update('client', $values, 'idclient', $this->idclient);
		self::$base =null;
	}
	
	
}

?>