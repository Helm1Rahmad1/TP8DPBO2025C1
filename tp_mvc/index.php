<?php
// Sertakan koneksi database
require_once 'config/Database.php';

// Sertakan semua controller
require_once 'controllers/StudentController.php';
require_once 'controllers/CourseController.php';
require_once 'controllers/EnrollmentController.php';

// Buat instance dari masing-masing controller
$studentController = new StudentController($conn);
$courseController = new CourseController($conn);
$enrollmentController = new EnrollmentController($conn);

// Ambil aksi dari parameter URL, default ke 'students'
$action = isset($_GET['action']) ? $_GET['action'] : 'students';

// Routing ke controller dan aksi yang sesuai
switch ($action) {
    // Routing untuk Student
    case 'students':
        $studentController->index();
        break;
    case 'createStudent':
        $studentController->create();
        break;
    case 'editStudent':
        $studentController->edit();
        break;
    case 'deleteStudent':
        $studentController->delete();
        break;

    // Routing untuk Course
    case 'courses':
        $courseController->index();
        break;
    case 'createCourse':
        $courseController->create();
        break;
    case 'editCourse':
        $courseController->edit();
        break;
    case 'deleteCourse':
        $courseController->delete();
        break;

    // Routing untuk Enrollment
    case 'enrollments':
        $enrollmentController->index();
        break;
    case 'createEnrollment':
        $enrollmentController->create();
        break;
    case 'editEnrollment':
        $enrollmentController->edit();
        break;
    case 'deleteEnrollment':
        $enrollmentController->delete();
        break;

    // Jika aksi tidak dikenali, arahkan ke daftar student
    default:
        $studentController->index();
        break;
}

// Tutup koneksi database
$conn->close();
?>
