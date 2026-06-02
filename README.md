# TrackWise 📚✏️

TrackWise is an intelligent study management application designed to help students take full control of their academic life through structured planning and data-driven insights. 

Overall, TrackWise serves as a comprehensive productivity companion that not only helps students manage their workload efficiently but also encourages self-discipline, accountability, and continuous improvement. By combining organization tools with intelligent feedback, it empowers learners to maximize their potential and achieve better academic outcomes.

---

## 🚀 Key Features

*   **Personalized Study Schedules:** Create custom timetables and organize tasks in a way that aligns with your unique priorities and deadlines.
*   **Goal Setting:** Set and track both short-term milestones and long-term academic objectives.
*   **Study Session Tracker:** Built-in tracker to record the duration, frequency, and focus level of every study session.
*   **Data-Driven Insights:** Automatically analyzes your behavior to generate meaningful reports on study habits and productivity patterns.
*   **Progress Visualization:** Identify your strengths and address weaknesses through intuitive progress charts and performance trends.
*   **Motivation & Consistency:** Stay committed to your goals with smart reminders and active progress monitoring.

---

## 📈 Why TrackWise?

> **Empowering learners through intelligence.** 
> Unlike simple planners, TrackWise goes beyond organization by analyzing how you spend your time, giving you the self-discipline and accountability needed to adjust your strategies and succeed

TrackWise was developed as a full-cycle academic project covering:

- secure web development (CSRF/XSS protection)
- advanced CI4 features (uploads, email-ready config, pagination/search, performance awareness)
- testing and debugging practices
- cloud deployment (InfinityFree)

The app is designed around daily student workflows: log sessions, view insights, follow a planner, and stay motivated through goals and notifications.

## Core Features

- **Authentication**: register, login, logout, and session-based access control
- **Dashboard**: high-level study stats and quick navigation cards
- **Study Log**: submit subject/topic/duration/notes and optional photo upload
- **Techniques**: Pomodoro timer and study method guidance
- **Planner**: daily schedule with task progress
- **Analytics**: session totals, hours, streak, and subject-focused insights
- **Goals**: create and track goal completion
- **Notifications**: reminders, fatigue alerts, and milestone-style messages
- **Profile**: account details, preferences, and personal study statistics
- **Security Demo Page**: CSRF and XSS demonstration endpoints for reporting

## Tech Stack

- **Backend**: PHP 8.2+, CodeIgniter 4.7 (MVC)
- **Database**: MySQL (via XAMPP/phpMyAdmin in local setup)
- **Frontend**: CI4 Views (PHP templates), custom CSS and JavaScript
- **Testing**: PHPUnit (feature + model/validation tests)
- **Deployment**: InfinityFree (shared hosting)

## Project Structure (Key Directories)

```text
app/
  Controllers/Trackwise/      # Feature controllers
  Models/Trackwise/           # Domain models (study, goals, planner, etc.)
  Views/trackwise/            # Feature views and layouts
  Database/Migrations/        # Schema migrations
docs/
  SECURITY_REPORT.md
  DEPLOYMENT_LOG.md
  PRESENTATION_SCRIPT.md
public/
  trackwise/css/trackwise.css
  trackwise/js/studylog.js
  trackwise/js/timer.js
tests/
  app/                        # Project tests
```

## Main Routes

TrackWise uses explicit routes (auto-route disabled) and is served under `/trackwise`.

- `GET /trackwise/` - landing page
- `GET /trackwise/auth/login` - login form
- `POST /trackwise/auth/loginProcess` - login submit
- `GET /trackwise/dashboard` - dashboard
- `GET /trackwise/studylog` - study log page
- `POST /trackwise/studylog/save` - save study session
- `GET /trackwise/planner` - planner
- `POST /trackwise/planner/toggle/{id}` - toggle planner task
- `GET /trackwise/goals` - goals list
- `POST /trackwise/goals/store` - create goal
- `GET /trackwise/analytics` - analytics
- `GET /trackwise/notifications` - notifications
- `GET /trackwise/profile` - profile
- `GET /trackwise/security` - security demo page

## Security Implementation

- CSRF filtering enabled for state-changing requests
- CSRF token fields included in form submissions
- Escaped output for user-controlled fields to mitigate XSS
- Input hardening via framework filters
- Validated and controlled file uploads (`writable/uploads/`)

See `docs/SECURITY_REPORT.md` for detailed attack/countermeasure write-up.

## Database

This project includes both migration and SQL-based setup options.

- Migrations: `app/Database/Migrations/`
- SQL dump: `app/Database/trackwise_setup.sql`

Main data entities:

- users
- study_sessions
- goals

## Local Setup (XAMPP)

1. Clone or copy this project into your XAMPP `htdocs` directory.
2. Create a database in phpMyAdmin (example: `task_manager_db`).
3. Configure `.env`:
   - `CI_ENVIRONMENT = development`
   - `app.baseURL = 'http://localhost:8000/'` (or your Apache URL)
   - database credentials
4. Install dependencies:
   ```bash
   composer install
   ```
5. Create schema:
   ```bash
   php spark migrate --all
   ```
   or import `app/Database/trackwise_setup.sql`.
6. Run app:
   ```bash
   php spark serve --host localhost --port 8000
   ```
7. Open:
   - `http://localhost:8000/`
   - `http://localhost:8000/trackwise/auth/login`

## Running Tests

Run test suite:

```bash
vendor/bin/phpunit
```

Project-specific tests are located in `tests/app/`.

## Deployment (InfinityFree)

The project is deployed to InfinityFree as part of Week 15 deliverables.

High-level deployment flow:

1. Upload project files to hosting account.
2. Ensure web root points to the CI4 `public/` directory.
3. Set production values in `.env`:
   - `CI_ENVIRONMENT = production`
   - correct `app.baseURL`
   - live DB credentials
4. Import database schema/data in phpMyAdmin.
5. Verify writable directories (`writable/`) and route rewriting.
6. Run post-deploy validation: auth, study log, goals, analytics, profile.

See full deployment details in `docs/DEPLOYMENT_LOG.md`.

## Documentation

- Security report: `docs/SECURITY_REPORT.md`
- Deployment log: `docs/DEPLOYMENT_LOG.md`
- Presentation script: `docs/PRESENTATION_SCRIPT.md`
- Production env sample: `docs/env.production.example`

## Team Notes

This repository contains a customized CodeIgniter distribution adapted for the TrackWise project.  
Framework files are included; project-specific logic is primarily under `app/Controllers/Trackwise`, `app/Models/Trackwise`, and `app/Views/trackwise`.
