<?php
function getCourses() {
    $db = dbConnect();
    $courses = $db->prepare('SELECT course.*, user.id id_user_table, user.firstname firstname_user, user.name name_user FROM course INNER JOIN user ON course.id_user = user.id ORDER BY course.id DESC');
    $courses->execute();
    $courses = $courses->fetchAll(PDO::FETCH_ASSOC);
    return $courses;
}
function getCourseUnique($id) {
    $db = dbConnect();
    $course = $db->prepare('SELECT course.*, user.id userid, user.name username, user.firstname userfirstname FROM course INNER JOIN user ON course.id_user = user.id WHERE course.id = :id ');
    $course->bindParam(':id', $id);
    $course->execute();
    $course = $course->fetchAll(PDO::FETCH_ASSOC);
    return $course;
}