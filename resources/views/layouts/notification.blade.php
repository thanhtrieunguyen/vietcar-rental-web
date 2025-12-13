@if(session('thong-bao'))
<div class="alert alert-{{ session('type') }} alert-dismissible">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong style="font-size: 1rem">{{ session('thong-bao') }}</strong>
</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Có lỗi xảy ra:</strong>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif