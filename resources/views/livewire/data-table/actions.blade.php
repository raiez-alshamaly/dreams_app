@props(['row', 'deleteAction', 'acceptAction', 'restoreAction'])
<div class="flex space-x-2">
    
    @if($row->trashed())
        <button
            wire:click="{{ $restoreAction }}"
            class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600"
            onclick="return confirm('Are you sure you want to restore this item?')"
        >
            Restore
        </button>
    @else
        <button
            wire:click="{{ $deleteAction }}"
            class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600"
            onclick="return confirm('Are you sure you want to delete this item?')"
        >
            Delete
        </button>
        @if($row->status !== 'approve')
            <button
                wire:click="{{ $acceptAction }}"
                class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600"
            >
                Accept
            </button>
        @endif
    @endif
</div>