@php
    $segments = request()->segments();
@endphp

<nav class="text-sm text-gray-400 mb-4">
    <ol class="flex items-center space-x-2">
        <li>
            <a href="{{ url('/') }}" class="hover:text-black transition">
                Home
            </a>
        </li>

        @foreach ($segments as $index => $segment)
            <li>/</li>
            <li class="{{ $loop->last ? 'text-gray-900 font-medium' : '' }}">
                @if (!$loop->last)
                    <a href="{{ url(implode('/', array_slice($segments, 0, $index + 1))) }}"
                       class="hover:text-black transition">
                        {{ ucwords(str_replace('-', ' ', $segment)) }}
                    </a>
                @else
                    {{ ucwords(str_replace('-', ' ', $segment)) }}
                @endif
            </li>
        @endforeach
    </ol>
</nav>
