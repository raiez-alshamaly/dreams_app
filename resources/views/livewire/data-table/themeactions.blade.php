@props(['row', 'isActive', 'isGlobal'  , 'active' , 'global' , 'disableGlobal' , 'delete'])
<div class="flex space-x-2">
    
   @if(!$isActive)
        <button
            wire:click="{{ $active }}"
            class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600"
            
        >
            Active 
        </button>

   
    @endif
  

<button
    wire:click="{{ $delete }}"
    class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">
    Delete
</button>
 
    
</div>