<footer class="footer">
    <div>
        <h3 class="heading">CV Wiljantoro</h3>
    </div>
    <div class="footer__contact">
        <strong>Phone</strong>
        <div>
            <p>{{$contact->phone}}</p>
        </div>

        <strong>Email</strong>
        <div>
            <p>{{$contact->email}}</p>
        </div>
    </div>
    <div class="footer__address">

        @foreach ($addresses as $address)
        <div class="address__item">
            <strong>{{$address->name}}</strong>
            <p>{{$address->address}}</p>
        </div>
        @endforeach
    </div>

    <div class="footer__social">

        <p>Follow us:</p>
        <div>
            @foreach($social_media as $item)

            <p>
                <a target="_blank" href="{{ $item->url }}">
                    {{ $item->platform}}
                </a>
            </p>
            @endforeach
        </div>
    </div>

    <p>&copy; 2025 CV Wiljantoro Mukti. All Rights Reserved.</p>
</footer>