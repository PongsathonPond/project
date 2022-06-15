@extends('layouts.admin')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">

@inject('thaiDateHelper', 'App\Services\ThaiDateHelperService')

@section('content')
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            @if (session('success'))
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'บันทึกข้อมูลเรียบร้อย',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
            @endif

            @if (session('delete'))
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'ลบข้อมูลเรียบร้อย',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
            @endif

            @if (session('update'))
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'อัพเดทข้อมูลเรียบร้อย',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
            @endif



            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>จัดการข้อมูลการจอง</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class=" text-center text-xs font-weight-bolder" data-sort="name">
                                        ลำดับ</th>
                                    <th class=" text-center text-xs font-weight-bolder" data-sort="name">
                                        ชื่อรายการจอง</th>
                                    <th class=" text-center text-xs font-weight-bolder" data-sort="name">
                                        ห้อง</th>
                                    <th class=" text-center text-xs font-weight-bolder" data-sort="name">
                                        ชื่อผู้จอง</th>

                                    <th class=" text-center text-xs font-weight-bolder" data-sort="name">
                                        เวลาเริ่มต้น-สิ้นสุด</th>
                                    <th class=" text-center text-xs font-weight-bolder" data-sort="name">
                                        สถานะ</th>

                                    <th class="text-right text-aa text-xs font-weight-bolder  "
                                        data-sort="name" ">
                                                                                                                                            จัดการ</th>
                                                                                                                                            <th class="
                                        
                                        
                                        text-center text-aa text-xs font-weight-bolder  "
                                        data-sort="name" ">
                                                                                                                                                </th>
                                                                                                                                    </tr>
                                                                                                                                </thead>


                                                                                                                                <tbody>
                                                                                                                                               
                                                                                                     
                                                       @foreach ($booking as $item)
                                <tr>

                                    <td class="align-middle text-center">{{ $booking->firstItem() + $loop->index }}
                                    </td>
                                    <td class="align-middle text-center">
                                        {{ $item->project_name }}
                                    </td>
                                    <td class="align-middle text-center">

                                        @foreach ($item->booktolocation as $item1)
                                            {{ $item1->location_name }}
                                        @endforeach




                                    </td>
                                    <td class="align-middle text-center">


                                        @foreach ($item->booktouser as $item1)
                                            {{ $item1->first_name }}
                                            {{ $item1->last_name }}
                                        @endforeach
                                    </td>
                                    <td class="align-middle text-center">

                                        {{ $thaiDateHelper->simpleDateFormat($item->start) }}
                                        -
                                        {{ $thaiDateHelper->simpleDateFormat($item->end) }}

                                    </td>

                                    <td class="align-middle text-center">

                                        @if ($item->status == 1)
                                            <span class="badge badge-sm bg-success">อนุมัติเรียบร้อย</span>
                                        @elseif($item->status == 0)
                                            <span class="badge badge-sm bg-primary">รอการอนุมัติ</span>
                                        @else
                                            <span class="badge badge-sm bg-danger">ไม่อนุมัติ</span>
                                        @endif
                                    </td>

                                    </td>



                                    <td>
                                        <div class="dropdown text-right">
                                            <button class="btn bg-gradient-primary dropdown-toggle fas fa-edit"
                                                type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                aria-expanded="false" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="จัดการข้อมูล" data-container="body" data-animation="true">

                                            </button>
                                            <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                                                <li><a class="dropdown-item text-center" href="#">Action</a></li>
                                                <li><a class="dropdown-item text-center" href="#">Another action</a></li>
                                                <li><a class="dropdown-item text-center" href="#">Something else here</a>
                                                </li>
                                            </ul>
                                        </div>
                                        {{-- <a href="{{ asset($item->file_document) }}" target=" _blank"
                                                class="fas fa-file-pdf fa-lg btn btn-primary" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="เอกสารบันทึกข้อความ" data-container="body"
                                                data-animation="true"></a> --}}


                                        <!-- Button trigger modal -->
                                        {{-- <button type="button" class="fas fa-edit fa-lg btn btn-primary"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">

                                            </button> --}}

                                        {{-- <a href="{{ url('/request/delete/' . $item->id) }}"
                                                class="fas fa-trash-alt fa-lg btn btn-danger"
                                                onclick="return confirm('ลบหรือไม่ ?')" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="ลบข้อมูล" data-container="body"
                                                data-animation="true"> </a> --}}

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            สถานะการอนุมัติ
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">


                                                        <form action="{{ url('/request/update/' . $item->id) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf

                                                            <div class="pl-lg-4">
                                                                <div class="row" style="text-align: left">








                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label" for="status">

                                                                                <span
                                                                                    class="badge badge-pill bg-gradient-primary"></span>
                                                                            </label>
                                                                            <select type="text " class="form-control "
                                                                                name="status">

                                                                                <option value="0">
                                                                                    เลือกสถานะ</option>
                                                                                <option value="1">อนุมัติ
                                                                                </option>
                                                                                <option value="2">
                                                                                    ไม่อนุมัติ
                                                                                </option>


                                                                            </select>

                                                                            <br>
                                                                            สถานะปัจจุบัน:
                                                                            @if ($item->status == 0)
                                                                                <span
                                                                                    class="badge bg-primary">รอการอนุมัติ</span>
                                                                            @elseif($item->status == 1)
                                                                                <span
                                                                                    class="badge bg-success">อนุมัติเรียบร้อย</span>
                                                                            @else
                                                                                <span
                                                                                    class="badge bg-danger">ไม่อนุมัติ</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>



                                                                </div>




                                                                @error('name')
                                                                    <div class="my-2">
                                                                        <span class="text-danger my-2">
                                                                            {{ $message }}
                                                                        </span>
                                                                    </div>
                                                                @enderror

                                                                @error('email')
                                                                    <div class="my-2">
                                                                        <span class="text-danger my-2">
                                                                            {{ $message }}
                                                                        </span>
                                                                    </div>
                                                                @enderror
                                                                <div class="ss">
                                                                    <button type="submit"
                                                                        class="btn bg-gradient-primary">บันทึก</button>
                                                                    <button type="button" class="btn bg-gradient-secondary"
                                                                        data-bs-dismiss="modal">ปิด</button>

                                                                </div>
                                                            </div>
                                                        </form>






                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                    </td>
                                    <td>

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




        <script src="/../assets/js/core/popper.min.js"></script>
        <script src="/../assets/js/core/bootstrap.min.js"></script>


    </div>
@endsection
