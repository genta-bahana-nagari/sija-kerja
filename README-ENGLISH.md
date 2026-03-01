# 📚 SIJA Kerja (SIJA Work) - Internship Management App

Web application built using **Laravel 12**, **Livewire Starter Kit**, and **Filament** to manage Field Work Practice (or you can call it Internship) data in a school or university environment.
I made this based on the internship program that is usually followed by vocational high school students in Indonesia before graduation or in the final semester.
This application facilitates the management of student data, supervisors, agencies/companies, as well as your intern status and reports, complete with a **role-based access control** system using **Filament Shield**.

---

## 🔧 Main Features

-   🧑‍🎓 Intern student data management
-   🏢 Agency/company data management
-   📊 Monitoring your intern student status (accepted/waiting)
-   🔐 Role-based access rights using **Filament Shield**
-   🧩 Admin panel using **Filament Admin Panel**
-   ⚙️ Restful API available via `routes/api.php` (example already provided)

---

## 🛠️ Technologies Used

-   [Laravel 12](https://laravel.com/)
-   [Livewire](https://laravel-livewire.com) ==> Starterkit. For starterkit project installation can be [seen here](https://qadrlabs.com/post/laravel-12-starter-kit)
-   [Filament 3](https://filamentphp.com/)
-   [Filament Shield](https://github.com/ryangjchandler/filament-shield)

---

## ⚙️ Installation

1. **Clone repository:**

```bash
git clone https://github.com/genta-bahana-nagari/sija-kerja.git
cd sija-kerja
```

> The `main` branch is stable and tested.

2. **Install Laravel and Livewire dependencies:**

    ```bash
    composer install
    npm install
    ```

3. **Copy environment files & generate key:**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Database & seed migration:**

    ```bash
    php artisan migrate --seed
    ```

5. **Create Filament user (admin):**

    ```bash
    php artisan make:filament-user
    ```

6. **Install Filament Shield & generate access rights:**

    ```bash
    php artisan shield:generate
    php artisan shield:super-admin --panel
    ```
    > If you find an interaction error because of stty interaction errors, open this file: (app/Providers/AppServiceProvider.php):
   ```
   <?php

    namespace App\Providers;

    use Illuminate\Support\ServiceProvider;
    use Laravel\Prompts\Prompt;

    class AppServiceProvider extends ServiceProvider
    {
        /**
        * Register any application services.
        */
        public function register(): void
        {
            //
        }

        /**
        * Bootstrap any application services.
        */
        public function boot(): void
        {
            Prompt::interactive(false);
        }
    }

   ```
   > Then run this terminal:
   ```
   php artisan shield:generate --all --no-interaction --panel=admin
   php artisan shield:super-admin --panel

   ```
   > Usually due to cloning an old project to a new environment or a Laravel project that is not compatible with your terminal.

7. **Run local server:**
    ```bash
    composer run dev
    ```

---

## 🔐 Roles & Access Rights

Role and access management using **Filament Shield**, with the following role structure:

-   **Admin/Super Admin:** full access to admin modules (CRUD user, student, company, etc.)
-   **Supervisor:** access to monitor your intern students
-   **Students:** access to the frontend (if developed) for input/view status

Commands for role management:

```bash
   php artisan shield:generate
   php artisan shield:super-admin --panel
```

---

## 📂 Project Structure

Folders still in Indonesian. You can explore more in this repo:

```
📁 app/
│
├── Filament/Resources/
│   └── SiswaResource
│   └── GuruResource
│   └── IndustriResource
│   └── PKLResource
│
├── Http/Controllers/Api
│   └──AuthController.php
│   └──GuruController.php
│   └──IndustriController.php
│   └──PKLController.php
│   └──SiswaController.php
│
├── Livewire/
│   └── Siswa
│   │   └──Form.php
│   │   └──Index.php
│   │   └──View.php
│   │
│   └── Guru
│   │   └──Form.php
│   │   └──Index.php
│   │   └──View.php
│   │
│   └── Industri
│   │   └──Form.php
│   │   └──Index.php
│   │   └──View.php
│   │
│   └── Pkl
│       └──Form.php
│       └──Index.php
│       └──View.php
│
├── Models/
│   └── Siswa.php
│   └── Guru.php
│   └── Industri.php
│   └── PKL.php
│
📁 database/
├── migrations/
├── seeders/
│
📁 resources/view/livewire
│   │
│   └── guru
│   │   └──form.blade.php
│   │   └──index.blade.php
│   │   └──view.blade.php
│   │
│   └── industri
│   │   └──form.blade.php
│   │   └──index.blade.php
│   │   └──view.blade.php
│   │
│   └── pkl
│   │   └──form.blade.php
│   │   └──index.blade.php
│   │   └──view.blade.php
│   │
│   └── siswa
│       └──form.blade.php
│       └──index.blade.php
│       └──view.blade.php
│
📁 routes/
└── web.php
└── api.php

```
- Siswa = Students
- Guru = Teacher
- Industri = Company (to apply intern)
- PKL = Intern

---

## 🤝 Contributions

Contributions are very welcome!
Please feel free to fork this repo, create a new branch, and submit a pull request.
Or clone it locally for experimentation and development.

---

## 👤 Author

-   **Genta Bahana Nagari**
    [LinkedIn](https://www.linkedin.com/in/genta-bahana-nagari/) | [GitHub](https://github.com/genta-bahana-nagari)

---

## 🌟 Support This Project

If you find this project useful, feel free to ⭐ it on GitHub and share it with your friends!

---

## 📜 License

This project is released under the **MIT License**. Feel free to use and modify it as needed.
See details in the [LICENSE](LICENSE) file.

---
