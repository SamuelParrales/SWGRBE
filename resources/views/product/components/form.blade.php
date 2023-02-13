<form
    id = "form-product"
    class="col-sm-10 col-md-8 col-lg-6 bg-white p-3 border rounded"
    action="@if($mode=='create'){{route('productRestv1.store')}}@else{{route('productRestv1.update',$product->id)}} @endif"
    enctype="multipart/form-data"
>
    @if ($mode!='create')
        @method('put')
    @endif
    <header class="mb-3">
        <h1 class="fs-2  mb-0"><i class="fa-solid fa-pen-to-square"></i>
        @if ($mode=='create')
            Añadir producto
        @else
            Editar producto
        @endif

        </h1>
    </header>
    <div class="form-floating mb-3">
        <input
            name="name"
            type="text"
            class="form-control feedback"
            placeholder="Nombre"
            autocomplete="off"
            @if ($product)
                value="{{$product->name}}"
            @endif

        >
        <label>Nombre</label>
        <div class="msg-feedback py-0"></div>
    </div>
    <div class="form-floating mb-3">
        <textarea
            name="description"
            class="form-control feedback"
            placeholder="Leave a comment here"
            style="height: 100px"
            autocomplete="off"
        >@if ($product){{$product->description}}@endif</textarea>
        <label>Descripción</label>
        <div class="msg-feedback py-0"></div>
    </div>
    <div class="form-floating mb-3">
        <select name="category_id" class="form-select feedback" aria-label="Floating label select example">
            <option value="" selected>Seleccionar</option>
            @foreach ($categories as $category)

                <option
                    value="{{$category->id}}"
                    @if ($product &&$product->category_id == $category->id)
                    selected
                    @endif
                >{{$category->name}}</option>

            @endforeach
        </select>
        <label>Categoría</label>
        <div class="msg-feedback py-0"></div>
    </div>
    <div class="row align-items-center g-0 mb-3">
        <div class="form-floating col-6">
            <input
                name="cell_phone_num"
                type="text"
                class="form-control feedback"
                placeholder="Celular"
                autocomplete="off"
                @if ($product)
                value="{{$product->cell_phone_num}}"
                @endif
            >
            <label>Celular</label>
            <div class="msg-feedback py-0"></div>
        </div>
        <div class="form-check col-6 ps-5">
            <label class="form-check-label">
                <input
                    name="has_whatsapp"
                    class="form-check-input"
                    type="checkbox"
                    value=""
                    @if ($product && $product->has_whatsapp)
                        checked
                    @endif
                >
                Whatssap <i class="fa-brands fa-whatsapp text-success fs-5"></i>
            </label>
        </div>
    </div>
    <div class="mb-3">
        @if ($product)
        <div id="content-img" class="d-none">
            @foreach ($product->images as $img)

            <img class="product-img" src="{{$img->url}}" alt="{{substr($img->public_id,9)}}">
            @endforeach
        </div>
        @endif
        <label class="form-label">Imágenes:</label>
        <input id="input-upload-img" name="images" class="form-control feedback" type="file" multiple="multiple">
        <div class="msg-feedback py-0"></div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-auto">
            <button type="submit" class="btn btn-main"><i class="fa-regular fa-paper-plane"></i>
                Enviar</button>
        </div>
    </div>
</form>
