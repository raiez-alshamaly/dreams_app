@props(['status'])
<span class="px-2 py-1 rounded text-white {{ $status === 'pending' ? 'bg-yellow-500' : 'bg-green-500' }}">
    {{ ucfirst($status) }}
</span>