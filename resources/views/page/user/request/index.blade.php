@extends('layouts.user')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>

@inject('thaiDateHelper', 'App\Services\ThaiDateHelperService')

@section('contentuser')
    <div class="row">
        <div class="col-xl-12 order-xl-1">


            @if (session('success'))
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'โหลดข้อมูลเรียบร้อย',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
            @endif


            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h4>รายการจองของฉัน</h4>
                </div>
                <br>
                <div class="card-body px-0 pt-0 pb-2">

                    <div class="table-responsive p-0">
                        {{-- id="myTable" --}}
                        <table class="align-items-center mb-0 table">

                            <thead>
                                <tr>
                                    <th class="text-uppercase font-weight-bolder  text-center text-xs">
                                        ลำดับ
                                    </th>
                                    <th class="text-uppercase font-weight-bolder text-center text-xs">
                                        ชื่อรายการ</th>
                                    <th class="text-uppercase font-weight-bolder text-center text-xs">
                                        ชื่อสถานที่</th>
                                    <th class="text-uppercase font-weight-bolder text-center text-xs">
                                        วันที่ทำรายการจอง</th>
                                    <th class="text-uppercase font-weight-bolder text-center text-xs">สถานะการจอง </th>
                                    <th class="text-uppercase font-weight-bolder text-center text-xs">จัดการ
                                    </th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($booking as $item)
                                    <tr>
                                        <td class="text-center align-middle">
                                            {{ $booking->firstItem() + $loop->index }}
                                        </td>


                                        <td class="text-center align-middle">
                                            {{ $item->project_name }}
                                        </td>

                                        <td class="text-center align-middle">
                                            @foreach ($item->booktolocation as $item1)
                                                {{ $item1->location_name }}
                                            @endforeach
                                        </td>

                                        <td class="text-center align-middle">
                                            {{ $thaiDateHelper->simpleDateFormat($item->created_at) }}

                                        </td>
                                        <td class="text-center align-middle">
                                            @if ($item->status == 0)
                                                <span class="badge bg-secondary">รอการอนุมัติ</span>
                                            @elseif($item->status == 1)
                                                <span class="badge bg-success">อนุมัติเรียบร้อย</span>
                                            @else
                                                <span class="badge bg-danger">ไม่อนุมัติ</span>
                                            @endif
                                        </td>



                                        <td class="text-center align-middle">

                                            <a href="{{ url('/request/detail/' . $item->id) }}"
                                                class="btn btn-secondary fas fa-eye" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="รายละเอียดการจอง" data-container="body"
                                                data-animation="true">
                                            </a>


                                            <!-- Button trigger modal -->
                                            <button type="button" class="fas fa-edit fa-lg btn btn-primary"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalSignUp">

                                            </button>


                                            <a href="" class="fas fa-trash-alt fa-lg btn btn-danger"
                                                onclick="return confirm('ลบหรือไม่ ?')"> </a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalSignUp" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalSignTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                                    <div class="modal-content">

                                                        <div class="modal-body p-0  ">
                                                            <div class="card card-plain">
                                                                <div class="card-header pb-0 text-left">
                                                                    <h3
                                                                        class="font-weight-bolder text-primary text-gradient">
                                                                        แก้ไขข้อมูล</h3>

                                                                </div>
                                                                <div class="card-body pb-6 ">




                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                    </div>



                    </td>

                    </tr>
                    @endforeach

                    </tbody>

                    </table>


                </div>

            </div>

        </div>
        {{ $booking->links() }}
    </div>



    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                paging: false,
                ordering: false,
                info: false,
                "language": {
                    "search": "ค้นหา:",
                    "lengthMenu": "",
                    "zeroRecords": "ไม่พบข้อมูล - ขออภัย",
                    "info": '',
                    "infoEmpty": "ไม่มีข้อมูล",
                    "infoFiltered": "",
                    "paginate": ""
                }
            });
        });

        $(document).ready(function() {
            $('.step').each(function(index, element) {
                // element == this
                $(element).not('.active').addClass('done');
                $('.done').html('<i class="fas fa-check"></i>');
                if ($(this).is('.active')) {
                    return false;
                }
            });
        });
    </script>
@endsection
