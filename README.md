# JobSeeker
Example project for Giant Monkey Robot test

# Versions
- PHP 7.2
- Laravel 7.0
- Npm 6.10.3
- Composer 1.10.1
- Vue 2.6.11

# Install 

- For using mysql database, I used XAMPP control panel.
- Create database: jobs_db
- Run "php artisan migrate" for run the migrations for three tables on mysql.
- Run "npm install" for Vue framework
- Run laravel project with artisan: php artisan serve
- Go to localhost:8000

# API Usage

# Methods:
    # GET 
    /jobs --> this GET method lists all the 'high' priority and pending state jobs.
        -Return: A job's list object.
        [
            {
                "id": 2,
                "processor_id": 2,
                "submitter_id": 2,
                "state": 0,
                "priority": "high",
                "name": "Job Name",
                "description": "A simple job example ",
                "created_at": "2020-03-27T15:20:52.000000Z",
                "updated_at": "2020-03-27T15:20:52.000000Z"
            },
            {
                "id": 12,
                "processor_id": 1,
                "submitter_id": 2,
                "state": 0,
                "priority": "high",
                "name": "exmaple job",
                "description": "example dscription",
                "created_at": "2020-03-27T21:15:00.000000Z",
                "updated_at": "2020-03-27T21:15:00.000000Z"
            }]
            
    - POST: /jobs --> this POST method serves for create a new job
        example body: {
                        "job":	{
                            "processor_id": 2,
                            "submitter_id": 2,
                            "state": 0,
                            "priority": "medium",
                            "name": "Job Example",
                            "description": "a job example"
                        }	
                     }
        returns: 
                  {
                    "message": "Job has been created successfully! job ID: (job id)"
                  }
                  
                  
    - PUT: /jobs/update --> this method serves for update an specific job by its id
     example body:
            {
                "id":1
                "processor_id": 2,
                "submitter_id": 2,
                "state": 1,
                "priority": "medium",
                "name": "New Job Example",
                "description": "a new job example description"
            }
        
        returns:
             {
                 "message": "Job has been updated successfully!"
             }
        
    - POST: /findJobById --> this method search a job by its id.
        {
            id: 1
        }
        
    returns: 
        "job":	{
            "id":1
            "processor_id": 2,
            "submitter_id": 2,
            "state": 1,
            "priority": "medium",
            "name": "Job Example",
            "description": "a job example"
        }	
        
 # Util information For "Job" class
 
 - state: 0 is for pending, 1 is for completed.
 - priority: it could be "high", "medium" or "low"
