# SkillMatch AI - Backend API

![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.1-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

> Platform Rekomendasi Karier dan Pembelajaran Berbasis AI untuk Mahasiswa & Fresh Graduate

## Fitur Utama

- Auth (Register & Login) menggunakan Laravel Sanctum
- Career Recommendation berdasarkan skill pengguna
- Skill Gap Analysis untuk mengetahui skill yang masih kurang
- Learning Roadmap per karier
- Progress Tracking

## Tech Stack

| Layer | Teknologi |
|-------|-----------|
| Backend | Laravel 10 |
| Database | MySQL |
| Auth | Laravel Sanctum |
| Language | PHP 8.1 |

## Instalasi

```bash
# Clone repository
git clone https://github.com/LukmanNulHakim89/skillmatch-api.git
cd skillmatch-api

# Install dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Konfigurasi database di .env
DB_DATABASE=skillmatch_db
DB_USERNAME=root
DB_PASSWORD=

# Jalankan migration dan seeder
php artisan migrate --seed

# Jalankan server
php artisan serve
```

## API Endpoints

### Auth
| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| POST | /api/register | Register pengguna baru |
| POST | /api/login | Login pengguna |
| POST | /api/logout | Logout pengguna |
| GET | /api/profile | Profil pengguna |

### Skills
| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| GET | /api/skills | Daftar semua skill |
| GET | /api/user/skills | Skill yang dimiliki user |
| POST | /api/user/skills | Tambah skill user |

### Career
| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| GET | /api/careers | Daftar semua karier |
| GET | /api/careers/recommend | Rekomendasi karier |
| GET | /api/careers/{id}/gap | Gap analysis karier |
| GET | /api/careers/{id}/roadmap | Roadmap karier |

## Database Schema
users ──── user_skills ──── skills

│                           │

└──── user_interests    careers ──── career_skills ──── skills

│                           │

└──── user_progress ──── roadmaps

## Developer

**Lukman Nul Hakim** - Mahasiswa Informatika UNSIKA
- GitHub: [@LukmanNulHakim89](https://github.com/LukmanNulHakim89)