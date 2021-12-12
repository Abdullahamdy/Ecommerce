<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Comments extends Component
{
    public $product;
    public $comments ;
    public $newComments;
   public $body;
    public $products;
    public $product_value;



    public function mount(){
        $initialComment = Comment::all();
        $this->comments = $initialComment;
        
      
       
    }
    public function addComment(Request $request){
            
    
        
        
        if($this->newComments = ''){
            return ;
        }
        $createdComments = Comment::create([
            'body'=>$this->body,
            'user_id'=>auth()->user()->id,
            'product_id'=>$this->product_value,
            
        ]);
        $this->comments->push($createdComments);
        $this->body = '';

        

    }
    public function render()
    {
        $this->product = $this->product_value;
        return view('livewire.comments');
    }
}
