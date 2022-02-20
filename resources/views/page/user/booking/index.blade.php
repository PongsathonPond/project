@extends('layouts.user')

@section('contentuser')

    <div class="container-fluid mt--6">
        <div class="row">

            @foreach ($location as $item)
                <div class="col-12 col-lg-3">
                    <div class="card">
                        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                            <a href="javascript:;" class="d-block blur-shadow-image">
                                <img src="{{ asset($item->location_image) }}" class="img-fluid border-radius-lg">
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="w-50 mx-auto">

                            </div>
                            <a href="javascript:;" class="card-title h5 d-block text-darker">
                                {{ $item->location_name }}
                            </a>
                            <br>
                            <h6 class="fas fa-thumbtack"> &nbsp ประเภท: <span
                                    class="badge bg-gradient-warning">{{ $item->location_type }}</span> </h6>
                            <br>
                            <h6 class="fas fa-map-marker-alt"> &nbsp ที่ตั้ง: {{ $item->area }} </h6>
                            <br>
                            <h6 class="fas fa-user"> &nbsp ความจุ: {{ $item->accommodate_people }} คน </h6>


                        </div>


                        <button type="button" class=" btn btn-warning" style="width: 80%;margin-left: 10% "
                            data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->location_id }}">จองห้องนี้

                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $item->location_id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{ $item->location_id }}">จองห้อง
                                            {{ $item->location_name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn bg-gradient-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn bg-gradient-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
