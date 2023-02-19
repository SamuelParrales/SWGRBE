@extends('layouts.app')

@section('content')
    <div class="container p-2">
        <div class="row g-0 justify-content-center">
            <section class="row col-12 col-md-11 g-0 justify-content-center">
                <header class="row mb-3 justify-content-between align-items-end">
                    <div class="col-auto">
                        <h1 class="fs-2 fw-bold mb-0">Reportes</h1>
                    </div>

                    <form class="row g-0 col-12 col-sm-9 col-md-8 col-lg-5 justify-content-start justify-content-md-end">
                        <div class="col-auto pe-2">
                            <span class="fw-bold col-auto pe-2">Ordernar por:</span>
                            <div class="col-auto ps-0" style="width: 140px">
                                <select name="order_by" class="form-select border-0 m-0 p-0"
                                    aria-label="Default select example">
                                    <option value="desc" @if ($searchParams['order_by'] == 'desc') selected @endif>Más reciente
                                    </option>
                                    <option value="asc" @if ($searchParams['order_by'] == 'asc') selected @endif>Menos reciente
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class=" m-0 col ">
                            <label class="form-label mb-0 fw-bold">{{ __('Username') }}: </label>
                            <div class="row g-0">
                                <div class="col">
                                    <input name="username" class="form-control bg-white"
                                        value="{{ $searchParams['username'] }}" placeholder="Usuario">
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-main"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </div>
                        </div>


                    </form>
                </header>
                @if ($reports->total() == 0)
                    <div class="row justify-content-center mt-3">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="fs-3 mb-3 ">
                                        No se encontró ningún reporte.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-sm bg-white border">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th scope="col" class="text-center">Razón</th>
                                    <th scope="col" class="text-center">{{ __('User') }}</th>
                                    <th scope="col" class="text-center">Producto</th>
                                    <th scope="col" class="text-center">Reportado</th>
                                    <th scope="col" class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">

                                @for ($i = 0; $i < $reports->count(); $i++)
                                    @php
                                        $report = $reports[$i];
                                        $index = $reports->perPage() * ($reports->currentPage() - 1) + $i + 1;
                                    @endphp
                                    <tr>
                                        <th class="text-center align-middle" scope="row">{{ $index }}</th>
                                        <td>
                                            {{ $report->reason->reason }}
                                        </td>
                                        <td>
                                            <a href="{{ route('user.admin.userIndex') }}?name={{ $report->product->user->username }}"
                                                target="_blank"> {{ $report->product->user->username }}</a>
                                        </td>

                                        <td>
                                            <a href="{{ route('product.show', $report->product->id) }}"
                                                target="_blank">{{ $report->product->name }}</a>
                                        </td>
                                        <td>
                                            {{ $report->created_at }}
                                        </td>
                                        <td class="p-0 ">
                                            <button class="btn btn-primary btn-sm py-0 px-1 fs-5" data-bs-toggle="popover"
                                                data-bs-trigger="focus" title="Descripción" data-bs-placement="top"
                                                data-bs-content="@if ($report->description) {{ $report->description }}@else Sin descripción @endif"
                                                style="width: 32.5px">
                                                <i class="fa-solid fa-envelope-open-text"></i></button>
                                            <form action="{{ route('reportRestv1.destroy', $report->id) }}"
                                                class="col-auto d-inline form-delete-report">
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm py-0 px-1 fs-5" type="submit"
                                                    style="width: 32.5px"><i class="fa-solid fa-trash"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endfor

                            </tbody>
                        </table>
                        {{ $reports->links() }}
                    </div>
                @endif


            </section>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/js/user/admin/report/index.js'])
@endpush
