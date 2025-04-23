@props(['row', 'isActive', 'isGlobal'  , 'active' , 'global' , 'disableGlobal' , 'delete'])
<div class="flex space-x-2">
    
   @if(!$isActive)
        <button
            wire:click="{{ $active }}"
            class="bg-color-success-500 text-color-light-100 px-2 py-1 rounded hover:bg-color-success-400"
            
        >
            Active 
        </button>

   
    @endif
  

<button
    wire:click="{{ $delete }}"
    class="bg-color-warning-500 text-color-light-100 px-2 py-1 rounded hover:bg-color-warning-400">
    Delete
</button>
 
    
</div>