# Utanglista
 Native Php Web-based Retail Debt Management System for Advance Database System course subject

### **Note:**
> ***Folders (api, config, views) have their own ReadME File, it is recommended to read them first before contributing to the codebase***. 

---
# Installation and Set Up
### Copy Github URL and clone project:

```
git clone https://github.com/panzerweb/utanglista.git
```

# Local Server Environment Set up
**Note:** When cloning, make sure the path is within `xampp/htdocs/` if you are using XAMPP Control Panel; `laragon/www/` if you are using Laragon.

- For XAMPP users, activate your Xampp and type in your browser `localhost::8000/utanglista/index.php` or `localhost/utanglista/index.php`. If both fails, please configure your XAMPP.
- For Laragon users, press `start all` in your Laragon and right-click on the user interface and find the `www` and then the `utanglista` name.

---
# Dependencies


The project does not use `.gitignore` to exclude node modules from being committed to the repository. However, it recommended to reenter the installation of dependencies:

```
npm install
```

---
# Setting up the Database
Create your Database in either XAMPP or Laragon, name it using `utanglista_db`.

Locate the `.sql` file from `public/sql/` directory and import the file in your respective local server environment.

> If you want a different database name, kindly go to `config.php` inside `utanglista/config/` directory. Change the `$db_table = "utanglista_db"` and refresh the system and see if it still is connected.

# Contribution
This project is made as an academic project requirement. However, this project will not be strictly open-source, although forking and cloning this project is allowed, any pull request might have a high chance of being rejected.

For such pull requests, kindly commit your code with a meaningful message alongside with the overview of your code changes, and features.

# Technologies:

### Frontend:
- HTML5
- CSS3
- JavaScript (ES6)
- Bootstrap 5.3
### Backend:
- Php
### Database
- MySQL
### Libraries and Dependencies
- Sweet Alert 2
- FullCalendarJS
- Bootstrap 5.3
- Bootstrap Icons

# Common Features:
1. Role-based access *(Soon)*
2. Customer, Product CRUD
3. Transaction management
4. Diminishing Interest implementation
5. Simple statistical data overview
6. Logs viewing

# Developers
- Romeo Selwyn Villar
- Klarence De Gracia
- Denniela Princess Tingson
- Gian Carlo Marin
- Dennis Hamero