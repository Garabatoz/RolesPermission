## About This Repository

This repository uses PHP Laravel and Javascript Vue.js frameworks to implement Role Permissions management in CMS. Cookie based SPA authorization feature of Laravel Sanctum package is used to authorize the user inside the content management system. If a logged user has permission to do specific task, the link to visit the task and the page containing the task will be available to the logged user. Otherwise the page will be unavailable to the logged user with 401 unauthorized error even though try to access the route manually. This repo utilizes the SPA feature of Vue.js.

## Logging In

## For install
1. php artisan passport:client --personal
