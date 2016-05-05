<?php
/*
Gibbon, Flexible & Open School System
Copyright (C) 2010, Ross Parker

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

//This file describes the module, including database tables

//Basic variables
$name = 'Moodle';
$description = 'A module to support support Moodle Integration. This module has no actions and is not seen by users, it just alters the database.';
$entryURL = '';
$type = 'Additional';
$category = '';
$version = '1.0.04';
$author = 'Ross Parker';
$url = 'http://rossparker.org';

//Module tables
$moduleTables[0] = "CREATE VIEW moodleUser AS SELECT username, preferredName, surname, email, website FROM gibbonPerson JOIN gibbonRole ON (gibbonRole.gibbonRoleID=gibbonPerson.gibbonRoleIDPrimary) WHERE (category='Student' OR category='Staff') AND status='Full';";
$moduleTables[1] = "CREATE VIEW moodleCourse AS SELECT * FROM `gibbonCourse` WHERE gibbonSchoolYearID=(SELECT gibbonSchoolYearID FROM gibbonSchoolYear Where status='Current');";
$moduleTables[2] = "CREATE VIEW moodleEnrolment AS SELECT DISTINCT gibbonCourse.gibbonCourseID, gibbonCourse.name, username, role FROM gibbonCourse JOIN gibbonCourseClass ON (gibbonCourseClass.gibbonCourseID=gibbonCourse.gibbonCourseID) JOIN gibbonCourseClassPerson ON (gibbonCourseClassPerson.gibbonCourseClassID=gibbonCourseClass.gibbonCourseClassID) JOIN gibbonPerson ON (gibbonCourseClassPerson.gibbonPersonID=gibbonPerson.gibbonPersonID) WHERE status='Full' AND  gibbonSchoolYearID=(SELECT gibbonSchoolYearID FROM gibbonSchoolYear Where status='Current');";

//Action rows (none)
;
