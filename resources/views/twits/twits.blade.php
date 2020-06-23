<ul>
    @foreach ($twits as $twit)
        <li>
            <a href="/twit/{{ $twit->Id }}">
                {{ $twit->Content }}
            </a>        
        </li>
    @endforeach
</ul>