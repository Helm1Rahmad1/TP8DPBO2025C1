<?php
require_once 'models/Enrollment.php';
require_once 'models/Student.php';
require_once 'models/Course.php';

// Kelas EnrollmentController untuk mengelola data enrollment
class EnrollmentController {
    private $conn;
    private $enrollment;
    private $student;
    private $course;

    // Constructor untuk menginisialisasi koneksi database dan model
    public function __construct($conn) {
        $this->conn = $conn;
        $this->enrollment = new Enrollment($conn);
        $this->student = new Student($conn);
        $this->course = new Course($conn);
    }

    // Menampilkan semua data enrollment
    public function index() {
        $result = $this->enrollment->getAll();
        include 'views/enrollment_view.php';
    }

    // Menampilkan form untuk menambah enrollment baru
    public function create() {
        $students = $this->student->getAll();
        $courses = $this->course->getAll();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $this->enrollment->setStudentId($_POST['student_id']);
            $this->enrollment->setCourseId($_POST['course_id']);
            $this->enrollment->setEnrollmentDate($_POST['enrollment_date']);
            $this->enrollment->setGrade($_POST['grade']);

            if ($this->enrollment->create()) {
                header("Location: index.php?action=enrollments");
                exit;
            } else {
                $error = "Error creating enrollment!";
            }
        }
        include 'views/enrollment_create.php';
    }

    // Menampilkan form untuk mengedit enrollment yang sudah ada
    public function edit() {
        if (!isset($_GET['id'])) {
            header("Location: index.php?action=enrollments");
            exit;
        }

        $id = $_GET['id'];
        $enrollmentData = $this->enrollment->getById($id);

        $students = $this->student->getAll();
        $courses = $this->course->getAll();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $this->enrollment->setId($id);
            $this->enrollment->setStudentId($_POST['student_id']);
            $this->enrollment->setCourseId($_POST['course_id']);
            $this->enrollment->setEnrollmentDate($_POST['enrollment_date']);
            $this->enrollment->setGrade($_POST['grade']);

            if ($this->enrollment->update()) {
                header("Location: index.php?action=enrollments");
                exit;
            } else {
                $error = "Error updating enrollment!";
            }
        }

        include 'views/enrollment_edit.php';
    }

    // Menghapus enrollment berdasarkan ID
    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($this->enrollment->delete($id)) {
                header("Location: index.php?action=enrollments");
                exit;
            }
        }
        header("Location: index.php?action=enrollments");
        exit;
    }
}
?>