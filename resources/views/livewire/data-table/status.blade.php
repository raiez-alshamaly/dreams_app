@props(['status'])
<span class="px-2 py-1 rounded text-color-light-100 {{ $status === 'pending' ? 'bg-color-warning-500' : 'bg-color-success-500' }}">
    {{ ucfirst($status) }}
</span>