# KSI Consulting | Software Developer Assessment Project
The purpose of this project is to help KSI assess your proficiency in some of the languages, frameworks, and services required for the [PHP/CodeIgniter/TypeScript/AngularJS](https://ca.indeed.com/job/phpcodeignitertypescriptangularjs-developer-ad8e21fa6fbec549) position.

## Objective
To design, develop, and deliver a web app using CodeIgniter, AngularJS, and Google Cloud Platform that captures some data entered by a user, displays it on the screen, and saves a generated PDF that can be retrieved for viewing or downloading.

## Languages, Frameworks, Libraries, and Services
_**All**_ of the following _**must**_ be used on the project:

### 1. [PHP](https://www.php.net/downloads.php#v7.4.27)
```json
{a
  "require": {
    "php": "~7.4.27",
    "twig/twig": "~1.0"
  }
}
```

### 2. [CodeIgniter](https://codeload.github.com/bcit-ci/CodeIgniter/zip/3.1.6)
```php
<?php
   const CI_VERSION = '3.1.6';
?>
```

### 3. [Node.js](https://nodejs.org/en/) 
```json
{
  "dependencies": {
    "angular": "^1.6.4"
  }
}
```

### 4. [Docker](https://www.docker.com/)
```
FROM php:7.4-apache
```

### 5. [Google Cloud Platform](https://cloud.google.com/) (GCP)
- [Cloud Build](https://cloud.google.com/build)
- [Cloud Run](https://cloud.google.com/run)
- [Cloud SQL for MySQL](https://cloud.google.com/sql/mysql) 5.7
- [Cloud Storage](https://cloud.google.com/storage)
- [Virtual Private Cloud](https://cloud.google.com/vpc) (VPC)

#### GCP Project
- [codeigniter-angularjs-0216](https://console.cloud.google.com/home/dashboard?project=codeigniter-angularjs-0216)

### 6. [wkhtmltopdf](https://wkhtmltopdf.org/downloads.html)

### Note
[TypeScript](https://www.typescriptlang.org/) is not required.


## Requirements
### Functional
Design and develop a CodeIgniter web app that:

1. Maintains a list of four types of `pets` in a database:
    - Dog
    - Cat
    - Rabbit
    - Bird


2. Captures the following _required_ data in a form:
    - "Name"
        - `type="text"`
        - `name="owner_name"`
    - "Which of these animals would you like to have as a pet?"
        - `type="radio"`
        - `name="pet_type_name"`
        - 5 choices based on 4 `pets` from the database plus "None", representing `NULL`, which is the default

    with the ability to "Submit" or "Reset" the form, where "Reset" clears the forms fields (or sets any defaults) and removes anything else displayed that is not part of the form.


3. Stores the submitted `owners` data in the database, ensuring that the `owners` choice to one of the `pets` is stored as a _reference_ with the use of a foreign key (allowing `NULL`).


4. Displays the data in a table below the form after the form is submitted, by embedding HTML generated from a template where the field names are static and the corresponding values are queried from the database (not taken from the form) and assigned to variables: 
        
    | Field | Value |
    | ---| --- |
    | Name | `{{ owner.name }}` |
    | Pet | `{{ pet.type_name }}` |


5. Generates and stores a PDF file from the HTML based on the same template (as above) with a file name based on:
    - the value of the "Name" field, trimmed with all non-alphanumeric characters removed; plus
    - the date and time, formatted like " YYYY-MM-DD HH:MM:SS";

    with the `owners.filename` stored in the database.

 
6. Displays a "PDF" button that when pressed, retrieves the _stored_ PDF and presents it for viewing or downloading.


### Non-functional
Deliver a web app that:

1. Is developed in a branch called "try" (created from "dev" which was originally created from "main") on the repository [kefelan/codeigniter-angularjs].


2. Uses **CodeIgniter** and **AngularJS**.


3. Uses **Twig** to generate HTML from a template.


4. Uses **wkhtmltopdf** to generate a PDF file from HTML.


5. Gets built using **Cloud Build** triggered
   1. from the source [kefelan/codeigniter-angularjs](https://github.com/kefelan/codeigniter-angularjs)
   2. on a "Push to branch" event
   3. with the branch matching the regular expression `^main$`
   4. configured using a Cloud Build `yaml` configuration file located in the repository [kefelan/codeigniter-angularjs](https://github.com/kefelan/codeigniter-angularjs)
   5. that invokes the build based on a `php:7.4-apache` **Docker** image
   6. that gets pushed and deployed to a **Cloud Run** service, and
   7. ultimately runs any database migrations.


6. Runs on a **Cloud Run** service.


7. Connects to a MySQL 5.7 database on a **Cloud SQL** instance using an internal Private IP address over a **Virtual Private Cloud** (VPC) network.


8. Stores files in a bucket on **Cloud Storage**.

#### GCP Project
- [codeigniter-angularjs-0216](https://console.cloud.google.com/home/dashboard?project=codeigniter-angularjs-0216)