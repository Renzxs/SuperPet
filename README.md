👋 Hello, We are the SuperTeam Studios!

# SuperPet: A Web-based Veterinary System.
![image](https://github.com/Renzxs/SuperPet/assets/90491632/5aa2bade-a8a7-4544-9fa5-bbe8bd18959b)

- - -

### PROJECT FILE STRUCTURE:
![file structure](https://github.com/Renzxs/Veterinary-Web-System/assets/90491632/58d63253-2625-4774-af31-42dc41b602e3)

- - -
### DEVELOPERS GUILDLINES:
REMAINDER: TO RUN AND TEST THIS IN YOUR LOCAL COMPUTER, YOU HAVE MUST INSTALLED XAMPP IN YOUR LOCAL COMPUTER. YOU ALSO NEED TO CLONE THIS PROJECT FILE IN TO YOUR XAMPP HTDOCS FOLDER IN ORDER TO RUN IT IN YOUR WEB BROWSER FOR TESTING

FILE DIRECTORIES:
- ../assets/[icon, images, font] - Assets Directory
- ../scripts/ - Javascripts Directory
- ../styles/ - CSS Directory

FOR ICONS:
#### Adding Font Awesome CDN Tag Link:
```
<!-- PUT THIS WITHIN HEAD TAG OF YOUR HTML FILE -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
```

#### Using Font Awesome Icons within the HTML File:
```
<!-- TO USE THE ICON IN THE HTML FILE -->
<i class="fa-solid fa-house"></i> <!--THIS WILL SHOW A SOLID ICON OF A HOUSE -->
```

#### MYSQL TESTING
- In order to test this system in your local computer, place the folder "superpet_db" inside your computer's XAMPP mysql folder. Here the mysql directory:
```
C:\xampp\mysql\data // Paste this in your file explorer
```

#### MYSQL TABLES
- USERS TABLE:
```
CREATE TABLE users_tbl (
  id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  username VARCHAR(50),
  password VARCHAR(50),
  email VARCHAR(50),
  address VARCHAR(100),
  user_role VARCHAR(10)
)
```
- PETS TABLE:
```
CREATE TABLE pets_tbl (
  pet_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  pet_name VARCHAR(50),
  pet_age VARCHAR(50),
  pet_breed VARCHAR(50),
  pet_photo_url VARCHAR(150),
  pet_desc VARCHAR(255)
)
```

- APPOINTMENT TABLE:
```
CREATE TABLE appointment_tbl (
  appointment_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  user_id INT,
  first_name VARCHAR(50),
  last_name VARCHAR(50),
  phone INT,
  pet_name VARCHAR(50),
  type_of_pet VARCHAR(50),
  date DATE,
  time VARCHAR(20),
  comments VARCHAR(255),
  isApproved VARCHAR(50),
  isCancelled VARCHAR(50),
  status_msg VARCHAR(255),
  FOREIGN KEY(user_id) REFERENCES users_tbl(id)
)
```

- ADOPTION TABLE:
```
  CREATE TABLE adoption_tbl(
      adoption_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
      user_id INT,
      pet_id INT,
      status VARCHAR(50),
      FOREIGN KEY(user_id) REFERENCES users_tbl(id),
      FOREIGN KEY(pet_id) REFERENCES users_tbl(pets_id)
  )
```

- - - -
🎓 Academic Honesty
DO NOT COPY FOR AN ASSIGNMENT - Avoid plagiarism and adhere to the spirit of this Academic Honesty Policy.

- - - - 
&copy; No Copyright Infrigement
