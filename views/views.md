# Views

This exclusively includes all frontend details of the codebase. Only the User Authentication can be explicitly applied with its backend logic

**For example:**

`Dashboard.php` View on `views/` folder, while the `dashboard_logic.php` is within `api/` folder.

> ### CAUTION!: 
> **Backend logic codes are located at the `api/` folder**

### Layouts folder
The `views\layout` folder is purposely for the header and footer template of the all views of the system such as the Frontend of the login, register, dashboard, etc.### 

### Don't create new folders within `view` folder
All view or frontend files are located in the `views` folder only, for redirecting purposes in alignment to the skill level of the developers; it is advised to **NOT** create new folders for other views such `auth` folder, `components` folder, and other templating folders.