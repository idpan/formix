<section >
    <div>
        <h2>{{$data['title']}}</h2>
        <div>
            @foreach ($services as $service)
                {{ $service }}
        
            @endforeach

        </div>
    </div>
</section>
