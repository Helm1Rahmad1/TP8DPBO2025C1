<?php
require_once 'models/Student.php';

// Kelas StudentController untuk mengelola data mahasiswa
class StudentController {
    private $conn;
    private $student;

    // Constructor untuk menginisialisasi koneksi database dan model
    public function __construct($conn) {
        $this->conn = $conn;
        $this->student = new Student($conn);
    }

    // Menampilkan semua data mahasiswa
    public function index() {
        $result = $this->student->getAll();
        include 'views/student_view.php';
    }

    // Menampilkan form untuk menambah mahasiswa baru
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $this->student->setName($_POST['name']);
            $this->student->setNim($_POST['nim']);
            $this->student->setPhone($_POST['phone']);
            $this->student->setJoinDate($_POST['join_date']);

            if ($this->student->create()) {
                header("Location: index.php?action=students");
                exit;
            } else {
                $error = "Error creating student!";
            }
        }
        include 'views/student_create.php';
    }

    // Menampilkan form untuk mengedit mahasiswa yang sudah ada
    public function edit() {
        if (!isset($_GET['id'])) {
            header("Location: index.php?action=students");
            exit;
        }

        $id = $_GET['id'];
        $studentData = $this->student->getById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $this->student->setId($id);
            $this->student->setName($_POST['name']);
            $this->student->setNim($_POST['nim']);
            $this->student->setPhone($_POST['phone']);
            $this->student->setJoinDate($_POST['join_date']);

            if ($this->student->update()) {
                header("Location: index.php?action=students");
                exit;
            } else {
                $error = "Error updating student!";
            }
        }

        include 'views/student_edit.php';
    }

    // Menampilkan form untuk menghapus mahasiswa
    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($this->student->delete($id)) {
                header("Location: index.php?action=students");
                exit;
            }
        }
        header("Location: index.php?action=students");
        exit;
    }
}
?>