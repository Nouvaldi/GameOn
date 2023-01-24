# Web Programming Project (GameOn)

## Description

GameOn is an online marketplace website where Indonesian developers can market their games on this platform to Indonesian gamers. Users can easily find and play games made in Indonesia on the platform.

## Requirements

- XAMPP
- Composer (Laravel 8)

## Installation

1. Create a new folder
2. Clone the project from this repository into the folder using CLI
```
git clone https://github.com/Nouvaldi/GameOn
```

## Setup

1. Open and start XAMPP
2. Create a database with your preferred name
3. Open the project using Visual Studio Code

> In terminal
4. Setup Laravel:
```
composer install
```
5. Copy .env.example file:
```
cp .env.example .env
```
6. Rename `DB_DATABASE` in .env with the same name in step 2
7. Generate application key:
```
php artisan key:generate
```
8. Link to storage:
```
php artisan storage:link
```
9. Migrate database and seeder:
```
php artisan migrate:fresh --seed
```
10. Run app:
```
php artisan serve
```

## Contributors
> Supervisor:
- ANDERIES, B.Eng., S.Kom., M.Kom. - D6657

> Members:
- Adji Nouvaldi Ramadhan - 2440063050
- Adriel Pratama Montiley - 2440067093
- Anthony Falah - 2440010391
- Gregorius Gilang Threesulistianto - 2440069281
- Krisna Hadi Saputra - 2440063744
