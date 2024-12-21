```markdown
# Mood Tracker and Discussion Forum

This project is a Mood Tracker and Discussion Forum platform designed to help users track their mood, visualize trends, and engage in meaningful discussions related to mental health and mood management.

## Features
- Mood Tracker: Users can log their daily mood and view a monthly calendar with mood highlights.
- Discussion Forum: A platform for users to ask questions and engage in discussions related to mental health and well-being.
- Role-Based Access Control: Includes roles for super-admin, admin, and regular users with different permissions.
- Interactive Charts: Displays mood trends using line charts for visualization.
- WYSIWYG Form: Users can submit questions with a rich-text editor for formatting.

---

## Installation Instructions

1. **Clone the repository**:
   ```bash
   git clone <repository_url>
   ```

2. **Navigate to the project directory**:
   ```bash
   cd <project_directory>
   ```

3. **Copy the environment configuration file**:
   ```bash
   cp .env.example .env
   ```

4. **Set up your database**:
   - Configure the `.env` file with your database credentials.
   - Example:
     ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=calmspace
     DB_USERNAME=root
     DB_PASSWORD=
     ```

5. **Run database migrations and seed data**:
   - The seeder will create:
     - 5 **super-admin**
     - Initial mood master data
     - Initial roles and permissions
   ```bash
   php artisan migrate:fresh --seed
   ```

6. **Generate the application key**:
   ```bash
   php artisan key:generate
   ```

7. **Start the development server**:
   ```bash
   php artisan serve
   ```

---

## Credentials
- **Super-Admin Login**:
  - Email: `reynaldi@calmspace.com`
  - Password: `adminadmin`
---

## Key Commands
- **Migrate Database**: `php artisan migrate`
- **Seed Database**: `php artisan db:seed`
- **Clear Cache**: `php artisan cache:clear`

---

## Usage
- Access the Mood Tracker from the navigation bar to log and view your mood.
- Navigate to the Discussion Forum to ask questions and view discussions.

---

## Dependencies
- Laravel Framework
- Spatie Laravel Permissions (for role-based access control)
- CKEditor (for WYSIWYG editor)
- Chart.js (for visualizing mood trends)

---

## Contributing
Feel free to fork the repository and submit pull requests for new features or improvements. Ensure all changes are tested before submission.
