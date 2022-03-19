<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function Success_Delete()
        {
            swal({
                title: "Successful!",
                text: "Deleted Successfully",
                icon: "success",
                button: false,
                timer: 2000
                }).then((value) => {
                     location.reload();
                });
        }
        function Error_Department_Delete()
        {
            swal({
                title: "Error!",
                text: "Teachers belong to this Department",
                icon: "error",
                button: false,
                timer: 1500
                // button: "Try Again",
                });
        }
        function Warning_Department_Update()
        {
            swal({
                title: "Warning!",
                text: "Same Department ID",
                icon: "warning",
                button: false,
                timer: 1500
                });
        }
        function Error_Student_Delete()
        {
            swal({
                title: "Error!",
                text: "Remove Student from All the Sections",
                icon: "error",
                button: false,
                timer: 1500
                // button: "Try Again",
                });
        }
        function Warning_Student_Update()
        {
            swal({
                title: "Warning!",
                text: "Same Student ID",
                icon: "warning",
                button: false,
                timer: 1500
                });
        }
        function Error_Faculty_Delete()
        {
            swal({
                title: "Error!",
                text: "Teacher is Teaching in Sections",
                icon: "error",
                button: false,
                timer: 1500
                // button: "Try Again",
                });
        }
        function Warning_Faculty_Update()
        {
            swal({
                title: "Warning!",
                text: "Same Teacher ID",
                icon: "warning",
                button: false,
                timer: 1500
                });
        }
        function Error_Course_Delete()
        {
            swal({
                title: "Error!",
                text: "Teachers are Teaching this Course",
                icon: "error",
                button: false,
                timer: 1500
                // button: "Try Again",
                });
        }
        function Warning_Course_Update()
        {
            swal({
                title: "Warning!",
                text: "Same Course ID",
                icon: "warning",
                button: false,
                timer: 1500
                });
        }
        function Warning_Marks_Update()
        {
            swal({
                title: "Warning!",
                text: "Invalid Input, Or No Changes Made",
                icon: "warning",
                button: false,
                timer: 1500
                });
        }
        function Success_Marks_Update()
        {
            swal({
                title: "Successful!",
                text: "Marks Updated",
                icon: "success",
                button: false,
                timer: 2000
                });
        }
        function Warning_Faculty_Lecture()
        {
            swal({
                title: "Warning!",
                text: "Select a Section First",
                icon: "warning",
                button: false,
                timer: 1500
                });
        }
        function Error_Faculty_Lecture()
        {
            swal({
                title: "Error!",
                text: "Couldn't Add Lecture",
                icon: "error",
                button: false,
                timer: 1500
                // button: "Try Again",
                });
        }
        function Success_Faculty_Lecture()
        {
            swal({
                title: "Successful!",
                text: "Lecture Added",
                icon: "success",
                button: false,
                timer: 2000
                });
        }
        function Error_Section_Delete()
        {
            swal({
                title: "Error!",
                text: "Students in the Section",
                icon: "error",
                button: false,
                timer: 1500
                // button: "Try Again",
                });
        }
        function Warning_Section_Update()
        {
            swal({
                title: "Warning!",
                text: "Same Section ID",
                icon: "warning",
                button: false,
                timer: 1500
                });
        }
    </script>