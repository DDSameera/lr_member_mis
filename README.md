## MEMBER MANAGEMENT SYSTEM (MMS)

`MMS` is PHP Laravel + AJAX Backend Project Develop for CMG.It facilitates to manage Members Management.

## Prerequisites 
1. Composer (Latest)
2. Node Environment 
3. MYSQL , MYSQL Workbench
4. Command Prompt or VS Code


# Getting Start

If you would still prefer to do the installation manually, follow these steps:

### 1. Clone the repo

```bash
git clone https://github.com/DDSameera/node_project_mis.git
cd node_project_mis
```

### 2.Install the dependencies:

```bash
npm install
npm audit fix
```

### 3. Set the configurations:

Rename `config.example` folder into `config`

Go to `config` folder & Add your  own keys .

Example

#### auth-config.js
```
authConfig.encryptorSecretKey = '393a41d556f3d8164a1520f2fb30795d';
authConfig.jwtTokenKey = 'abc123456789010012134214252';
authConfig.jwtTokenExpireTime = 120; //Default : 2 mins (120 seconds)
```

#### config.js
```
......
  "development": {
    "username": "xxxxxxxxxxxxxxxxxx", // Default : root
    "password": "xxxxxxxxxxxxxxxxxx",// Default : null
    "database": "xxxxxxxxxxxxxxxx",// Default : node_product_mis
    "host": "127.0.0.1",
    "dialect": "mysql"
  },
  ......
```
#### server-config.js
```
serverConfigs.port = 3000;
```
### 4. Set up Database
Create new database (Eg : `node_product_mis`)

### 5. Run Following DB Commands
```
sequelize-cli db:migrate
sequelize db:seed:all
```
### 6. Start Server
```
nodemon server.js
```

### 7. Refer Postman Collection
1. Open Postman
2. Go to Main Menu > File > Import
3. Go to Link Tab
4. Enter Url : `https://www.postman.com/collections/176ec8faf5977d317299`
5. Click Continue button
6. Click Import

That's all
## Features
- Secure API Authentication with JWT Token
- Secured Routes For Product Category
- Quick Database Migrations
- Fastest Validations
- Prevent SQL Injections from Sequelize ORM
- Unique Secured Token Valid only for specific time period


## Project Structure

```
src\
 |--config.example\ # Configuration related things,User should have to rename it config
 |--controllers\    # Route controllers (controller layer)
 |--middlewares\    # Custom express middlewares
 |--migrations\     # Database Migrations
 |--models\         # MYSQL models
 |--routes\         # Routes
 |--seeders\        # Fake DB Data for testing purpose
 |--services\       # Business logic (service layer)
 |--validations\    # Request data validation schemas
.gitignore          # Skip Git Uploads
.package.json       # Node Dependency Management
.package-lock.json  # Specific Node Libraries
README.md           # Documentation
server.js           # App Entry point
```
