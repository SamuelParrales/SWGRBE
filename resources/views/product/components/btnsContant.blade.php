@if ($product->has_whatsapp)
    <a href="https://wa.me/593{{ substr($product->cell_phone_num, 1) }}?text=Hola%20vi%20tu%20artículo,%20¿como%20estas?%20te%20quería%20consultar%20si%20se%20encuentra%20disponible. {{ route('product.show', $product->id) }}"
        class=" btn btn-sm btn-main  py-0 fs-5" target="_blank">
        <i class="fa-brands fa-whatsapp"></i>
    </a>
@else
    <button class=" btn btn-sm btn-success  py-0 fs-5" disabled><i class="fa-brands fa-whatsapp"></i></button>
@endif

<a href="tel:+593{{ substr($product->cell_phone_num, 1) }}" class="btn">{{ $product->cell_phone_num }}</a>
