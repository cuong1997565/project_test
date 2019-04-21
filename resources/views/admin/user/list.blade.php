
             @extends('admin.master')
             @section('page-header','User')
             @section('title', 'List')
             
             @section('content')
             <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($user as $item)                                
                            <tr class="odd gradeX" align="center">
                                <td>{{$i++}}</td>
                                <td>{{$item['username']}}</td>
                                <td>
                                    @if ($item["level"] == 1)
                                        Admin
                                    @elseif ($item["id"] == 2)
                                        Supperadmin
                                    @else 
                                        Member
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a  
                                    onclick="return xacnhanxoa('Bạn có chắc là muốn xóa không')" 
                                    href="{!! URL::route('delete_user', $item['id']) !!}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a 
                                    href="{!! URL::route('edit_user', $item['id']) !!}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            @stop