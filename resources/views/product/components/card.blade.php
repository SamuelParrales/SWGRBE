
<article class="card card-product col-auto mb-3 ">

        <a class="card-container-img  mb-2 border-bottom" href="{{route('product.show',$product->id)}}">
            <img class="crop" src="{{$product->images[0]->url}}" alt="...">
        </a>

    <div class="card-body pt-0">
        <div class="overflow-hidden" style="height: 50px ">
            <h5 class="card-title fs-5">{{substr($product->name,0,17) }}
            @if (strlen($product->name)>17)
                ...
            @endif</h5>
            {{-- overflow-hidde --}}
        </div>

        @include('product.components.btnsContant',compact('product'))
    </div>
</article>
