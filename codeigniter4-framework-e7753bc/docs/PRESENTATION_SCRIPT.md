# TRACKWISE — Presentation Script (Weeks 11–15)

**5 members · 15–20 minutes**

---

## Before anyone presents (whole team)

1. Start **XAMPP** → turn on **Apache** and **MySQL**
2. **OR** open terminal in project folder and run:
   ```powershell
   cd C:\xampp\htdocs\codeigniter4-framework-v4.7.0-0-ge7753bc\codeigniter4-framework-e7753bc
   php spark serve --port 8000
   ```
3. Open browser using **one** of these URLs:
   - `http://localhost:8000/`
   - `http://localhost/codeigniter4-framework-v4.7.0-0-ge7753bc/codeigniter4-framework-e7753bc/public/`
4. **Register** a test account → **Log in** → you should land on **Dashboard**
5. In `.env` make sure: `CI_ENVIRONMENT = development` (needed for Debug Toolbar in Week 12–13)

| Member | Role | Week |
|--------|------|------|
| M1 | Security | 11 |
| M2 | Upload + Email | 12–13 |
| M3 | Pagination + Performance | 12–13 |
| M4 | Tests + Debugging | 14 |
| M5 | Deployment (opens + closes) | 15 |

---

# How to submit a live URL (Week 15 deliverable)

A **live URL** is a link your instructor opens in a browser to see your working app.

**Submit it in two places:**
1. **`docs/DEPLOYMENT_LOG.md`** — line: `Submitted live URL: ___________`
2. **LMS / email** — wherever your teacher collects final work

---

## Option 1 — Localhost (in-person demo on your laptop)

| Step | Do this |
|------|---------|
| 1 | Start XAMPP (Apache + MySQL) **or** `php spark serve --port 8000` |
| 2 | Open app in browser — confirm login works |
| 3 | Copy URL from address bar |

**Submit one of these:**
```
http://localhost:8000/
```
*(php spark serve)*

```
http://localhost/codeigniter4-framework-v4.7.0-0-ge7753bc/codeigniter4-framework-e7753bc/public/
```
*(XAMPP)*

**Note for teacher:** “URL works on presenter laptop during class; Apache/MySQL must be running.”

**Limitation:** Teacher **cannot** open `localhost` from home — only on your PC.

---

## Option 2 — Same Wi‑Fi (teacher uses phone/laptop in class)

| Step | Do this |
|------|---------|
| 1 | Run `ipconfig` → copy **IPv4 Address** (e.g. `192.168.1.105`) |
| 2 | Start server: `php spark serve --host 0.0.0.0 --port 8000` |
| 3 | Teacher opens: `http://192.168.1.105:8000/` (same Wi‑Fi) |

---

## Option 3 — ngrok (public link from anywhere)

| Step | Do this |
|------|---------|
| 1 | Download ngrok from https://ngrok.com/ (free account) |
| 2 | Terminal 1: `php spark serve --port 8000` |
| 3 | Terminal 2: `ngrok http 8000` |
| 4 | Copy **Forwarding** URL (e.g. `https://abc123.ngrok-free.app`) |
| 5 | Update `.env`: `app.baseURL = 'https://abc123.ngrok-free.app/'` |
| 6 | Restart php spark serve |
| 7 | Test URL on phone using **mobile data** (not Wi‑Fi) |

**Submit:** `https://abc123.ngrok-free.app/`

**Note:** Free ngrok URL stops when you close ngrok. Start it before the teacher grades.

---

## Option 4 — Free hosting (best permanent URL)

Hosts: **InfinityFree**, **000webhost**, etc.

| Step | Do this |
|------|---------|
| 1 | Upload project to host |
| 2 | Point document root to **`public/`** folder |
| 3 | Create MySQL DB → import `app/Database/trackwise_setup.sql` |
| 4 | Create `.env` on server (use `docs/env.production.example`) |
| 5 | Set `writable/` permissions to **755** |
| 6 | Set `CI_ENVIRONMENT = production` and correct `app.baseURL` |

**Submit:** `https://yoursite.infinityfreeapp.com/`

