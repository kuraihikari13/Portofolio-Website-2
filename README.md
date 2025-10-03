<h1 align="center" style="font-size:32px;">📚 Elementary School Portal & Operations System</h1>
<p align="center" style="font-size:15px;">
A completed, production-grade web application built for an elementary school to centralize academic data, parent–teacher communication, and day-to-day operations. Below is a detailed breakdown of each key feature with a clear split between what the <strong>frontend</strong> presents and what the <strong>backend</strong> implements.
</p>

<hr/>

<h2>✨ Key Features — Detailed (Frontend / Backend)</h2>

<!-- 1 -->
<h3>1. School Profile & Class Schedule</h3>
<div style="margin-left:8px;">
  <h4>Frontend</h4>
  <ul>
    <li>Public-facing pages that present the school profile, mission, contact info, and downloadable brochures. Built with responsive <code>Bootstrap</code> components so pages render on phones and tablets.</li>
    <li>Timetable view: a clean table / card layout for daily/weekly schedules with filters by grade / class. Print-friendly styles (CSS @media print) to let parents or staff print schedules easily.</li>
    <li>Lightweight caching on the client (localStorage) for faster subsequent loads and offline-read capability for static profile data.</li>
  </ul>

  <h4>Backend</h4>
  <ul>
    <li>REST endpoints like <code>GET /api/school/profile</code> and <code>GET /api/schedules?grade=3</code>. Responses are JSON; schedule entries include meta fields (start_time, end_time, teacher_id, room).</li>
    <li>CRUD admin interface for staff to update school info and schedules. Server-side validation prevents invalid times or overlapping classes.</li>
    <li>Schedules stored in MySQL (normalized tables: <code>grades</code>, <code>classes</code>, <code>schedules</code>) with optional exported snapshots stored as JSON for versioned timetables.</li>
  </ul>
</div>

<hr/>

<!-- 2 -->
<h3>2. Student Report Cards & Academic Records</h3>
<div style="margin-left:8px;">
  <h4>Frontend</h4>
  <ul>
    <li>Parent-specific views after login: list of children, selectable semesters, and an interactive report card UI that breaks down subjects, scores, and teacher notes.</li>
    <li>Progress visualizations (small charts) that show trend per subject across terms — implemented with vanilla JS and minimal charting to keep bundle size low.</li>
    <li>Printable PDF export and CSV download for records; teacher notes and attachments are rendered inline with timestamps and version history.</li>
  </ul>

  <h4>Backend</h4>
  <ul>
    <li>Relational model: <code>students</code>, <code>classes</code>, <code>subjects</code>, <code>grades</code>, <code>reports</code>. Example simplified schema:
      <pre><code>
students (id, nis, name, birth_date, grade_id, parent_id, created_at)
grades   (id, student_id, subject_id, score, weight, term, created_at)
reports  (id, student_id, term, summary_json /* JSON snapshot */, created_by, created_at)
      </code></pre>
    </li>
    <li>Every report edit creates a JSON snapshot stored in a <code>reports</code> table (or MySQL JSON column). Snapshots allow audit/history and restore points.</li>
    <li>Endpoints:
      <pre><code>
GET  /api/students/{id}/reports
POST /api/students/{id}/reports     (teacher submits an updated report)
PUT  /api/students/{id}/grades/{g}  (edit specific grade)
      </code></pre>
    </li>
    <li>Server-side rules enforce grade ranges, required comments for missing scores, and notifications to parents on major changes. All writes are logged to an <code>audit_logs</code> table.</li>
  </ul>
</div>

<hr/>

<!-- 3 -->
<h3>3. Parent–Teacher Chat</h3>
<div style="margin-left:8px;">
  <h4>Frontend</h4>
  <ul>
    <li>A focused chat UI (chatbox) available inside the parent portal: conversation list, unread badge, message composer, file attachments (photos of homework, PDF notes).</li>
    <li>UX considerations: typing indicators, timestamps, message status (sent/read). Messages are sanitized client-side and server-side to prevent XSS.</li>
    <li>Graceful handling of connectivity: optimistic UI updates and local queueing for messages when offline (then sync on reconnect).</li>
  </ul>

  <h4>Backend</h4>
  <ul>
    <li>Message model:
      <pre><code>
messages (id, conversation_id, sender_id, recipient_id, body, attachments_json, read_at, created_at)
conversations (id, student_id, last_message_at)
      </code></pre>
    </li>
    <li>Real-time delivery: the app uses a JS client to poll or subscribe to push updates. In the production deployment we use a WebSocket server when the hosting allows it (or server-sent events / long-polling fallback) so staff get near-instant notifications; otherwise short-interval AJAX polling is used.</li>
    <li>APIs:
      <pre><code>
GET  /api/chats/{conversation_id}/messages
POST /api/chats/{conversation_id}/messages
POST /api/chats/{conversation_id}/attachments
      </code></pre>
    </li>
    <li>Security & moderation: rate limiting, per-user conversation permission checks (parents can only open conversations for their children), attachment virus scanning and size limits.</li>
  </ul>
</div>

<hr/>

