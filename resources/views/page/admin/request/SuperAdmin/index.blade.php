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
                        title: 'แก้ไขข้อมูลเรียบร้อย',
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

                                    <th class="text-center text-xs font-weight-bolder" data-sort="name">
                                        จัดการ</th>

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




                                        <td class="align-middle text-center">

                                            <a href="{{ asset($item->file_document) }}" target=" _blank"
                                                class="fas fa-file-pdf fa-lg btn btn-primary" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="เอกสารบันทึกข้อความ" data-container="body"
                                                data-animation="true"></a>


                                            <!-- Button trigger modal -->
                                            <button type="button" class="fas fa-edit fa-lg btn btn-primary"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal">

                                            </button>

                                            <a href="" class="fas fa-trash-alt fa-lg btn btn-danger"
                                                onclick="return confirm('ลบหรือไม่ ?')" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="ลบข้อมูล" data-container="body"
                                                data-animation="true"> </a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                แก้ไขข้อมูลห้อง
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">


                                                            <form action="" method="post" enctype="multipart/form-data">
                                                                @csrf

                                                                <div class="pl-lg-4">
                                                                    <div class="row" style="text-align: left">
                                                                        <div class="col-lg-7">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label"
                                                                                    for="location_name">ชื่อห้อง</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="location_name" value="">
                                                                            </div>
                                                                        </div>

                                                                        <div class=" col-lg-5">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label"
                                                                                    for="area">ที่ตั้ง
                                                                                </label>
                                                                                <input type="text" class="form-control"
                                                                                    name="area" value="">
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-4">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label"
                                                                                    for="location_floor">ชั้น</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="location_floor" value="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-3">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label"
                                                                                    for="accommodate_people">ความจุ</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="accommodate_people" value="">
                                                                            </div>
                                                                        </div>



                                                                        <div class="col-lg-5">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label"
                                                                                    for="location_building">อาคาร</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="location_building" value="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-3">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label"
                                                                                    for="cost_halfday">ราคาครึ่งวัน</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="cost_halfday" value="">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-3">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label"
                                                                                    for="cost_fullday">ราคาเต็มวัน</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="cost_fullday" value="">
                                                                            </div>
                                                                        </div>



                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label"
                                                                                    for="location_type">ประเภท :

                                                                                    <span
                                                                                        class="badge badge-pill bg-gradient-primary"></span>
                                                                                </label>
                                                                                <select type="text " class="form-control "
                                                                                    name="location_type">

                                                                                    <option value="">
                                                                                        เลือกประเภท</option>
                                                                                    <option value="กลางแจ้ง">กลางแจ้ง
                                                                                    </option>
                                                                                    <option value="ห้องประชุม">
                                                                                        ห้องประชุม
                                                                                    </option>
                                                                                    <option value="ห้องอเนกประสงค์">
                                                                                        ห้องอเนกประสงค์</option>

                                                                                </select>
                                                                            </div>
                                                                        </div>



                                                                    </div>


                                                                    <div class="row">
                                                                        <div class="col-lg">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label"
                                                                                    for="location_image">รูปภาพ</label>
                                                                                <input type="file" class="form-control"
                                                                                    name="location_image" value="">


                                                                                <br>
                                                                                <img src="" style="margin-left: 25%" alt=""
                                                                                    width="200px" height="200px">
                                                                            </div>

                                                                            <input type="hidden" name="old_image" value="">

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
                                                                        <button type="button"
                                                                            class="btn bg-gradient-secondary"
                                                                            data-bs-dismiss="modal">ปิด</button>

                                                                    </div>
                                                                </div>
                                                            </form>






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
@endsection