---

## Sample LMS / email submission

```
Subject: TRACKWISE — Weeks 11–15 Final Submission

Live URL: http://localhost:8000/
(or your hosted URL)

Attached:
- DEPLOYMENT_LOG.pdf
- SECURITY_REPORT.pdf

Test account:
Username: demo_user
Password: Demo1234

Note: localhost URL live during presentation on [date/time].
```

---

## Before you submit — test in incognito

- [ ] Welcome page loads  
- [ ] Login works  
- [ ] Study Log saves  
- [ ] Create Goal works  
- [ ] Analytics loads  

---

# Week explanations (plain language)

Use these so you explain **what** and **why**, not only clicks.

### Week 11 — CSRF
Another website tries to submit forms to TRACKWISE while you are logged in. We add a **secret token** (`csrf_field()`) on every POST. No token = **403 Forbidden**.

### Week 11 — XSS
Someone types `<script>` in a form hoping it runs in the browser. We use **`esc()`** so scripts show as harmless text.

### Week 12–13 — Upload
Study Log sends a photo with `multipart/form-data`. Server validates type/size, saves to **`writable/uploads/`**, stores filename in **`study_sessions`**.

### Week 12–13 — Email
Register triggers welcome email (HTML + plain text). Result logged in **`writable/logs/email.log`** even if XAMPP cannot send mail.

### Week 12–13 — Pagination
Shows **5 sessions per page** using `paginate(5)` and `$pager->links()`. Search filters subject/topic/notes.

### Week 12–13 — Performance
**Debug Toolbar** (dev mode) shows SQL query count. **Analytics** cached 300 seconds for faster reloads.

### Week 14 — PHPUnit
Automated tests check home page (200), model math, and validation — no manual clicking.

### Week 14 — Debugging
Login failed because password was **hashed twice**. Fixed in `Auth.php` + `UserModel.php`. Logs in **`writable/logs/`**.

### Week 15 — Deployment
Move app to live URL: correct **baseURL**, **database**, **production** mode, deployment log with issues + fixes.

---

# M5 — OPENING (do this first)

### On the website
1. Go to **`/`** (Welcome page)
2. Click **Log In** → enter your test account
3. Show **Dashboard** — point at sidebar links (Study Log, Analytics, Goals, etc.)

### What to say
> “This is TRACKWISE, our CodeIgniter 4 study app. Each member will demo weeks 11 to 15.”

---

# M1 — WEEK 11: CSRF & XSS

---

## Part A — CSRF (Cross-Site Request Forgery)

**Explain first (30 sec):**
> “CSRF is when another website tries to submit a form to our app using your login session. We block that with a one-time token on every POST form. If the token is missing, you get 403 Forbidden.”

### Step 1: Show it on the website

| Step | Where to go | What to click |
|------|-------------|---------------|
| 1 | Browser: **`/trackwise/security`** | Full URL example: `http://localhost:8000/trackwise/security` |
| 2 | Same page | Scroll to **“CSRF Protection”** section |
| 3 | Click | **“POST with CSRF (works)”** button → page loads OK (or JSON success) |
| 4 | Click | **“POST without CSRF (403)”** button → browser shows **403 Forbidden** |

**Optional extra demo:** Go to **`/trackwise/studylog`** → right-click → **View Page Source** → search for `csrf` → show the hidden input field inside the form.

### Step 2: Show the code files (open in VS Code)

| What | File path | What to point at |
|------|-----------|------------------|
| CSRF filter turned ON | `app/Config/Filters.php` | `$globals['before']` → `'csrf'` and `'invalidchars'` |
| CSRF demo page | `app/Views/trackwise/security/index.php` | Form **with** `<?= csrf_field() ?>` and form **without** it |
| CSRF demo logic | `app/Controllers/Trackwise/Security.php` | Method `csrfDemo()` |
| CSRF on real forms | `app/Views/trackwise/studylog/index.php` | Line with `<?= csrf_field() ?>` inside `<form>` |
| More forms | `app/Views/trackwise/auth/login.php` | Same `csrf_field()` |
| Routes | `app/Config/Routes.php` | `trackwise/security` routes |