<!-- 4 -->
<h3>4. Staff Dashboard & Teacher Tools</h3>
<div style="margin-left:8px;">
  <h4>Frontend</h4>
  <ul>
    <li>Role-aware dashboard (teacher vs admin) showing pending actions: ungraded assignments, messages to reply, upcoming parent meetings.</li>
    <li>Forms with client-side validation for adding/editing grades, bulk upload (CSV) flows, and inline editing on table rows for faster data entry.</li>
    <li>Accessibility: keyboard-friendly forms and clear error states for faster teacher workflows.</li>
  </ul>

  <h4>Backend</h4>
  <ul>
    <li>Endpoints for staff workflows include bulk import endpoints (<code>POST /api/import/grades</code>) that enqueue background jobs for parsing & validating big uploads.</li>
    <li>Concurrency controls: optimistic locking on report edits (version numbers or timestamps) to prevent overwriting another teacher’s changes.</li>
    <li>Permission system (RBAC): permissions are checked server-side before any write (create/edit/delete) operation.</li>
  </ul>
</div>

<hr/>

<!-- 5 -->
<h3>5. Operations Management System (OMS)</h3>
<div style="margin-left:8px;">
  <h4>Frontend</h4>
  <ul>
    <li>Admin panels for school managers to review enrollment numbers, staff attendance, and high-level KPIs (attendance rates, average scores per grade).</li>
    <li>Data export tools (CSV/Excel), scheduling tools for staff, and interface for sending broadcast announcements to parents or staff.</li>
  </ul>

  <h4>Backend</h4>
  <ul>
    <li>Data aggregation endpoints used to drive dashboards (e.g. <code>GET /api/ops/attendance?from=...&to=...</code>) with server-side caching for expensive queries.</li>
    <li>Scheduled jobs (cron) for nightly backups, summary report generation, and routine integrity checks (e.g., orphaned records).</li>
    <li>Activity & audit logs for accountability: staff actions (who changed what and when) are retained to comply with data governance requirements.</li>
  </ul>
</div>

<hr/>

<!-- 6 -->
<h3>6. Authentication, Authorization & Security</h3>
<div style="margin-left:8px;">
  <h4>Frontend</h4>
  <ul>
    <li>Secure login pages with form-level input validation, password strength indicators, and “forgot password” flows. Optional 2FA UI if enabled by the school.</li>
    <li>Role-based UX: parents see only their children; teachers see only their assigned classes; admins see system-wide controls.</li>
  </ul>

  <h4>Backend</h4>
  <ul>
    <li>Session-based authentication (secure PHP sessions) with strong password hashing (bcrypt). Session cookies are set with <code>HttpOnly</code> and <code>Secure</code> flags.</li>
    <li>RBAC implemented in the database (roles, permissions) with middleware checks for every protected route.</li>
    <li>CSRF protection on all form submissions, input sanitization to avoid SQL injection/XSS, and file validation for uploads. Sensitive data transport always uses TLS (HTTPS).</li>
  </ul>
</div>

<hr/>

<!-- 7 -->
<h3>7. Data Model & Why MySQL + JSON</h3>
<div style="margin-left:8px;">
  <h4>Frontend</h4>
  <ul>
    <li>Client expects consistent JSON responses; some endpoints return compact JSON blobs for fast client-side rendering and local caching.</li>
  </ul>

  <h4>Backend</h4>
  <ul>
    <li><strong>Why MySQL:</strong> Relational data (students, classes, grades, users) benefits from ACID guarantees, joins, and structured queries. It’s reliable, well-understood by the client’s hosting team, and easy to back up.</li>
    <li><strong>Why JSON:</strong> Flexible fields—like report card snapshots, teacher comments history, and message metadata—are stored as JSON when schema flexibility helps (e.g., storing different assessment rubrics or attachments). JSON is also used for lightweight exports/imports and offline sync payloads.</li>
    <li>Backup & migration strategy: regular SQL dumps, incremental backups for media, and exportable JSON snapshots for critical records.</li>
  </ul>
</div>

<hr/>

<!-- 8 -->
<h3>8. Reliability, Monitoring & Maintenance</h3>
<div style="margin-left:8px;">
  <h4>Frontend</h4>
  <ul>
    <li>Graceful error handling and user-friendly messages. Important flows (submitting grades, sending messages) display clear success/failure states and retry options.</li>
  </ul>

  <h4>Backend</h4>
  <ul>
    <li>Error tracking (e.g., Sentry or log files), server health checks, and automated alerts for failures. Nightly integrity checks validate referential constraints and flag anomalies.</li>
    <li>Maintenance endpoints and a simple admin UI to reprocess failed jobs or re-send notifications.</li>
  </ul>
</div>

<hr/>

<h2>Example APIs & Sample JSON</h2>
<pre><code>
// Example endpoints
GET  /api/students/{id}/reports
POST /api/students/{id}/reports        // body: { term: "2025-S1", grades: [...], notes: "..." }
GET  /api/chats/{conversation_id}/messages
POST /api/chats/{conversation_id}/messages  // body: { text: "...", attachments: [...] }

// Sample report snapshot JSON (stored in reports.summary_json)
{
  "term": "2025-S1",
  "student_id": 123,
  "subjects": [
    {"subject_id": 1, "name":"Math", "score": 87, "comment": "Good progress"},
    {"subject_id": 2, "name":"Science", "score": 92, "comment": "Excellent lab work"}
  ],
  "teacher_note": "Keep practicing multiplication tables.",
  "generated_at": "2025-06-20T08:34:12Z",
  "created_by": 45
}
</code></pre>

<hr/>

<p style="font-size:13px;"><i>Notes from the implementation perspective:</i> The stack selection (HTML/Bootstrap frontend, PHP/JS backend, MySQL + JSON storage) reflects the client’s hosting environment and maintenance preferences—this minimized ramp-up time for their internal team while keeping the architecture robust and maintainable. The system was implemented with secure defaults, thorough validation, and operational tooling (backups, monitoring, and audit logs) so the school can operate reliably day-to-day.</p>
