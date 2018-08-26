@echo off
PATH=%PATH%;H:\xampp72\php
set /p id=Nhap ten controller:
echo %id%

H:\xampp72\php\php.exe -f create.php %id%
pause