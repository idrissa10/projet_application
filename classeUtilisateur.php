<?php
 require_once("Database.php");
class Utilisateur {
   private static $base ;
	/** @var string ID */
	public $idU=0;
	public $nom="";
	public $prenom="";
	public $login="";
	public $ddn="";
	public $sex="";
	public $mdp="";

	public function __construct($idU,$nom,$prenom,$login,$ddn,$sex,$mdp) {
		$this->idU=$idU;
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->login=$login;
		$this->ddn=$ddn;
		$this->sex=$sex;
		$this->mdp=$mdp;
	}
	
	static function findBykey($key){
		self::$base=new Database();
		$tab=array();
		
	  $tab=self::populate(self::$base->query("select * from `utilisateur` WHERE `idU`=".$key));
	  if($key==0 || count($tab)==0)$tab[]=new utilisateur(0,'','','','','','');
	  return $tab[0];
		
	}
	 function findByValue(){
	  self::$base = new Database(); //instantiate this class to open data base
	  $string1 ="select * from `utilisateur`";
	  $string="";
	  if($this->idU!=0)$string =$string." AND `idU`=".$this->idU;
	  if($this->nom!="")$string =$string." AND `nom`='".$this->nom."'";
	  if($this->prenom!=0)$string =$string." AND `prenom`=".$this->prenom."";
	  if($this->login!=0)$string =$string." AND `login`=".$this->login."";
	  if($this->ddn!=0)$string =$string." AND `ddn`=".$this->ddn."";
	  if($this->sex!=0)$string =$string." AND `sex`=".$this->sex."";
	  if($this->mdp!=0)$string =$string." AND `mdp`=".$this->mdp."";
	  $string1=$string1.preg_replace('/AND/', 'WHERE', $string, 1);
	  return self::populate(self::$base->query($string1));
	}
	static function findAll(){
	  self::$base=new Database();
	  return self::populate(self::$base->query("select * from `utilisateur`"));
	}
	static function populate($resutset){
	    $utilisateurs=array();
		$i=0;
	  foreach ($resutset as $row) {
				$utilisateurs[$i]=new utilisateur($row['idU'],$row['nom'],$row['prenom'],$row['login'],$row['ddn'],$row['sex'],$row['mdp']);		
			$i++;				
        }
		self::$base =null;
		return $utilisateurs;
	}
	function creer(){
	self::$base = new Database(); //instantiate this class to open data base
	 $values = array(
	            'idU' => $this->idU,
				'nom' => $this->nom,
				'prenom' => $this->prenom,
				'login' => $this->login,
				'ddn' => $this->ddn,
				'sex' => $this->sex,
				'mdp' => $this->mdp);
         self::$base->insert("utilisateur", $values);
     self::$base = null;		 
	}
	public function delete(){
	self::$base = new Database(); //instantiate this class to open data base
	self::$base->delete('utilisateur', 'idU', $this->idU);
	self::$base = null;
	}
	public function update(){
	self::$base = new Database(); //instantiate this class to open data base
	 $values = array(
	            'idU' => $this->idU,
				'nom' => $this->nom,
				'prenom' => $this->prenom,
				'login' => $this->login,
				'ddn' => $this->ddn,
				'sex' => $this->sex,
				'mdp' => $this->mdp);
		self::$base->update('utilisateur', $values, 'idU', $this->idU);
		self::$base =null;
	}
	
	
}

?>