<?php
class Enrollment {
    private $conn;
    private $id;
    private $student_id;
    private $course_id;
    private $enrollment_date;
    private $grade;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Getters dan setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getStudentId() {
        return $this->student_id;
    }

    public function setStudentId($student_id) {
        $this->student_id = $student_id;
    }

    public function getCourseId() {
        return $this->course_id;
    }

    public function setCourseId($course_id) {
        $this->course_id = $course_id;
    }

    public function getEnrollmentDate() {
        return $this->enrollment_date;
    }

    public function setEnrollmentDate($enrollment_date) {
        $this->enrollment_date = $enrollment_date;
    }

    public function getGrade() {
        return $this->grade;
    }

    public function setGrade($grade) {
        $this->grade = $grade;
    }

    // Database operations
    public function getAll() {
        $sql = "SELECT e.*, s.name as student_name, c.course_name 
                FROM enrollments e
                JOIN students s ON e.student_id = s.id
                JOIN courses c ON e.course_id = c.id";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getById($id) {
        $sql = "SELECT e.*, s.name as student_name, c.course_name 
                FROM enrollments e
                JOIN students s ON e.student_id = s.id
                JOIN courses c ON e.course_id = c.id
                WHERE e.id = $id";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function getByStudentId($student_id) {
        $sql = "SELECT e.*, c.course_name, c.course_code 
                FROM enrollments e
                JOIN courses c ON e.course_id = c.id
                WHERE e.student_id = $student_id";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getByCourseId($course_id) {
        $sql = "SELECT e.*, s.name as student_name, s.nim 
                FROM enrollments e
                JOIN students s ON e.student_id = s.id
                WHERE e.course_id = $course_id";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function create() {
        $student_id = $this->student_id;
        $course_id = $this->course_id;
        $enrollment_date = $this->enrollment_date;
        $grade = $this->grade;

        $sql = "INSERT INTO enrollments (student_id, course_id, enrollment_date, grade) 
                VALUES ('$student_id', '$course_id', '$enrollment_date', '$grade')";
        return $this->conn->query($sql);
    }

    public function update() {
        $id = $this->id;
        $student_id = $this->student_id;
        $course_id = $this->course_id;
        $enrollment_date = $this->enrollment_date;
        $grade = $this->grade;

        $sql = "UPDATE enrollments SET student_id='$student_id', course_id='$course_id', 
                enrollment_date='$enrollment_date', grade='$grade' WHERE id=$id";
        return $this->conn->query($sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM enrollments WHERE id=$id";
        return $this->conn->query($sql);
    }
}
?>