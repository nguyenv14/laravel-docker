<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap 5 Website Example</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
</head>

<body>

    <div class="p-5 bg-primary text-white text-center">
        <h1>WebServer With Nginx In Docker</h1>
        <p>Resize this responsive page to see the effect!</p>
    </div>


    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-4">

                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" id="classStudent">Class Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="student">Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="addStudent">Add Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="addClass">Add Class</a>
                    </li>
                </ul>
                <hr class="d-sm-none">
            </div>
            <div class="col-sm-8">
                <table class="table class-table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Class Name</th>
                            <th scope="col">Class Major</th>
                            <th scope="col">Class Description</th>
                            <th scope="col" colspan="2" style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="class">
                        @foreach ($classStudents as $class)
                            <tr>
                                <th scope="row">{{ $class->id }}</th>
                                <td colspan="1">{{ $class->class_name }}</td>
                                <td colspan="1">{{ $class->class_major }}</td>
                                <td colspan="1">{{ $class->class_desc }}</td>
                                <td style="text-align: center"> <button type="button"
                                        class="btn btn-danger btnDeleteClass"
                                        data-id="{{ $class->id }}">Delete</button> </td>
                                <td style="text-align: center"><button type="button"
                                        class="btn btn-primary btnModifyClass"
                                        data-id="{{ $class->id }}">Modify</button> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="student-table">

                    <div class="row">
                        <div class="col-sm-6">
                            <input id="search" type="text" class="form-control" name="search"
                                placeholder="Search Student">
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" aria-label="Default select example" name="classIdSearch" id="filterClass">
                                <option value="0" selected>Choose Class</option>
                                @foreach ($classStudents as $class)
                                    <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Student Class</th>
                                <th scope="col">Student Phone</th>
                                <th scope="col">Student Email</th>
                                <th scope="col" colspan="2" style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="studentTable">
                            @foreach ($students as $student)
                                <tr>
                                    <th scope="row">{{ $student->id }}</th>
                                    <td colspan="1">{{ $student->student_name }}</td>
                                    <td colspan="1">{{ $student->classStudent->class_name }}</td>
                                    <td colspan="1">{{ $student->student_email }}</td>
                                    <td colspan="1">{{ $student->student_phone }}</td>
                                    <td style="text-align: center"> <button type="button"
                                            class="btn btn-danger btnDeleteStudent"
                                            data-id="{{ $student->id }}">Delete</button> </td>
                                    <td style="text-align: center"><button type="button"
                                            class="btn btn-primary btnModifyStudent"
                                            data-id="{{ $student->id }}">Modify</button> </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <form class="addStudent">
                    <h2>Add Student</h2>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Student Name</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="studentName">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Student Email</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="studentEmail">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Student Phone</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="studentPhone">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" name="classId">
                            <option value="0" selected>Chọn lớp</option>
                            @foreach ($classStudents as $class)
                                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success btnAddStudent">Submit</button>
                </form>


                <form class="addClass">
                    <h2>Add Class</h2>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Class Name</label>
                        <input type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" name="className">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Class Major</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="classMajor">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Class Description</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="classDesc">
                    </div>
                    <button type="submit" class="btn btn-success btnAddClass">Submit</button>
                </form>
            </div>
        </div>

        <div class="mt-5 p-4 bg-dark text-white text-center fixed-bottom">
            <p>Footer</p>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).on('click', '.btnDeleteStudent', function() {
                var id = $(this).data('id');
                // alert("hihi")
                $.ajax({
                    url: '{{ url('/student/deleted-student') }}',
                    method: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        loadStudent();
                        alert("Xóa Thành Công")
                    },
                    error: function() {
                        alert("Bug Huhu :<<");
                    }
                })
            });

            // alert("hihi")
            $('.student-table').hide();
            $('.addStudent').hide();
            $('.addClass').hide();
            loadStudent();
            loadClass();
            $(document).ready(function() {
                // Ẩn tất cả các bảng khi trang được tải
                $('.nav-link').click(function() {
                    var clickedId = $(this).attr('id');
                    if (clickedId === 'classStudent') {
                        $('.class-table').show();
                        $('.student-table').hide();
                        $('.addStudent').hide();
                        $('.addClass').hide();
                    } else if (clickedId === 'student') {
                        $('.class-table').hide();
                        $('.student-table').show();
                        $('.addStudent').hide();
                        $('.addClass').hide();
                    } else if (clickedId === 'addStudent') {
                        $('.class-table').hide();
                        $('.student-table').hide();
                        $('.addStudent').show();
                        $('.addClass').hide();
                    } else if (clickedId === 'addClass') {
                        $('.class-table').hide();
                        $('.student-table').hide();
                        $('.addStudent').hide();
                        $('.addClass').show();
                    }
                    console.log('Clicked ID:', clickedId);
                    $('.nav-link').removeClass('active');
                    $(this).addClass('active');
                });
            });


            function loadClass() {
                $.ajax({
                    url: '{{ url('/class/load-class') }}',
                    method: 'GET',
                    data: {},
                    success: function(data) {
                        $("#class").html(data);
                    },
                    error: function() {
                        alert("N Ơi Fix Bug Huhu :<");
                    },
                });
            }

            function loadStudent() {
                // alert("hihi")
                $.ajax({
                    url: '{{ url('/student/load-student') }}',
                    method: 'GET',
                    data: {},
                    success: function(data) {
                        $('#studentTable').html(data);
                    },
                    error: function() {
                        alert("N Ơi Fix Bug Huhu :<");
                    },
                });
            }

            $('.btnAddClass').click(function() {
                var className = $("input[name='className']").val();
                var classMajor = $("input[name='classMajor']").val();
                var classDesc = $("input[name='classDesc']").val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ url('/class/add-class') }}',
                    method: 'GET',
                    data: {
                        className: className,
                        classMajor: classMajor,
                        classDesc: classDesc,
                        _token: _token,
                    },
                    success: function(data) {
                        loadClass();
                        $("input[name='className']").val("");
                        $("input[name='classMajor']").val("");
                        $("input[name='classDesc']").val("");
                        alert("Thành Công")
                    },
                    error: function() {
                        alert("Bug Huhu :<<");
                    }
                })
            })

            $('.btnAddStudent').click(function() {
                var studentName = $("input[name='studentName']").val();
                var studentEmail = $("input[name='studentEmail']").val();
                var studentPhone = $("input[name='studentPhone']").val();
                var classId = $('select[name="classId"]').val();
                // alert(classId);
                $.ajax({
                    url: '{{ url('/student/add-student') }}',
                    method: 'GET',
                    data: {
                        studentName: studentName,
                        studentEmail: studentEmail,
                        studentPhone: studentPhone,
                        classId: classId,
                    },
                    success: function(data) {
                        loadStudent();
                        $("input[name='studentName']").val("");
                        $("input[name='studentEmail']").val("");
                        $("input[name='studentPhone']").val("");
                        alert("Thành Công")
                    },
                    error: function() {
                        alert("Bug Huhu :<<");
                    }
                })
            })

            $('#search').keyup(function() {
                var key_sreach = $(this).val();
                var selectedValue = $('#filterClass').val();
                // alert(selectedValue + " " + key_sreach);
                $.ajax({
                    url: '{{ url('/student/search-student') }}',
                    method: 'GET',
                    data: {
                        key_sreach: key_sreach,
                        selectedValue:selectedValue
                    },
                    success: function(data) {
                        $('#studentTable').html(data);
                    },
                    error: function(data) {
                        alert(data);
                    }
                })
            });

            $('#filterClass').change(function() {
                var key_sreach = $("input[name='studentName']").val();
                var selectedValue = $(this).val();
                $.ajax({
                    url: '{{ url('/student/search-student') }}',
                    method: 'GET',
                    data: {
                        key_sreach: key_sreach,
                        selectedValue:selectedValue
                    },
                    success: function(data) {
                        $('#studentTable').html(data);
                    },
                    error: function(data) {
                        alert(data);
                    }
                })
            });
        </script>
</body>

</html>
