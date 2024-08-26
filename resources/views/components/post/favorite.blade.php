@php use App\Models\Marks;use Illuminate\Support\Facades\Auth; @endphp

@props([
    'id',
    'state'
])

@php
    $marks = Marks::where(['user_id' => Auth::id(), 'post_id' => $id])->get();
    $result = $marks->isEmpty()
@endphp

<form class="cursor-pointer ml-4" method="post" action="/posts/{{ $id }}">
    @csrf
    <input name="id" class="hidden" value="{{ $id }}">
    <button type="submit">
        @if($result)
            <svg viewBox="0 0 24 24" fill="none" class="h-10 w-10 text-gray-800 hover:text-violet-900 stroke-violet-900">
                <g stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 6.00019C10.2006 3.90317 7.19377 3.2551 4.93923 5.17534C2.68468 7.09558 2.36727 10.3061 4.13778 12.5772C5.60984 14.4654 10.0648 18.4479 11.5249 19.7369C11.6882 19.8811 11.7699 19.9532 11.8652 19.9815C11.9483 20.0062 12.0393 20.0062 12.1225 19.9815C12.2178 19.9532 12.2994 19.8811 12.4628 19.7369C13.9229 18.4479 18.3778 14.4654 19.8499 12.5772C21.6204 10.3061 21.3417 7.07538 19.0484 5.17534C16.7551 3.2753 13.7994 3.90317 12 6.00019Z"></path>
                </g>
            </svg>
        @else
            <svg viewBox="0 0 24 24" fill="currentColor" class="h-10 w-10 text-violet-800 hover:text-violet-900 stroke-violet-900">
                <g stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 6.00019C10.2006 3.90317 7.19377 3.2551 4.93923 5.17534C2.68468 7.09558 2.36727 10.3061 4.13778 12.5772C5.60984 14.4654 10.0648 18.4479 11.5249 19.7369C11.6882 19.8811 11.7699 19.9532 11.8652 19.9815C11.9483 20.0062 12.0393 20.0062 12.1225 19.9815C12.2178 19.9532 12.2994 19.8811 12.4628 19.7369C13.9229 18.4479 18.3778 14.4654 19.8499 12.5772C21.6204 10.3061 21.3417 7.07538 19.0484 5.17534C16.7551 3.2753 13.7994 3.90317 12 6.00019Z"></path>
                </g>
            </svg>
        @endif
    </button>
</form>


