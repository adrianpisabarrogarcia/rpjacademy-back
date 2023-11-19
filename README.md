# Backend of RedPJ Academy

Based on a PHP framework: [Slim](https://www.slimframework.com/)
## To start the framework

### Install composer dependecies

```sh
$ composer install
```

### Run an ebmeded server

```sh
$ cd ./public
$ php -S localhost:8888
```
## Api documentation example

# API Endpoints and Controller Methods

## Courses Controller

### List Courses
- **Method:** `listCourses`
- **Endpoint:** `GET /api/courses`

### Get Course Details
- **Method:** `getCourseDetails`
- **Endpoint:** `GET /api/courses/{id}`

### Create Course
- **Method:** `createCourse`
- **Endpoint:** `POST /api/courses`

### Update Course
- **Method:** `updateCourse`
- **Endpoint:** `PUT /api/courses/{id}`

### Delete Course
- **Method:** `deleteCourse`
- **Endpoint:** `DELETE /api/courses/{id}`

## Students Controller

### List Students in Course
- **Method:** `listStudentsInCourse`
- **Endpoint:** `GET /api/courses/{id}/students`

### Enroll Student in Course
- **Method:** `enrollStudentInCourse`
- **Endpoint:** `POST /api/courses/{id}/students`

## Lessons Controller

### List Lessons in Course
- **Method:** `listLessonsInCourse`
- **Endpoint:** `GET /api/courses/{id}/lessons`

### Add Lesson to Course
- **Method:** `addLessonToCourse`
- **Endpoint:** `POST /api/courses/{id}/lessons`

### Update Lesson Information
- **Method:** `updateLessonInformation`
- **Endpoint:** `PUT /api/courses/{idCourse}/lessons/{idLesson}`

### Delete Lesson from Course
- **Method:** `deleteLessonFromCourse`
- **Endpoint:** `DELETE /api/courses/{idCourse}/lessons/{idLesson}`
