# User Authentication System

## 👥 Team Members
- Guilherme Dorce de Britto — RA: 1991866
- Rodrigo Shinji Yamashita — RA: 2001443

---

## 📌 Project Description
This project implements a simple **user registration, login, and password reset system** using **pure PHP**, applying **OOP, PSR-12, DRY, and KISS** principles.

No database is used — data is stored in memory using arrays.

---

## ⚙️ Implemented Features
- User Registration
  - Email validation
  - Strong password validation (min. 8 characters, 1 number and 1 uppercase letter)
  - Passwords stored with `password_hash`
  - Prevent duplicate emails
- User Login
  - Credential validation with `password_verify`
- Password Reset
  - Updates user password with validation rules
  - Replaces old password with new hash

---

## 🧪 Test Cases

| Case | Description | Input | Expected Result |
|------|------------|---------|-------------------------|
| 1 | Valid registration | Maria Oliveira, maria@email.com, Senha123 | Usuário cadastrado com sucesso |
| 2 | Invalid email | Pedro, pedro@@email, Senha123 | E-mail inválido |
| 3 | Wrong password on login | joao@email.com, Errada123 | Credenciais inválidas |
| 4 | Valid password reset | id 1, NovaSenha1 | Senha alterada com sucesso |
| 5 | Duplicate email registration | Outro João, joao@email.com, Senha123 | E-mail já está em uso |

---

## 📁 Folder Structure
```
project/
├── src/
│   ├── User.php
│   ├── Validator.php
│   └── UserManager.php
├── initialUsers.php
├── index.php
└── README.md
```

---

## 🚀 How to Run

### Requirements
- XAMPP installed and running

### Steps
1. Copy the project to the `htdocs` folder of XAMPP.
2. Start Apache in the XAMPP control panel.
3. Access in your browser: 
   ```
   http://localhost/project/index.php
   ```

---

## ⚡ Technologies
- PHP 8+
- OOP (Object Oriented Programming)
- PSR-12

---

## ⚖️ Limitations
- Data is not persisted (only stored in memory arrays).
- No graphical interface.
- No database used.

---

## 📌 Notes
This project was developed for educational purposes in the **Design Patterns & Clean Code** course.
