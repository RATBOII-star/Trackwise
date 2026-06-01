@echo off
cd /d "%~dp0"
echo Starting TRACKWISE at http://localhost:8080/
echo Press Ctrl+C to stop.
php spark serve --host localhost --port 8080
