<?php include("config.php"); ?>
<?php

//Kollar upp vilken request (get, post, put, delete) som använts
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/')); //klipper ut text för kontroll
//Läser in data från anropet och konverterar till JSON
$input = json_decode(file_get_contents('php://input'),true);

//Alla
$id = $input['ID'];
$GETid = $request[1];

//Work
$workplace = $input['WORKPLACE'];
$title = $input['TITLE'];
$workStartdate = $input['STARTDATE'];
$workEnddate = $input['ENDDATE'];

//Courses
$school = $input['SCHOOL'];
$coursename = $input['COURSENAME'];
$courseStartdate = $input['STARTDATE'];
$courseEnddate = $input['ENDDATE'];

//Webpage
$firstWebimage = "standardweb.png";
$webimage = $input['WEBIMAGE'];
$webname = $input['WEBNAME'];
$weburl = $input['WEBURL'];
$webdescription = $input['WEBDESCRIPTION'];

//Personal
$firstname = $input['FIRSTNAME'];
$lastname = $input['LASTNAME'];
$worktitle = $input['WORKTITLE'];
$picture = $input['PICTURE'];
$phone = $input['PHONE'];
$email = $input['EMAIL'];
$city = $input['CITY'];
$userID = 1;

//Language
$speak = $input['SPEAK'];


header("Access-Control-Allow-Origin: *"); //Ta bort * och byt ut mot specifik webadress vid behov
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, OPTIONS');
header("Content-Type: application/json; charset=UTF-8");


if($request[0] == "work") { 

    global $work;
    $work = new Work();

    switch ($method) {

        case "GET":
        if(isset($GETid)) {
            $getSpecificWorkinfo = $work->getWorkById($GETid);
            echo json_encode($getSpecificWorkinfo);

        } else {
            $getWorkinfo = $work->getWork();
            echo json_encode($getWorkinfo);
        }
        break;
  
        case "PUT":
        $work->updateWork($workplace, $title, $workStartdate, $workEnddate, $id);
        break;

        case "POST":
        $work->addWork($workplace, $title, $workStartdate, $workEnddate);
        break;

        case "DELETE":
        $work->deleteWork($id);
        break;
    }

} else if($request[0] == "course") { 

    global $course;
    $course = new Courses();

    switch ($method) {

        case "GET":
        if(isset($GETid)) {
            $getSpecificCourse = $course->getCourseById($GETid);
            echo json_encode($getSpecificCourse);

        } else {
            $getCourses = $course->getCourse();
            echo json_encode($getCourses);
        }
        break;
  
        case "PUT":
        $course->updateCourse($school, $coursename, $courseStartdate, $courseEnddate, $id);
        break;

        case "POST":
        $course->addCourse($school, $coursename, $courseStartdate, $courseEnddate);
        break;

        case "DELETE":
        $course->deleteCourse($id);
        break;
    }

} else if($request[0] == "webpage") { 
    global $web;
    $web = new Webpage();

    switch ($method) {

        case "GET":
        if(isset($GETid)) {
            $getSpecificWeb = $web->getWebById($GETid);
            echo json_encode($getSpecificWeb);

        } else {
            $getWebInfo = $web->getWeb();
            echo json_encode($getWebInfo);
        }
        break;
  
        case "PUT":
        $web->updateWeb($webname, $weburl, $webdescription, $id);
        break;

        case "POST":
        $web->addWeb($firstWebimage, $webname, $weburl, $webdescription);
        break;

        case "DELETE":
        $web->deleteWeb($id);
        break;
    }

} else if($request[0] == "personal") { 
    global $personal;
    $personal = new Personal();

    switch ($method) {

        case "GET":
        $getPersonalinfo = $personal->getPersonal();
        echo json_encode($getPersonalinfo);
        break;
  
        case "PUT":
        $personal->updatePersonal($firstname, $lastname, $worktitle, $phone, $email, $city, $userID);
        break;
    }

} else if($request[0] == "personalimage") { 
    global $personalimage;
    $personalimage = new Personalimage();

    switch ($method) {

        case "PUT":
        $personalimage->updatePersonalimage($picture, $userID);
        break;

    }

} else if($request[0] == "webimage") { 
    global $webpageimage;
    $webpageimage = new Webimage();

    switch ($method) {

        case "PUT":
        $webpageimage->updateWebimage($webimage, $id);
        break;

    }

} else if($request[0] == "language") { 
    global $language;
    $language = new Language();

    switch ($method) {

        case "GET":
        $getLanguages = $language->getLanguage();
        echo json_encode($getLanguages);
        break;
  
        case "PUT":
        $language->AUDLanguage($speak);
        break;

        case "POST":
        $language->AUDLanguage($speak);
        break;

        case "DELETE":
        $language->AUDLanguage($speak);
        break;
    }

} else {
	http_response_code(404);
	exit();
}

?>