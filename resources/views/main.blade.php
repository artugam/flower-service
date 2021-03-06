@extends('welcome')

@section('content')
    <div class="row">

@foreach ($flowers_rz as $key => $flower)


    @if($flower->quantity == 0)

        @else

                <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="{{$flower->flowerImage}}" alt="roza" width="200px" height="200px">
                <div class="caption">
                    <h3>{{$flower->name}}</h3>
                    <p>Ilość: {{$flower->quantity}}</p>
                    <p>Cena: {{$flower->price}}</p>
                </div>
                <p class="button-flower">
                    {{--<a href="{{route('order')}}" class="btn btn-primary" role="button">Kup Teraz</a>--}}
                    <form action="{{route('order')}}" method="GET">
                        <input type="hidden" name="flower" value="{{$flower->serialized}}"/>
                        <button type="submit" class="btn btn-primary" role="button">Kup Teraz</button>
                    </form>

                </p>
            </div>
        </div>
            @endif

@endforeach

    </div>
@endsection