### Step 3: What to say
> “We enabled the CSRF filter globally in Filters.php. Every POST form uses csrf_field(). Without the token, CodeIgniter blocks the request with 403.”

### Step 4: File to submit
Open and mention: **`docs/SECURITY_REPORT.md`**

---

## Part B — XSS (Cross-Site Scripting)

**Explain first (30 sec):**
> “XSS is when someone types JavaScript into a form hoping it runs in the browser. We use esc() so dangerous characters display as plain text and never execute.”

### Step 1: Show it on the website

| Step | Where to go | What to do |
|------|-------------|------------|
| 1 | **`/trackwise/security`** | Scroll to **“XSS Prevention”** |
| 2 | Type in the box | `<script>alert(1)</script>` |
| 3 | Click | **“Test XSS”** |
| 4 | Show result | **Before** = text in dark code block · **After** = same text as plain text · **No alert popup** |

**Second example on website:** Go to **`/trackwise/studylog`** → save a session with notes containing `<script>alert(1)</script>` → after save, notes show as **text**, script does **not** run.

### Step 2: Show the code files

| What | File path | What to point at |
|------|-----------|------------------|
| XSS test handler | `app/Controllers/Trackwise/Security.php` | Method `xssTest()` → uses `esc($input, 'html')` |
| XSS demo view | `app/Views/trackwise/security/index.php` | `esc($escaped, 'html')` in output |
| Escaping everywhere | `app/Views/trackwise/studylog/index.php` | `esc($session['topic'], 'html')`, `esc($session['notes'], 'html')` |
| Input filter | `app/Config/Filters.php` | `'invalidchars'` in global before filters |

### Step 3: What to say
> “We never echo user input raw. We use esc() so HTML tags display as text and cannot run JavaScript.”

---

# M2 — WEEKS 12–13: FILE UPLOAD & EMAIL

---

## Part A — File upload

**Explain first (30 sec):**
> “Users can attach a photo to a study session. The form sends the file securely, we validate type and size, save it in writable/uploads, and show it on the page after save.”

### Step 1: Show it on the website

| Step | Where to go | What to do |
|------|-------------|------------|
| 1 | Sidebar → **Study Log** or URL **`/trackwise/studylog`** | |
| 2 | Left card **“Log Session”** | Fill Subject, Topic, Duration |
| 3 | **Session Photo** field | Click **Choose File** → pick a JPG/PNG (under 2MB) |
| 4 | | Watch **image preview** appear below the input |
| 5 | Click | **Save Log** |
| 6 | Top of page | **“Saved Session”** card shows your image |
| 7 | Scroll down | Session also appears in **Sessions History** |

### Step 2: Show files on disk & database

| Step | Where | What to show |
|------|-------|--------------|
| 1 | File Explorer | Folder `writable/uploads/` → your uploaded image file |
| 2 | phpMyAdmin → `task_manager_db` → **study_sessions** | Column **`image`** has the filename |

### Step 3: Show the code files

| What | File path | What to point at |
|------|-----------|------------------|
| Upload form | `app/Views/trackwise/studylog/index.php` | `enctype="multipart/form-data"` and `name="session_image"` |
| Upload handler | `app/Controllers/Trackwise/StudyLog.php` | Method `save()` → `getFile('session_image')`, MIME check, `$file->move(WRITEPATH . 'uploads', ...)` |
| Image preview JS | `public/trackwise/js/studylog.js` | File input change → preview |
| Serve image safely | `app/Controllers/Trackwise/Uploads.php` | Method `image()` |
| Route | `app/Config/Routes.php` | `trackwise/uploads/(:segment)` |

### Step 4: What to say
> “Upload form uses multipart encoding. We validate type and size, save to writable/uploads, and display the image on the next page.”

---

## Part B — Email on registration

**Explain first (20 sec):**
> “When a user registers, the app sends a welcome email and writes the result to email.log so we can prove it ran even if XAMPP cannot send real mail.”

### Step 1: Show it on the website

