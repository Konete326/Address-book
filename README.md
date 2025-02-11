# Git Clone & Usage Guide

## Prerequisites
Ensure you have the following installed on your system:
- **Git**: Download and install from [git-scm.com](https://git-scm.com/downloads).
- **XAMPP** (for PHP projects): Download from [apachefriends.org](https://www.apachefriends.org/download.html).

## Step 1: Verify Git Installation
Open the command prompt and check if Git is installed:
```sh
git --version
```
If Git is installed, you will see output similar to:
```
git version 2.x.x
```
If Git is not installed, follow the installation guide on [git-scm.com](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git).

## Step 2: Clone the Repository
Navigate to your desired project directory (e.g., inside `htdocs` for XAMPP users):
```sh
cd C:\xampp\htdocs
```
Then, run the Git clone command:
```sh
git clone https://github.com/Konete326/Address-book.git
```
This will create a folder named `Address-book` containing the project files.

## Step 3: Navigate to the Project Directory
```sh
cd Address-book
```

## Step 4: Running the Project (For PHP/XAMPP Users)
1. Open XAMPP and start **Apache** and **MySQL**.
2. Open a browser and go to:
   ```
   http://localhost/Address-book
   ```

## Additional Git Commands
- **Check status of changes:**
  ```sh
  git status
  ```
- **Pull latest changes from repository:**
  ```sh
  git pull origin main
  ```
- **Add and commit changes:**
  ```sh
  git add .
  git commit -m "Your commit message"
  ```
- **Push changes to repository:**
  ```sh
  git push origin main
  ```

## Troubleshooting
If you encounter Git errors, try the following:
- **Git not recognized error:** Ensure Git is installed and added to your system PATH.
- **Permission issues:** Run Git commands as Administrator.
- **XAMPP-related errors:** Ensure Apache and MySQL are running.

For more help, visit the [Git documentation](https://git-scm.com/doc).

