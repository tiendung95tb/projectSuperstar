@extends('admin.layout.index')

@section('content')
<script src="admin_asset/dist/js/extra.js"></script>
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại tin
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên loại tin</th>
                                <th>Tên không dấu</th>
                                <th>Thể loại</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loaitin as $lt)
                                 <tr class="odd gradeX" align="center">
                                    <td>{{$lt->id}}</td>
                                    <td>{{$lt->Ten}}</td>
                                    <td>{{$lt->TenKhongDau}}</td>
                                    <td>{{$lt->TheLoai->Ten}}</td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                 {{-- <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loaitin/sua/{{$lt->id}}">Edit</a></td> --}}
                                 <td class="center">
                                    <i class="fa fa-trash-o fa-fw"></i>
                                    <input type="hidden" class="hiddenID" value="{{ $lt->id }}">

                                    <a href="#" class="btnDel" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal{{$lt->id}}">Xóa</a>
                                    
                                    <div style="text-align: left;" id="myModal{{$lt->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Xác Nhận</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Bạn muốn xóa Loại Tin: "{{$lt->Ten}}"?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-casetype="loaitin" class="btn btn-default btnConf">Có</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
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
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection