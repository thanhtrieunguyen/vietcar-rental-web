@if(session('thong-bao'))
@php
    $type = session('type');
    $bgClass = $type === 'success' ? 'bg-green-100 border-green-400 text-green-700' : ($type === 'danger' ? 'bg-red-100 border-red-400 text-red-700' : 'bg-blue-100 border-blue-400 text-blue-700');
    $textClass = $type === 'success' ? 'text-green-700 hover:text-green-900' : ($type === 'danger' ? 'text-red-700 hover:text-red-900' : 'text-blue-700 hover:text-blue-900');
@endphp
<div class="mb-4 p-4 rounded-lg {{ $bgClass }} relative">
	<button type="button" class="absolute top-2 right-2 {{ $textClass }}" onclick="this.parentElement.remove()">&times;</button>
	<strong class="text-base block pr-6">{{ session('thong-bao') }}</strong>
</div>
@endif

@if ($errors->any())
    <div class="mb-4 p-4 rounded-lg bg-red-100 border border-red-400 text-red-700 relative">
        <button type="button" class="absolute top-2 right-2 text-red-700 hover:text-red-900" onclick="this.parentElement.remove()">&times;</button>
        <strong class="block mb-2 pr-6">Có lỗi xảy ra:</strong>
        <ul class="list-disc list-inside mb-0 space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