| Step | Where to go | What to do |
|------|-------------|------------|
| 1 | **`/trackwise/auth/register`** | Register a new user (new username + email) |
| 2 | After redirect | Login works with that account |

### Step 2: Show the log file (email may not send on XAMPP — log still proves it ran)

| Step | Where | What to show |
|------|-------|--------------|
| 1 | VS Code | Open **`writable/logs/email.log`** |
| 2 | | Last line looks like: `2026-05-31 ... | to=email@... | sent=yes` or `sent=no` |

### Step 3: Show the code files

| What | File path | What to point at |
|------|-----------|------------------|
| Send email on register | `app/Controllers/Trackwise/Auth.php` | Method `store()` calls `sendWelcomeEmail()` |
| Email HTML + plain text | Same file | Method `sendWelcomeEmail()` → `setMessage()` + `setAltMessage()` |
| Email config | `app/Config/Email.php` | `$fromEmail`, `$fromName` |

### Step 4: What to say
> “When a user registers, we send HTML email with a plain-text fallback and log the result to writable/logs/email.log.”

---

# M3 — WEEKS 12–13: PAGINATION & PERFORMANCE

---

## Part A — Pagination & search

**Explain first (30 sec):**
> “We show 5 sessions per page instead of loading everything at once. Search filters by subject or topic and stays in the URL when you change pages.”

### Step 1: Prepare before demo
Save **at least 6 study sessions** on **`/trackwise/studylog`** (so you get a page 2).

### Step 2: Show it on the website

| Step | Where | What to do |
|------|-------|------------|
| 1 | **`/trackwise/studylog`** | Scroll to **Sessions History** (right side on desktop) |
| 2 | | Read text: **“Page 1 of 2 — 6 total records”** (numbers vary) |
| 3 | Bottom of list | Click **page 2** link in pager |
| 4 | URL bar | Shows `?page=2` |
| 5 | Search box above history | Type **Math** → click **Search** |
| 6 | URL bar | Shows `?search=Math` — search stays when paging |

### Step 3: Show the code files

| What | File path | What to point at |
|------|-----------|------------------|
| Paginate 5 per page | `app/Models/Trackwise/StudySessionModel.php` | `getSessionsForUser()` → `return $this->paginate(5);` |
| Optimized query | Same file | `->select('id, subject, topic, ...')` |
| Controller | `app/Controllers/Trackwise/StudyLog.php` | Passes `$pager` to view |
| Pager in view | `app/Views/trackwise/studylog/index.php` | `$pager->links()` and page meta text |

### Step 4: What to say
> “We use the model paginate(5) method and pager links in the view. Search filters by subject, topic, and notes.”

---

## Part B — Performance (Debug Toolbar + cache)

**Explain first (30 sec):**
> “The Debug Toolbar shows how many database queries each page runs. Analytics is cached for 300 seconds to improve load time on repeat visits.”

### Step 1: Show it on the website

| Step | Where | What to do |
|------|-------|------------|
| 1 | Sidebar → **Analytics** or **`/trackwise/analytics`** | |
| 2 | Bottom of browser | **CI4 Debug Toolbar** bar (only if `CI_ENVIRONMENT = development`) |
| 3 | Click toolbar | Open **Database** tab → show **SQL queries** and count |
| 4 | | Point at bar chart and subject breakdown (data from your study_sessions) |

**Take a screenshot of this before presentation** (toolbar open showing SQL).

### Step 2: Show the code files

| What | File path | What to point at |
|------|-----------|------------------|
| Page cache TTL | `app/Controllers/Trackwise/Analytics.php` | `service('responsecache')->setTtl(300);` |
| Cache filter on route | `app/Config/Filters.php` | `$filters['pagecache']` → `'trackwise/analytics'` |
| Toolbar auto-on in dev | `app/Config/Filters.php` | `$required['after']` → `'toolbar'` |

### Step 3: What to say
> “In development the Debug Toolbar shows query count and load time. Analytics route uses page cache for 300 seconds.”

---

# M4 — WEEK 14: UNIT TESTS & DEBUGGING

