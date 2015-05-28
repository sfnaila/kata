<?php
	
	
	Class Anagram{

		var $size;
		var $kombinasi;
		var $arrChar;

		public function Main($input){

			$this->size=strlen($input);
			
			for($j=0; $j<$this->size; $j++){
				$this->arrChar[$j]=$input[$j];
			}
			$this->doAnagram($this->size);
			$this->pisahKata();
			$this->hasilAll();
			
		}

		private function doAnagram($newSize){
			if($newSize==1) return;

			for($j=0; $j<$newSize; $j++){
				$this->doAnagram($newSize-1);
				if($newSize==2) {
					$this->susunKata();
				}
				$this->rotate($newSize);
			}
		}

		private function rotate($newSize){
			$position=$this->size-$newSize;
			$temp=$this->arrChar[$position];
			
			for($j=$position+1; $j<$this->size; $j++){
				$this->arrChar[$j-1]=$this->arrChar[$j];
				$this->arrChar[$j]=$temp;
				
			}
		}

		private function susunKata(){	
			$kata="";
			for($j=0; $j<$this->size; $j++){
				$kata=$kata."".$this->arrChar[$j];
			}
			$this->kombinasi[]=$kata;
		}
		
		private function pisahKata(){
			$total=count($this->kombinasi);
			$temp=$this->kombinasi;
			for($x=3;$x<$this->size;$x++){
				$tempo="";
				for($j=0;$j<$total;$j++){
					$kata=substr($temp[$j],0,$x);
					if($kata!=$tempo){
					$this->kombinasi[]=$kata;
					$tempo=$kata;
					}
				}
			}
		}
		
		private function hasilAll(){
				$total=count($this->kombinasi);
				
				for($j=0;$j<$total;$j++){
					$cek=$this->cekKata($this->kombinasi[$j]);
					if($cek==true) echo ($this->kombinasi[$j]. "<br />");
				}
			}
		
		private function cekKata($kata){
			$data = file("katadasar.txt", FILE_IGNORE_NEW_LINES);
			
			$total = count($data);
			$cek=false;
			for($k=0; $k<$total; $k++)
			{
				if($data[$k] == $kata)
				{
					$cek=true;
					echo "<center>";
					return $cek;
					echo "</center>";
				}
			}
			
			return $ck;
			}

	} 

?>
