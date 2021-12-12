
## About Project

 This project delivers server-side application in PHP exposing RSS feeds

## Installation

you will need composer to run this project

#### Install dependencies using composer
- composer install


## Using Project

Postman is prefered for testing Api end point

end points

1. localhost:8000/api/<category_name>
This end point will list all the articles under category


#### accepted json format data in get request
- content

#### Request api end point will fetch data from cache for 10 minutes if request category matched.