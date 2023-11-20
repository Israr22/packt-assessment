
## Packt Assessment

# Assessment Setup Guide

Follow these steps to set up and run the assessment:

## Prerequisites

- Make sure you have [Composer](https://getcomposer.org/) installed on your machine.
- Make sure you have [Git](https://git-scm.com/) installed on your machine.
- Ensure that [XAMPP](https://www.apachefriends.org/index.html) is installed and configured.

## Installation Steps

1. **Clone the Repository:**
   Open your terminal and navigate to the `xampp/htdocs` folder. Clone the repository by running:

   ```bash
   git clone https://github.com/Israr22/packt-assessment.git
2. **Create a Database:**
   Create a new database using your preferred database management tool (e.g., phpMyAdmin).

   Configure Environment:
   Open the .env file in the root of the project. Adjust the database connection settings based on your database type (PostgreSQL or MySQL):

   For PostgreSQL:
   
            ```bash
            DB_CONNECTION=pgsql
            DB_PORT=5432

    For MySQL:
     
            DB_CONNECTION=mysql
            DB_PORT=3306

    
    Set your database name, username, and password:

      DB_DATABASE=your-database-name
      DB_USERNAME=database-username
      DB_PASSWORD=database-password


3. **Run Migrations:**
    Run the following commands to migrate the database:

    ```bash
      php artisan migrate

4. **Seed the Database:**
    Seed the database with sample data by running:    
    ```bash
        php artisan db:seed --class="BookSeeder"

5. **Update Dependencies:**
    Ensure your Composer dependencies are up to date:
    ```bash
        composer update
        npm install

6. **run build command**
    open a terminal in project directory
    ```bash
        npm run dev

6. **Run the Laravel Server:**      
    Open another terminal in same directory and start the Laravel development server:
    ```bash
        php artisan serve
    
7. **Access the Application:**    
    Open your web browser and go to http://localhost:8000 to access the assessment application

# Conclusion

You've successfully set up and configured the assessment application. Explore the features and complete the tasks as required. Good luck! 🚀    
