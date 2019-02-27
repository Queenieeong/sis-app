<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'LandingPageController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['my_profile'] = 'UserController/profile';

$route['dashboard']         = 'DashboardController';
$route['teacher']           = 'TeacherController';
$route['students']          = 'StudentController';
$route['scheduling']        = 'SchedulingController';
$route['registrar']         = 'RegistrarController';
$route['enrolment']         = 'EnrolmentController';
$route['system_parameters'] = 'SystemParameterController';


// New

$route['registrar/add']         = 'RegistrarController/AddNewStudent';

$route['schoolYears']       = 'SchoolYearController';
$route['schoolDepartments'] = 'SchoolDepartmentController';
$route['schoolGradeLevels'] = 'SchoolGradeLevelController';
$route['schoolSections']    = 'SchoolSectionController';
$route['schoolSubjects']    = 'SchoolSubjectController';

$route['schoolYears/saveData']       = 'SchoolYearController/saveData';
$route['schoolDepartments/saveData'] = 'SchoolDepartmentController/saveData';
$route['schoolGradeLevels/saveData'] = 'SchoolGradeLevelController/saveData';
$route['schoolSections/saveData']    = 'SchoolSectionController/saveData';
$route['schoolSubjects/saveData']    = 'SchoolSubjectController/saveData';

$route['admission']      = 'AdmissionController/add';
$route['admission/save'] = 'AdmissionController/add';

$route['student/details/(:any)'] = 'StudentController/details/$1';
$route['student/update/(:any)']  = 'RegistrarController/update/$1';

$route['scheduling/addClass/(:num)']  = 'SchedulingController/addClass/$1';
$route['scheduling/create']           = 'SchedulingController/create';
$route['scheduling/ajax/([a-zA-Z]+)'] = 'SchedulingController/ajax/$1';
$route['scheduling/details/(:any)']   = 'SchedulingController/details/$1';

$route['users'] = 'UserController';
$route['users/change_password/(:num)/(:any)'] = 'UserController/change_password/$1/$2';
$route['users/reset_password/(:num)'] = 'UserController/reset_password/$1';
$route['users/create_user'] = 'UserController/create_user';
$route['roles'] = 'AuthController/roleList';
$route['users_roles'] = 'AuthController/userGroupList';
$route['roles_permissionss'] = 'AuthController/rolePermissionList';

$route['scheduling/subject-reference/(:num)'] = 'SchedulingController/subjects/$1';
$route['schedule/master'] = 'SchedulingController/master_schedule';

$route['teacher/add']            = 'TeacherController/add';
$route['teacher/details/(:num)'] = 'TeacherController/details/$1';
$route['teacher/update/(:num)']  = 'TeacherController/update/$1';
$route['teacher/upload_profile_picture/(:num)'] = 'TeacherController/uploadProfilePicture/$1';

$route['announcements']                     = 'AnnouncementController';
$route['announcements/create']              = 'AnnouncementController/create';
$route['announcements/edit/(:num)']         = 'AnnouncementController/edit/$1';
$route['announcements/published/(:num)']    = 'AnnouncementController/published/$1';
$route['announcements/unpublished/(:num)']  = 'AnnouncementController/unpublished/$1';


$route['events']                     = 'EventsController';
$route['events/create']              = 'EventsController/create';
$route['events/edit/(:num)']         = 'EventsController/edit/$1';
$route['events/published/(:num)']    = 'EventsController/published/$1';
$route['events/unpublished/(:num)']  = 'EventsController/unpublished/$1';

$route['enrolment/process/(:num)'] = 'EnrolmentController/process/$1';

$route['dashboard/uploadProfilePicture'] = 'DashboardController/uploadProfilePicture';
$route['student/credentials/(:num)'] = 'RegistrarController/studentCredentials/$1';

$route['credential'] = 'CredentialController';
$route['credential/create'] = 'CredentialController/create';
$route['credential/createTemplate'] = 'CredentialController/createTemplate';

$route['students/do_upload/(:num)'] = 'StudentController/doUpload/$1';

$route['schoolyear/set_as_current/(:num)'] = 'SchoolYearController/setAsCurrent/$1';
$route['account/my_classes/student'] = 'AccountController/myClasses/$1';
$route['account/my_classes/teacher'] = 'AccountController/myClasses/$1';
$route['account/my_class/students/(:num)'] = 'AccountController/classStudents/$1/$2';

$route['online_enrollment'] = 'OnlineEnrollmentController/submit';
$route['online_enrollment/submit'] = 'OnlineEnrollmentController/submit';