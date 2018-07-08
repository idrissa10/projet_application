<?php
 require_once("Database.php");
class Produit {
   private static $base ;
	/** @var string ID */
	public $idproduit=0;
	public $libelle="";
	public $prix=0;
	public $quantite=0;

	public function __construct($idproduit,$libelle,$prix,$quantite) {
		$this->idproduit=$idproduit;
		$this->libelle=$libelle;
		$this->prix=$prix;
		$this->quantite=$quantite;
	}
	
	static function findBykey($key){
		self::$base=new Database();
		$tab=array();
		
	  $tab=self::populate(self::$base->query("select * from `produit` WHERE `idproduit`=".$key));
	  if($key==0 || count($tab)==0)$tab[]=new Produit(0,'',0,0);
	  return $tab[0];
		
	}
	 function findByValue(){
	  self::$base = new Database(); //instantiate this class to open data base
	  $string1 ="select * from `produit`";
	  $string="";
	  if($this->idproduit!=0)$string =$string." AND `idproduit`=".$this->idproduit;
	  if($this->libelle!="")$string =$string." AND `libelle`='".$this->libelle."'";
	  if($this->prix!=0)$string =$string." AND `prix`=".$this->prix."";
	  if($this->quantite!=0)$string =$string." AND `quantite`=".$this->quantite."";
	  $string1=$string1.preg_replace('/AND/', 'WHERE', $string, 1);
	  return self::populate(self::$base->query($string1));
	}
	static function findAll(){
	  self::$base=new Database();
	  return self::populate(self::$base->query("select * from `produit`"));
	}
	static function populate($resutset){
	    $produits=array();
		$i=0;
	  foreach ($resutset as $row) {
				$produits[$i]=new Produit($row['IDPRODUIT'],$row['LIBELLE'],$row['PRIX'],$row['QUANTITE']);		
			$i++;				
        }
		self::$base =null;
		return $produits;
	}
	function creer(){
	self::$base = new Database(); //instantiate this class to open data base
	 $values = array(
	            'idproduit' => $this->idproduit,
				'libelle' => $this->libelle,
				'prix' => $this->prix,
				'quantite' => $this->quantite);
         self::$base->insert("produit", $values);
     self::$base = null;		 
	}
	public function delete(){
	self::$base = new Database(); //instantiate this class to open data base
	self::$base->delete('produit', 'idproduit', $this->idproduit);
	self::$base = null;
	}
	public function update(){
	self::$base = new Database(); //instantiate this class to open data base
	 $values = array(
	            'idproduit' => $this->idproduit,
				'libelle' => $this->libelle,
				'prix' => $this->prix,
				'quantite' => $this->quantite);
		self::$base->update('produit', $values, 'idproduit', $this->idproduit);
		self::$base =null;
	}
	
	
}

?>