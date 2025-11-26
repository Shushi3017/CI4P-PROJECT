<a name="readme-top"></a>

<br/>
<br/>

<div align="center">
  <a href="https://github.com/Shushi3017">
  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQppYFOWPhHZFqj-eWUYA9g_9Q3EBVMF04nDA&s" width="130"><br>
    <img src="https://file.garden/ZrIPgCGn9kADc89z/skydriftlogo.png" alt="Iron Jugulis" width="130" height="100">
  </a>
<!-- * Title Section -->
  <h3 align="center">AD-CI4-PROJECT-FINALS</h3>
</div>

<!-- * Description Section -->
<div align="center">
Skydrift Gameverse is a website where you can put your games into your personal boards. It is esentially a Pinterest but for games and heavily takes inspiration from said website. This project uses a concise, beginner-friendly CodeIgniter 4 starter to quickly bootstrap backend and frontend projects. Includes sample modules (Auth, CRUD, Scheduler), Docker tooling, and clear conventions for file structure, commits, and testing.
</div>

<br/>

![](https://visit-counter.vercel.app/counter.png?page=Shushi3017/CI4-PROJECT-FINALS)

<!-- ! Make sure it was similar to your github -->

---

<br/>
<br/>

<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#overview">Overview</a>
      <ol>
        <li>
          <a href="#key-components">Key Components</a>
        </li>
        <li>
          <a href="#technology">Technology</a>
        </li>
      </ol>
    </li>
    <li>
      <a href="#rules-practices-and-principles">Rules, Practices and Principles</a>
    </li>
    <li>
      <a href="#resources">Resources</a>
    </li>
  </ol>
</details>

---

## Overview
This project is a CodeIgniter 4 web application designed as a small game-catalog and board management system with user accounts, permissions, and an admin dashboard.

It provides a clean CI4 structure with organized modules and serves as a reference for handling users, boards, and game listings.

### Purpose
A simple but scalable template for managing users, game boards, and game entries with an admin-friendly interface.

### Audience
Developers who want a straightforward CodeIgniter 4 implementation of:
- user authentication
- board/category management
- game listings with images
- admin-only controls

---

## Key Components

| Component           | Purpose                                                         | Notes                                                                 |
|---------------------|-----------------------------------------------------------------|-----------------------------------------------------------------------|
| **Auth Module**     | Handles login, registration, and session-based authentication.  | Uses CI4 Sessions + MySQL `users` table. Includes user roles.         |
| **Boards Module**   | Manages game boards/categories (e.g., RPG, Shooter, Indie).     | Each board belongs to a user (`user_id`). CRUD + Admin controls.      |
| **Games Module**    | Stores individual games with titles, covers, and board mapping. | Includes image URL support + Tailwind UI cards.                       |
| **Admin Dashboard** | Central place for managing users, boards, and game entries.     | Designed with Tailwind. Only visible to admin-level users.            |


 <!-- ! Start simple. Use these modules as **learning samples**; extend or replace them based on your project’s needs. -->

### Technology

#### Language

![HTML](https://img.shields.io/badge/HTML-E34F26?style=for-the-badge\&logo=html5\&logoColor=white)
![CSS](https://img.shields.io/badge/CSS-1572B6?style=for-the-badge\&logo=css3\&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge\&logo=javascript\&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge\&logo=php\&logoColor=white)

#### Framework/Library

![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-06B6D4?style=for-the-badge\&logo=tailwindcss\&logoColor=white)
![CodeIgniter](https://img.shields.io/badge/CodeIgniter-EF4223?style=for-the-badge\&logo=codeigniter\&logoColor=white)

#### Databases

![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge\&logo=mysql\&logoColor=white)

<!-- ! Keep only the used technology -->

---

## Quick Start (Docker)

Run the development stack and the app (rebuild if needed):

```cmd
docker compose up --watch
```

Common utility commands (run inside the project root):

- Run migrations:
```cmd
docker compose exec php composer migrate
```
- Run seeders:
```cmd
docker compose exec php composer seed
```
- Run tests:
```cmd
docker compose exec php composer test
```

- Create a migration (using CodeIgniter's spark tool):
```cmd
docker compose exec php php spark make:migration CreateUsersTabel
```

- Create a model (using CodeIgniter's spark tool):

```cmd
docker compose exec php php spark make:model UsemModel
```

- Create an entity (value object for a single record) (using CodeIgniter's spark tool):
```cmd
docker compose exec php php spark make:entity Uzer
```

- Create a controller (add --resource to scaffold resourceful methods if you like) (using CodeIgniter's spark tool):
```cmd
docker compose exec php php spark make:controller Usars
```

- Create a seeder (for test/dev data) (using CodeIgniter's spark tool):
```cmd
docker compose exec php php spark make:seeder UserzSeeder
```

If you prefer, you can include `-f "compose.yaml"` explicitly; the shorter commands above work when running from the repo root.

## Ports & Database

Defaults used in this project (host mapping):

| Service     | Host port |
|-------------|-----------:|
| nginx (app) | 8017      |
| phpMyAdmin  | 3065      |
| MySQL       | 3317      |

Database credentials used in examples and CI:

- Host: localhost
- Port: 3317
- Database: app
- User: root
- Password: root

Be careful: seeding and truncating are destructive operations — run only on local/dev environments unless you know what you're doing.

## Rules, Practices and Principles

<!-- ! Dont Revise this -->

1. Always prefix project titles with `AD-`.
2. Place files in their **respective CI4 folders** (`Controllers/`, `Services/`, `Repositories/`, `Views/`).
3. Naming conventions:

   | Type             | Case        | Example                   |
   | ---------------- | ----------- | ------------------------- |
   | Classes          | PascalCase  | `UserService.php`         |
   | Interfaces       | PascalCase  | `UserRepositoryInterface` |
   | DB tables/fields | snake\_case | `users`, `created_at`     |
   | Docs             | kebab-case  | `dev-manual.md`           |

4. Git commits use: `feat`, `fix`, `docs`, `refactor`.
5. Use **Controller → Service → Repository** pattern.
6. Assets (CSS/JS/img) live under `public/`.
7. Docker configs are at the repo root (`docker-compose.yml`, `nginx.conf`).
8. Docs are maintained in `/docs` (dev, technical, sop, commit, principles, copilot).

Example structure:

```
AD-ProjectName/
├─ backend/ci4/
│  ├─ app/Controllers/
│  ├─ app/Services/
│  ├─ app/Repositories/
│  ├─ app/Views/
│  ├─ public/
│  ├─ writable/
│  ├─ .env
│  └─ composer.json
├─ docker/               # Docker configs at root
├─ docs/                 # Manuals and project docs
├─ .gitignore
└─ readme.md
```

<!-- ! Dont Revise this -->

---

## Resources
## Resources

| Title                      | Purpose                                                                   | Link                                                                           |
| -------------------------- | ------------------------------------------------------------------------- | ------------------------------------------------------------------------------ |
| Figma                      | UI mockups, wireframes, layout planning, and component design.            | https://www.figma.com                                                           |
| Pinterest Design Boards    | Inspiration for color palettes, UI themes, and interaction patterns.       | https://www.pinterest.com                                                       |
| ChatGPT                   | Assistance for debugging, documentation writing, architecture planning.   | https://chat.openai.com                                                         |
| GitHub Copilot             | In-editor code suggestions and boilerplate generation.                     | https://github.com/features/copilot                                             |
| YouTube UI/UX Tutorials    | Guides for building modern layouts and animations.                         | https://www.youtube.com                                                         |
| Google Images / Photos     | Reference images and assets used for UI mockups.                           | https://photos.google.com                                                       |
| System Documentation       | Official docs for PHP, MySQL, Tailwind, and CodeIgniter.                   | *(See `/docs` folder in repo.)*                                                |
| File Garden       | Image File Hosting                   | https://filegarden.com/                                             |

<!-- ! Add what tools aided you -->