---

## Part A — Run PHPUnit tests

**Explain first (20 sec):**
> “PHPUnit runs automated checks so we know the home page, model, and validation rules still work after changes.”

### Step 1: Do this in terminal

```powershell
cd C:\xampp\htdocs\codeigniter4-framework-v4.7.0-0-ge7753bc\codeigniter4-framework-e7753bc
composer install
php vendor/bin/phpunit tests/app
```

**Share screen** — graders should see **OK** / green **PASS**.

### Step 2: Open test files in VS Code and briefly explain each

| Test file | Test method | What it proves |
|-----------|-------------|----------------|
| `tests/app/WelcomePageTest.php` | `testHomePage()` | `$result->assertStatus(200)` — home page loads |
| `tests/app/StudySessionModelTest.php` | `testFormatDuration()` | `assertEquals('2h 30m', ...)` — model works |
| `tests/app/ValidationRulesTest.php` | `testStudyLogValidationFailsWithoutTopic()` | `assertFalse($passed)` — validation blocks bad data |
| Same file | `testStudyLogValidationPassesWithValidData()` | `assertTrue($passed)` |

### Step 3: What to say
> “We have three test classes in tests/app using assertStatus, assertEquals, and assertTrue or assertFalse.”

---

## Part B — Debugging story (login bug)

**Explain first (30 sec):**
> “Register worked but login failed because the password was encrypted twice — once in the controller and once in the model. We fixed it so only the model hashes the password once.”

### Step 1: Tell the story (no live demo required)

| | Detail |
|---|--------|
| **Problem on website** | Register worked, but **Log In** always said “Invalid username or password” |
| **Where we looked** | `app/Controllers/Trackwise/Auth.php` method `store()` |
| **Cause** | Password hashed in controller **and** again in `app/Models/UserModel.php` → `hashPassword()` |
| **Fix** | Pass plain password to model; only model hashes once |
| **Debug tools** | `writable/logs/log-*.log` for errors; could use `dd($user)` in login to inspect |

### Step 2: Show the fixed code

| File | What to point at |
|------|------------------|
| `app/Controllers/Trackwise/Auth.php` | `store()` — `'password' => $password` (plain, not double-hashed) |
| `app/Models/UserModel.php` | `hashPassword()` — hashes before insert |

### Step 3: What to say
> “We debugged a real login bug caused by double password hashing and fixed it in Auth and UserModel.”

---

# M5 — WEEK 15: DEPLOYMENT & CLOSING

**Explain first (30 sec):**
> “Deployment means making the app accessible with a live URL, production settings, and a database on the server. We document every step and problem in our deployment log.”

---

## Part A — Show deployment on website (full app walkthrough)

Do this live in order:

| # | Website URL | Action |
|---|-------------|--------|
| 1 | `/` | Welcome page |
| 2 | `/trackwise/auth/login` | Log in |
| 3 | `/trackwise/dashboard` | Dashboard |
| 4 | `/trackwise/studylog` | Save one session (optional) |
| 5 | `/trackwise/goals/create` | Create a goal → Save |
| 6 | `/trackwise/analytics` | Show charts |
| 7 | phpMyAdmin `http://localhost/phpmyadmin` | Database **`task_manager_db`** → tables **`users`**, **`study_sessions`**, **`goals`** → Browse rows |

**Say your live URL out loud** — use the URL you wrote in `docs/DEPLOYMENT_LOG.md` (see **“How to submit a live URL”** section at top of this document).

Example:
```
http://localhost:8000/
```
(or your ngrok / hosting URL)

---

## Part B — Submit the live URL (M5 does this before deadline)

| Step | Action |
|------|--------|
| 1 | Open `docs/DEPLOYMENT_LOG.md` |
| 2 | Find line: **Submitted live URL:** |
| 3 | Paste your working URL |
| 4 | Save file (export PDF if teacher requires PDF) |
| 5 | Upload to LMS / email with security report and screenshots |
| 6 | Optional: include test login `Username` / `Password` for grader |

---

## Part C — Show deployment documents & config files

