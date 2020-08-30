<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\product;
use App\cart;
class Products extends Component
{
public $remond;

public $search;
public $std1=3;
public $label;
public $swt;
public $c1;
public $c2;
public $c3;


public $collection;

protected $listeners = ['postAdded'=>"cloth","twocata"=>"twocata","threest"=>"threest"];





public function adtocart($cid){

$this->collection.="++".$cid;

}


public function cloth($c1){
 $this->c1=$c1;
 $this->swt=1;

    
}


public function twocata($c1,$c2){
    $this->c1=$c1;
    $this->c2=$c2;
    $this->swt=2;
  
    
}
public function threest($c1,$c2,$c3){
    $this->c1=$c1;
    $this->c2=$c2;
    $this->c3=$c3;
    $this->swt++;

}

public function ssearch(){
    $this->swt="search";
}

    public function render()
    { 
        if(!empty($this->c3)){
            $this->swt=3;
        }
       
        switch ($this->swt) {
            case 1:
                $std=new product;
                $data=$std->where("twoth","=",$this->c1)->orderBy("id","desc")->get();
                // $this->c1="";
                return view('livewire.products',["data"=>$data]);
                break;
                case 2:
                 $std=new product;
                 $data=$std->where("twoth","=",$this->c1)
                            ->where("cata","=",$this->c2)->orderBy("id","desc")->get();
                            // $this->c1=""; $this->c2="";
                return view('livewire.products',["data"=>$data]);
                break;

               case 3:
                $std=new product;
                    $data=$std->where("twoth","=",$this->c1)
                              ->where("cata","=",$this->c2)
                              ->where("third","=",$this->c3)->orderBy("id","desc")->get();
                            //   $this->c1=""; $this->c2="";$this->c3="";
                    return view('livewire.products',["data"=>$data]);
                break;

                default:
                
            $data =product::where('pn', $this->search)
            ->orWhere('pn', 'like', '%' . $this->search . '%')->orderBy("id","desc")->get();
    
                   // $std=new product;
                    // $data=$std->orderBy("id","desc")->get();
                    return view('livewire.products',["data"=>$data]);
        }

  

    }
}


