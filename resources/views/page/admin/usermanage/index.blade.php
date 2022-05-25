@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">

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
                    <h6>จัดการข้อมูลผู้ใช้</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase  text-xs font-weight-bolder ">
                                        ผู้ใช้
                                    </th>
                                    <th class="text-center text-uppercase  text-xs font-weight-bolder ">
                                        สถานะ</th>
                                    <th class="text-center text-uppercase  text-xs font-weight-bolder ">
                                        วันที่เพิ่ม</th>

                                    <th class="text-center text-uppercase  text-xs font-weight-bolder">จัดการ
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $row)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ $row->title_name }} {{ $row->first_name }}
                                                        {{ $row->last_name }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $row->email }}</p>
                                                </div>
                                            </div>
                                        </td>

                                        @if ($row->role == 1)
                                            <td class="align-middle text-center">
                                                <span class="badge badge-sm bg-gradient-success">ผู้ดูแลระบบ</span>
                                            </td>
                                        @else
                                            <td class="align-middle text-center">
                                                <span class="badge badge-sm bg-primary">ผู้ใช้ทั่วไป</span>
                                            </td>
                                        @endif


                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $row->created_at }}</span>
                                        </td>

                                        <td class="align-middle text-center">


                                            <!-- Button trigger modal -->
                                            <button type="button" class="fas fa-edit fa-lg btn btn-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModalSignUp{{ $row->id }}">

                                            </button>


                                            <a href="{{ url('/usermanage/delete/' . $row->id) }}"
                                                class="fas fa-trash-alt fa-lg btn btn-danger"
                                                onclick="return confirm('ลบหรือไม่ ?')"> </a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalSignUp{{ $row->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-0">
                                                            <div class="card card-plain">
                                                                <div class="card-header pb-0 text-left">
                                                                    <h3
                                                                        class="font-weight-bolder text-primary text-gradient">
                                                                        แก้ไขข้อมูล</h3>

                                                                </div>
                                                                <div class="card-body pb-3">
                                                                    <form role="form text-left"
                                                                        action="{{ url('/usermanage/update/' . $row->id) }}"
                                                                        method="post">
                                                                        @csrf

                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label"
                                                                                        for="title_name">คำนำหน้า</label>
                                                                                    <select type="text "
                                                                                        class="form-control "
                                                                                        name="title_name">

                                                                                        <option
                                                                                            value="{{ $row->title_name }}">
                                                                                            {{ $row->title_name }}
                                                                                        </option>
                                                                                        @if ($row->title_name == 'นางสาว')
                                                                                            <option value="นาย">นาย
                                                                                            </option>
                                                                                        @else
                                                                                            <option value="นางสาว">
                                                                                                นางสาว
                                                                                            </option>
                                                                                        @endif
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class=" col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label"
                                                                                        for="first_name">ชื่อ </label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="first_name"
                                                                                        value="{{ $row->first_name }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-4">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label"
                                                                                        for="last_name">นามสกุล</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="last_name"
                                                                                        value="{{ $row->last_name }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label"
                                                                                        for="email">อีเมล์</label>
                                                                                    <input type="text"
                                                                                        class="form-control" name="email"
                                                                                        value="{{ $row->email }}">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-control-label"
                                                                                        for="phone_number">เบอร์โทร</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="phone_number"
                                                                                        value="{{ $row->phone_number }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <br>
                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                @if ($row->role == 1)
                                                                                    @php($i = 'ผู้ดูแลระบบ')
                                                                                @else
                                                                                    <h2>
                                                                                        @php($i = 'ผู้ใช้ทั่วไป')
                                                                                    </h2>
                                                                                @endif
                                                                                <label class="form-control-label"
                                                                                    for="role">สถานปัจจุบัน: <span
                                                                                        style="height: 20px"
                                                                                        class="badge badge-pill badge-md bg-gradient-primary">{{ $i }}</span></label>
                                                                                <br>
                                                                                <select type="text"
                                                                                    class="form-control  w-100 mt-4 mb-0"
                                                                                    name="role">

                                                                                    <option value="{{ $row->role }}">
                                                                                        เลือกสถานะ</option>
                                                                                    <option value="0">ผู้ใช้ทั่วไป
                                                                                    </option>
                                                                                    <option value="1">ผู้ดูแลระบบ
                                                                                    </option>
                                                                                </select>
                                                                            </div>

                                                                        </div>
                                                                </div>

                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit"
                                                                    class="btn bg-gradient-primary btn-lg btn-rounded w-80 mt-4 mb-0">บันทึก</button>



                                                            </div>
                                                            <br>
                                                            </form>
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
    </div>
    </div>
@endsection
