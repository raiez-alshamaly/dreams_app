@props(['row', 'deleteAction', 'acceptAction', 'restoreAction'])
<div class="flex space-x-2">
    
    @if($row->trashed())
        <button
            wire:click="{{ $restoreAction }}"
            class="bg-color-primary-500 text-[var(--color-light-100)] px-2 py-1 rounded hover:bg-color-primary-600"
            onclick="return confirm('Are you sure you want to restore this item?')"
        >
            Restore
        </button>
    @else
        <button
            wire:click="{{ $deleteAction }}"
            class="bg-color-warning-500 text-[var(--color-light-100)] px-2 py-1 rounded hover:bg-color-warning-600"
            onclick="return confirm('Are you sure you want to delete this item?')"
        >
            Delete
        </button>
        @if($row->status !== 'approve')
            <button
                wire:click="{{ $acceptAction }}"
                class="bg-color-success-500 text-[var(--color-light-100)] px-2 py-1 rounded hover:bg-color-success-600"
            >
                Accept
            </button>
        @endif
    @endif
</div>