@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="{{ asset('img/lembaga-bahasa.png') }}" class="logo" alt="Lembaga Bahasa Widyatama Logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
