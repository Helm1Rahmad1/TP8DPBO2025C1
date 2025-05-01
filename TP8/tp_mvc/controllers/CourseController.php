<?php
require_once 'models/Course.php';

// Kelas CourseController untuk mengelola data course
class CourseController {
    private $conn;
    private $course;

    // Constructor untuk menginisialisasi koneksi database dan model
    public function __construct($conn) {
        $this->conn = $conn;
        $this->course = new Course($conn);
    }

    // Menampilkan semua data course
    public function index() {
        $result = $this->course->getAll();
        include 'views/course_view.php';
    }

    // Menampilkan form untuk menambah course baru
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $this->course->setCourseCode($_POST['course_code']);
            $this->course->setCourseName($_POST['course_name']);
            $this->course->setCredits($_POST['credits']);
            $this->course->setDescription($_POST['description']);

            if ($this->course->create()) {
                header("Location: index.php?action=courses");
                exit;
            } else {
                $error = "Error creating course!";
            }
        }
        include 'views/course_create.php';
    }

    // Menampilkan form untuk mengedit course yang sudah ada
    public function edit() {
        if (!isset($_GET['id'])) {
            header("Location: index.php?action=courses");
            exit;
        }

        $id = $_GET['id'];
        $courseData = $this->course->getById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $this->course->setId($id);
            $this->course->setCourseCode($_POST['course_code']);
            $this->course->setCourseName($_POST['course_name']);
            $this->course->setCredits($_POST['credits']);
            $this->course->setDescription($_POST['description']);

            if ($this->course->update()) {
                header("Location: index.php?action=courses");
                exit;
            } else {
                $error = "Error updating course!";
            }
        }

        include 'views/course_edit.php';
    }

    // Menghapus course berdasarkan ID
    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($this->course->delete($id)) {
                header("Location: index.php?action=courses");
                exit;
            }
        }
        header("Location: index.php?action=courses");
        exit;
    }
}
?>