| What | File path | What to point at |
|------|-----------|------------------|
| Deployment log (submit this) | `docs/DEPLOYMENT_LOG.md` | Sections 1–4 + issues we fixed (404, login, goals) |
| Production env template | `docs/env.production.example` | `CI_ENVIRONMENT = production`, baseURL, DB |
| Local env | `.env` | `app.baseURL`, `database.default.*`, `CI_ENVIRONMENT` |
| Database setup SQL | `app/Database/trackwise_setup.sql` | CREATE TABLE for users, study_sessions, goals |
| Apache entry point | `public/index.php` | Why document root must be `public/` |
| URL rewriting | `public/.htaccess` | Rewrite rules |

---

## Part D — Closing line

> “TRACKWISE covers weeks 11–15: CSRF and XSS security, file uploads, email logging, pagination, PHPUnit tests, and deployment. Reports: docs/SECURITY_REPORT.md and docs/DEPLOYMENT_LOG.md. Live URL: [say your URL]. Thank you.”

---

# Quick reference — Website pages map

| Feature | URL in browser |
|---------|----------------|
| Welcome | `/` |
| Login | `/trackwise/auth/login` |
| Register | `/trackwise/auth/register` |
| Dashboard | `/trackwise/dashboard` |
| Study Log (upload + pagination) | `/trackwise/studylog` |
| Security demo (CSRF + XSS) | `/trackwise/security` |
| Analytics (toolbar + cache) | `/trackwise/analytics` |
| Create Goal | `/trackwise/goals/create` |
| Goals list | `/trackwise/goals` |
| Profile | `/trackwise/profile` |

---

# Quick reference — Code files map

| Week | Topic | Main files |
|------|-------|------------|
| 11 | CSRF filter | `app/Config/Filters.php` |
| 11 | CSRF forms | `app/Views/trackwise/**` (any form with `csrf_field()`) |
| 11 | CSRF/XSS demo | `app/Controllers/Trackwise/Security.php`, `app/Views/trackwise/security/index.php` |
| 11 | XSS escape | All views using `esc(..., 'html')` |
| 11 | Report | `docs/SECURITY_REPORT.md` |
| 12–13 | Upload | `app/Controllers/Trackwise/StudyLog.php`, `app/Views/trackwise/studylog/index.php` |
| 12–13 | Email | `app/Controllers/Trackwise/Auth.php`, `app/Config/Email.php`, `writable/logs/email.log` |
| 12–13 | Pagination | `app/Models/Trackwise/StudySessionModel.php`, `app/Views/trackwise/studylog/index.php` |
| 12–13 | Performance | `app/Controllers/Trackwise/Analytics.php`, `app/Config/Filters.php` |
| 14 | Tests | `tests/app/WelcomePageTest.php`, `StudySessionModelTest.php`, `ValidationRulesTest.php` |
| 14 | Bug fix | `app/Controllers/Trackwise/Auth.php`, `app/Models/UserModel.php` |
| 15 | Deploy | `docs/DEPLOYMENT_LOG.md`, `.env`, `app/Database/trackwise_setup.sql` |

---

# If something breaks during presentation

| Problem | Do this |
|---------|---------|
| 404 page | Run server from `codeigniter4-framework-e7753bc` folder |
| Login fails | Register a **new** account |
| Empty study log / goals error | phpMyAdmin → run `app/Database/trackwise_setup.sql` |
| No Debug Toolbar | `.env` → `CI_ENVIRONMENT = development` |
| PHPUnit not found | Run `composer install` first |

---

# Screenshots each member should capture BEFORE presentation

| Member | Screenshot |
|--------|------------|
| M1 | 403 page after “POST without CSRF” |
| M1 | XSS before/after on `/trackwise/security` |
| M2 | Study log with uploaded image visible |
| M2 | `writable/logs/email.log` open in editor |
| M3 | Study log page 2 + search in URL |
| M3 | Analytics with Debug Toolbar showing SQL |
| M4 | Terminal PHPUnit PASS |
| M5 | phpMyAdmin showing 3 tables with data |
