<?php
class Course {
    private $conn;
    private $id;
    private $course_code;
    private $course_name;
    private $credits;
    private $description;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Getters dan Setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCourseCode() {
        return $this->course_code;
    }

    public function setCourseCode($course_code) {
        $this->course_code = $course_code;
    }

    public function getCourseName() {
        return $this->course_name;
    }

    public function setCourseName($course_name) {
        $this->course_name = $course_name;
    }

    public function getCredits() {
        return $this->credits;
    }

    public function setCredits($credits) {
        $this->credits = $credits;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    // Database operations
    public function getAll() {
        $sql = "SELECT * FROM courses";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getById($id) {
        $sql = "SELECT * FROM courses WHERE id = $id";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function create() {
        $course_code = $this->course_code;
        $course_name = $this->course_name;
        $credits = $this->credits;
        $description = $this->description;

        $sql = "INSERT INTO courses (course_code, course_name, credits, description) 
                VALUES ('$course_code', '$course_name', '$credits', '$description')";
        return $this->conn->query($sql);
    }

    public function update() {
        $id = $this->id;
        $course_code = $this->course_code;
        $course_name = $this->course_name;
        $credits = $this->credits;
        $description = $this->description;

        $sql = "UPDATE courses SET course_code='$course_code', course_name='$course_name', 
                credits='$credits', description='$description' WHERE id=$id";
        return $this->conn->query($sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM courses WHERE id=$id";
        return $this->conn->query($sql);
    }
}
?>