# TRACKWISE — Deployment Log

**Project:** TRACKWISE Study App (CodeIgniter 4.7)  
**Developer:** [Your Name]  
**Date:** May 31, 2026  
**Live URL (local XAMPP):** `http://localhost/codeigniter4-framework-v4.7.0-0-ge7753bc/codeigniter4-framework-e7753bc/public/`  
**Live URL (dev server):** `http://localhost:8000/`  
**Database:** `task_manager_db` (MySQL via XAMPP)

---

## 1. Production configuration

| Step | Action | Result |
|------|--------|--------|
| 1.1 | Set `CI_ENVIRONMENT = development` in `.env` for local testing; use `production` on live host | Dev toolbar enabled locally; switch to `production` before public deploy |
| 1.2 | Set `app.baseURL` in `.env` to match server URL (trailing slash required) | Fixed broken CSS/links when URL was wrong |
| 1.3 | Disable Debug Toolbar in production via `CI_ENVIRONMENT = production` | Toolbar auto-hidden in production |
| 1.4 | CSRF + XSS filters enabled in `app/Config/Filters.php` | All POST forms protected |

**Issue:** App showed generic “Not Found” at `localhost:8000`.  
**Resolution:** Server was started from the parent folder. Fixed by running `php spark serve` from `codeigniter4-framework-e7753bc` (project root), not the outer directory.

---

## 2. File transfer & server setup

| Step | Action | Result |
|------|--------|--------|
| 2.1 | Project placed in `C:\xampp\htdocs\codeigniter4-framework-v4.7.0-0-ge7753bc\codeigniter4-framework-e7753bc` | Apache serves via `public/` folder |
| 2.2 | Document root must point to **`public/`** (or use full URL including `/public/`) | CodeIgniter front controller loads correctly |
| 2.3 | Set `writable/` permissions (logs, session, cache, uploads) to writable by web server | Sessions, logs, and image uploads work |
| 2.4 | `.htaccess` in `public/` handles URL rewriting | Clean URLs (`/trackwise/dashboard`) work on Apache |

**Issue:** Static assets (CSS) not loading.  
**Resolution:** Corrected `app.baseURL` in `.env` to match actual host and port.

---

## 3. Database migration

| Step | Action | Result |
|------|--------|--------|
| 3.1 | Created database `task_manager_db` in phpMyAdmin | MySQL database ready |
| 3.2 | Ran `php spark migrate --all` | Tables: `users`, `study_sessions`, `goals` |
| 3.3 | Alternative: imported `app/Database/trackwise_setup.sql` in phpMyAdmin | Same schema without CLI |
| 3.4 | Updated `.env` with DB credentials (`root`, empty password, `localhost`) | Registration and login connected to DB |

**Issue:** Login failed after registration.  
**Resolution:** Password was double-hashed (controller + model). Fixed by hashing only in `UserModel::hashPassword`. Users registered before the fix must re-register.

**Issue:** “Create New Goal” did nothing.  
**Resolution:** Button was static HTML. Added `goals` table, routes (`goals/create`, `goals/store`), and form view.

**Verify data in phpMyAdmin:**
```sql
SELECT * FROM study_sessions ORDER BY created_at DESC;
SELECT * FROM goals ORDER BY created_at DESC;
SELECT id, username, email FROM users;
```

---

## 4. Security & SSL

| Step | Action | Result |
|------|--------|--------|
| 4.1 | `.env` contains DB passwords — **never commit to Git** | Add `.env` to `.gitignore` on remote repos |
| 4.2 | `writable/uploads/` stores session images; blocked direct listing via `index.html` | Uploads served through authenticated route |
| 4.3 | SSL (HTTPS): enable on production host (Let’s Encrypt or host panel) | Local XAMPP uses HTTP only |
| 4.4 | Strong DB password required on production (not empty `root`) | Documented for live deploy |

---

## 5. Deployment commands (reference)

```powershell
# Start Apache + MySQL in XAMPP Control Panel, then:
cd C:\xampp\htdocs\codeigniter4-framework-v4.7.0-0-ge7753bc\codeigniter4-framework-e7753bc
php spark migrate --all
php spark serve --host localhost --port 8000
```

**Entry points:** Welcome `/` · Login `/trackwise/auth/login` · Dashboard `/trackwise/dashboard`

---

## 6. Production deploy checklist (for public live URL)

1. Upload project to host; point domain document root to **`public/`**  
2. Set `.env`: `CI_ENVIRONMENT = production`, correct `app.baseURL`, live DB credentials  
3. Import `trackwise_setup.sql` or run migrations on host  
4. Set `writable/` folder permissions to **755** or **775**  
5. Enable SSL; update `app.baseURL` to `https://yourdomain.com/`  
6. Test: register → login → study log → create goal → analytics  

**Submitted live URL:** `http://localhost:8000/`  
*(Replace with your actual URL before submission. See docs/PRESENTATION_SCRIPT.md → “How to submit a live URL”.)*

---

*End of deployment log — TRACKWISE CodeIgniter 4 MVC application.*
