<?php
function renderPageStart(string $title, string $subtitle = ''): void
{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= htmlspecialchars($title) ?></title>
        <style>
            :root {
                --bg: #edf1ee;
                --bg-accent: #dde6df;
                --bg-deep: #cfdad2;
                --panel: rgba(250, 252, 250, 0.94);
                --panel-strong: #f8fbf8;
                --text: #24332d;
                --text-soft: #31453d;
                --muted: #607169;
                --line: rgba(54, 73, 64, 0.14);
                --primary: #4c6a5d;
                --primary-dark: #385146;
                --primary-soft: #dbe6df;
                --accent: #7a8f7e;
                --success: #557564;
                --danger: #9b6a63;
                --shadow: 0 22px 50px rgba(39, 54, 47, 0.10);
                --shadow-md: 0 12px 28px rgba(39, 54, 47, 0.08);
                --shadow-sm: 0 6px 16px rgba(39, 54, 47, 0.06);
                --radius-lg: 24px;
                --radius-md: 18px;
                --radius-sm: 12px;
            }

            * {
                box-sizing: border-box;
            }

            html {
                scroll-behavior: smooth;
            }

            body {
                margin: 0;
                min-height: 100vh;
                font-family: Georgia, "Times New Roman", serif;
                color: var(--text);
                background:
                    radial-gradient(circle at top left, rgba(122, 143, 126, 0.14), transparent 32%),
                    radial-gradient(circle at right 20%, rgba(76, 106, 93, 0.10), transparent 28%),
                    linear-gradient(180deg, var(--bg-accent) 0%, var(--bg) 45%, #f3f6f3 100%);
            }

            .page-shell {
                width: min(1120px, calc(100% - 32px));
                margin: 0 auto;
                padding: 40px 0 64px;
            }

            .hero {
                display: flex;
                justify-content: space-between;
                align-items: end;
                gap: 20px;
                margin-bottom: 28px;
                animation: slideDown 0.6s ease-out;
            }

            @keyframes slideDown {
                from {
                    opacity: 0;
                    transform: translateY(-18px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(10px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .hero h1 {
                margin: 0;
                font-size: clamp(2.2rem, 3vw, 3.4rem);
                line-height: 1.12;
                letter-spacing: -0.035em;
                color: var(--text);
                font-weight: 700;
            }

            .hero p {
                margin: 12px 0 0;
                max-width: 720px;
                color: var(--text-soft);
                font-size: 1.03rem;
                line-height: 1.6;
            }

            .card {
                background: var(--panel);
                border: 1px solid rgba(255, 255, 255, 0.55);
                border-radius: var(--radius-lg);
                box-shadow: var(--shadow);
                backdrop-filter: blur(12px);
                transition: transform 0.25s ease, box-shadow 0.25s ease;
                animation: fadeIn 0.45s ease-out;
            }

            .card:hover {
                transform: translateY(-2px);
                box-shadow: 0 26px 56px rgba(39, 54, 47, 0.12);
            }

            .panel {
                padding: 24px;
                width: 100%;
            }

            .toolbar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 16px;
                margin-bottom: 20px;
                flex-wrap: wrap;
            }

            .eyebrow {
                display: inline-flex;
                align-items: center;
                margin-bottom: 12px;
                padding: 8px 14px;
                border-radius: 999px;
                background: rgba(76, 106, 93, 0.10);
                color: var(--primary-dark);
                font-size: 0.78rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 0.12em;
            }

            .button,
            button,
            input[type="submit"] {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border: 0;
                border-radius: 999px;
                background: var(--primary);
                color: #f7faf7;
                padding: 12px 24px;
                font-size: 0.95rem;
                font-weight: 700;
                text-decoration: none;
                cursor: pointer;
                transition: transform 0.22s ease, background 0.22s ease, box-shadow 0.22s ease;
                box-shadow: 0 10px 22px rgba(56, 81, 70, 0.18);
            }

            .button:hover,
            button:hover,
            input[type="submit"]:hover {
                transform: translateY(-2px);
                background: var(--primary-dark);
                box-shadow: 0 14px 26px rgba(56, 81, 70, 0.22);
            }

            .button-secondary {
                background: rgba(76, 106, 93, 0.08);
                color: var(--text);
                border: 1px solid rgba(76, 106, 93, 0.14);
                box-shadow: none;
            }

            .button-secondary:hover {
                background: rgba(76, 106, 93, 0.14);
                color: var(--text);
            }

            .data-table {
                width: 100%;
                border-collapse: collapse;
                overflow: hidden;
            }

            .data-table th,
            .data-table td {
                padding: 16px 18px;
                text-align: left;
                border-bottom: 1px solid var(--line);
                vertical-align: middle;
            }

            .data-table th {
                font-size: 0.78rem;
                text-transform: uppercase;
                letter-spacing: 0.10em;
                color: var(--muted);
                font-weight: 700;
                background: rgba(76, 106, 93, 0.05);
            }

            .data-table tbody tr {
                transition: background 0.2s ease;
            }

            .data-table tbody tr:hover {
                background: rgba(76, 106, 93, 0.035);
            }

            .data-table tr:last-child td {
                border-bottom: 0;
            }

            .student-name {
                font-weight: 700;
                color: var(--text);
            }

            .muted {
                color: var(--muted);
            }

            .actions {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
            }

            .pill {
                display: inline-flex;
                padding: 7px 14px;
                border-radius: 999px;
                background: rgba(122, 143, 126, 0.14);
                color: var(--primary-dark);
                font-size: 0.88rem;
                font-weight: 700;
                border: 1px solid rgba(76, 106, 93, 0.12);
            }

            form {
                display: grid;
                gap: 18px;
            }

            .form-grid {
                display: grid;
                gap: 18px;
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .field {
                display: grid;
                gap: 8px;
                animation: fadeIn 0.45s ease-out;
            }

            .field-full {
                grid-column: 1 / -1;
            }

            label {
                font-size: 0.92rem;
                font-weight: 700;
                color: var(--text);
            }

            input,
            select,
            textarea {
                width: 100%;
                padding: 14px 16px;
                border-radius: var(--radius-sm);
                border: 1px solid rgba(76, 106, 93, 0.16);
                background: var(--panel-strong);
                font-size: 1rem;
                color: var(--text);
                outline: none;
                transition: border-color 0.22s ease, box-shadow 0.22s ease, transform 0.22s ease;
                font-family: inherit;
            }

            input:focus,
            select:focus,
            textarea:focus {
                border-color: rgba(76, 106, 93, 0.5);
                box-shadow: 0 0 0 4px rgba(76, 106, 93, 0.10);
                transform: translateY(-1px);
            }

            input::placeholder,
            select::placeholder,
            textarea::placeholder {
                color: rgba(96, 113, 105, 0.8);
            }

            .form-actions {
                display: flex;
                flex-wrap: wrap;
                gap: 12px;
                padding-top: 6px;
            }

            .alert {
                padding: 16px 18px;
                border-radius: var(--radius-md);
                background: rgba(85, 117, 100, 0.12);
                color: #355244;
                border: 1px solid rgba(85, 117, 100, 0.18);
                font-weight: 600;
                animation: slideDown 0.4s ease-out;
            }

            .alert.error {
                background: rgba(155, 106, 99, 0.11);
                color: #6f4c47;
                border-color: rgba(155, 106, 99, 0.18);
            }

            .empty-state {
                padding: 56px 20px;
                text-align: center;
            }

            .empty-state h2 {
                margin-bottom: 10px;
                font-size: 1.6rem;
                color: var(--text);
            }

            .empty-state p {
                margin-bottom: 24px;
                color: var(--muted);
                font-size: 1rem;
            }

            .stats {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
                gap: 16px;
                margin-bottom: 24px;
            }

            .stat-card {
                padding: 24px;
                border-radius: var(--radius-md);
                background: linear-gradient(180deg, rgba(248, 251, 248, 0.96) 0%, rgba(237, 243, 238, 0.92) 100%);
                border: 1px solid rgba(255, 255, 255, 0.65);
                box-shadow: var(--shadow-md);
                animation: fadeIn 0.45s ease-out;
            }

            .stat-card span {
                display: block;
                color: var(--muted);
                font-size: 0.8rem;
                margin-bottom: 8px;
                text-transform: uppercase;
                letter-spacing: 0.08em;
                font-weight: 700;
            }

            .stat-card strong {
                font-size: 2rem;
                letter-spacing: -0.04em;
                color: var(--text);
            }

            .search-box {
                display: flex;
                align-items: center;
                gap: 8px;
                margin-bottom: 18px;
            }

            .search-box input {
                flex: 1;
                max-width: 400px;
            }

            @media (max-width: 760px) {
                .page-shell {
                    width: min(100% - 20px, 1120px);
                    padding-top: 24px;
                    padding-bottom: 40px;
                }

                .hero {
                    flex-direction: column;
                    align-items: flex-start;
                }

                .hero h1 {
                    font-size: 1.9rem;
                }

                .toolbar,
                .form-grid,
                .stats {
                    grid-template-columns: 1fr;
                    display: grid;
                }

                .toolbar {
                    flex-direction: column;
                    align-items: stretch;
                }

                .toolbar .button {
                    width: 100%;
                }

                .data-table,
                .data-table thead,
                .data-table tbody,
                .data-table tr,
                .data-table th,
                .data-table td {
                    display: block;
                    width: 100%;
                }

                .data-table thead {
                    display: none;
                }

                .data-table tr {
                    padding: 18px;
                    border-bottom: 1px solid var(--line);
                    margin-bottom: 12px;
                    border-radius: var(--radius-sm);
                    background: rgba(248, 251, 248, 0.95);
                }

                .data-table td {
                    padding: 10px 0;
                    border: 0;
                }

                .data-table td::before {
                    content: attr(data-label);
                    display: block;
                    margin-bottom: 6px;
                    color: var(--muted);
                    font-size: 0.78rem;
                    font-weight: 700;
                    text-transform: uppercase;
                    letter-spacing: 0.06em;
                }

                .actions {
                    flex-direction: column;
                }

                .actions .button {
                    width: 100%;
                }

                .panel {
                    padding: 20px;
                }

                .search-box input {
                    max-width: 100%;
                }
            }
        </style>
    </head>
    <body>
        <div class="page-shell">
            <div class="hero">
                <div>
                    <div class="eyebrow">Student Management</div>
                    <h1><?= htmlspecialchars($title) ?></h1>
                    <?php if ($subtitle !== ''): ?>
                        <p><?= htmlspecialchars($subtitle) ?></p>
                    <?php endif; ?>
                </div>
            </div>
    <?php
}

function renderPageEnd(): void
{
    ?>
        </div>
    </body>
    </html>
    <?php
}

function renderStudentForm(string $actionLabel, array $student = [], string $cancelHref = 'index.php'): void
{
    $name = htmlspecialchars($student['name'] ?? '');
    $email = htmlspecialchars($student['email'] ?? '');
    $course = htmlspecialchars($student['course'] ?? '');
    ?>
    <form method="POST" class="card panel">
        <div class="form-grid">
            <div class="field field-full">
                <label for="name">Full Name</label>
                <input id="name" type="text" name="name" placeholder="Enter student full name" value="<?= $name ?>" required>
            </div>
            <div class="field">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" placeholder="student@example.com" value="<?= $email ?>" required>
            </div>
            <div class="field">
                <label for="course">Course</label>
                <input id="course" type="text" name="course" placeholder="e.g., BS Information Technology" value="<?= $course ?>" required>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit"><?= htmlspecialchars($actionLabel) ?></button>
            <a class="button button-secondary" href="<?= htmlspecialchars($cancelHref) ?>">Back to Dashboard</a>
        </div>
    </form>
    <?php
}
?>